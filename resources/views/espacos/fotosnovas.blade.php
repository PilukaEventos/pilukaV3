@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo - Novo Album')
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
						<a class="active" href="#">Novo Album</a>
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
                    <form action="/adicionarfotos" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1 class="heading">Adicionar Imagens</h1>
 
                        
                        
                        <div class="input-group">
                                    <input type="text" name="tituloImg" onclick="updloadImag()" class="from-control-file"  placeholder="Adiciona um titulo. você pode selecionar varias imagens.">
                        </div>
                        <div class="input-group">
                                    <input type="file" id="fotosnovas" name="foto[]" class="from-control-file" multiple>
                        </div>
                                
                        
                        
                        
                        <center>
                            <div>
                                <button class="btn">
                                    <a href="/espaco">
                                        <i class="fas fa-paper-plane"></i> 
                                            VOLTAR
                                    </a>
                                </button>
                                <button value="REGISTRAR" class="btn" ><i class="fas fa-paper-plane">SALVAR IMAGENS</i></button>
                            </div>
                        </center>
                    </form>

                    
							

                </div>
            </div>
        </div>
        <div class="gallery-container">
            
                <a href="img/teste/{{$fotos[0]->nomeImg}}" id="fotosCarregadas">
                    <img src="./img/teste/{{$fotos[0]->nomeImg}}"  alt="{{$fotos[0]->nomeImg}}" alt="fotos de são de festas em luanda angola">
                </a>
                <a href="img/teste/{{$fotos[0]->nomeImg}}" >
                    <img src="./img/teste/{{$fotos[0]->nomeImg}}"  alt="{{$fotos[0]->nomeImg}}" alt="fotos de são de festas em luanda angola">
                </a>
		</div>
    </main>
                    
@endsection