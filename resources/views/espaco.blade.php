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
						<a class="active" href="#">Salões</a>
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
                <h2 class="heading">Salões</h2>

                <div class="container-fluid">
                    <div class="row">
                        @if(session('msg'))
                            <p class="msg"><span>{{session('msg')}}</span></p>
                        @endif
                        @yield('content')
                    </div>
                </div>
                <div class="cardHeader">
                    
                    @if(session('user_info'))
                        <a href="/espaco/novo" class="btn">Novo Espaço</a>
                        <a href="/espaco/create_plano" class="btn">Novo Plano</a>
                    @endif
                        <a href="/create_gallery" class="btn">+ Adicionar Fotos</a>
                </div>
                <br>
                    <table>
                        <thead>
                            <tr>
                                <td>FOTO</td>
                                <td>&nbsp;ID</td>
                                <td>SALÂO</td>
                                <td>TELEFONE</td>
                                <td>EMAIL</td>
                                <td>REDES</td>
                                <td>LOCALIZAÇÃO</td>
                                <td>&nbsp;Nº MAX</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @if(count($espacos) > 0)
                                    @foreach($espacos as $esp)
                                    
                                        <tr>
                                        <td><img src="/img/{{$esp->fotoEsp}}" alt="" ></td>
                                            <td>{{$esp->idEsp}}</td>
                                            <td>{{$esp->nomeEsp}}</td>
                                            <td>{{$esp->telefoneEsp}}</td>
                                            <td>{{$esp->emailEsp}}</td>
                                            <td>{{$esp->redes}}</td>
                                            <td>{{$esp->moradaEsp}}</td>
                                            <td>3000</td>
                                            <td>
                                                   
                                                <a href="#">
                                                    <span class="icon">
                                                        <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                    </span>
                                                </a>
                                                |
                                                <a href="#">
                                                    <span class="icon">
                                                        <i class="bx bxs-trash-alt" ></i>
                                                    </span>
                                                    <span class="title"></span>
                                                </a>
                                                    
                                                </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>Ainda não há Salões Registrados!</p>
                                @endif
                            </tr>
                                
                        </tbody>
                    </table><br><br>
            </div>
        </div>
	</main>
	<!-- MAIN -->
            
@endsection