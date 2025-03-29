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
						<a class="active" href="#">AREA DE CLIENTES</a>
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
                <h3 class="heading">EVENTOS PENDENTES</h3>
                <div class="container-fluid">
                    <div class="row">
                        @if(session('msg'))
                            <p class="msg">{{session('msg')}}</p>
                        @endif
                        @yield('content')
                    </div>
                </div>
                <div class="cardHeader">

                        <a href="/#disponibilidade" class="btn">Reservar Novamente</a>

                        <a href="/mensagem" class="btn">Escrever uma mensagem</a>
                </div>
                <hr/>
                {{--Form para editar info das reservas do cliente--}}
                @if(isset($editar_info_Reserva))
                                
                                @foreach($eventosPendentes as $pendente)
                                         
                                            <div class="hero">
                                                    <form method="POST" action="/confirm_reserva_info" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="rows">
                                                    
                                                    <div class="input-group">
                                                    <p>Id da pendenteerva :&nbsp;&nbsp;  {{$pendente->idCli}} <!--a href="#"><span class="icon"><i class="bx bxs-edit-alt" style="color: #00FFFF;"></i></span></a--></p>
                                                    </div>  
                                                    <br><br>
                                                    <div class="input-group">
                                                        <p class="input">Nome Completo : &nbsp;<input type="text" name="nomeRes" id="nome" maxlength="40" value="{{$pendente->nomeRes}}"></p>
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <p>Email: &nbsp;<input type="email" name="emailRes" id="email" maxlength="40" value="{{$pendente->emailRes}}"></p>
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <p>telefone: &nbsp;<input type="text" name="contactoRes" id="email" maxlength="40" value="{{$pendente->contactoRes}}"></p>
                                                    </div>
                                                    <br>
                                                    <div class="rows"> 
                                                        <div class="input-group">
                                                            <p>Nº de Convidados: &nbsp;<input type="text" name="numConv" id="numConv" maxlength="255" value="{{$pendente->numConv}}"></p>
                                                        </div>   
                                                        <br>
                                                        <div class="input-group">
                                                        <p>Servicos &nbsp;<input type="text" name="Servicos" id="Servicos" maxlength="255" value="{{implode(',',$pendente->servicos)}}"></p>
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
                                                <button type="submit" class="btn">
                                                    CONFIRMAR
                                                    <i class="bx bx-check" style="color: #8B0000;"></i>

                                                     </button>
                                            </div>
                                            <br/>

                                            </div>
                                        </form>
                                            @endforeach
                            @else
					<table>
                        <thead>
                            
                        </thead>   
                                
                            @if (count($reservas) > 0)
                                    @foreach($eventosPendentes as $Res)
                                <tbody> 
                                    <div>
                                            <p>
                                            
                                                <br>
                                                <br>    
                                                        <p><span>DATA DO EVENTO: {{$Res->dataEvento}} </span></p>
 
                                                <br>
                                            </p>
                                        <p>id : {{$Res->idRes}}</p>
                                        
                                        <p>NOME : {{$Res->nomeRes}}</p>
                                        <p>EMAIL : {{$Res->emailRes}}</p>
                                        <p>telefone : {{$Res->contactoRes}}</p>
                                        <p>NUMERO DE CONVIDADOS : {{$Res->numConv}}</p>
                                        <p>ESPACO : {{$Res->nomeEsp}}</p>
                                        <p>INVESTIMENTO : 0.000.000,00 kwanzas</p>
                                        @if(!empty($Res->servicos))
                                        <p>SERVERICOS : {{implode(',',$Res['servicos'])}}</p>
                                        @else
                                        <p>SERVERICOS : {{$Res['servicos']}}</p>
                                        @endif
                                            <p>
                                                 <a href="#" id='$id' onclick="visUsuario($id)">
                                                   <span class="icon">
                                                        Vista<i class="bx bx-show-alt" style="color: #006400;"></i>
                                                    </span>
                                                </a>
                                              
                                                        <a href="/editarinfores?editar={{$Res->idRes}}" onclick="return confirm('tem a certeza de que pretende executar esta ação?')">
                                                            <span class="icon">
                                                                    Editar<i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                            </span>
                                                        </a>
                                                        |
                                                        <a href="#">
                                                            <span class="icon">
                                                                Deletar<i class="bx bxs-trash-alt" style="color: #8B0000;"></i>
                                                            </span>
                                                            <span class="title"></span>
                                                        </a>
                                            </p>
                                        
                                            </div>
                                            <div style="width:400px; height:300px; float:right; right:right; margin:-18% auto 1px auto; padding:5px;" >  
                                            
                                                <a>
                                                    
                                                    <div>
                                                        <img style="width:200px; height:150px; text-align:center;" src="/img/teste/{{$Res->fotoEsp}}" alt="">
                                                    </div>
                                                    
                                                    
                                                        <p>ESPACO : {{$Res->nomeEsp}} </p>
                                                    
                                                        <p>Telefone : {{$Res->telefoneEsp}} </p>
                                                        <p>Telefone : {{$Res->emailEsp}} </p>
                                                    
                                                </a>
                                            
                                            </div>
                                    </tbody>    
                                    @endforeach
                                    
                                @else
                                    <p>Ainda Não Há Rtilizadores Registrados!</p>
                                @endif
                    </table>
                    @endif
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
                        
                </div>
                        
                <table>     
                <thead>
                            <tr>
                                <td>NOME Completo</td>
                                <td>Telefone</td>
                                <td>Email</td>
                                <td>Servicos</td>
                                <td>Espaco</td>
                                <td>Data do Evento</td>
                                <td>Numero De Convidados</td>
                                <td>Tipo De Evento</td>
                                <td>Investimento</td>
                            </tr>
                        </thead>
                <tbody>
                                @if (count($agendamentos) > 0)
                                    @foreach($agendamentos as $ev)
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