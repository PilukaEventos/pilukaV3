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
    @if(session('user_info')[0]->tipo=="Admin")
        <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="./admin" class="brand">
                <img src="../img/dancing2.png" alt="logo do piluka">
                <span class="text">PILUKA</span>
            </a>
                
                     
            
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
                            <li>
                                <a href="/galerias">                                    
                                <i class='bx bx-images' ></i>
                                    <span class="text">&nbsp;Galeria</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="/home">
                                <i class="bx bxs-chart"></i>
                                    <span class="text">&nbsp;Negocio</span>
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

                    
        <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="./admin" class="brand">
                <img src="../img/dancing2.png" alt="logo do piluka">
                <span class="text">PILUKA</span>
            </a>
                
                     
            
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
                            <li>
                                <a href="/galerias">                                    
                                <i class='bx bx-images' ></i>
                                    <span class="text">&nbsp;Galeria</span>
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
                    @endif
                    @elseif (session('cliente_info')) 
                     <!-- SIDEBAR -->
        <section id="sidebar">
            <a href="/" class="brand">
                <img src="../img/dancing2.png" alt="logo do piluka">
                <span class="text">PILUKA</span>
            </a>
              
                        <ul class="side-menu top">
                            <li class="active">
                                <a href="{{route('areadeclientes')}}">
                                    <i class='bx bxs-dashboard' ></i>
                                    <span class="text">Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="/areadeclientes#confirmados">
                                    <i class='bx bxs-calendar' ></i>
                                    <span class="text">Aprovados</span>
                                </a>
                            </li>
                            <li>
                                <a href="/mensagem">
                                    <i class='bx bxs-inbox'></i>
                                    <span class="text">Mensagem</span>
                                </a>
                            </li>

                            <li>
                                <a href="/realizados">
                                    <i class='bx bxs-detail' ></i>
                                    <span class="text">Realizados</span>
                                </a>
                            </li>
                            <li>
                                <a href="/perfil">
                                    <i class='bx bxs-user' ></i>
                                    <span class="text">Perfil</span>
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
                    
                    
                    @elseif(session('forn_info'))
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
                @else
                <h3><a href="/"><span>Voltar para home</span></a></h3>
                @endif
        </section>
        <!-- END OF SIDEBAR -->

        <!-- CONTENT -->
        <section id="content">
            <!-- NAVBAR -->
            <nav>
                <i class='bx bx-menu' ></i>
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="Pesquisar...">
                        <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                    </div>
                </form>
                <a href="/clientes" class="notification">
                            <i class='bx bxs-user' ></i>
                            <span class="num">0</span>
                </a>
                <a href="./agendar" class="notification">
                            <i class='bx bxs-calendar' ></i>
                            <span class="num">0</span>
               </a>
                <a href="/comentarios" class="notification">
                            <i class='bx bxs-inbox' ></i>
                            <span class="num">0</span>

                </a>
                
                    <a href="#" class="nav-link">

                    </a>
                    @if(session('user_info'))
                        <a href="#" class="profile">
                            <img src="/img/teste/perfil.png">
                        </a>
                    @elseif(session('cliente_info'))
                            @if(empty($fotosDePerfil))

                            <a href="/perfil" class="profile">
                                    
                                    <img src="/img/teste/perfil.png">
                                </a>
                            @else
                                <a href="/admin" class="profile">
                                    <img src="/img/teste/{{$fotosDePerfil[0]->nomeImg}}">
                                </a>
                            
                            @endif
                    @endif
                <!--?php   
                    }
                ?-->
                <input type="checkbox" name="switch-mode" id="switch-mode" hidden>
                <label for="switch-mode" class="switch-mode"></label>
            </nav>
            <!-- NAVBAR -->        
            

        <!-- JavaScript -->
        <script src="/js/admin.js"></script>

        
        @yield('content')

    </body>
</html>