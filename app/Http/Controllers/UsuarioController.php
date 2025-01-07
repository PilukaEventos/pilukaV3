<?php

namespace App\Http\Controllers;
use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Espaco;
use App\Models\Plano;
use App\Models\User;
use App\Models\Servico;
use App\Models\Cliente;

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
        
        elseif (!empty($cliente)){
            Session::put('cliente_info',$cliente);
            return redirect(route('areadeclientes'));
        }
    /*}*/
    else{    
        $this->validate($request,[
                'email'=>'required',
                'password'=>'required'
        ]);

        if (User::where('email',$request->email)->exists()){
            $user=User::where('email',$request->email)->first();
            
            if (Hash::check($user->password,$request->password)) {
                Session::put('user_info',$user);
                return redirect(route('admin'));
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
        return redirect(route('home')); 
    }
    elseif (session('cliente_info')) {
        Session::forget('cliente_info');
        Session::forget('user_info');
        return redirect(route('home'));
    }
    else {
        return redirect(route('entrar'));    
    }
    
  }

  public function BuscarTodosUsuariosPorID(){
    $user=User::all();
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
        /*Apenas admin podem salvar novos usuarios */
        $PermissaoDoUsuario=session('user_info',$user->tipo);

        if($PermissaoDoUsuario['tipo']=='Admin')
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

        $user=new User;
        
        $name=$request->nome;
        $password=$request->senha;
        $confSenha=$request->confSenha;
        $email=$request->email;
        $tipoUsu=$request->tipoUsu;
        $passwd=Hash::make($request->$password);

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

}