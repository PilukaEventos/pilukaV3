<?php

namespace App\Http\Controllers;
use App\Http\Controllers\homeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\message;


use App\Models\Comentario;
use App\Models\Espaco;
use App\Models\Plano;
use App\Models\Foto;
use App\Models\Evento;




class ComentarioController extends Controller
{
    //
    /*private $clientEmail;

    public function __construct(){
        $this->clientEmail=new Comentario;
        $this->clientEmail->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->clientEmail->setClietSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->clientEmail->setRedirectUrl(env('GOOGLE_REDIRECT_URL'));
        $this->clientEmail->addScope(Gmail::GMAIL_SEND);
    }*/
    public function index(){
        
        return redirect('home');
    }

    /******Nova mensagem email e comentario ************/

    public function RegistarComentario(Request $request){


    
        return view('sobre',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);
    }

    /****** Nova mensagem via email ************/
    public function send(){
        $data=request()->validate([
            'nomecompleto'=>'required|min:3',
            'telefonemsg'=>'required',
            'emailmsg'=>'required|email',
            'mensagem'=>'required'
        ]);

            
            Mail::to(['pilukaeventos@gmail.com'])->send(new message($data));
        
        return redirect()->back()->with('email_opnion_sent','enviado com sucesso');
    }
}
