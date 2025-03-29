@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo - Novo espaco')
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
						<a class="active" href="#">Novo utilizador</a>
					</li>
				</ul>
			</div>
			<a href="#" class="btn">
				<i class='bx bxs-cloud-download' ></i>
				<span class="text">Download PDF</span>
			</a>
		</div>
     
        <div class="novoReg">
            <div class="row">
                <div class="hero">
                <form method="POST" action="{{route('registar_usuario_novo')}}" enctype="multipart/form-data">
                    @csrf
					        <h2 class="heading">associar-me a este espaco</h2>
                            @if(session('Msgx'))
                                <h5>{{session('Msgx')}}</h5>
                            @endif
                            <div class="input-group">
                                
                                <select name="nomeEsp" id="nomeEsp" class="input">
                                    @foreach($espacos as $salao)
                                        <option value="Admin">{{$salao->nomeEsp}}</option>
                                    @endforeach
                                </select>
                                
                                <label for="nomeEsp">Seleciona um espaco:</label>
                            </div>                        
                            <div class="input-group">
                                <input type="file" name="foto[]" id="foto" accept="imagem/jpg, imagem/jpeg, imagem/png">
                            </div>   

                            <div class="input-group">
                                <input type="text" name="nomeDaEmpresa" id="nome" maxlength="40" required>
                                <label for="nomeDaEmpresa">Nome Da sua empresa:</label>
                            </div>   

                            <div class="input-group">
                                <input type="email" name="emailDaEmpresa" id="email" maxlength="40" required>
                                <label for="nomeDaEmpresa">Email Da Sua Empresa:</label>
                            </div>
                            <div class="input-group">
                                <br>
                                <i class=""></i>
                                <input type="checkbox"  value="Espaco" name="servicoPrestados" id="email" maxlength="40">
                                <input type="checkbox" value="Deejay" name="servicoPrestados" id="email" maxlength="40">
                                <input type="checkbox" value="Musica" name="servicoPrestados" id="email" maxlength="40">
                                <input type="checkbox" value="Luzes" name="servicoPrestados" id="email" maxlength="40">
                                <input type="checkbox" value="Catering" name="servicoPrestados" id="email" maxlength="40">
                                <label for="nomeDaEmpresa">Quais são os seus servicos?</label>
                            </div>


                        <center>
                            <div>
                                <button class="btn" href="{{route('admin')}}">
                                            Cancelar
                                </button>
                                <button value="REGISTRAR" class="btn" ><i class="fas fa-paper-plane">REGISTRAR</i></button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </main>
                    
@endsection