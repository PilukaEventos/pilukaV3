
@extends('layouts.homeLayout')
@section('title','Prestadores de servicos')
@section('content')

   <!-- sobre -->
   <section class="sobre" id="sobre">
      <h1 class="heading"  data-tooltip="um pouco sobre nós">Sérviço de {{$Servicos[0]->nomeServ}}</h1>

      <div class="row">

         <div class="image">
            <img src="./img/{{$Servicos[0]->fotoCapa}}" alt="{{$Servicos[0]->idServ}}">
         </div>

         <div class="content">
            <p>Nome Forneçedores: <span>{{$Servicos[0]->nomeFor}}</span></p>
            <p>Email: {{$Servicos[0]->emailFor}} <span></span> - Telefone: <span>{{$Servicos[0]->telefoneFor}}</span></p>
            <p>Tipos de Eventos: <span>{{$Servicos[0]->descricaoServ}}</span></p>
            <hr/>
                <p>Coordenadas do Banco: <Span>BFA 0055.0000.9239.4542.1 &nbsp;&nbsp; BAI 0006.0000.9239.4542.1</Span></p>
         </div>

      </div>

   </section>
   <!-- sobre ends here -->

      <!--************ planos **************-->
      <section class="planos" id="planos">
      <h1 class="heading"  data-tooltip="um pouco sobre os nossos planos">Nossos Planos - {{$Servicos[0]->nomeServ}}</h1>

      <div class="row">
            <div class="content">
               <!--?php
                  foreach ($salao as $s) {
               ?-->
               <center>
                  <p>Nº Convidados: <span><!--?php echo $s['numConv']; ?--></span> - Preço: <span><!--?php echo $s['precoPla']; ?--></span></p>
               </center>
               <!--?php	
                  }
               ?-->
            </div>
      </div>
   </section>
   <!--************ planos ends here ***************-->

   <!-- reserva -->

   <section class="reserva" id="reserva">

      <h1 class="heading"  data-tooltip="Selecione um dos dias disponiveis para eventos">reserve agora</h1>
      <div>
         <form method="POST" action="/reservar" enctype="multipart/form-data">
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
                  <p>salão <span>*</span></p>
                  <input type="text" name="nomeEsp" id="dataEve" class="input" placeholder="Digite o nome do espaco">
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
                        
                     <i class="fa-solid fa-utensils" onclick="servp2()" id="servp2"> Buffet</i><input type="checkbox"  name="servicos[]" value="Buffet"  id="servcheck2">
                        
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
            <button value="RESERVAR" class="btn" disabled="disabled" ><i class="fas fa-paper-plane">CONFIRMAR RESERVAR</i></button>
         </form>
      </div>
   </section>
   <!-- end -->

   <!-- servicos -->
   <section class="servicos" id="servicos">

      <h1 class="heading"  data-tooltip="serviços realizados em eventos">eventos</h1>

      <div class="swiper room-slider">
         <div class="swiper-wrapper">
         @if (empty($agendamentos))
         
               <p class="heading"><?php echo 'Ainda não há registro de eventos Realizados aqui!'; ?></p>
          @else
                        @foreach ($agendamentos as $EveRealizados) 
         
                  <div class="swiper-slide slide">
                     <div class="image">
                        <img src="./img/imagens/eventos/{{$EveRealizados->nomeEve}}.jpg" alt="">
                     </div>
                     <div class="content">
                                 <h3>{{$EveRealizados->nomeEve}}</h3>
                                <p>Sobre: <span>{{$EveRealizados->descricaoEsp}}</span></p><br>
                                <p>Contacto: <span>{{$EveRealizados->telefoneEsp}}</span></p><br>
                        <div class="stars">
                           <!--?php
                              for ($i=0; $i < $comentario['estrelas']; $i++) {
                           ?-->      
                                 <i class="fas fa-star"></i>
                           <!--?php
                              } 
                           ?-->
                        </div>
                        <center><a href="./eventos?id={{$EveRealizados->idEve}}" class="btn">ver fotos</a></center>
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
                  <input type="text" name="nome" id="nome" required>
                  <label for="nome"><i class="fas fa-user"></i> Nome</label>
               </div>
                    
               <div class="input-group">
                  <textarea name="comentario" id="comentario" rows="7" required></textarea>
                  <label for="comentario"><i class="fas fa-comments"></i> o seu comentario</label>
               </div>

               <div class="rows">
                  <div class="input-group">
                     <input type="text" name="estrelas" id="estrelas" required>
                     <label for="estrelas"><i class="fas fa-star"></i>Estrelas de 1 - 5</label>
                  </div>
               </div>

               <div class="input-group">
                  <select name="nome" id="nome" class="input" hidden>
                     <option value="<!--?php echo $saloes['idServ']; ?-->"><!--?php echo $saloes['nomeServ']; ?--></option>
                  </select>
               </div>
               <center><button type="submit" value="COMENTAR" class="btn"><i class="fas fa-paper-plane"></i> COMENTAR</button></center>
            </form>
         </div>
      </div>
   </section>
   <!-- end -->

