<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ClienteController;

use App\Models\Espaco;
use App\Models\Reserva;
use App\Models\Evento;
use App\Models\Cliente;
class ReservaController extends Controller
{
    //efetuar a reserva conforme os dados da tabela reserva

    public function store(Request $request){


        /*Criacao das variaveis */
        $reserva=Reserva::all();
        $espacos=Espaco::all();

        $dataAtual=Carbon::today()->format('Y-m-d');
        
        $dataForm=$request->dataEve;
        $nomeSalaoForm=$request->nomeEsp;
        $dataVisita=$request->dataVi; 
        
        $DataDeHoje=strtotime($dataAtual);
        $DataDoFormulario=strtotime($dataForm);
        
        /*query para ver se a data existe em algum agendamento */
        $buscaDadosReserva=Reserva::where([
            ['dataEvento','like','%'.$dataForm.'%']])
            ->join('espacos','reservas.idEsp','=','espacos.idEsp')
            ->select('*')
            ->distinct()
            ->get();

        /*query para ver os dados do salao*/
        $buscaDadosSalao=Espaco::where([
            ['nomeEsp','like','%'.$request->nomeEsp.'%']])
            ->join('eventos','eventos.idEsp','=','espacos.idEsp')
            ->join('reservas','reservas.idEsp','=','espacos.idEsp')
            ->select('*')
            ->distinct()
            ->get();
                            

        /*condição para verificar se as datas já existem na BD*/
            if (!empty($buscaDadosReserva[0])){
                $dataPendente=$buscaDadosReserva[0]->dataEvento;
                $SalaoBD=$buscaDadosReserva[0]->nomeEsp;
            }
            else{
                $dataPendente=$reserva[0]->dataEvento;
                $SalaoBD=$espacos[0]->nomeEsp;
            }   
        /*condição para verificar se as datas do form e da BD são iguais*/

                if ($dataPendente==$dataForm && $SalaoBD==$nomeSalaoForm){
                        return view('home',['espacos'=>$espacos,'SalaoBD'=>$SalaoBD,'nomeSalaoForm'=>$nomeSalaoForm,'dataPendente'=>$dataPendente],['agendamentos'=>$agendamentos,'dataPendente'=>$dataPendente,'dataForm'=>$dataForm,'fotos'=>$fotos],['planos'=>$planos]); 
                }
                elseif(($DataDoFormulario)<=($DataDeHoje)+2600000){
                        return redirect()->back()->with('Msgx','Detetamos algum problema na definição entre as datas de visita e a data do evento'); 
                }
                else {

                    if (!empty($buscaDadosSalao[0])) {
                        $idEsp=$buscaDadosSalao[0]->idEsp;
                        $dataAgendada=$buscaDadosSalao[0]->dataEvento;
                        

                        if ($dataAgendada==$dataForm && $idEsp==$idEsp) {
                            return redirect()->back()->with('Msgx','A Data configurada já tem evento agendado procure outra dada ou salao'); 
                        }
                        elseif (Reserva::where('contactoRes',$request->telefoneCli)->exists()){
                            return redirect()->back()->with('Msgx','Já tem reserva pendente. consulte os dados dos seus eventos no seu email ou inicie sessão na area de clientes com usando seu email e contacto de telefone para senha');   
                        }                   
                             
                        else{ 
                                /***** Salvar dados na tabela reserva ******/
                                    $espacos= Espaco::all();
                                    $ConfirmarReserva = new Reserva;
                                    $nomeEsp=$buscaDadosSalao[0]->nomeEsp;

                                  $ConfirmarReserva->nomeRes=$request->nomeCli;
                                    $ConfirmarReserva->contactoRes=$request->telefoneCli;
                                    $ConfirmarReserva->emailRes=$request->emailCli;
                                    $ConfirmarReserva->dataEvento=$request->dataEve;
                                    $ConfirmarReserva->reserva=$request->nomeCli;
                                    $ConfirmarReserva->tipoEve = $request->tipoEve;
                                    $ConfirmarReserva->numConv = $request->numConv;
                                    $ConfirmarReserva->servicos = $request->servicos;
                                    $ConfirmarReserva->idEsp=$idEsp;
                                    $ConfirmarReserva->dataVisita = $request->dataVi;
                                    $ConfirmarReserva->save();
                                
                                    /***** Salvar dados na tabela cliente ******/
                                    /*$NovoCliente= new Cliente;
                                    $NovoCliente->telefoneCli=$request->telefoneCli;
                                    $NovoCliente->nomeCli=$request->nomeCli;
                                    $NovoCliente->emailCli = $request->emailCli;
                                    $NovoCliente->nomeEsp = $nomeEsp;
                                    $NovoCliente->numConv=$request->numConv;
                                    $NovoCliente->dataEvento = $request->dataEve;
                                    $NovoCliente->nomeEve = $request->tipoEve;                                    
                                    $NovoCliente->save();
                                    */
                                    if (session('cliente_info')){
                                        return redirect(route('areadeclientes'))->with('Msgx','Reserva pendente. Inicia sessão para consultar os dados do seu evento ou consulte seu email');       
                                    }
                                    else{
                                        Session::put('cliente_info',$reserva);
                                        return redirect('/areadeclientes')->with('Msgx','Reserva pendente. Inicia sessão para consultar os dados do seu evento ou consulte seu email');   
                                    }
                        }
                            
                        }
                       
                    else{
                        return redirect()->back()->with('Msgx','Detetamos algum problema na definição entre as datas de visita e a data do evento'); 
                    }
                        
                }

    }
    										

}
