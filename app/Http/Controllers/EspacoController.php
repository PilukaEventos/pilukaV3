<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espaco;
use App\Models\Plano;

class EspacoController extends Controller
{
    public function index(){
        $espacos = Espaco::all();
        $planos = Plano::all();
    
        return view('espaco',['espacos'=>$espacos],['espacos'=>$planos]);
    }

    public function novo(){
        return view('espacos.novo');
    }

    public function novo_plano(){
        return view('espacos.novo_plano');
    }

    public function store(Request $request){
        $espaco = new Espaco;

        $espaco->nomeSalao = $request->nomeSalao;
        $espaco->telefoneSalao = $request->telefoneSalao;
        $espaco->emailSalao = $request->emailSalao;
        $espaco->moradaSalao = $request->moradaSalao;
        $espaco->sobreSalao = $request->sobreSalao;
        $espaco->redesSalao = $request->redesSalao;

        //Image upload
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) .".".$extension;
            $requestImage->move(public_path('img/espacos'), $imageName);
            $espaco->foto = $imageName;
        }

        $espaco->save();

        return redirect('/espaco')->with('msg', 'São criado com sucesso!');
    }
}
