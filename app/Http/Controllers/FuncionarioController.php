<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EventoController;

use App\Models\Espaco;
use App\Models\Evento;
use App\Models\Foto;
use App\Models\User;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    //
    public function index(){
        $espacos=Espaco::all();
        $funcionarios=Funcionario::all();
       
        if(session('user_info') || session('fun_info')) {
            
            return view('funcionarios.funcionario',['funcionarios'=>$funcionarios,'espacos'=>$espacos]);
            
        }
        else {
            return redirect(route('entrar'));
        }

        
    }
    public function NovoFuncionario(){
        $espacos=Espaco::all();
        $funcionarios=new Funcionario; 
        
        /****************Form novo Funcionario comeca aqui ************/
        
        if (session('fun_info') || session('user_info')) {
            return view('funcionarios/novo',['funcionarios'=>$funcionarios,'espacos'=>$espacos]);
        }
        else {
            return redirect()->back();
        }
        
    }
        
        public function buscarFuncionariosPorId(){
            $espacos=Espaco::all();
            $funcionarios=new Funcionario; 
        $editar=request('editar');
        
        if(session('user_info') || session('fun_info')){
            
            /*Apenas admin podem salvar novos usuarios */
            $PermissaoDoUsuario=session()->get('user_info');
    
            if($PermissaoDoUsuario[0]->tipo=='Admin' || $PermissaoDoUsuario[0]->tipo=='Gerente')
            {
                   
                if (Foto::where('idFun',$editar)->exists()) {
                    strtolower($fotosDePerfil=Foto::where('idFun',session('fun_info')->idFun)->first());
                }
                else {
                    $fotosDePerfil="";
                }
                if(!empty($editar)){
                
                    /*Consulta de dados na tabela Cliente com o email do cliente com sessão iniciada*/
                    if (Funcionario::where('idFun',$editar)->exists()) {
                        $perfilFuncionario=Funcionario::where('idFun',$editar)
                        ->join('users','users.id','=','funcionarios.id')
                        ->get();
                    
                        return view('funcionarios/novo',['funcionarios'=>$funcionarios,'espacos'=>$espacos],['fotosDePerfil'=>$fotosDePerfil,'perfilFuncionario'=>$perfilFuncionario,'editar'=>$editar]);
                    }
                    else{
                        $perfilFuncionario="";
                        return view('funcionarios/funcionario',['funcionarios'=>$funcionarios,'espacos'=>$espacos],['fotosDePerfil'=>$fotosDePerfil,'perfilFuncionario'=>$perfilFuncionario,'editar'=>$editar]);
                    }
                }
                else{
                    return view('funcionarios/funcionario',['funcionarios'=>$funcionarios,'espacos'=>$espacos]);
                }
     
        }
        else{
            return redirect(route('logout'));
        }
        
      }
    }
      public function RegistarFuncionario(Request $request){
        
        if(session('user_info')){
            
            $user=new User;
            $funcion=new Funcionario;
            $name=$request->nome;
            $password=$request->password;
            $confSenha=$request->password;
            $email=$request->email;
            $tipoUsu=$request->tipoUsu;
            $passwd=Hash::make($password);


            $editar=$request->editar;
            $user->name=$name;
            $user->email=$email;
            $user->password=$passwd;
            $user->tipo=$tipoUsu;
            
            /*para evitar duplicidade de dados */
                $Usuario=User::where('email',$email)->get();
    
                $funcionarios=Funcionario::where('emailFun',$email)->get();
                
                if(isset($Usuario[0]->name)){
                    return redirect(route('usuario_novo'))->with('Msgx','Estes dados do usuario ja existem no banco');
                }
                
                else
                {   
                    if($password==$confSenha && !empty($password)){
                        $user->save();
                    
                    $idUsuario=User::where('email',$email)->get();
    
                    if(empty($funcionarios[0]->emailFun)){
                      
                            $funcion->nomeFun=$name;
                            $funcion->telefoneFun=$request->telefone;
                            $funcion->emailFun=$email;
                            $funcion->dataNascFun=$request->datanasc;
                            $funcion->moradaFun=$request->morada;
                            $funcion->dataIngreFun=Carbon::today()->format('Y-m-d');;
                            $funcion->idEsp=$request->idEsp;
                            $funcion->id=$idUsuario[0]->id;
                            $funcion->save();
                            return redirect(route('admin'))->with('Msgx','Dados do novo utilizador funcionario Salvo com sucesso');
                    }  
                    
    
                    else
                    {
                        return redirect(route('funcionarios'))->with('Msgx','FALHA AO SALVAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');
                    }
                }
                }
                
            }
            else {
                return redirect(route('logout'));
            }
     
        }  
        public function updateDadosFuncionario(Request $request){
        
            if(session('fun_info')){
                
                $user=new User;
                $funcion=new Funcionario;
                $name=$request->name;
                $telefone=$request->telefone;
                $password=$request->password;
                $confSenha=$request->password;
                $email=$request->emailFun;
                $tipoUsu=$request->tipo;
                $passwd=Hash::make($password);
                
    
                $editar=$request->editar;
     
                $idUsuario=Funcionario::where('idFun',$editar)->join('users','funcionarios.id','=','users.id')->get();
                

                    if(isset($Usuario[0]->name)){
                        return redirect(route('usuario_novo'))->with('Msgx','Estes dados do usuario ja existem no banco');
                    }
                    
                    else
                    {   
                        if($password==$confSenha){
                        
                        if (empty($password)) {
                            $passwd=User::where('id',$idUsuario[0]->id)->select('password')->get();
                            User::where('id',$idUsuario[0]->id)->update(['name'=>$name,'email'=>$email,'tipo'=>$tipoUsu,'password'=>$passwd[0]->password]);
                        }
                        else {
                            User::where('id',$idUsuario)->update(['name'=>$name,'email'=>$email,'tipo'=>$tipoUsu,'password'=>$password]);
                        }
                            
                      
                            Funcionario::where('idFun',$editar)->update(['nomeFun'=>$request->name,'telefoneFun'=>$request->telefone,'emailFun'=>$request->emailFun]);
                                
                            return redirect(route('funcionarios'))->with('Msgx','Dados do novo utilizador funcionario Salvo com sucesso');
                        
                            /*return redirect(route('funcionarios'))->with('Msgx','FALHA AO SALVAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');*/
                        }
                        else{
                            return redirect()->back()->with('Msgx','Tentativa de senha errada! enviamos uma mensagem ao um administrador para informar que você está com problemas');;
                        }
                    
                    }
                    
                }
                else {
                    return redirect(route('logout'));
                }
         
            }  
        

    public function update(Request $request){
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
