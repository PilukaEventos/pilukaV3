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
							<a class="active" href="#">Planos</a>
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
                            <h1 class="heading">Registrar um novo Plano</h1>

                            <div class="rows">

                                <div class="input-group">
                                    <select name="nomeEsp" id="nomeEsp" class="input">
                                        <option value="0">Selecionar</option>
                                        
                                            @if(empty(isset($espacos)))
                                                <p>Ainda não há salões registrados aqui!</p>
                                            @else 
                                                @foreach ($espacos as $value)
                                                    <option value="{{$value->id}}"{{$value->nomeSalao}}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                    <label for="nomeEsp">Selecione o espaço</label>
                                </div>
                                
                                <div class="input-group">
                                    <input type="number" name="numConv" id="numConv" maxlength="5" required>
                                    <label for="numConv">Convidados:</label>
                                </div>

                                <div class="input-group">
                                    <input type="number" name="precoPla" id="precoPla" maxlength="40" required>
                                    <label for="precoPla">Preço:</label>
                                </div>
                            </div>
                            <center>
                                <div>
                                    <button class="btn"><i class="fas fa-paper-plane"></i>VOLTAR</button>
                                    <button value="REGISTRAR" class="btn" ><i class="fas fa-paper-plane">REGISTRAR</i></button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </main>
     
            
@endsection
