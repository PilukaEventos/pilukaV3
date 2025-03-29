<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FuncionarioController;

use App\Models\Espaco;
use App\Models\Evento;
use App\Models\Reserva;
use App\Models\Plano;
use App\Models\Funcionario;
use App\Models\Comentario;
use App\Models\Servico;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Foto;
class ClienteController extends Controller
{
    // Toda funcao index é para Buscar todos os dados da base de dados relacionados ao controller
    
    public function index(){
        $cliente_info=Cliente::all();
        $reservas=Reserva::all();
        $clientes=new Cliente;           
       
       
                
        if(session('user_info') || session('fun_info')){
        
        
        /*Todos os Dados dos eventos por Espaco*/
        $idFun=Funcionario::where('idFun',session('fun_info')->idFun)
        ->join('espacos','funcionarios.idEsp','=','espacos.idEsp')
        ->select('*')
        ->get();
        
            

        $eventos=Evento::where('idFun',$idFun[0]->idFun)
        ->join('clientes','eventos.idCli','=','clientes.idCli')
        ->join('espacos','eventos.idEsp','=','espacos.idEsp')
        ->join('planos','espacos.idEsp','=','planos.idEsp')
        ->select('*')
        ->get();
                /********end **********************/
        
                /*Consulta de dados na tabela reserva com o email do cliente com sessão iniciada*/
                $eventosPendentes=Reserva::where('idEsp',session('fun_info')->idEsp)
                ->select('*')
                ->get();

                $espacos=Espaco::where('idEsp',session('fun_info')->idEsp)->get();

                /*Consulta de dados na tabela reserva com o email do cliente com sessão iniciada*/
                $agendamentos=Evento::where('idEsp',session('fun_info')->idEsp)
                ->select('*')
                ->get();    
                /*Consulta de dados na tabela planos para delimitar o preco*/
                $planos=Plano::where('idEsp',session('fun_info')->idEsp)
                ->get();
                
                if(session('fun_info')){
                    return view('clientes/cliente',['agendamentos'=>$agendamentos,'espacos'=>$espacos,'planos'=>$planos,'clientes'=>$clientes,'reservas'=>$reservas,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes]);
                }else
                {
                    $eventos=Evento::all();
                        
                    return view('clientes/cliente',['agendamentos'=>$agendamentos,'espacos'=>$espacos,'planos'=>$planos,'clientes'=>$clientes,'reservas'=>$reservas,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes]);
                }
        }
        else {
            return redirect(route('entrar'));
        }


        
    }

