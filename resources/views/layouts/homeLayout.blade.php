
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- icon da pagina-->
    <link rel="icon" href="./img/dancing.ico" type="image/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&family=Playfair+Display:wght@400,500,700,900&display=swap">
    <!-- link font-awesome 6.0.0 css cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- lightgallery css cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- swiper js cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- custom css link -->
   
    <!-- link font-awesome 6.0.0 css cdn -->
    <link rel="stylesheet" href="./css/all.min.css">
   
    <!-- link lightgallery css cdn -->
    <link rel="stylesheet" href="./css/lightgallery.min.css">
   
    <!-- link swiper js cdn -->
    <link rel="stylesheet" href="./css/swiper-bundle.min.css">
   
    <!-- link custom css -->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/atualizacaonomenu.css">
    <link rel="stylesheet" href="./css/mobileMode.css">

    <title>@yield('title')</title>
   
</head>
<body>

    <!-- header -->
    <header class="header">

        <nav class="navbar" id="navbar">
            <!-- Sub Menu-->
            <nav id="categoria">
                <ul style="bg-color:grey;">
                    <hr/>   
                    <li><a href="#"><h6>Salões</h6></a></li> |
                    <li><a href="#"><h6>Decorações</h6></a></li> |
                    <li><a href="#"><h6>Fotografos</h6></a></li> |
                    <li><a href="#"><h6>Djs</h6></a></li>|
                    <li><a href="#"><h6>Buffet</h6></a></li>
                    <hr/>
                </ul>
            </nav>
            <!-- End Sub Menu-->
            <a href="./" class="logo"><img src="./img/dancing2.png"></a>
            <a href="./">home</a>
            <input type="checkbox" href="#" id="submenu">
            <label for="submenu"><a>Categoria</a></label>
            <!--a href="./servico">serviços</a>
            <a href="./salao">salões</a-->
            <a href="./home/sobre">sobre nós</a>
               <!--?php 
                  if (isset($informacoes)) {//tem uma sessão
               ?->
                    <a href="./admin/index">Admin</a>
                    <div>
                        <a href="#">
                           <--?php
                              echo $informacoes['nomeUsu'];
                           ?->
                        </a>
                    </div>
               <--?php		
                  }else {
               ?-->    
                <div>
                    <a href="./entrar">ENTRAR</a>
               <!--?php
                  }
               ?-->
                </div>
            <!--?php 
                  if (isset($informacoes)) {//tem uma sessão
               ->
                    <a href="#" class="profile">
                        <img src="./admin/assets/imagens/usuarios/<--?php echo $informacoes['foto_capa']; ?->">
                    </a>
                    <a href="./admin/sair">SAIR</a>
               <--?php
                  }
               ?-->
                <input type="checkbox" id="switch-mode" hidden>
                <label for="switch-mode" class="switch-mode"></label>
        </nav>
        <!-- Para que o swiper funcione -->
          <div class="navbarMobile">
            <input type="checkbox" id="chec" hidden>
            <label for="chec"><i class="fas fa-bars"></i></label>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode">switch-Mode</label>
            <div id="menu-Btn">
               <nav>
                  <ul>
                     <li><a href=""> HOME </a></li>
                     <li><a href=""> CATEGORIAS</a></li>
                     <li><a href=""> REGISTAR-SE </a></li>
                     <li><a href=""> SOBRE NOS</a></li>
                     <hr>
                     <li><a href=""> ENTRAR</a></li>
                     <hr>
                  </ul>
               </nav>
            </div>
         </div>
        <!-- NAVBAR -->
    </header>

    @yield('content')

    <!-- footer -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Links para Contacto</h3>
                <a href="#"> <i class="fas fa-phone"></i> +244-929-080-952 </a>
                <a href="#"> <i class="fas fa-envelope"></i> piluka@gmail.com</a>
                <a href="#"> <i class="fas fa-map"></i> luanda, angola</a>
            </div>

            <div class="box">
                <a href="./" class="logo"><img src="./img/dancing2.png"></a>
            </div>

            <div class="box">
                <h3>Links Rápidos</h3>
                <a href="./"> <i class="fas fa-arrow-right"></i> home</a>
                <!--a href="./salao"> <i class="fas fa-arrow-right"></i> salão</a>
                <a href="./servico"> <i class="fas fa-arrow-right"></i> serviços</a-->
                <a href="./sobre"> <i class="fas fa-arrow-right"></i> sobre nós</a>
            </div>

        </div>

        <div class="compartilhar">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-whatsapp"></a>
        </div>

        <div class="credit">
            <p>&copy; Copright 2023 Todos os Direitos Reservados </p>
            <p>Desenvolvido por </p>
            <span>PILUKA</span>
        </div>

    </section>

    <!-- end -->
    <!--script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!- lightgallery cdn js link ->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script-->
    
    <script src="./js/swiper-bundle.min.js"></script>
    <!-- lightgallery cdn js link -->
    <script src="./js/lightgallery.min.js"></script>
    <!-- jquery cdn js link -->
    <script src="./js/jquery.min.js"></script>
   
    <script src="./js/funcoes.js"></script>
    <script src="./js/atualizacaonomenu.js"></script>
    <script src="./js/home.js"></script>
    <script>
        lightGallery(document.querySelector('.gallery .gallery-container'));
    </script>
</body>
</html>
