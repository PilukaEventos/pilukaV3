<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EspacoController;
use App\Models\Espaco;
use App\Models\Reserva;
class ReservaController extends Controller
{
    //efetuar a reserva conforme os dados da tabela reserva

    public function store(Request $request){
        $espacos= Espaco::all();
        $ConfirmarReserva = new Reserva;
        $ConfirmarReserva->nomeRes=$request->nomeCli;
        $ConfirmarReserva->contactoRes=$request->telefoneCli;
        $ConfirmarReserva->emailRes=$request->emailCli;
        $ConfirmarReserva->dataEvento=$request->dataEve;
        $ConfirmarReserva->reserva=$request->nomeCli;
        $ConfirmarReserva->tipoEve = $request->tipoEve;
        $ConfirmarReserva->numConv = $request->numConv;
        $ConfirmarReserva->servicos = $request->servicos;
        $ConfirmarReserva->dataVisita = $request->dataVi;
        $ConfirmarReserva->save();

        return redirect('/home')->with('Msgx','Reserva pendente. consulte os dados no seu email');
    }
    										

}
