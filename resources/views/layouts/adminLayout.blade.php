<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- page icon -->
        <link rel="icon" href="/img/icones/dancing.ico" type="image/x-icon">

        <title>@yield('title')</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"-->

        <!-- Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- My CSS -->
        <link rel="stylesheet" href="/css/admin.css">
    </head>
    <body>
@if(session('user_info'))
        <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="./.php" class="brand">
                <img src="../img/dancing2.png" alt="logo do piluka">
                <span class="text">PILUKA</span>
            </a>
                <!--?php
                    if (isset($_SESSION['id_admin'])) {
                ?-->
                        <ul class="side-menu top">
                            <li class="active">
                                <a href="/">
                                    <i class='bx bxs-dashboard' ></i>
                                    <span class="text">Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="/agendar">
                                    <i class='bx bxs-calendar' ></i>
                                    <span class="text">Agendar</span>
                                </a>
                            </li>
                            <li>
                                <a href="/servicos">
                                    <i class='bx bxs-wrench' ></i>
                                    <span class="text">Serviços</span>
                                </a>
                            </li>
                            <li>
                                <a href="/espaco">
                                    <i class='bx bxs-institution' ></i>
                                    <span class="text">Salões</span>
                                </a>
                            </li>
                            <li>
                                <a href="/clientes">
                                    <i class='bx bxs-user' ></i>
                                    <span class="text">Clientes</span>
                                </a>
                            </li>
                            <li>
                                <a href="/funcionarios">
                                    <i class='bx bxs-user-detail' ></i>
                                    <span class="text">Funcionarios</span>
                                </a>
                            </li>
                            <li>
                                <a href="/usuarios">
                                    <i class='bx bxs-user' ></i>
                                    <span class="text">Usuarios</span>
                                </a>
                            </li>
                            <li>
                                <a href="/realizados">
                                    <i class='bx bxs-detail' ></i>
                                    <span class="text">Realizados</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="side-menu">
                            <li>
                                <a href="/home">
                                    <i class='bx bxs-home' ></i>
                                    <span class="text">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" onclick="return confirm('tem a certeza que deseja terminar sessão ?')" class="logout">
                                    <i class='bx bxs-door-open' ></i>
                                    <span class="text">Sair</span>
                                </a>
                            </li>
                        </ul>
    
                    </section>                 
                    @elseif (session('cliente_info')) 
                     <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="./.php" class="brand">
                <img src="../img/dancing2.png" alt="logo do piluka">
                <span class="text">PILUKA</span>
            </a>
                <!--?php
                    if (isset($_SESSION['id_admin'])) {
                ?-->
                        <ul class="side-menu top">
                            <li class="active">
                                <a href="/">
                                    <i class='bx bxs-dashboard' ></i>
                                    <span class="text">Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="/agendar">
                                    <i class='bx bxs-calendar' ></i>
                                    <span class="text">Agendar</span>
                                </a>
                            </li>
                            <li>
                                <a href="/clientes">
                                    <i class='bx bxs-user' ></i>
                                    <span class="text">Clientes</span>
                                </a>
                            </li>

                            <li>
                                <a href="/realizados">
                                    <i class='bx bxs-detail' ></i>
                                    <span class="text">Realizados</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="side-menu">
                            <li>
                                <a href="/home">
                                    <i class='bx bxs-home' ></i>
                                    <span class="text">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" onclick="return confirm('tem a certeza que deseja terminar sessão ?')" class="logout">
                                    <i class='bx bxs-door-open' ></i>
                                    <span class="text">Sair</span>
                                </a>
                            </li>
                        </ul>
                    </section>                        
                    @else 
                        <ul class="side-menu top">
                            <li class="active">
                                <a href="/">
                                    <i class='bx bxs-dashboard' ></i>
                                    <span class="text">Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="/agendar">
                                    <i class='bx bxs-calendar' ></i>
                                    <span class="text">Agendados</span>
                                </a>
                            </li>
                            <li>
                                <a href="/realizados">
                                    <i class='bx bxs-detail' ></i>
                                    <span class="text">Realizados</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="side-menu">
                            <li>
                                <a href="../home">
                                    <i class='bx bxs-home' ></i>
                                    <span class="text">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="/sair" class="logout">
                                    <i class='bx bxs-door-open' ></i>
                                    <span class="text">Sair</span>
                                </a>
                            </li>
                        </ul>
                @endif
        </section>
        <!-- END OF SIDEBAR -->

        <!-- CONTENT -->
        <section id="content">
            <!-- NAVBAR -->
            <nav>
                <i class='bx bx-menu' ></i>
                <!--?php 
                    if (isset($informacoes)) {//tem uma sessão
                ?-->
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="Pesquisar...">
                        <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                    </div>
                </form>
                <a href="/clientes" class="notification">
                <!--?php 
                        if (count($cliente) > 0) {
                ?>
                            <i class='bx bxs-user' ></i>
                <--?php
                            foreach($cliente as $c) {
                ?>
                                <span class="num"><-?php echo $c['numCli']; ?--></span>
                <!--?php   		
                            }
                        }else {
                ?-->
                            <i class='bx bxs-user' ></i>
                            <span class="num">0</span>
                <!--?php   }
                ?-->
                </a>
                <a href="./agendar" class="notification">
                <!--?php 
                        if (count($agen) > 0) {
                ?>
                            <i class='bx bxs-calendar' ></i>
                <--?php
                            foreach($agen as $a) {
                ?>
                                <span class="num"><-?php echo $a['numAgen']; ?></span>
                <--?php   		
                            }
                        }else {
                ?-->
                            <i class='bx bxs-calendar' ></i>
                            <span class="num">0</span>
                <!--?php   }
                ?-->
                </a>
                <a href="/comentarios" class="notification">
                <!--?php 
                        if (count($comen) > 0) {
                ?>
                            <i class='bx bxs-inbox' ></i>
                <--?php
                            foreach($comen as $c) {
                ?>
                                <span class="num"><-?php echo $c['numCom']; ?></span>
                <-?php   		
                            }
                        }else {
                ?-->
                            <i class='bx bxs-inbox' ></i>
                            <span class="num">0</span>
                <!--?php   }
                ?-->
                </a>
                
                    <a href="#" class="nav-link">
                        <!--?php
                            echo $informacoes['nomeUsu'];
                        ?-->
                    </a>
                    <a href="#" class="profile">
                        <img src="/imagens/usuarios/<!--?php echo $informacoes['foto_capa']; ?-->">
                    </a>
                <!--?php   
                    }
                ?-->
                <input type="checkbox" id="switch-mode" hidden>
                <label for="switch-mode" class="switch-mode"></label>
            </nav>
            <!-- NAVBAR -->        
            

        <!-- JavaScript -->
        <script src="/js/admin.js"></script>

        @yield('content')
 
        <!--section class="footer">  
            <div class="credit">
                <p>&copy; Copright 2023 Todos os Direitos Reservados </p>
                <span>PILUKA</span>
            </div>
        </section-->
    </body>
</html>