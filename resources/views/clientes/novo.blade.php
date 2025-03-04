@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo - Salões - Novo Plano')
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
     
            <div class="novoReg">
                <div class="row">
                    <div class="hero">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <h1 class="heading">Registrar um novo Utilizador</h1>

                            <div class="rows">
                            <div class="input-group">
                                <input type="file" name="foto[]" multiple id="foto" required accept="imagem/jpg, imagem/jpeg, imagem/png">
                            </div>   

                            <div class="input-group">
                                <input type="text" name="nome" id="nome" maxlength="40" required>
                                <label for="nome">Nome:</label>
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
                                    <option value="Admin">Administrador</option>
                                    <option value="Gerente">Gerente</option>
                                    <option value="Funcionario">Funcionario</option>
                                    <option value="Fornecedor">Fornecedor</option>
                                </select>
                                <label for="tipoUsu">Tipo Usuários:</label>
                            </div>
                            <center>
                                <div>
                                    <button class="btn">
                                        <a href="./usuarios.php">
                                            <i class="bx bxs-paper-plane"></i> 
                                            VOLTAR
                                        </a>
                                    </button>
                                    <button value="REGISTRAR" class="btn" ><i class="bx bxs-paper-plane">REGISTRAR</i></button>
                                </div>
                            </center>
                        </form>
                        
                    </div>
                </div>
            </div>
        </main>
     
            
@endsection
