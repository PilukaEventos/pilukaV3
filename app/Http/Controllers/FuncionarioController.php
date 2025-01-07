<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EventoController;

use App\Models\Espaco;
use App\Models\Evento;

use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    //
    public function index(){
        $funcionarios=Funcionario::all();
        if(session('user_info')) {
            return view('funcionarios/funcionario',['funcionarios'=>$funcionarios]);
        }
        else {
            return redirect(route('entrar'));
        }

        
    }

}
