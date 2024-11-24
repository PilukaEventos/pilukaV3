@extends('layouts.homeLayout')
@section('title','BEM VINDO A ESTE ESPACO')
@section('content')

@foreach($salao as $s)
   <!--************ sobre **************-->
   
   <section class="sobre" id="sobre">
      <h1 class="heading"  data-tooltip="um pouco sobre nós">Salão de Festas {{$s->nomeEsp}}</h1>

      <div class="row">
         <div class="image">
               
               <img src="./img/teste/{{$s->fotoEsp}}">
            
         </div>
            <div class="content">
                <p>Localização: <span>{{$s->moradaEsp}}</span></p>
                <p>Email: <span>{{$s->emailEsp}}</span> - Telefone: <span>{{$s->telefoneEsp}}</span></p>
                <p>Redes Sociais: <span>{{$s->redes}}</span></p>
                <p>Tipos de Eventos: <span>{{$s->descricaoEsp}}</span></p><br><br>
            </div>
      </div>
   </section>
@endforeach   
   <!--************ sobre ends here ***************-->

   <!-- reserva -->
   <section class="reserva" id="reserva">

      <h1 class="heading"  data-tooltip="Selecione um dos dias disponiveis para eventos">reserve agora</h1>
      <div>
         <form method="POST" action="/reservar">

            <div class="container">

               <div class="box">
                  <p>Nome Completo<span>*</span></p>
                  <input type="text" name="nomeCli" id="nomeCli" class="input" placeholder="O seu Nome Completo">
               </div>

               <div class="box">
                  <p>Contacto <span>*</span></p>
                  <input type="text" name="telefoneCli" id="telefoneCli" class="input" placeholder="O seu Contacto">
               </div>

               <div class="box">
                  <p>Email <span>*</span></p>
                  <input type="text" name="emailCli" id="emailCli" class="input" placeholder="O seu Email">
               </div>

               <div class="box">
                  <p>data evento<span>*</span></p>
                  <input type="date" name="dataEve" id="dataEve" class="input">
               </div>

               <div class="box">
                  <p>salão <span>*</span></p>
                  <input type="text" name="dataEve" id="dataEve" class="input" disabled value="<?php echo $s['nomeEsp']; ?>">
               </div>

               <div class="box">
                  <p>tipo evento <span>*</span></p>
                  <input type="text" name="tipoEve" id="tipoEve" class="input" placeholder="O tipo de evento">
               </div>

               <div class="box">
                  <p>nº convidados <span>*</span></p>
                  <input type="number" name="numConv" id="numConv" class="input" placeholder="O nº de convidados">
               </div>

               <div class="box">
                  <p>Marque os serviços desejados <span>*</span></p>
                  <fieldset>
                     <input type="checkbox" name="servicos[]" value="espaco" checked>
                        Espaço
                     <input type="checkbox" name="servicos[]" value="catering">
                        Catering
                     <input type="checkbox" name="servicos[]" value="decoracao">
                        Decoração
                     <input type="checkbox" name="servicos[]" value="Outros">
                        Outros
                  </fieldset>
               </div>

               <div class="box">
                  <p>data visita<span>*</span></p>
                  <input type="date" name="dataVi" id="dataVi" class="input">
               </div>
            </div>
            <button value="RESERVAR" class="btn" ><i class="fas fa-paper-plane">CONFIRMAR RESERVAR</i></button>
         </form>
      </div>
   </section>
   <!-- end -->
    
   <!-- gallery -->
   <section class="gallery" id="gallery">
        <h1 class="heading"  data-tooltip="as fotos do evento">fotos do salão</h1>
         <div class="gallery-container">
   
            @for($i=0; $i < 3; $i++)
               <a href="/" class="box">   
                  <img src="/img/teste/{{$fotos[$i]->nomeImg}}" alt="">
                  <div class="icon"> <i class="fas fa-plus"></i></div>
               </a>  
            @endfor
   
         </div>   

   </section>
   <!-- end -->
    
   <!--************ planos **************-->
   
   <section class="planos" id="planos">
      <h1 class="heading"  data-tooltip="um pouco sobre os nossos planos">Planos do Salão de Festa{{$salao[0]->nomeEsp}}</h1>

      <div class="row">
            <div class="content">
               
               <center>
                  <p>Nº Convidados: <span>{{$planos[0]->numConv}}</span> - Preço: <span>{{$planos[0]->precoPla}}</span></p>
               </center>
               
            </div>
      </div>
   </section>
   
   <!--************ planos ends here ***************-->

   <!-- Eventos  -->
   
   <!-- end -->

   <!-- servicos -->

   <section class="servicos">
      <h1 class="heading"  data-tooltip="os nossos parceiros">parceiros</h1>
      <div class="swiper room-slider">
         <div class="swiper-wrapper">
		
			@if (empty($servicos))
      
            <p class="heading">Ainda não há registro de Serviços Realizados aqui!</p>
      @else
			   @foreach ($servicos as $value)
		
               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="./admin/assets/imagens/servicos/<?php echo $value['foto_capa']; ?>" alt="<?php echo $value['nomeFor']; ?>">
                  </div>
                  <div class="content">
                     <h3><?php echo $value['nomeFor']; ?></h3>
                     <p>telefone: <span><?php echo $value['telefoneFor']; ?></p>
                     <p></span>Email: <span><?php echo $value['emailFor']; ?></span></p>
                     <p>Serviço: <span><?php echo $value['nomeServ']; ?></span></p>
                     <div class="stars">

                     </div>
                     <center><a href="./parceiros.php?id=<?php echo $value['idServ']; ?>" class="btn">ver fotos</a></center>
                  </div>
               </div>
            @endforeach
		@endif

         </div>
         <div class="swiper-pagination"></div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>

      </div>
   </section>
   <!-- end -->
   
   <!-- perguntas -->
   <section class="perguntas" id="perguntas">
      <h1 class="heading"  data-tooltip="as perguntas mais frequentes">perguntas</h1>

      <div class="row">
         <div class="image">
            <img src="./img/FAQs.gif" alt="">
         </div>

         <div class="content">

            <div class="box active">
               <h3>1.	O salão trabalha com parceiros ou seja serviços terceirizados? </h3>
               <p>sim</p>
            </div>

            <div class="box">
               <h3>2.	Dos parceiros inclui serviços de: buffet, Bebidas, música? </h3>
               <p>sim</p>
            </div>

            <div class="box">
               <h3>3. Quanto a forma de pagamentos, é feita com antecedência ao evento? </h3>
               <p>sim</p>
            </div>

            <div class="box">
               <h3>4.	Dos requisitos do evento, exige-se um número de convidados pré-estabelecidos de mínimo e máximo? </h3>
               <p>sim</p>
            </div>

            <div class="box">
               <h3>5.	No valor do espaço inclui serviços como limpeza e protocolo? </h3>
               <p>sim</p>
            </div>

         </div>

      </div>
   </section>
   
   <!-- end -->

   <!--************ comentario **************-->
   <h1 class="heading"  data-tooltip="Deixe o seu comentario">comentario</h1>
   <section class="comentario" id="comentario">
      
      <div class="row">
         <div class="hero">
            <form method="POST" id="form-form" enctype="multipart/form-data">
               <div class="rows">
                  <div class="image-upload  box">
                     <img id="image-preview" src="" alt="">
                     <i class="fas fa-cloud-upload"></i>
                     <input type="file" name="foto" id="image-field" accept="imagem/jpg, imagem/jpeg, imagem/png">
                  </div>
               </div>   

               <div class="input-group">
                  <input type="text" name="nomeCom" required>
                  <label for="nomeCom"><i class="fas fa-user"></i> Nome</label>
               </div>
                    
               <div class="input-group">
                  <textarea id="comentario" name="comentario" rows="7" required></textarea>
                  <label for="comentario"><i class="fas fa-comments"></i> o seu comentario</label>
               </div>

               <div class="rows">
                  <div class="input-group">
                     <input type="text" name="estrelas" required>
                     <label for="estrelas"><i class="fas fa-star"></i>Estrelas de 1 - 5</label>
                  </div>
               </div>

               <div class="input-group">
                  <select name="nomeEs" id="nomeEs" class="input" hidden>
                     <option value="nomedoesp">nome dos espacos</option>
                  </select>
               </div>
               <center><button type="submit" value="COMENTAR" class="btn"><i class="fas fa-paper-plane"></i> COMENTAR</button></center>
            </form>
         </div>
      </div>
   </section>
   <!-- end -->

@endsection