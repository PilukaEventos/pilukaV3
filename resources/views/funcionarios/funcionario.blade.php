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
						<a class="active" href="#">Funcionarios</a>
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
                <h2 class="heading">FUNCIONARIOS</h2>

                <div class="container-fluid">
                    <div class="row">
                        @if(session('msg'))
                            <p class="msg">{{session('msg')}}</p>
                        @endif
                        @yield('content')
                    </div>
                </div>
                <div class="cardHeader">
                    <!--?php
                        if (isset($_SESSION['id_admin'])) {
                    ?-->
                            <a href="{{route('usuario_novo')}}" onclick="confirm('Você tem permissão para esta ação que deseja executar? se não sabe contacta um Administrador para ajudar-lo')" class="btn">novo cliente</a>
                    <!--?php
                        }
                    ?-->
                        <a href="{{route('usuario_novo')}}" class="btn">NOVO FUNCIONARIO</a>
                </div>
					<table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>NOME</td>
                                <td> </td>
                                <td>EMAIL</td>
                                <td>TELEFONE</td>
                                <td>DATA DE NASCIMENTO</td>
                                <td>MORADA</td>
                                <td>DATA DE REGISTRO</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @if (count($funcionarios) > 0)
                                    @foreach($funcionarios as $F)
           
                                        <tr>
                                            <td>
                                                <img src="/img/paulo.png" alt="foto_de_capa">
                                            </td>
                                            <td>{{$F->idFun}}</td>
                                            <td><center>{{$F->nomeFun}}</center></td>
                                            <td>{{$F->emailFun}}</td>
                                            <td>{{$F->telefoneFun}}</td>
                                            <td><center>{{$F->dataNascFun}}</center></td>
                                            <td><center>{{$F->moradaFun}}</center></td>
                                            <td><center>{{$F->dataIngreFun}}</center></td>
                                            
                                            <td>
                                                 <a href="#" id='$id' onclick="visUsuario($id)">
                                                   <span class="icon">
                                                        <i class="bx bx-show-alt" style="color: #006400;"></i>
                                                    </span>
                                                </a>
                                               <!--?php
                                                    if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                        //verificando se é o usuario
                                                ?-->
                                                        |
                                                        <a href="#">
                                                            <span class="icon">
                                                                    <i class="bx bxs-edit-alt" onclick="return confirm('Tem a certeza que deseja alterar estes dados ? em caso de duvida cosulta um administrador')" style="color: #00FFFF;"></i>
                                                            </span>
                                                        </a>
                                                        |
                                                        <a href="#">
                                                            <span class="icon">
                                                                <i class="bx bxs-trash-alt" onclick="return confirm('Tem a certeza que deseja deletar estes dados ? em caso de duvida cosulta um administrador')" style="color: #8B0000;"></i>
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