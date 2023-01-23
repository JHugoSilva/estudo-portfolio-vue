<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit_about($id) {
        return About::orderBy('id', 'desc')->first();
    }

    public function update_about(Request $request, $id) {

        $about = About::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        if($request->has('photo') && strpos($request->photo, ';base64')){
            $base64 = $request->photo;
            //obtem a extensão
            $extension = explode('/', $base64);
            $extension = explode(';', $extension[1]);
            $extension = '.'.$extension[0];
            //gera o nome
            $nameImage = uniqid().$extension;
            //obtem o arquivo
            $separatorFile = explode(',', $base64);
            $file = $separatorFile[1];
            $path = 'public/base64-files/';
            //envia o arquivo
            Storage::put($path.$nameImage, base64_decode($file));

        }

        if($request->has('cv') && strpos($request->cv, ';base64')){
            $base64 = $request->cv;
            //obtem a extensão
            $extension = explode('/', $base64);
            $extension = explode(';', $extension[1]);
            $extension = '.'.$extension[0];
            //gera o nome
            $nameCv = uniqid().$extension;
            //obtem o arquivo
            $separatorFile = explode(',', $base64);
            $file = $separatorFile[1];
            $path = '/storage/base64-files/';
            //envia o arquivo
            Storage::put($path.$nameCv, base64_decode($file));

        }

        $about = $about->fill($request->all());
        $about->photo = $path.$nameImage;
        $about->cv = $path.$nameCv;
        $about->save();
        return response()
        ->json(['content' => ['file' => $about], 'Message' => 'Arquivo enviado com sucesso'], 201);

        $about->save();
    }
}
