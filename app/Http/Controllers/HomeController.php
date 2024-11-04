<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espaco;
use App\Models\Plano;
use App\Models\Evento;
use App\Models\Foto;

class HomeController extends Controller
{
    public function index(){
        
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        
        
        
        /* Validação da disponibilidade */
        $dataForm=request('date');
        $nomeSalaoForm=request('nomeSalao');


        if (isset($agendamentos) && isset($dataForm)) {
            /*consulta no banco de dados retorna para variavel $busca */

            $busca=Evento::where([
                ['dataEvento','like','%'.$dataForm.'%']
            ])->get();

            /*foreach para extair dodos da coluna dataEvento*/

            foreach ($busca as $Dates) {
                $dataBD=$Dates->dataEvento;
                $SalaoBD=$Dates->nomeSalao;
            }
            /*condição para verificar se dados que vêm da DB sao iguais aos que vieram do form*/

            if (isset($dataBD)){

                    /*condição para verificar se a data do form e da BD são iguais*/

                    if ($dataBD==$dataForm && $SalaoBD==$nomeSalaoForm){
                            return view('home',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'dataBD'=>$dataBD,'fotos'=>$fotos],['planos'=>$planos]); 
                    }
                    else {
                    
                        return view('home',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);  
                    } 
            }
            else
                {
                    return view('home',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);  
                }
            

        }
        else
                {
                    return view('home',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);  
                }            
        /* Validação da disponibilidade termina aqui */    
    
    
    }
        
            
        
    
    
}

