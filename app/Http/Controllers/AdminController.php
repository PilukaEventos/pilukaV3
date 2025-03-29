<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Session;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EventoController;

use App\Models\Espaco;
use App\Models\Evento;
use App\Models\Reserva;
use App\Models\Foto;
use App\Models\Plano;
use App\Models\Comentario;
use App\Models\Servico;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Funcionario;

class AdminController extends Controller
{
    public function index(){

        if(session('user_info')) {
            $comentarios=Comentario::all();
            $espacos = Espaco::all();
            $Servicos = Servico::all();
            $Usuarios = User::all();
            $planos = Plano::all();
            /*Todos os Dados dos eventos*/
            $eventos=Evento::join('clientes','eventos.idCli','=','clientes.idCli')
            ->join('espacos','eventos.idEsp','=','espacos.idEsp')
            ->join('planos','espacos.idEsp','=','planos.idEsp')
            ->select('*')
            ->get();


            /*Todos os Dados da Reserva*/
            $eventosPendentes=Reserva::all();
            $clientes=Cliente::all();
            $funcionarios=Funcionario::all();
            
            $emailUsu=session('user_info')[0]->email;

            /*Todos os Dados do funcionario*/
            $DadosDoUtilizador=Funcionario::where('emailFun',$emailUsu)
            ->join('espacos','funcionarios.idEsp','=','espacos.idEsp')
            ->select('*')
            ->get();

            $tipoUsu="Admin";
            

            

            
            return view('admin',['DadosDoUtilizador'=>$DadosDoUtilizador,'funcionarios'=>$funcionarios,'comentarios'=>$comentarios,'tipoUsu'=>$tipoUsu,'Usuarios'=>$Usuarios,'Servicos'=>$Servicos,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes],['espacos'=>$espacos,'planos'=>$planos]);    
        }
        else {
            return redirect(route('logout'));
        }
        
    }

    /*Folha de relatorio para imprimir */

    public function relatorioGeral(){
        
        if(session('user_info')) {
            $comentarios=Comentario::all();
            $espacos = Espaco::all();
            $Servicos = Servico::all();
            $Usuarios = User::all();
            $planos = Plano::all();
            /*Todos os Dados dos eventos*/
            $eventos=Evento::join('clientes','eventos.idCli','=','clientes.idCli')
            ->join('espacos','eventos.idEsp','=','espacos.idEsp')
            ->join('planos','espacos.idEsp','=','planos.idEsp')
            ->select('*')
            ->get();


            /*Todos os Dados da Reserva*/
            $eventosPendentes=Reserva::all();
            $clientes=Cliente::all();
            $funcionarios=Funcionario::all();
            
            $emailUsu=session('user_info')[0]->email;

            /*Todos os Dados do funcionario*/
            $DadosDoUtilizador=Funcionario::where('emailFun',$emailUsu)
            ->join('espacos','funcionarios.idEsp','=','espacos.idEsp')
            ->select('*')
            ->get();

            $tipoUsu="Admin";
            
            return view('admin',['DadosDoUtilizador'=>$DadosDoUtilizador,'funcionarios'=>$funcionarios,'comentarios'=>$comentarios,'tipoUsu'=>$tipoUsu,'Usuarios'=>$Usuarios,'Servicos'=>$Servicos,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes],['espacos'=>$espacos,'planos'=>$planos]);    
        }
        else{
                return redirect()->back()->with('Msgx','Something wents wrong, please try again later');            
        }

        
    }
   
}
