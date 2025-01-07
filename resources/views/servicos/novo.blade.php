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
						<a class="active" href="#">Novo Salão</a>
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
                    <form action="/espaco" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1 class="heading">Registrar um novo salão</h1>
 
                        <div class="input-group">
                            <input type="file" id="foto" name="foto" class="from-control-file">
                            <!--label for="foto">Foto Salão:</label-->
                        </div>
                        
                        <div class="input-group">
                            <input type="text" name="nomeSalao" id="nomeSalao" maxlength="40" required>
                            <label for="nomeSalao">Nome:</label>
                        </div>

                        <div class="rows">
                            <div class="input-group">
                                <input type="text" name="telefoneSalao" id="telefoneSalao" maxlength="40" required>
                                <label for="telefoneSalao">telefone:</label>
                            </div>

                            <div class="input-group">
                                <input type="emailSalao" name="emailSalao" id="emailSalao" maxlength="40" required>
                                <label for="emailSalao">emailSalao:</label>
                            </div>

                            <div class="input-group">
                                <input type="text" name="moradaSalao" id="moradaSalao" maxlength="80" required>
                                <label for="moradaSalao">Morada:</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <textarea name="sobreSalao" id="sobreSalao" maxlength="100" rows="7" required></textarea>
                            <label for="sobreSalao">Sobre:</label>
                        </div>

                        <div class="rows">
                            <!--div class="input-group">
                                <input type="number" name="numConv" id="numConv" maxlength="40" required>
                                <label for="numConv">Convidados:</label>
                            </div>

                            <div class="input-group">
                                <input type="number" name="precoPla" id="precoPla" maxlength="40" required>
                                <label for="precoPla">Preço:</label>
                            </div-->

                            <div class="input-group">
                                <input type="text" name="redesSalao" id="redesSalao" maxlength="40" required>
                                <label for="redesSalao">redesSalao Sociais:</label>
                            </div>
                        </div>
                        <center>
                            <div>
                                <button class="btn">
                                    <a href="/espaco">
                                        <i class="fas fa-paper-plane"></i> 
                                            VOLTAR
                                    </a>
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