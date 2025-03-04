@extends('layouts.homeLayout')
@section('title','BEM VINDO A ESTE ESPACO')
@section('content')

@if(session('Msgx'))
   {{session('Msgx')}}
@endif


@foreach($salao as $s)
   <!--************ sobre **************-->
   

   <section class="sobre" id="sobre">
      <h1 class="heading"  data-tooltip="um pouco sobre nós">Salão de Festas {{$s->nomeEsp}}</h1>
@if(session('Msgx'))
            
            <script>alert(`{{session('Msgx')}}`)</script>
            
@endif
      <div class="row">
         <div class="image">
               
               <img src="./img/{{$s->fotoEsp}}">
            
         </div>
            <div class="content">
                <p>Localização: <span>{{$s->moradaEsp}}</span></p>
                <p>Email: <span>{{$s->emailEsp}}</span> - Telefone: <span>{{$s->telefoneEsp}}</span></p>
                <p>Redes Sociais: <span>{{$s->redes}}</span></p>
                <p>Tipos de Eventos: <span>{{$s->descricaoEsp}}</span></p>
                <p>Coordenadas do Banco: <Span>BFA 0055.0000.9239.4542.1 &nbsp;&nbsp; BAI 0006.0000.9239.4542.1</Span></p>
            </div>

      </div>
   </section>
@endforeach   
   <!--************ sobre ends here ***************-->
   <!--************ planos **************-->   
   <section class="planos" id="planos">
      <h1 class="heading"  data-tooltip="um pouco sobre os nossos planos">Planos do Salão de Festa{{$salao[0]->nomeEsp}}</h1>
      <div class="row">
            <div class="content">

                  @foreach($planos as $plano)
                  <p>Nº Convidados: <span>{{$plano->numConv}}</span> - Estimativa: <span>{{$plano->precoPla}}</span></p>
                  @endforeach
                  <hr>
                  <center><h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero sapiente, quod earum incidunt mollitia sequi nulla tempora commodi? Nemo perferendis veniam ratione tempora suscipit blanditiis iusto enim provident culpa ducimus.</h4></center>
                  <br>
            </div>
      </div>
   </section>
   
   <!--************ planos ends here ***************-->

   <!-- reserva -->
   
   <section class="reserva" id="reserva">

      <h1 class="heading"  data-tooltip="Selecione um dos dias disponiveis para eventos">reserve agora</h1>
      <div>
         <form method="GET" action="/reservar" enctype="multipart/form-data">
         @csrf
            <div class="container">

               <div class="box">
                  <p>Nome Completo<span>*</span></p>
                  <input type="text" name="nomeCli" id="nomeCli" class="input" placeholder="O seu Nome Completo" required>
               </div>

               <div class="box">
                  <p>Contacto <span>*</span></p>
                  <input type="text" name="telefoneCli" id="telefoneCli" class="input" placeholder="O seu Contacto" required>
               </div>

               <div class="box">
                  <p>Email <span>*</span></p>
                  <input type="email" name="emailCli" id="emailCli" class="input" placeholder="O seu Email" required>
               </div>

               <div class="box">
                  <p>data evento<span>*</span></p>
                  <input type="date" name="dataEve" id="dataEve" class="input" required>
               </div>

               <div class="box">
                  <p>Espaco <span>*</span></p>
                  <input type="text" name="nomedoespaco" id="nomeEsp" class="input" value="{{$salao[0]->nomeEsp}}" required>
               </div>

               <div class="box">
                  <p>tipo evento <span>*</span></p>
                  <input type="text" name="tipoEve" id="tipoEve" class="input" placeholder="O tipo de evento" required>
               </div>

               <div class="box">
                  <p>nº convidados <span>*</span></p>
                  <input type="number" name="numConv" id="numConv" class="input" placeholder="O nº de convidados" required>
               </div>

               <div class="box">
                  <p>Marque os serviços desejados <span>*</span></p>
                  <fieldset>
                     <i class="fa-solid fa-music" onclick="servp1()" id="servp1"> Musica</i><input type="checkbox"  name="servicos[]" value="Musica" checked id="servcheck1">
                        
                     <i class="fa-solid fa-utensils" onclick="servp2()" id="servp2"> Buffet</i><input type="checkbox"  name="servicos[]" value="Buffet" checked  id="servcheck2">
                        
                        <i class="fa-solid fa-truck-fast" onclick="servp3()" id="servp3"> decoracao</i><input type="checkbox" name="servicos[]" value="decoracao" checked id="servcheck3">
                        
                        <i class="fa-solid fa-martini-glass" onclick="servp4()" id="servp4"> Bebidas</i><input type="checkbox" name="servicos[]" value="Bebidas" checked id="servcheck4" >
                         <br>
                        <i class="fa-solid fa-cart-plus" onclick="servp5()" id="servp5"> Outros</i><input type="checkbox" name="servicos[]" value="Outros" checked id="servcheck5" >
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
               <a href="/img/{{$fotos[$i]->nomeImg}}" class="box">   
                  <img src="/img/{{$fotos[$i]->nomeImg}}" alt="">
                  <div class="icon"> <i class="fas fa-plus"></i></div>
               </a>  
            @endfor
   
         </div>   

   </section>
   <!-- end -->
    

   <!-- Eventos Realizados -->
   
   <!-- end -->

   <!-- servicos -->

   <section class="servicos">
         <h1 class="heading"  data-tooltip="os nossos serviços">Nossos Parceiros</h1>
        <div class="swiper room-slider">
            <div class="swiper-wrapper">
                @if (empty($servicos))
                    <p>Ainda não há servicos registrados aqui!</p>
                @else
                    @foreach ($servicos as $Serv)
                    
                        <div class="swiper-slide slide">
                            
                            <div class="image">
                                    <img src="/img/{{$Serv->fotoCapa}}" alt="{{$Serv->nomeServ}}">
                            </div>
                            <div class="content"><br/>
                                <h3><span>{{$Serv->nomeServ}}</span></h3>
                                <p>Contacto: <span>{{$Serv->telefoneFor}}</span></p>
                                <p>Sobre: <span>{{$Serv->descricaoServ}}</span></p><br>
                                <center><a href="/servico?id={{ $Serv->idServ}}" class="btn">saiba mais</a></center>
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
               <h3>5.	Quais são as formas de pagamento disponiveis? </h3>
               <p>Multicaixa Express, Transferencia Por Iban, TPA, Depositos Bancarios</p>
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
                  <label for="nomeCom"><i class="fas fa-user"></i> Nome Completo</label>
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