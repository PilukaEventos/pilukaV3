<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Session;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EventoController;

use App\Models\Espaco;
use App\Models\Evento;
use App\Models\Reserva;
use App\Models\Plano;
use App\Models\Comentario;
use App\Models\Servico;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $comentarios=Comentario::all();
        $espacos = Espaco::all();
        $Servicos = Servico::all();
        $Usuarios = User::all();
        $planos = Plano::all();
        $eventos=Evento::all();

        $eventosPendentes=count($eventos);
        if(session('user_info')) {
            return view('admin',['comentarios'=>$comentarios,'Usuarios'=>$Usuarios,'Servicos'=>$Servicos,'eventosPendentes'=>$eventosPendentes,'espacos'=>$espacos],['espacos'=>$planos]);    
        }
        else {
            return redirect(route('entrar'));
        }
        
    }

    /*Inicio de sessão */
   
}
