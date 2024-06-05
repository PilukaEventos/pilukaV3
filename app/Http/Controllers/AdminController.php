<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espaco;
use App\Models\Plano;

class AdminController extends Controller
{
    public function index(){
        $espacos = Espaco::all();
        $planos = Plano::all();
        return view('admin',['espacos'=>$espacos],['espacos'=>$planos]);
    }
}
