<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Hash;

use App\Http\Controllers\EspacoController;
use App\Models\Foto;
use App\Models\Espaco;
use App\Models\Cliente;
class FotoController extends Controller
{
    /*Abrir pagina com imagens do espaco*/
    public function MostrarGaleria(){
        if (session('user_info')) {
            $fotos=Foto::where('idEsp',session('fun_info')->idEsp)->get();
            
            $espacos=Espaco::all();
            return view('galerias',['fotos'=>$fotos,'espacos'=>$espacos]);
        }
        elseif(session('cliente_info')){
            $cliente=Cliente::join('espacos','clientes.nomeEsp','=','espacos.nomeEsp')
            ->select('*')
            ->get();

            $fotos=Foto::where('idEsp',$cliente[0]->idEsp)->get();
            return view('galerias',['fotos'=>$fotos,'cliente'=>$cliente]);
        }
    }   

       /*Abrir salvar novas fotos no banco de dados*/
       public function novasfotos(){
        if (session('user_info')) {
            $fotos=Foto::all();
            $espacos=Espaco::all();
            return view('espacos/fotosnovas',['fotos'=>$fotos,'espacos'=>$espacos]);
        }
        elseif(session('cliente_info')){
            return view('galerias',['fotos'=>$fotos]);
        }
        else {
            return redirect()->route('logout');
        }
    }   


    /*Abrir salvar novas fotos no banco de dados*/
    public function uploadfotos(Request $request){
        if (session('user_info')) {
            $foto=array();
            $saveFoto= new Foto;
            $espacos=Espaco::all();
            $fotos=Foto::all();

            

            if ($files=$request->file('foto')) {
                
                    
                foreach ($files as $file) {
                    
                    $image_name=$file;
                    $image_full_name=$image_name->getClientOriginalName();
                    $caminho=$file->move(public_path('/img/teste'),$image_full_name);
                    $foto[]=$image_full_name;
                    
                    $saveFoto->create([
                        'nomeImg'=>$image_full_name,
                        'idEsp'=>session('fun_info')->idEsp
                ]);
                    
                }
                   
            
            }
                
         
            return view('galerias',['fotos'=>$fotos,'espacos'=>$espacos]);
           
        }
        elseif(session('cliente_info')){
            return view('galerias',['fotos'=>$fotos]);
        }
        else {
            return redirect()->route('logout');
        }
    }   

    
}
