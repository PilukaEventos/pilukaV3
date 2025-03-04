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
						<a class="active" href="#">Servicos</a>
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
                <h2 class="heading">Servicos</h2>

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
                            <a href="/servicos/novo" class="btn">novo servico</a>
                    <!--?php
                        }
                    ?-->
                        <a href="/espaco/create_plano" class="btn">novo plano</a>
                        <a href="/servicos/associar_me" class="btn">associar-me a um espaco</a>
                </div>
					<table>
                        <thead>
                            <tr>
                                <td>FORNECEDOR</td>
                                <td>TELEFONE</td>
                                <td>ALTERNATIVO</td>
                                <td>EMAIL</td>
                                <td>DESCRICAO</td>
                                <td>NIF</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @if (count($Servicos) > 0)
                                    @foreach($Servicos as $sv)
                                
                                        <tr>
                                            <td>
                                                {{$sv->nomeServ}}
                                            </td>
                                            <td>{{$sv->telefoneServ}}</td>
                                            <td>{{$sv->telefoneFor}}</td>
                                            <td>{{$sv->emailFor}}</td>
                                            <td>{{$sv->descricaoServ}}</td>
                                            <td>{{$sv->nif}}</td>
                                            <td>
                                                 <a href="#" id='$id' onclick="visUsuario($id)">
                                                   <span class="icon">
                                                        <i class="bx bx-show-alt" style="color: #006400;"></i>
                                                    </span>
                                                </a>                                               
                                                    @if(session('fun_info') || session('user_info'))
                                                        |
                                                        <a href="/servicos_editar?id={{$sv->idServ}}">
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
                                                    @endif
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
                                    <p>Ainda não há Salões Registrados!</p>
                                @endif
                            </tr>
                                
                        </tbody>
                    </table>
            </div>
        </div>
	</main>
	<!-- MAIN -->
            
@endsection
