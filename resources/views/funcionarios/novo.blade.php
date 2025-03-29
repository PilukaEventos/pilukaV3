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
                @if(isset($editar))
                
                     @foreach($perfilFuncionario as $F)
           
                <form action="/confirm_funcionario_info" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
					        <h2 class="heading">ACTUALIZAR DADOS DE {{$F->nomeFun}}</h2>
                            @if(session('Msgx'))
                                <script>alert(`{{session('Msgx')}}`)</script>
                            @endif
                            <div class="input-group">
                                <div id="fotodiv">
                                    <input type="file" name="fotoperfilFun" id="foto" alt="funcionario do salao de eventos">
                                </div>   
                            </div>
                            <div class="input-group" style="display:none;">
                                <input type="text" name="editar" id="editar" value="{{$F->idFun}}" maxlength="100" >
                                
                            </div> 
                            <div class="input-group">
                                <input type="text" name="name" id="nome" value="{{$F->nomeFun}}" maxlength="100" >
                                
                            </div> 
                            <div class="input-group">
                                <input type="email" name="emailFun" value="{{$F->emailFun}}" id="email" maxlength="40" >
                                
                            </div>
                            <div class="input-group">
                                <input type="text" name="telefone" value="{{$F->telefoneFun}}" id="email" maxlength="40" >
                                
                            </div>

                            <div class="rows"> 
                                <div class="input-group">
                                    <input type="password" name="password" id="senha" placeholder="***************" maxlength="255" >
                                    <label for="senha">Senha:</label>
                                </div>   

                                <div class="input-group">
                                    <input type="password" name="password" placeholder="****************" id="confSenha" maxlength="255" >
                                    <label for="confSenha">Confirmar Senha:</label>
                                </div>  
                            </div> 

                            <div class="input-group">
                                <select name="tipo" name="tipo" id="tipoUsu" class="input">
                                    <option value="Gerente">Gerente</option>
                                    <option value="Funcionario">Funcionario</option>
                                    <option value="Fornecedor">Fornecedor</option>
                                    <option value="Tecnico">Tecnico</option>
                                </select>
                                <label for="tipoUsu">Tipo Usuários:</label>
                            </div>                        <center>
                            <div>
                                <button class="btn" href="{{route('admin')}}">
                                            Cancelar
                                </button>
                                <button value="REGISTRAR" class="btn" ><i class="fas fa-paper-plane">REGISTRAR</i></button>
                            </div>
                        </center>
                    </form>

                        @endforeach

                    @else                    
                    <form method="POST" action="{{route('registar_funcionario_novo')}}" enctype="multipart/form-data">
                    @csrf
					        <h2 class="heading">Novo Utilizador</h2>
                            @if(session('Msgx'))
                                <script>alert(`{{session('Msgx')}}`)</script>
                            @endif
                            <div class="input-group">
                                <input type="file" name="foto" id="foto" alt="imagem do trabalhador do salao de festas">
                            </div>   

                            <div class="input-group">
                                <input type="text" name="nome" id="nome" maxlength="40" required>
                                <label for="nome">Nome:</label>
                            </div>
                            <div class="input-group">
                                <input type="text" name="telefone" id="telefone" maxlength="40" required>
                                <label for="telefone">telefone:</label>
                            </div>
                            <div class="input-group">
                                <input type="date" name="datanasc" id="nome" placeholder="Data de nascimento" maxlength="40" required>
                                
                            </div>     
                            <div class="input-group">
                                <input type="text" name="morada" id="morada" maxlength="40" required>
                                <label for="morada">Morada</label>
                            </div>   
                                  

                            <div class="input-group">
                                <input type="email" name="email" id="email" maxlength="40" required>
                                <label for="email">Email:</label>
                            </div>

                            <div class="rows"> 
                                <div class="input-group">
                                    <input type="password" name="senha" id="senha" maxlength="255" required>
                                    <label for="senha">Senha:</label>
                                </div>   

                                <div class="input-group">
                                    <input type="password" name="confSenha" id="confSenha" maxlength="255" required>
                                    <label for="confSenha">Confirmar Senha:</label>
                                </div>  
                            </div> 

                            <div class="input-group">
                                <select name="tipoUsu" name="tipoUsu" id="tipoUsu" class="input">
                                    <option value="Gerente">Gerente</option>
                                    <option value="Funcionario">Funcionario</option>
                                    <option value="Fornecedor">Tecnico</option>
                                </select>
                                <label for="tipoUsu">Tipo Usuários:</label>
                            </div>

                            
                            <div class="input-group">
                                <select name="idEsp" id="idEsp" class="input" disabled="disabled">
                                    @foreach($espacos as $esp)
                                        <option value="{{$esp->idEsp}}">{{$esp->nomeEsp}}</option>
                                    @endforeach
                                </select>
                                
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
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection