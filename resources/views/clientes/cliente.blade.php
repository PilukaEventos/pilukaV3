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
                <h2 class="heading">CLIENTES</h2>
                
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

            </div>
        </div>
        <div class="table-data">
			<div class="order">
                <h3 class="heading" id="confirmados">EVENTOS PENDENTES</h3>

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
                        
                    <!--?php
                        }
                    ?-->
                        
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>CLIENTE</td>
                            <td>TELEFONE</td>
                            <td>EMAIL</td>
                            <td>SERVIÇO</td>
                            <td>ID ESPACO</td>
                            <td>DATA EVENTO</td>
                            <td>CONVIDADOS</td>
                            <td><center>TIPO EVENTO</center></td>
                            <td>ORÇAMENTO</td>
                            <td><center>Estado</center></td>
                            
                        </tr>
                    </thead>
                <tbody>
                                
                                @if (count($reservas) > 0)
                                    @foreach($eventosPendentes as $ep)
                                
                                            <tr>
                                                <td>{{$ep->nomeRes}}</td>
                                                <td>{{$ep->contactoRes}}</td>
                                                <td>{{$ep->emailRes}}</td>
                                                <td>{{implode(',',$ep->servicos)}}</td>
                                                <td>{{$ep->idEsp}}</td>
                                                <td>{{$ep->dataEvento}}</td>
                                                <td>{{$ep->numConv}}</td>
                                                <td>{{$ep->tipoEve}}</td>        
                                                <td>{{$ep->precoPla}}</td>
                                                <td>Pendente</td>
                                                
                                                
                                                <td>
                                                    
                                                        @if (session('user_info')[0]->tipo=="Gerente")
                                                            {{--verificando se é o usuario tem permissao de gerente--}}
                                                    
                                                            <a href="#">
                                                                <span class="icon">
                                                                    Confirm<i class='bx bx-like'></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    Deletar<i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                        @endif
                                                </td>
                                            </tr>
                                    @endforeach
                                @else
                                    <p>Ainda não há Agendamentos Registrados!</p>
                                @endif
                            </tbody>
                        </table><br><br>
                    
            </div>
        </div>
        <div class="table-data">
			<div class="order">
                <h3 class="heading" id="confirmados">EVENTOS CONFIRMADOS</h3>

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
                        
                    <!--?php
                        }
                    ?-->
                        
                </div>
                <table>
                    <thead>
                                    <tr>
                                        <td>CLIENTE</td>
                                        <td>TELEFONE</td>
                                        <td>EMAIL</td>
                                        <td>SERVIÇO</td>
                                        <td>ESPACO</td>
                                        <td>DATA EVENTO</td>
                                        <td>CONVIDADOS</td>
                                        <td><center>TIPO EVENTO</center></td>
                                        <td><center>INVESTIMENTO</center></td>
                                        <td><center>AÇÕES</center></td>
                                        
                                    </tr>
                    </thead>     
                    <tbody>
                                    
                                    @if (count($eventos) > 0)
                                        @foreach($eventos as $ev)
                                    
                                                <tr>
                                                    <td>{{$ev->nomeCli}}</td>
                                                    <td>{{$ev->telefoneCli}}</td>
                                                    <td>{{$ev->emailCli}}</td>
                                                    <td>{{$ev->servicos}}</td>
                                                    <td>{{$ev->nomeEsp}}</td>
                                                    <td>{{$ev->dataEvento}}</td>
                                                    <td>{{$ev->numConv}}</td>
                                                    <td>{{$ev->nomeEve}}</td>        
                                                    <td>{{$ev->precoPla}}</td>
                                                    
                                                    
                                                    
                                                    <td>
                                                        
                                                            @if (session('user_info')[0]->tipo=="Gerente")
                                                                {{--verificando se é o usuario tem permissao de gerente--}}
                                                        
                                                                <a href="#">
                                                                    <span class="icon">
                                                                        Editar<i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                    </span>
                                                                </a>
                                                                |
                                                                <a href="#">
                                                                    <span class="icon">
                                                                        Deletar<i class="bx bxs-trash-alt" ></i>
                                                                    </span>
                                                                    <span class="title"></span>
                                                                </a>
                                                            @endif
                                                    </td>
                                                </tr>
                                        @endforeach
                                    @else
                                        <p>Ainda não há Agendamentos Registrados!</p>
                                    @endif
                                </tbody>
                            </table><br><br>
                    
            </div>
        </div>
	</main>
	<!-- MAIN -->
            
@endsection