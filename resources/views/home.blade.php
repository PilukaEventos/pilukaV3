@extends('layouts.homeLayout')
@section('title', 'Sistema de Gestão de Salões de Eventos e Serviços - PILUKA')
@section('content')

    <!-- home -->
    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background: url(/img/LagoAzul/LagoAzul1.jpg) no-repeat;">
                    <div class="content">
                        <h3>aqui é onde os sonhos se tornam realidade</h3>
                        <a href="/salao" class="btn"> visite nossa oferta</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(/img/LagoAzul/Lago-Azul2.jpg) no-repeat;">
                    <div class="content">
                        <h3>aqui é onde os sonhos se tornam realidade</h3>
                        <a href="/salao" class="btn"> visite nossa oferta</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(/img/imgZuka/salaoCivil.jpg) no-repeat;">
                    <div class="content">
                        <h3>aqui é onde os sonhos se tornam realidade</h3>
                        <a href="/salao" class="btn"> visite nossa oferta</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(/img/Tropicalissimo/tropicalissimo1.jpg) no-repeat;">
                    <div class="content">
                        <h3>aqui é onde os sonhos se tornam realidade</h3>
                        <a href="/salao" class="btn"> visite nossa oferta</a>
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-scrollbar"></div>
        </div>

    </section>
    <!-- end -->
        @if(session('Msgx'))
            <div class="Msgx">
                <center><p>{{session('Msgx')}}</p></center>
            </div>
        @endif
    <!-- disponibilidade começa aqui -->
    <section class="disponibilidade" id="disponibilidade">
        <h1 class="heading"  data-tooltip="veja a disponibilidade da sua data desejada">disponibilidade</h1>

        <div class="row">
            <div class="hero">
                <form action="/" method="GET">
                    @csrf
                    <div class="rows">
                        <div class="input-group">
                                <input type="date" name="date" id="dataEvento" required>
                                <label for="dataEvento"> data do evento</label>
                        </div>

                        <div class="input-group">
                                <select name="nomeSalao" id="nomeSalao" class="input">
                                    <option value="0">Selecionar</option>
                                    @foreach($espacos as $e)
                                        <option value="{{$e->nomeEsp}}" {{old('nomeEsp') == $e->idEsp ? 'Selected' : ''}}>{{$e->nomeEsp}}</option>
                                    @endforeach
                                </select>
                                <label for="nomeSalao">Salão</label>
                        </div>
                    
                        <div class="input-group">
                            <input type="number" id="numconv" required>
                            <label for="numconv"> Nº de Convidados</label>
                        </div>
                    
                        <div class="input-group">
                            <input type="text" id="tipoEvento" required>
                            <label for="tipoEvento">tipo de Evento</label>
                        </div>
                    </div>

                    <center><button type="submit" class="btn"><i class="fas fa-paper-plane"></i>RESERVAR</button></center>
                </form>
            </div>
        </div>      
         
                    @if(isset($dataBD))
                           <script>
                                alert(' <p>A data escolhida: {{$dataBD}} , não está disponivel neste salão, por favor tente outra data ou salão.</p>');
                           </script>
                    
                    @elseif(isset($Msgxs))
                        <script>
                            alert('{{$Msgxs}}');
                        </script>   
                    @else
                        
                    @endif
                    
    </section>
    <!-- disponibilidade termina aqui -->

    <!-- saloes -->
    <section class="salao" id="salao">
        <h1 class="heading"  data-tooltip="os nossos salões de eventos">salões</h1>
        <div class="swiper room-slider">
            <div class="swiper-wrapper">
                @if (empty($espacos))
                    <p>Ainda não há salões registrados aqui!</p>
                @else
                    @foreach ($espacos as $v)
                    
                        <div class="swiper-slide slide">
                            
                            <div class="image">
                                
                                    <img src="/img/teste/{{$v->fotoEsp}}" alt="{{$v->nomeEsp}}">
            
                            </div>
                            <div class="content"><br/>
                                <h3>{{$v->nomeEsp}}</h3>
                                <p>Sobre: <span>{{$v->descricaoEsp}}</span></p><br>
                                <p>Contacto: <span>{{$v->telefoneEsp}}</span></p><br>
                                <center><a href="/salao?id={{ $v->idEsp}}" class="btn">saiba mais</a></center>
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

    <!-- servicos -->

    <section class="servicos" id="servicos">
        <h1 class="heading"  data-tooltip="os nossos serviços">serviços</h1>
        <div class="swiper room-slider">
            <div class="swiper-wrapper">
                @if (empty($Servicos))
                    <p>Ainda não há servicos registrados aqui!</p>
                @else
                    @foreach ($Servicos as $Serv)
                    
                        <div class="swiper-slide slide">
                            
                            <div class="image">
                                    <img src="/img/teste/{{$v->fotoEsp}}" alt="{{$v->nomeEsp}}">
                            </div>
                            <div class="content"><br/>
                                <h3>{{$Serv->nomeServ}}</h3>
                                <p>Sobre: <span>{{$Serv->descricaoServ}}</span></p><br>
                                <p>Contacto: <span>{{$Serv->telefoneServ}}</span></p><br>
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

    <!-- opniao -->
    <h1 class="heading"  data-tooltip="os comentários dos nossos clientes">análise dos clientes</h1>
    <section class="opniao" id="opniao">
         


            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        

    </section>
    <!-- end -->
               
@endsection