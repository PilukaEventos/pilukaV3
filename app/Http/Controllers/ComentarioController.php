<?php

namespace App\Http\Controllers;
use App\Http\Controllers\homeController;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function index(){
        
        return redirect('home');
    }
}
