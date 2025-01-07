<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facedes\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ServicoController;

use App\Models\Comentario;
use App\Models\Espaco;
use App\Models\Plano;
use App\Models\Evento;
use App\Models\Foto;
use App\Models\Servico;

class HomeController extends Controller
{
    public function index(){
        $dataAtual=Carbon::today()->format('Y-m-d');
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $Servicos=Servico::all();
        $Comentarios=Comentario::all();

        /* Validação da disponibilidade */
        $dataForm=request('date');
        $nomeSalaoForm=request('nomeSalao');
        

        if (isset($dataForm) && isset($nomeSalaoForm)) {


            /*foreach para extair dodos da coluna dataEvento*/



            /*condição para verificar se dados que vêm da DB sao iguais aos que vieram do form*/

            if ($agendamentos){
            /*consulta no banco de dados retorna data agendada em eventos e salva todos os dados na variavel $buscaData */
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
                    $dataBD=$agendamentos[0]->dataEvento;
                    $SalaoBD=$espacos[0]->nomeEsp;
                }   
                /*condição para verificar se as datas do form e da BD são iguais*/
                    $DataDeHoje=strtotime($dataAtual);
                    $DataDoFormulario=strtotime($dataForm);

                    if ($dataBD==$dataForm && $SalaoBD==$nomeSalaoForm){
                            return view('home',['espacos'=>$espacos,'SalaoBD'=>$SalaoBD,'nomeSalaoForm'=>$nomeSalaoForm,'dataBD'=>$dataBD],['agendamentos'=>$agendamentos,'dataBD'=>$dataBD,'dataForm'=>$dataForm,'fotos'=>$fotos],['planos'=>$planos]); 
                    }
                    
                    else {
                        if(($DataDoFormulario)<=($DataDeHoje)+2600000){
                            $Msgxs="A Data escolhida já passou, ou está muito proxima a data actual segundo o nosso calendario. Tente pelo menos 30 dias de antecendência.";
                            return view('home',['espacos'=>$espacos,'Msgxs'=>$Msgxs,'SalaoBD'=>$SalaoBD,'nomeSalaoForm'=>$nomeSalaoForm,'dataBD'=>$dataBD],['agendamentos'=>$agendamentos,'dataBD'=>$dataBD,'dataForm'=>$dataForm,'fotos'=>$fotos],['planos'=>$planos]);
                        }else{
                            $idEsp=Espaco::where([[
                                'nomeEsp','=',$nomeSalaoForm
                            ]])
                            ->select('idEsp')
                            ->get();
                            $IDESP=$idEsp[0]->idEsp;
                            
                            return redirect('/salao'.'?'.'id='.$IDESP.'/#reserva');
                        }
                    } 
            }
            else
                {

                    return view('home',['espacos'=>$espacos,'Servicos'=>$Servicos],['fotos'=>$fotos],['buscaData'=>$buscaData,'planos'=>$planos]);  
                }
            

        }
        else
                {

                    return view('home',['Servicos'=>$Servicos,'Comentarios'=>$Comentarios,'espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);  
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
        
    public function entrar(){
        return view('layouts/entrar');
    }     
        
    
    
}

