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
                    
                        @if(session('user_info')[0]->tipo!="Admin")
                            <a href="{{route('funcionario_novo')}}" onclick="return confirm('Você tem permissão para esta ação que deseja executar? se não sabe contacta um Administrador para ajudar-lo')" class="btn">novo utilizador</a>
                        @else
                            <a href="{{route('usuario_novo')}}" onclick="return confirm('Você tem permissão para esta ação que deseja executar? se não sabe contacta um Administrador para ajudar-lo')" class="btn">novo utilizador</a>
                        @endif
                    
                        <a href="/espaco/novo" class="btn">novo espaco</a>
                </div>
					<table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>FOTO</td>
                                <td>NOME</td>
                                <td>EMAIL</td>
                                <td>PASSWORD</td>
                                <td>Tipo De Usuario</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @if (count($user) > 0)
                                    @foreach($user as $Usr)
                                
                                        <tr>
                                            <td>
                                                <img src="/img/teste/perfil.png" alt="foto_de_capa">
                                            </td>
                                            <td>{{$Usr->id}}</td>
                                            <td>{{$Usr->name}}</td>
                                            <td>{{$Usr->email}}</td>
                                            <td>***************</td>
                                            <td>{{$Usr->tipo}}</td>
                                            <td>
                                                 <a href="#" id='$id' onclick="visUsuario($id)">
                                                   <span class="icon">
                                                        <i class="bx bx-show-alt" style="color: #006400;"></i>
                                                    </span>
                                                </a>
                                               
                                                    
                                                        
                                               
                                                        |
                                                        @if (session('user_info')[0]->tipo=="Admin" || session('user_info')[0]->tipo=="Gerente")
                                                            <a href="usuario_editar?id={{$Usr->id}}" onclick="return confirm('Você tem permissão para esta ação que deseja executar? se não sabe contacta um Administrador para ajudar-lo')">
                                                                <span class="icon">
                                                                        <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                        @else
                                                            <a href="#" onclick="return confirm('Você tem permissão para esta ação que deseja executar? se não sabe contacta um Administrador para ajudar-lo')">
                                                                <span class="icon">
                                                                        <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                        @endif
                                                        |
                                                        <a href="#">
                                                            <span class="icon">
                                                                <i class="bx bxs-trash-alt" style="color: #8B0000;"></i>
                                                            </span>
                                                            <span class="title"></span>
                                                        </a>
                                                <!--?php
                                                    }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                ?->
                                                        |
                                                        <a href="./editar_espaco.php?id=<--?php echo $v['idEsp']; ?->">
                                                            <span class="icon">
                                                                <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                            </span>
                                                        </a>
                                                        |
                                                        <a href="#">
                                                            <span class="icon">
                                                                <i class="bx bxs-trash-alt" style="color: #8B0000;"></i>
                                                            </span>
                                                            <span class="title"></span>
                                                        </a>
                                                <--?php
                                                        }  
                                                ?-->     
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>Ainda Não Há Rtilizadores Registrados!</p>
                                @endif
                            </tr>
                                
                        </tbody>
                    </table>
            </div>
        </div>
	</main>
	<!-- MAIN -->
            
@endsection