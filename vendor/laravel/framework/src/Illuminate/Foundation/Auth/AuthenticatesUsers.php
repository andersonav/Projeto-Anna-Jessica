<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $title = "Anna Jéssica Oficial";
        $eventoquadro = DB::select("SELECT evento.*,
        (SELECT GROUP_CONCAT(link_evento.nome_link SEPARATOR ',') FROM link_evento WHERE link_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(link_evento.link SEPARATOR ',') FROM link_evento WHERE link_evento.id_evento_fk = evento.id_evento) as linkEvento
        from evento WHERE evento.tipo = 'Quadro' limit 4");

        $anuncioClassificacao1 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 1 AND status = 1');
        $anuncioClassificacao2 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 2 AND status = 1');
        $anuncioClassificacao3 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 3 AND status = 1');

        $slideshows = DB::select('SELECT * from slideshow WHERE status = 1 limit 3');
        $ptBr = DB::select("SET lc_time_names = 'pt_BR';");
        $datas = DB::select("SELECT 
        LEFT(lower(DATE_FORMAT(data_inicio, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(data_inicio, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(data_inicio, '%Y')), 2) AS ano,
        DATE_FORMAT(data_inicio, '%Y') as numeroAno,
        DATE_FORMAT(data_inicio, '%m') as numeroMes
        FROM agenda 
        GROUP BY mes, ano, numeroMes, numeroAno, agenda.data_inicio
        order by numeroMes asc, dia asc");

        $agendas = DB::select("SELECT 
        LEFT(lower(DATE_FORMAT(data_inicio, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(data_inicio, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(data_inicio, '%Y')), 2) AS ano,
        DATE_FORMAT(data_inicio, '%Y') as numeroAno,
        DATE_FORMAT(data_inicio, '%m') as numeroMes,
        (SELECT GROUP_CONCAT(agen.id_agenda SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio) as idEvento,
        (SELECT GROUP_CONCAT(agen.nome_evento SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio) as nomeEvento,
        (SELECT GROUP_CONCAT(agen.descricao SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio) as descricaoEvento,
        (SELECT GROUP_CONCAT(agen.imagem SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio) as imagemEvento,
        (SELECT GROUP_CONCAT(agen.hora_inicio SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio) as horaInicio,
        (SELECT GROUP_CONCAT(agen.hora_fim SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio) as horaFim,
                (SELECT GROUP_CONCAT(agen.cidade SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio) as cidade
        FROM agenda 
        GROUP BY mes, ano, numeroMes, numeroAno, agenda.data_inicio
        order by numeroMes asc, dia asc");

        $selectKits = DB::select("SELECT
		LEFT(lower(DATE_FORMAT(prazo, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(prazo, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(prazo, '%Y')), 2) AS ano,
        DATE_FORMAT(prazo, '%Y') as numeroAno,
        DATE_FORMAT(prazo, '%m') as numeroMes,
        evento.*,
        (SELECT GROUP_CONCAT(kit_evento.id_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.nome_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.imagem_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.valor SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.id_tamanho SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.descricao_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as linkEvento
        from evento WHERE evento.tipo = 'Destaque' limit 1
        ");

        return view('index', compact('title', 'selectKits', 'eventoquadro', 'anuncioClassificacao1', 'anuncioClassificacao2', 'anuncioClassificacao3', 'slideshows', 'agendas', 'datas'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
