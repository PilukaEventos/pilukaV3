<?php

namespace App\Http\Controllers;
use App\Http\Controllers\EspacoController;

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
        

        if (isset($dataForm) && isset($nomeSalaoForm)) {


            /*foreach para extair dodos da coluna dataEvento*/



            /*condição para verificar se dados que vêm da DB sao iguais aos que vieram do form*/

            if ($agendamentos){
            /*consulta no banco de dados retorna para variavel $busca */

            $buscaData=Evento::where([
                ['dataEvento','like','%'.$dataForm.'%']])
                ->join('espacos','eventos.idEsp','=','espacos.idEsp')
                ->select('*')
                ->distinct()
                ->get();

                if (!empty($buscaData[0])) {
                    $dataBD=$buscaData[0]->dataEvento;
                    $SalaoBD=$buscaData[0]->nomeEsp;
                }
                else{
                    $dataBD=$espacos[0]->dataEvento;
                    $SalaoBD=$agendamentos[0]->nomeEsp;
                }   
                /*condição para verificar se as datas do form e da BD são iguais*/
                    
                    if ($dataBD==$dataForm && $SalaoBD==$nomeSalaoForm){
                            return view('home',['espacos'=>$espacos,'SalaoBD'=>$SalaoBD,'nomeSalaoForm'=>$nomeSalaoForm,'dataBD'=>$dataBD],['agendamentos'=>$agendamentos,'dataBD'=>$dataBD,'dataForm'=>$dataForm,'fotos'=>$fotos],['planos'=>$planos]); 
                    }
                    
                    else {
                        $idEsp=Espaco::where([[
                            'nomeEsp','=',$nomeSalaoForm
                        ]])
                        ->select('idEsp')
                        ->get();
                        $IDESP=$idEsp[0]->idEsp;
                        
                        return redirect('/salao'.'?'.'id='.$IDESP.'/#reserva')->with(['dataForm',$dataForm]);  
                    } 
            }
            else
                {
                    return view('home',['espacos'=>$espacos],['fotos'=>$fotos],['buscaData'=>$buscaData,'planos'=>$planos]);  
                }
            

        }
        else
                {
                    return view('home',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);  
                }            
        /* Validação da disponibilidade termina aqui */    
    
    
    }
    public function sobre(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        
        return view('sobre',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);
    }
        
            
        
    
    
}

