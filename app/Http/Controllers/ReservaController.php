<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ClienteController;

use App\Mail\message;
use App\Models\Espaco;
use App\Models\Reserva;
use App\Models\Evento;
use App\Models\Cliente;
class ReservaController extends Controller
{
    //efetuar a reserva conforme os dados da tabela reserva

    public function store(Request $request){
            
        /*$dados=$request->validate([
                'nomeCli'=>'required',
                'telefoneCli'=>'required',
                'emailCli'=>'required',
                'dataEve'=>'required',
                'nomedoespaco'=>'required',
                'tipoEve'=>'required',
                'numConv'=>'required',
                'servicos[]'=>'required',
                'dataVi'=>'required'
            ]);*/
            
            /*Criacao das variaveis */
            $reserva=Reserva::all();
            $espacos=Espaco::all();

            $dataAtual=Carbon::today()->format('Y-m-d');
            
            $emailcli=$request->emailCli;
            $dataForm=$request->dataEve;
            $nomeSalaoForm=$request->nomedoespaco;
            $dataVisita=$request->dataVi; 
            
            $DataDeHoje=strtotime($dataAtual);
            $DataDoFormulario=strtotime($dataForm);
            
            /*query para ver os dados do salao*/
            $buscaDadosSalao=Espaco::where('nomeEsp','like','%'.$request->nomedoespaco.'%')->get();
                                  
            /*query para ver se a data existe em algum agendamento */
            $buscaDadosReserva=Reserva::where([
                ['dataEvento','like','%'.$dataForm.'%']])
                ->join('espacos','reservas.idEsp','=','espacos.idEsp')
                ->select('*')
                ->distinct()
                ->get();


            /* Contacto de reserva Reservas  */
            $mesmoContacto=Reserva::where('contactoRes',$request->telefoneCli)->get();
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

                    if (empty($buscaDadosSalao[0])){
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
                                return redirect()->back()->with('Msgx','A Data configurada já tem evento agendado procure outra data ou salao'); 
                            }
                            elseif (count($mesmoContacto)>3){
                                return redirect()->back()->with('Msgx','Já tem muitas reservas pendente. consulte os dados dos seus eventos no seu email ou inicie sessão na area de clientes com usando seu email e contacto de telefone para senha');   
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
                                        
                                    
                                        /***** Salvar dados na tabela cliente ******/
                                        $NovoCliente= new Cliente;
                                        $NovoCliente->telefoneCli=$request->telefoneCli;
                                        $NovoCliente->nomeCli=$request->nomeCli;
                                        $NovoCliente->emailCli = $request->emailCli;
                                        $NovoCliente->nomeEsp = $nomeEsp;
                                        $NovoCliente->numConv=$request->numConv;
                                        $NovoCliente->dataEvento = $request->dataEve;
                                        $NovoCliente->nomeEve = $request->tipoEve;                                    
                                        $ConfirmarReserva->save();
                                        $NovoCliente->save();
                                        Session::put('email_reserva',$mesmoContacto);

                                        Mail::to(['pilukaeventos@gmail.com',$emailcli])->send(new message($request->all()));
                                        

                                        if (session('cliente_info')){
  
                                         return redirect(route('logout'))->with('Msgx','Reserva pendente. Inicia sessão para consultar os dados do seu evento ou consulte seu email');       
                                        }
                                        else{
                                              
                                            return redirect('logout')->with('Msgx','Reserva pendente. Inicia sessão para consultar os dados do seu evento usando o seu email e o numero de telefone como senha');   
                                        }
                            }
                                
                            }
                        
                        else{
                                return redirect()->back()->with('Msgx','Detetamos algum problema na definição entre as datas de visita e a data do evento ultima msgx'); 
                        }
                            
                    }

    }

   
    										

}
