<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\EspacoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PlanoController;


use App\Models\Espaco;
use App\Models\Plano;
use App\Models\Foto;
use App\Models\Evento;
use App\Models\Servico;
use App\Models\Fornecedore;
use App\Models\Categoria;

class ServicoController extends Controller
{
/*Buscar Informacoes dos servicos e fornecedores e mostrar na pagina de servico pelo ID*/
    public function BuscarTodasInfoDoServicos(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        
        if (session('user_info')) {
            
            $idEsp=session('fun_info')->idEsp;
            
            $Servicos=Servico::where('idEsp',$idEsp)->join('fornecedores','servicos.idFor','=','fornecedores.idFor')/*->join('espacos','espacos.idEsp','=','espacos.idEsp')*/->get();

            return view('servicos.servico',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);    
        }
        else {
            return redirect('/home',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }
        
        

    }

    /*Registar novas Informacoes dos servicos e fornecedores */
    public function novo_servico(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $Servicos =Servico::all();
        $categorias =Categoria::all();
        $idEsp=session('fun_info')->idEsp;
        $editar=request('id');

        
        $fornecedores=Servico::where('idEsp',$idEsp)->join('fornecedores','servicos.idFor','=','fornecedores.idFor')->select('nomeFor')->distinct()->get();

        if (session('user_info')) {
            if (!empty($editar)) {
                $Servicos =Servico::where('idServ',$editar)->join('fornecedores','servicos.idFor','=','fornecedores.idFor')->get();
                return view('servicos.novo',['espacos'=>$espacos,'planos'=>$planos,'editar'=>$editar,'fornecedores'=>$fornecedores,'categorias'=>$categorias,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);    
            }
            else {
                return view('servicos.novo',['espacos'=>$espacos,'planos'=>$planos,'fornecedores'=>$fornecedores,'categorias'=>$categorias,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);    
            }
            
        }
        else {
            return redirect('/logout',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }
        
        

    }
    public function store(Request $request){
        Session::forget('edit');
    if(session('user_info')){
        
            $servico=new Servico;
            $fornecedores=new Fornecedore;
            $nomeFor=$request->nomeFor;
            $email=$request->emailFor;
            $telefone=$request->telefoneFor;
            $telefone2=$request->alternativo;
            $nif=$request->nifFor;
            $sobreFornecedor=$request->sobreFor;
            $nomeServico=$request->nomeservico;
            $nomefornecedor=$request->nomefornecedor;
            $idCat=$request->categoriaservico;
            $decricaoServico=$request->descricaoservico;

            if ($nomefornecedor=='novo' || $nomefornecedor=='Novo') {
                $fornecedores->nomeFor=$nomeFor;
                $fornecedores->emailFor=$email;
                $fornecedores->telefoneFor=$telefone;
                $fornecedores->descricaoFor=$sobreFornecedor;
                $fornecedores->nif=$nif;
                $fornecedores->save();
            }
            if (Fornecedore::where('emailFor',$email)->exists()) {
                return redirect()->route('servicos')->with('Msgx','FALHA AO SALVAR DADOS NO BANCO, FORNECEDOR JA EXISTE');    
            }
            else
            {


                            if (Fornecedore::where('emailFor',$email)->exists()) {
                                $idFor=Fornecedore::where('emailFor',$email)->select('*')->get();
                                
                                $idEsp=session('fun_info')->idEsp;
                                $idNovoFor=$idFor[0]->idFor;
                                
                                $servico->nomeServ=$nomeServico;
                                $servico->telefoneServ=$telefone2;
                                $servico->idFor=$idNovoFor;
                                $servico->idEsp=$idEsp;
                                $servico->descricaoServ=$decricaoServico;
                                $servico->idCat=$idCat;
                                $servico->save();
                                return redirect(route('servicos'))->with('Msgx','SERVICO REGISTADO NA BASE DE DADOS COM SUCESSO!');    
                            }
                            else {
                                return redirect(route('servicos'))->with('Msgx','FALHA AO SALVAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');    
                            }

                    
                    
            
                    }
                }
                    else {
                                return redirect(route('logout'));
                            }
                
        }

            /*Registar novas Informacoes dos servicos e fornecedores */
    public function update(Request $request){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $Servicos =Servico::all();
        $categorias =Categoria::all();
        $idEsp=session('fun_info')->idEsp;
        $idServ=request('idServ');
        $idEsp=session('fun_info')->idEsp;
        $fotoCapa=$request->foto;
        $fornecedores=Servico::where('idEsp',$idEsp)->join('fornecedores','servicos.idFor','=','fornecedores.idFor')->select('nomeFor')->distinct()->get();

        if (session('user_info')) {
            if (!empty($fotoCapa) && $request->file('foto')->isValid()) 
                {
                    

                    $extention=$fotoCapa->extension();
                    $ImageName=$fotoCapa->getClientOriginalName();
                    $fotoCapa->move(public_path('/img/teste',$ImageName));
                    


                    /*Foto::where('idServ',$idServ)->update(['fotoCapa'=>$fotoCapa]);*/
                    
                    Servico::where('idServ',$idServ)
                    ->update(['nomeServ'=>request('nomeservico'),
                    'telefoneServ'=>request('alternativo'),
                    'idFor'=>request('idFor'),
                    'idEsp'=>$idEsp,
                    'descricaoServ'=>request('descricaoservico'),
                    'fotoCapa'=>$ImageName,
                    'idCat'=>request('categoriaservico'),
                    ]);
                    return redirect(route('servicos'))->with('Msgx','SERVICO ATUALIZADO COM SUCESSO!');    
                }
                elseif(!empty($idEsp) || !empty($idCat) || !empty($idServ) || !empty(request('nomeServ')) || !empty(request('alternativo')))
                {
                    Servico::where('idServ',$idServ)
                    ->update(['nomeServ'=>request('nomeservico'),
                    'telefoneServ'=>request('alternativo'),
                    'idFor'=>request('idFor'),
                    'idEsp'=>$idEsp,
                    'descricaoServ'=>request('descricaoservico'),
                    'idCat'=>request('categoriaservico'),
                    ]);
                    return redirect(route('servicos'))->with('Msgx','SERVICO ATUALIZADO COM SUCESSO!');    ;
                }
                else {
                    return redirect(route('servicos'))->with('Msgx','FALHA AO ATUALIZAR DADOS DO SERVICO!'); 
                }
          

        }
        else {
            return redirect('/logout',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }
        
        

    }
    /*Buscar Informacoes dos servicos e fornecedores e mostrar na pagina de servico pelo ID*/
    
    public function BuscarTodasInfoDoServicoPorID(){
        $salao = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        
        $idServ=request('id');

        /* buscar inform do servico por Id */
        $Servicos =Servico::where([['idServ','=',$idServ]])
        ->join('fornecedores','servicos.idFor','=','fornecedores.idFor')
        ->select('*')
        ->get();
        if(isset($Servicos)){
                return view('servico',['salao'=>$salao,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }

    }
    public function associar_me_espaco(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $Servicos =Servico::all();
        if (session('user_info')) {
            return view('servicos/associar_me',['espacos'=>$espacos,'planos'=>$planos,'Servicos'=>$Servicos,'fotos'=>$fotos,'agendamentos'=>$agendamentos]);
        }
        else{
            return redirect(route('home'));
        }

    }
    
    
}