    public function BuscarClientesPorId(){
        $reservas=Reserva::all();
        $eventos=Evento::all();
        $espacos=Espaco::all();
        $clientes=new Cliente;
        $editar_info_Reserva=request('editar');
        if (session('user_info')){
            return redirect(route('logout'));
        }
        elseif(session('cliente_info')){
            if (Foto::where('idCli',session('cliente_info')->idCli)->exists()) {
                strtolower($fotosDePerfil=Foto::where('idCli',session('cliente_info')->idCli)->get());
            }
            else {
                $fotosDePerfil="";
            }
            
                $cliente=session('cliente_info');
                /*Consulta de dados na tabela reserva com o email do cliente com sessão iniciada*/
                $eventosPendentes=Reserva::where('emailRes',session('cliente_info')->emailCli)
                ->join('espacos','reservas.idEsp','=','espacos.idEsp')
                ->select('*')
                ->get();


                /*Consulta de dados na tabela reserva com o email do cliente com sessão iniciada*/
                /*$agendamentos=Evento::where('idCli','=',session('cliente_info')->idCli)
                ->join('espacos','eventos.idEsp','=','espacos.idEsp')
                ->select('*')
                ->get();*/

                /*Todos os Dados dos eventos por Espaco*/
                $idCli=Cliente::where('nomeEsp',session('cliente_info')->nomeEsp)
                ->get();
                
                /*Todos os Dados dos eventos*/
                $agendamentos=Evento::where('idFun',$idCli[0]->idCli)
                ->join('reservas','eventos.idRes','=','reservas.idRes')
                ->join('clientes','eventos.idCli','=','clientes.idCli')
                ->join('espacos','eventos.idEsp','=','espacos.idEsp')
                ->join('planos','espacos.idEsp','=','planos.idEsp')
                ->select('*')
                ->get();
 
                
                /*Consulta de dados na tabela planos para delimitar o preco*/
                $planos=Plano::where('idEsp',session('cliente_info')->idEsp)
                ->get();
                if (!empty($editar_info_Reserva)) {
                    return view('clientes/viewcliente',['agendamentos'=>$agendamentos,'editar_info_Reserva'=>$editar_info_Reserva,'espacos'=>$espacos,'planos'=>$planos,'clientes'=>$clientes,'reservas'=>$reservas,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes]);
                }
                else {
                    return view('clientes/viewcliente',['fotosDePerfil'=>$fotosDePerfil,'agendamentos'=>$agendamentos,'planos'=>$planos,'cliente'=>$cliente,'reservas'=>$reservas,'eventos'=>$eventos,'eventosPendentes'=>$eventosPendentes]);    
                }
                
            
        }
        else {
            return redirect(route('logout'));
        }
        
    }

    
    /***************Editar perfil do cliente ************************/
    public function EditarClienteInfo(){
        $editar=request('editar');
        $novoCliente=new Cliente;
        if (Foto::where('idCli',session('cliente_info')->idCli)->exists()) {
            strtolower($fotosDePerfil=Foto::where('idCli',session('cliente_info')->idCli)->get());
        }
        else {
            $fotosDePerfil="";
        }
        
        
        if (session('user_info')){
            return redirect(route('logout'));
        }
        elseif(session('cliente_info')){
                
                /*Consulta de dados na tabela Cliente com o email do cliente com sessão iniciada*/
                $perfilCliente=Cliente::where('idCli',session('cliente_info')->idCli)->get();
                if (!empty($editar)) {
                    return view('clientes/perfil',['editar'=>$editar,'perfilCliente'=>$perfilCliente]);
                }
                else{
                    return view('clientes/perfil',['fotosDePerfil'=>$fotosDePerfil,'perfilCliente'=>$perfilCliente]);
                }
                
            
        }
        else {
            return redirect(route('logout'));
        }
        
    }
/********Update info das reservas na area de clientes  ********/
    public function updateinforeserva(Request $request){
        $dados=$request->all();
        $nomeRes=$request->nomeRes;
        $emailRes=$request->emailRes;
        $contactoRes=$request->contactoRes;
        $numConv=$request->numConv;
        $Servicos=$request->Servicos;
        $idRes=$request->editar;

        
        if (session('cliente_info')){
            $cliente=new Cliente;
            
           if(!empty($dados))
                {
                    Reserva::where('idRes',$idRes)->update(['nomeRes'=>$nomeRes,'emailRes'=>$emailRes,'contactoRes'=>$contactoRes,'numConv'=>$numConv,'Servicos'=>$Servicos]);
                    return redirect(route('areadeclientes'));
                }
                else
                {
                    return redirect(route('areadeclientes'))->with('Msgx','FALHA AO MOSTRAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');
                }
               
            }
            else
            {
                return redirect(route('logout'));
            }
    }

    /********Update info Perfil ********/

    public function update(Request $request){
        $this->validate($request,['emailCli'=>'required','telefoneCli'=>'required']);

        $nomeCli=$request->nomeCli;
        $emailCli=$request->emailCli;
        $telefoneCli=$request->telefoneCli;
        $idCli=session('cliente_info')->idCli;
        $fotoPeril=$request->fotoPerfilCli;
        if (session('cliente_info')){
            $cliente=new Cliente;
            $foto=new Foto;
                if (!empty($fotoPeril)) 
                {
                    Foto::where('idCli',$idCli)->update(['nomeImg'=>$fotoPeril]);
                    return redirect(route('perfil'))->with('Msgx','FALHA AO MOSTRAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');
                }
                elseif(!empty($nomeCli) || !empty($emailCli) || !empty($telefoneCli))
                {
                    Cliente::where('idCli',$idCli)->update(['nomeCli'=>$nomeCli,'emailCli'=>$emailCli,'telefoneCli'=>$telefoneCli]);
                    return redirect(route('admin'));
                }
                else
                {
                    return redirect(route('admin'))->with('Msgx','FALHA AO MOSTRAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');
                }
               
            }
            else
            {
                return redirect(route('logout'));
            }
    }

}