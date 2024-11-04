<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espaco;
use App\Models\Plano;

class HomeController extends Controller
{
    public function index(){
        $espacos = Espaco::all();
        $planos = Plano::all();
        return view('home',['espacos'=>$espacos],['espacos'=>$planos]);
    }
    public function mostrarDisponibilidade(){
        
        return view('espaco');
    }
}

