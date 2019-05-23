<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Slideshow;

class SlideshowController extends Controller {

    public function pageSlideshow() {
        $slideshows = Slideshow::where('status', '=', '1')->get();
        return view('admin.slideshow', compact('slideshows'));
    }

    public function addSlideshow(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/slideshow');
        $image->move($destinationPath, $name);

        $createSlideshow = Slideshow::create([
                    'imagem' => $name,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editSlideshow(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/slideshow');
        $image->move($destinationPath, $name);
        $updateSlideshow = Slideshow::where("id_slideshow", "=", $request->id_slideshow)->update([
            "imagem" => $name
        ]);
        return response()->json($request);
    }

    public function deleteSlideshow(Request $request) {
        $updateSlideshow = Slideshow::where("id_slideshow", "=", $request->id_slideshow)->update([
            "status" => 0
        ]);
        return response()->json($request);
    }

    public function validateForm(Request $request) {
        return $this->validate($request, [
                    'file' => 'required|mimes:png,jpeg,jpg,gif|max:2048',
        ]);
    }

}
