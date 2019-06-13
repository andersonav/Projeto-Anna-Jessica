<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;
use App\Kit;
use App\Fatura;
use Hash;
use Auth;
use DB;

class CompraController extends Controller
{

    public function pagarMP(Request $request)
    {
        $selectKit = Kit::where("id_kit", '=', $request->idKit)->get();

        $hashKit = null;
        if (count($selectKit) > 0) {
            $hashKit = md5($selectKit[0]->id_tamanho . $selectKit[0]->id_kit . $selectKit[0]->nome_kit . $selectKit[0]->valor);
        } else {
            return redirect('/compra-kit')->with('error', 'error');
        };
        if (Hash::check($hashKit, $request->hash)) {
            $mp = new MP(env('MP_APP_ID'), env('MP_APP_SECRET'));


            $insertFatura = Fatura::create([
                'id_usuario' => Auth::user()->id_usuario,
                'referencia' => bcrypt(rand(0, 999999)),
                'forma' => 'Mercado Pago',
                'data' => date("Y-m-d"),
                'valor' => $selectKit[0]->valor,
                'tamanho' => $request->tamanho,
                'id_kit' => $request->idKit,
                'status' => 'Pendente'
            ]);

            $selectKitFatura = DB::select("SELECT * FROM fatura
        INNER JOIN kit_evento ON kit_evento.id_kit = fatura.id_kit
        INNER JOIN usuario ON usuario.id_usuario = fatura.id_usuario
        WHERE fatura.id_kit = ? AND fatura.id_usuario = ?", [$request->idKit, Auth::user()->id_usuario]);


            $current_user = auth()->user();

            $url = "https://www.annajessicaoficial.com/notifications/mp";

            $preferenceData = [
                'external_reference' => $selectKitFatura[0]->referencia,
                'back_urls' => [
                    "success" => $url,
                    "failure" => $url,
                    "pending" => $url
                ],
                'notification_url' => $url
            ];
            // add items

            $preferenceData['items'][] = [
                'id' => auth()->user()->id,
                'title' => $selectKit[0]->nome_kit,
                'description' => $selectKit[0]->descricao_kit . '. Tamanho: ' . $request->tamanho,
                'picture_url' => $selectKit[0]->imagem_kit,
                'quantity' => 1,
                'currency_id' => 'BRL',
                'unit_price' => intval($selectKit[0]->valor),
            ];

            try {
                $preference = MP::create_preference($preferenceData);
                return redirect()->to($preference['response']['sandbox_init_point']);
            } catch (Exception $e) {
                dd($e->getMessage());
            }

            // also you can use try-catch for create the preference, DB transaction for the whole generatePaymentGateway method, etc''
            // finally return init point to be redirected - or
            // sandbox_init_point
            // init_point OBS: Modo produção
            // return $preference['response']['sandbox_init_point'];
        }
    }

    public function ipnNotification(Request $request)
    {
        $mp = new MP(env('MP_CLIENT_ID'), env('MP_CLIENT_SECRET'));

        if (!isset($_GET["id"], $_GET["topic"]) || !ctype_digit($_GET["id"])) {
            abort(404);
        }

        // Get the payment and the corresponding merchant_order reported by the IPN.
        if ($_GET["topic"] == 'payment') {
            $payment_info = $mp->get("/v1/payments/$payment_id/" . $_GET["id"]);
            $merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);

            // Get the merchant_order reported by the IPN.
            // get order and link the notification id
            $external_reference_id = $merchant_order_info["response"]["external_reference"];
            //here you must clear unnecessary data in external reference
            // get order
            $order = Order::findOrFail($external_reference_id);
            // link notification id
            $order->mp_notification_id = $_GET["id"];

            if ($merchant_order_info["status"] == 200) {
                // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items

                $paid_amount = 0;

                foreach ($merchant_order_info["response"]["payments"] as $payment) {
                    $order->status = $payment['status'];
                    if ($payment['status'] == 'approved') {
                        $paid_amount += $payment['transaction_amount'];
                    }
                }

                if ($paid_amount >= $merchant_order_info["response"]["total_amount"]) {
                    if (count($merchant_order_info["response"]["shipments"]) > 0) {

                        // The merchant_order has shipments
                        if ($merchant_order_info["response"]["shipments"][0]["status"] == "ready_to_ship") {
                            print_r("Totally paid. Print the label and release your item.");
                        }
                    } else {
                        // The merchant_order don't has any shipments
                        print_r("Totally paid. Release your item.");
                    }
                } else {
                    print_r("Not paid yet. Do not release your item.");
                }
            }

            $order->save();
        }

        return response('OK', 201);
    }
}