@endsection


<!-- ======================= CODIGO PHP PARA RESERVA ==========================-->
<!--?php
    //1 - Verificar se ela apertou o botão registrar - ok
    //2 - Guardar dados dentro de variaveis
    //3 - Enviar Dados colhidos para a classe, funcao registrar
    //4 - Verificar o retorno false ou true
    // o htmlentities e addslashes e para evitar injeção html e sql

    /*if (isset($_POST['nomeCli'])) {
      $nomeCli = htmlentities(addslashes($_POST['nomeCli']));
      $telefoneCli = htmlentities(addslashes($_POST['telefoneCli']));
      $emailCli = htmlentities(addslashes($_POST['emailCli']));
      $dataEve = htmlentities(addslashes($_POST['dataEve']));
      $nomeEsp = htmlentities(addslashes($_POST['nomeEsp']));
      $tipoEve = htmlentities(addslashes($_POST['tipoEve']));
      $numConv = htmlentities(addslashes($_POST['numConv']));
      $servicos = htmlentities(addslashes($_POST['servicos']));
      $dataVisita = htmlentities(addslashes($_POST['dataVisita']));
      $idEsp = htmlentities(addslashes($_POST['idEsp']));
      
      
		//verificar se foi preenchido todos os campos
      if (!empty($nomeCli) && !empty($telefoneCli) && !empty($emailCli) 
         && !empty($dataEve) && !empty($nomeEsp) && !empty($tipoEve)
         && !empty($numConv) && !empty($servicos) && !empty($dataVisita)) {
        /*    
         for($i = 0; $i < count($servicos); $i++){
          $servicos[$i];     
         

         }*/
      /*      require_once './admin/classes/classe_reserva.php';
            $r = new Reserva("bd_piluka", "localhost", "root", "");
   
            if($r->registrarReserva($nomeCli, $telefoneCli, $emailCli, $dataEve, $nomeEsp, $tipoEve, $numConv, $servicos, $dataVisita)){
   ?>
                  <script type="text/javascript">
                     alert('Reserva Efeituada com sucesso!');
                  </script-->
   <!--?php
            }else {
?>
                <script type="text/javascript">
                    alert('Data já reservada!')
                </script-->
<!--?php
            }        
      }else {
   ?>
         <script type="text/javascript">
               alert('Preencha os campos obrigatórios')
         </script-->
<!--?php
    }
}
?-->
 
      
      <!-- ======================= CODIGO PHP PARA COMENTARIOS ==========================-->
      <!--?php
          //1 - Verificar se ela apertou o botão registrar - ok
          //2 - Guardar dados dentro de variaveis
          //3 - Enviar Dados colhidos para a classe, funcao registrar
          //4 - Verificar o retorno false ou true
          // o htmlentities e addslashes e para evitar injeção html e sql
      
          if (isset($_POST['nomeCom'])) {
            $nomeCom = htmlentities(addslashes($_POST['nomeCom']));
            $estrelas = htmlentities(addslashes($_POST['estrelas']));
            $comentario = htmlentities(addslashes($_POST['comentario']));
            $nome = htmlentities(addslashes($_POST['nome']));
            $fotos = array();
      
            if (isset($_FILES['foto'])) {
                  //salvar dentro da pasta imagens 
                  $nome_arquivo = $_FILES['foto']['name'];
                  move_uploaded_file($_FILES['foto']['tmp_name'], './admin/assets/imagens/comentarios/'.$nome_arquivo);
                  //salvar nomes para enviar para o banco de dados 
                  array_push($fotos, $nome_arquivo);
            }
      
            //verificar se foi preenchido todos os campos
            if (!empty($nomeCom) && !empty($estrelas) && !empty($comentario) && !empty($nome)) {
                     require_once './admin/classes/classe_comentario.php';
                     $c = new Comentario("bd_piluka", "localhost", "root", "");
                      
                     $c->registrarComentario($nomeCom, $estrelas, $comentario, $fotos, $nome);
         ?>
                        <script type="text/javascript">
                           alert('Comentario Registrado com sucesso!'); 
                           window.location.href="./index.php";
                        </script-->
         <!--?php          
            }else {
         ?>
               <script type="text/javascript">
                     alert('Preencha os campos obrigatórios')
               </script-->
   <!--?php
          }
      }
   ?-->