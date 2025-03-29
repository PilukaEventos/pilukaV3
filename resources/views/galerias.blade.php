@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo - Galerias')
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

		{{-- sessao do form para adicionar fotos começa aqui--}}
      
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
   
			{{-- end --}}
			<!-- section of gallery fotos ;)  -->
		<div class="table-data">
			<div class="order">
                
                <div class="cardHeader">

                        <a href="{{route('home')}}" class="btn">Reservar Novamente</a>

                        <a href="/sobre#contacto" onclick="return confirm('tem a certeza de que gostaria de mudar de pagina?')" class="btn">Escrever uma mensagem</a>
                </div>
                <hr/>

            </div>
        </div>
			@if('user_info')
			<div class="table-data">
				<div class="order">
					<h3 class="heading">GALERIA DE FOTOS</h3>

					<div class="container-fluid">
						<div class="row">
							
							<div id="lightgallery">
								@if(!empty($fotos))
								<div class="gallery-container">
								@foreach($fotos as $ft)
								<a href="./img/{{$ft->nomeImg}}" >
									<img src="./img/{{$ft->nomeImg}}" alt="{{$ft->nomeImg}}" alt="fotos de são de festas em luanda angola">
								</a>
								@endforeach
								</div>
								<!-- Add more images as needed -->
							</div>
								@else
									<h2 class="heading" id="confirmados">Nada para mostrar ainda</h2>
								@endif

						</div>
					</div>
					
				</div>
			</div>
			@elseif(session('cliente_info'))

					<div class="table-data">
				<div class="order">
				<h3 class="heading">GALERIA DE FOTOS</h3>
   
                <div class="container-fluid">
                    <div class="row">
						
                        <div id="lightgallery">
							@if(!empty($fotos))
							<div class="gallery-container">
							@foreach($fotos as $ft)
							<a href="img/teste/{{$ft->nomeImg}}" >
								<img src="./img/teste/{{$ft->nomeImg}}" alt="{{$ft->nomeImg}}" alt="fotos de são de festas em luanda angola">
							</a>
							@endforeach
							</div>
							<!-- Add more images as needed -->
						</div>
							@else
								<h2 class="heading" id="confirmados">Nada para mostrar ainda</h2>
							@endif
                    </div>
                </div>
                
            </div>
        </div>

		@else

		@endif
	</main>
	<!-- MAIN -->
            

@endsection