@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo - Salões')
@section('content')


	<!-- MAIN -->
	<main>
		<div class="head-title">
			<div class="left">
				<h1>Painel Administrativo</h1>
				<ul class="breadcrumb">
					<li>
						<a href="#">Painel Administrativo</a>
					</li>
					<li><i class='bx bx-chevron-right' ></i></li>
					<li>
						<a class="active" href="#">Utilizadores</a>
					</li>
				</ul>
			</div>
			<a href="#" class="btn">
				<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
			</a>
		</div>

        <!-- section table  -->
		<div class="table-data">
			<div class="order">
                <h2 class="heading">UTILIZADORES</h2>
                
                <div class="container-fluid">
                    <div class="row">
                        @if(session('msg'))
                            <p class="msg">{{session('msg')}}</p>
                        @endif
                        @yield('content')
                    </div>
                </div>
                <div class="cardHeader">
                    
                        @if(session('user_info')) 
                    
                            <a href="{{route('usuario_novo')}}" onclick="confirm('Você tem permissão para esta ação que deseja executar? se não sabe contacta um Administrador para ajudar-lo')" class="btn">novo cliente</a>
                    
                            <a href="{{route('usuario_novo')}}" class="btn">novo utilizador</a>
                        @endif
                </div>
                <table>
                        <thead>
                            
                        </thead>   
                        
                            
                                    @foreach($perfilCliente as $Res)
                                <tbody> 
                                    
                                <div style="width:400px; height:300px; float:right; right:right; margin:5rem auto 1rem auto; padding:5px;" >  
                                
                                            
                                                 <center>
                                                     <div>
                                                        @if(empty($fotosDePerfil))
                                                            <img style="width:200px; height:200px; text-align:center;" src="/img/teste/perfil" alt="">
                                                        @else
                                                            <img style="width:200px; height:200px; text-align:center;" src="/img/teste/{{$fotosDePerfil[0]->nomeImg}}" alt="">
                                                        @endif
                                                     </div>
                                                    <form method="PUT" enctype="multipart/form-data" action="{{route('confirm_info')}}">
                                                    @csrf
                                                    @method('PUT')
                                                       
                                                            <p><span>Alterar foto de perfil</span></p>
                                                            <p><input onclick="atualizarfoto()" type="file" id="fotoCli" name="fotoPerfilCli" class="from-control-file" ></p>
                                                        <div id="actualperfil" >
                                                            <button type="submit" class="btn">Atualizar</button>
                                                        </div>
                                                    </form>
                                            </center>
                                        
                                        </div>
                                    <div>
                                            <p>
                                            
                                                <br>
                                                <br>    
                                                        <p><span>Cliente nº : {{strtotime($Res->dataEvento)}} </span></p>
                                                <br>
                                                <br>
                                            </p>

                                        {{--Form para editar info do perfil do cliente--}}
                                         @if(isset($editar))

                                            <div class="hero">
                                                    <form method="POST" action="{{route('confirm_info')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    

                                                    <div class="rows">
                                                    
                                                    <div class="input-group">
                                                    <p>Id da Reserva :&nbsp;&nbsp;  {{$Res->idCli}} <!--a href="#"><span class="icon"><i class="bx bxs-edit-alt" style="color: #00FFFF;"></i></span></a--></p>
                                                    </div>  
                                                    <br><br>
                                                    <div class="input-group">
                                                        <p class="input">Nome Completo : &nbsp;<input type="text" name="nomeCli" id="nome" maxlength="40" value="{{$Res->nomeCli}}"></p>
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <p>Email: &nbsp;<input type="email" name="emailCli" id="email" maxlength="40" value="{{$Res->emailCli}}"></p>
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <p>telefone: &nbsp;<input type="text" name="telefoneCli" id="email" maxlength="40" value="{{$Res->telefoneCli}}"></p>
                                                    </div>
                                                    <br>
                                                    <div class="rows"> 
                                                        <div class="input-group">
                                                            <p>Senha: &nbsp;<input type="password" name="senhaCli" id="senha" maxlength="255" placeholder="***************"></p>
                                                        </div>   
                                                        <br>
                                                        <div class="input-group">
                                                        <p>Confirmar Senha: &nbsp;<input type="password" name="confSenha" id="confSenha" maxlength="255" placeholder="***************"></p>
                                                        </div>  
                                                    </div> 
                                                    <br>
                                                    <div class="input-group">
                                                        <p>Tipo De Cliente: &nbsp;<select name="tipoCliente" id="tipoCliente" class="input">
                                                            <option value="Particular">Particular</option>
                                                            <option value="Empresa">Empresa</option>
                                                        </select>
                                                        </p>
                                                    </div>
                                                </form>
                                                
                                            </div>

                                        @else
                                        <p>Id da Reserva :  {{$Res->idCli}} <!--a href="#"><span class="icon"><i class="bx bxs-edit-alt" style="color: #00FFFF;"></i></span></a--></p>
                                        <br/>
                                        <p>Email : <span>{{$Res->nomeCli}}</span></p>
                                        <br/>
                                        <p>Telefone : {{$Res->telefoneCli}}</p>
                                        <br/>
                                        <p>Email : {{$Res->emailCli}}</p>
                                        <br/>
                                        <p>Password : ****************</p>
                                        <br/>
                                        <p>Tipo de Cliente : Particular</p>
                                        @endif
                                        <br/>
                                            <p>
                                                 <a href="#" id='$id' onclick="visUsuario($id)">
                                                   <span class="icon">
                                                        Vista<i class="bx bx-show-alt" style="color: #006400;"></i>
                                                    </span>
                                                </a>
                                                |
 
                                                        <a href="/perfil?editar=perfil" onclick="return confirm('Tem a certeza de que pretende executar esta ação ?')">
                                                            <span class="icon">
                                                                    Editar<i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                            </span>
                                                        </a>
                                                        
                                                        
                                            </p>
                                           <button type="submit" class="btn">
                                                    CONFIRMAR
                                                    <i class="bx bx-check" style="color: #8B0000;"></i>

\\\                                        </button>
                                            </div>
                                    </tbody>    
                                    @endforeach
                            
                    </table>
            </div>
        </div>
        
	</main>
	<!-- MAIN -->
            
@endsection