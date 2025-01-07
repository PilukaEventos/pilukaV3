<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\EspacoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PlanoController;


use App\Models\Espaco;
use App\Models\Plano;
use App\Models\Foto;
use App\Models\Evento;
use App\Models\Servico;

class ServicoController extends Controller
{
/*Buscar Informacoes dos servicos e fornecedores e mostrar na pagina de servico pelo ID*/
    public function BuscarTodasInfoDoServicos(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $Servicos =Servico::all();
        if (session('user_info')) {
            return view('servicos.servico',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);    
        }
        else {
            return redirect('/home',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }
        
        

    }
    
    /*Buscar Informacoes dos servicos e fornecedores e mostrar na pagina de servico pelo ID*/
    
    public function BuscarTodasInfoDoServicoPorID(){
        $salao = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $Servicos =Servico::all();

        $idServ=request('id');

        /* buscar inform do servico por Id */
        $Servicos =Servico::where([['idServ','=',$idServ]])
        ->join('fornecedores','servicos.idFor','=','fornecedores.idFor')
        ->select('*')
        ->get();
        if(isset($Servicos)){
                return view('servico',['salao'=>$salao,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }

    }
    public function associar_me_espaco(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $Servicos =Servico::all();
        if (session('user_info')) {
            return view('servicos/associar_me',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }
        else{
            return redirect(route('home'));
        }

    }
    
    
}
