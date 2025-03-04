<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Hash;
use App\Models\Espaco;
use App\Models\Plano;
use App\Models\Foto;
use App\Models\Servico;

class EspacoController extends Controller
{
    public function index(){
        $espacos = Espaco::all();
        $planos = Plano::all();
        if (session('user_info')) {
            
            return view('espaco',['espacos'=>$espacos],['espacos'=>$planos]);
        }
        else {
            return redirect(route('home'));
        }
        
    }

    public function novo(){
        if (session('user_info')) {
            return view('espacos.novo');
        }
        else {
            return redirect(route('home'));
        }
        
    }

    public function create_plano(){
        if (session('user_info')) {
            return view('espacos.novo_plano');
        }
        elseif (session('cliente_info')){
            return view('espacos.novo_plano');
        }
        else {
            return redirect(route('entrar'));
        }
        
        
    }

    public function store(Request $request){
 
        $espaco = new Espaco;
        $saveFoto = new Foto;
        $espaco->nomeEsp = $request->nomeSalao;
        $espaco->telefoneEsp = $request->telefoneSalao;
        $espaco->emailEsp = $request->emailSalao;
        $espaco->moradaEsp = $request->moradaSalao;
        $espaco->descricaoEsp = $request->sobreSalao;
        $espaco->redes = $request->redesSalao;
        
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

            $imageName = $requestImage->getClientOriginalName();

            $requestImage->move(public_path('img/teste'), $imageName);
            
            $saveFoto->idEsp=$espaco->id;

            $espaco->fotoEsp=$imageName;            

            $espaco->save();
            return redirect('/espaco')->with('msg', 'São criado com sucesso!');    
        }    
        else{
            $requestImage = $request->foto;
            $imageName = $requestImage->getClientOriginalName();
            $espaco->fotoEsp=$imageName;
            $espaco->save();
            return redirect('/espaco')->with('msg', '  Não foi criado com sucesso!');
        }
    }

    /** sobre a informação dos espacos do botão sabermais na home por id */
    public function BuscarTodasInfoDoEspacoPorID(){
        $id=request('id');
/*Logica para consulta filtradas apartir do ID*/
        $servicos=Servico::where('idEsp',$id)
        ->join('fornecedores','servicos.idFor','=','fornecedores.idFor')
        ->get();;

            # vericar se o id corresponde a um salao no banco
        if (Espaco::where([['idEsp','=',$id]])->exists()) {
        
            $salao = Espaco::where([['idEsp','=',$id]])->get();
        }
        else {
            return redirect()->route('home')->with('Msgx','O salao que tentou acessar não se encontra disponivel tente outro');
        } 
        # vericar se o salao tem planos associados
        if (Plano::where([['idEsp','=',$id]])->exists()) {
        
            $planos = Plano::where([['idEsp','=',$id]])->get();;
        }
        else {
            $planos = Plano::where([['idEsp',1]])->get();
        }
         
        /*Logica de validação para mostrar fotos filtradas apartir do ID*/

        # vericar se o salao tem fotos associadas
        if ($fotos=Foto::where('idEsp','=',$id)->exists()) {
        
            $fotos=Foto::where('idEsp','=',$id)
                ->select('nomeImg')
                ->get();
         
        }
        else {
                $fotos=Foto::where('idEsp',1)
                    ->select('nomeImg')
                    ->get();
        }
                    if (isset($fotos)){
                        
                            return view('sobreespaco',['salao'=>$salao,'servicos'=>$servicos,'id'=>$id,'fotos'=>$fotos,'planos'=>$planos])->with('msg', 'Seja bem vindo!');
                    }
                    else {
                            return view('sobreespaco',['salao'=>$salao,'servicos'=>$servicos,'id'=>$id,'planos'=>$planos])->with('msg', 'Seja bem vindo!');
                    }
            
        }
}
