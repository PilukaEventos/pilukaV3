<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EventoController;

use App\Models\Espaco;
use App\Models\Evento;
use App\Models\Reserva;
use App\Models\Plano;
use App\Models\Comentario;
use App\Models\Servico;
use App\Models\User;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Toda funcao index é para Buscar todos os dados da base de dados relacionados ao controller
    
    public function index(){
        $clientes=Cliente::all();


        if(session('user_info')) {
            return view('clientes/cliente',['clientes'=>$clientes]);
        }
        else {
            return redirect(route('entrar'));
        }


        
    }

    public function BuscarClientesPorId(){
        
        $eventosPendentes=Reserva::all();
        $clientes=new Cliente;
        if (session('user_info')){
            return redirect(route('logout'));
        }
        elseif(session('cliente_info')){
            $agendamentos=Evento::all();
            return view('clientes/viewcliente',['agendamentos'=>$agendamentos,'eventosPendentes'=>$eventosPendentes]);

            
        }
        else {
            return redirect(route('logout'));
        }
        
    }
}