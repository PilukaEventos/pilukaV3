<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espaco;
use App\Models\Plano;
use App\Models\Foto;

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

    public function create_plano(){
        return view('espacos.create_plano');
    }

    public function store(Request $request){
        $espaco = new Espaco;
        $saveFoto = new Foto;
        $espaco->nomeSalao = $request->nomeSalao;
        $espaco->telefoneSalao = $request->telefoneSalao;
        $espaco->emailSalao = $request->emailSalao;
        $espaco->moradaSalao = $request->moradaSalao;
        $espaco->sobreSalao = $request->sobreSalao;
        $espaco->redesSalao = $request->redesSalao;
        $espaco->save();
        //Image upload
        /*
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) .".".$extension;
            $requestImage->move(public_path('/img/teste'), $imageName);
            $saveFoto->foto = $imageName;
         
         */
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $requestImage = $request->foto;
            
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/teste'), $imageName);
            
            $saveFoto->espaco_id=$espaco->id;
            $saveFoto->foto=$imageName;            

            $saveFoto->save();

            
        }    

        return redirect('/espaco')->with('msg', 'São criado com sucesso!');
    }
    /** sobre a informação dos espacos do botão sabermais na home */
    public function InfoEspacos(){
        $id=request('id');
        
        $salao = Espaco::findOrfail($id);
        $planos = Plano::all();
            /*Logica de validação para mostrar fotos */
                $fotos=Foto::where([['espaco_id','=',$id]])->get();
         
                    if (isset($fotos)){
                        
                            return view('sobreespaco',['salao'=>$salao,'id'=>$id,'fotos'=>$fotos,])->with('msg', 'Seja bem vindo!');
                        
                        return view('sobreespaco',['salao'=>$salao,'id'=>$id,'fotos'=>$fotos])->with('msg', 'Seja bem vindo!');
                    }
                    else {
                        return view('sobreespaco',['salao'=>$salao,'id'=>$id])->with('msg', 'Seja bem vindo!');
                    }
            
        }
}
