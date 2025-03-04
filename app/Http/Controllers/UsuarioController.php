<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HomeController;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Espaco;
use App\Models\Plano;
use App\Models\User;
use App\Models\Servico;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Fornecedore;

class UsuarioController extends Controller
{
        
//validação do Login para entrar na area de clietes
 
    public function login(Request $request){
        $user=new User;
        $cliente=new Cliente;
        
        /*$clientes=Cliente::where('telefoneCli',$request->password)->first();*/
        /*$clientes=Cliente::where('emailCli',$request->email)->get();*/
    if (session('user_info')){
        return redirect(route('logout'));
    }
    /*elseif($cliente->where('emailCli',$request->email)->get()){*/
        
        elseif ((Cliente::where('emailCli',$request->email)->exists()) && (Cliente::where('telefoneCli',$request->password)->exists())){
            $ClienteAtivo=Cliente::where('emailCli',$request->email)->first();
            
            session::put('cliente_info',$ClienteAtivo);
            
            return redirect(route('areadeclientes'));
        }

    /*}*/

        /*Verficacao de forncedor - inicio de sessao*/
        
            elseif ((Fornecedore::where('idFor',$request->email)->exists()) && Fornecedore::where('telefoneFor',$request->email)->exists()){
                $FornActivo=Fornecedore::where('emailFor',$request->email)->get();
    
                session::put('cliente_info',$ClienteAtivo);
                
                return redirect(route('areadeclientes'));
            }
            
        /*}*/
    else{    
        $this->validate($request,[
                'email'=>'required',
                'password'=>'required'
        ]);

        if (User::where('email',$request->email)->exists()){
            $user=User::where('email',$request->email)->get();
            $userpass=$user[0]->password;
            $formpass=md5($request->password);
            
            if($formpass==$userpass){
                
                if (Funcionario::where('emailFun',$user[0]->email)->exists()){
                    $funcionario=Funcionario::where('emailFun',$request->email)->first();
                    session::put('fun_info',$funcionario);
                    session::put('user_info',$user);
                    return redirect(route('admin'));
                }
                else{
                /***** se um admin não estiver associado a um espaco utilizá este acesso de funcionario */
                session::put('user_info',$user);
                $funcionario=Funcionario::where('emailFun','mrx@piluka.com')->first();
                session::put('fun_info',$funcionario);
                return redirect(route('admin'));
            }
            }
            else {
                return redirect()->back()->with('error','Email ou Password errada...');
            }
        
        }
        else{
            return redirect()->back()->with('error','O email que inseriu não esta registado você pode ser visto como um golpista pede uma nova palavra pass no administrador para não ser bloqueado!...');
        }    

}
  }

  public function logout(){
    if(session('user_info')) {
        Session::forget('user_info');
        Session::forget('fun_info');
        return redirect(route('entrar')); 
    }
    elseif (session('cliente_info')) {
        Session::forget('cliente_info');
        return redirect(route('entrar'));
    }
    else {
        Session::forget('email_reserva');
        return redirect(route('entrar'))->with('Msgx','Para acessar a area de clientes insira o seu email e a password que enviamos para sua conta de email');    
    }
    
  }

  public function BuscarTodosUsuariosPorID(){
    $idEsp=session('fun_info')->idEsp;
    if (session('user_info')[0]->tipo!="Admin") {
       $user=Funcionario::where('idEsp',$idEsp)->join('users','users.id','=','funcionarios.id')->get();
    }
    else{
        $user=User::all();
    }

    $espacos=Espaco::all();
    $planos = Plano::all();
    
        if (session('user_info')){
            return view('usuarios.usuario',['espacos'=>$espacos,'user'=>$user],['espacos'=>$planos]);
        }
        else {
            return redirect(route('entrar'));
        }
    
  }
  public function NovoUsuario(){
    $user=new User;
    if(session('user_info')){
        Session::forget('edit');
        /*Apenas admin podem salvar novos usuarios */
        $PermissaoDoUsuario=session()->get('user_info');

        if($PermissaoDoUsuario[0]->tipo=='Admin')
        {
            return view('usuarios/novo');
        }
        else
        {
            
            return redirect(route('admin'))->with('Msgx','Permissão negada para criar novo Utilizador contacta um Administrador');
        }
 
    }
    else{
        return redirect(route('entrar'));
    }
    
  }

  public function RegistarNovoUsuario(Request $request){
    Session::forget('edit');
    if(session('user_info')){
        
        $user=new User;
        $funcion=new Funcionario;
        $name=$request->nome;
        $password=$request->password;
        $confSenha=$request->password;
        $email=$request->email;
        $tipoUsu=$request->tipoUsu;
        $passwd=Hash::make($password);

        $user->name=$name;
        $user->email=$email;
        $user->password=$passwd;
        $user->tipo=$tipoUsu;
        
        
  
        
            /*para evitar duplicidade de dados */
            $Usuario=User::where('email',$email)->get();
            
            if(isset($Usuario[0]->name)){
                
                return redirect(route('usuario_novo'))->with('Msgx','Estes dados do usuario ja existem no banco');
            }
            else
            {
                if($password==$confSenha){
                    $user->save();
                    return redirect(route('usuario_novo'));
                }
                else
                {
                    return redirect(route('usuario_novo'))->with('Msgx','FALHA AO SALVAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');
                }
            }
        }
        else {
            return redirect(route('logout'));
        }
 
    }
/*Funcao para editar dados do utilizador */

    public function EditarDadosUsuario(Request $request){
        
        if (session('user_info')){

            /*para evitar duplicidade de dados */
                $Usuario=User::where('id',$request->id)->get();
                if(!empty($Usuario[0]->name)){
                    $idUsu=$Usuario[0]->id;
                    $nomeUsu=$Usuario[0]->name;
                    $emailUsu=$Usuario[0]->email;
                    $passwordUsu=$Usuario[0]->password;
                    $tipoUsu=$Usuario[0]->tipo;
                    Session::put('edit',$request->id);
                    return view('usuarios/novo',['idUsu'=>$idUsu,'nomeUsu'=>$nomeUsu,'emailUsu'=>$emailUsu,'passwordUsu'=>$passwordUsu,'tipoUsu'=>$tipoUsu]);
                }
                else
                {
                        session::forget('edit');
                        return redirect(route('usuario_novo'))->with('Msgx','FALHA AO MOSTRAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');
                    
                }
            }
            else{
                return redirect(route('logout'));
            }
 
    }
    
    public function update(Request $request){
        $idUsu=request('id');
        $senha=$request->password;
        $senhaCiptografada=md5($senha);

        if (session('user_info')){
            $user=new User;
            
                User::where('id',$idUsu)->update(['name'=>$request->name,'email'=>$request->email,'password'=>$senhaCiptografada,'tipo'=>$request->tipo]);
                return redirect(route('usuarios'))->with('Msgx','FALHA AO MOSTRAR DADOS NO BANCO, OS CAMPOS SENHA E CONFIRMAR SENHA NÃO FORAM ESCRITO CORRETAMENTE');
            }
            else{
                return redirect(route('logout'));
            }
    }

}