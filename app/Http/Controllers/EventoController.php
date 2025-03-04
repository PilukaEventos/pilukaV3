<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Session;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ClienteController;

use App\Models\Evento;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Plano;
use App\Models\Funcionario;
use App\Models\Espaco;

class EventoController extends Controller
{
    //EVENTOS AGENDADOS

    public function index(){
        $eventos=Evento::all();
        $reservas=Reserva::all();
        $planos=Plano::all();
        $clientes=Cliente::all();

        if(session('user_info') || session('fun_info')){
        
        
            /*Todos os Dados dos eventos por Espaco*/
            $idFun=Funcionario::where('idFun',session('fun_info')->idFun)
            ->join('espacos','funcionarios.idEsp','=','espacos.idEsp')
            ->select('*')
            ->get();
            
                
    
            $eventos=Evento::where('idFun',$idFun[0]->idFun)
            ->join('clientes','eventos.idCli','=','clientes.idCli')
            ->join('espacos','eventos.idEsp','=','espacos.idEsp')
            ->join('planos','espacos.idEsp','=','planos.idEsp')
            ->select('*')
            ->get();
                    /********end **********************/
            
                    /*Consulta de dados na tabela reserva com o email do cliente com sessão iniciada*/
                    $eventosPendentes=Reserva::where('idEsp',session('fun_info')->idEsp)
                    ->select('*')
                    ->get();
    
                    $espacos=Espaco::where('idEsp',session('fun_info')->idEsp)->get();
    
                    /*Consulta de dados na tabela reserva com o email do cliente com sessão iniciada*/
                    $agendamentos=Evento::where('idEsp',session('fun_info')->idEsp)
                    ->select('*')
                    ->get();    
                    /*Consulta de dados na tabela planos para delimitar o preco*/
                    $planos=Plano::where('idEsp',session('fun_info')->idEsp)
                    ->get();
                    
                    if(session('fun_info')){
                        return view('agendar',['agendamentos'=>$agendamentos,'espacos'=>$espacos,'planos'=>$planos,'clientes'=>$clientes,'reservas'=>$reservas,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes]);
                    }else
                    {
                        $eventos=Evento::all();
                            
                        return view('agendar',['agendamentos'=>$agendamentos,'espacos'=>$espacos,'planos'=>$planos,'clientes'=>$clientes,'reservas'=>$reservas,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes]);
                    }
            }
            else {
                return redirect(route('entrar'));
            }
    
    
            
        }
    
    
}
