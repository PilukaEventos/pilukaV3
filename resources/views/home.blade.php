@extends('layouts.homeLayout')
@section('title', 'Sistema de Gestão de Salões de Eventos e Serviços PILUKA')
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

    <!-- disponibilidade começa aqui -->
    <section class="disponibilidade" id="disponibilidade">
        <h1 class="heading"  data-tooltip="veja a disponibilidade da sua data desejada">disponibilidade</h1>
        <form method="POST">
            <div class="container">
                <div class="box">
                    <p>data do evento <span>*</span></p>
                    <input type="date" name="dataEve" id="dataEve" class="input">
                </div>

                <div class="box">
                    <p>salão <span>*</span></p>
                    <select name="nomeEsp" id="nomeEsp" class="input">
                        <option value="0">Selecionar</option>
                        <!--?php
                            if (empty(isset($espacos))) {
                                echo 'Ainda não há salões registrados aqui!';
                            }else {
                                foreach ($espacos as $value) {
                        ?>
                                <option value="<!?php echo $value['idEsp']; ?>"><!?php echo $value['nomeEsp']; ?></option>
                          
                        <!?php
                                }
                            }
                        ?-->
                    </select>
                </div>

                <div class="box">
                    <p>nº convidados <span>*</span></p>
                    <input type="number" name="numconv" class="input" placeholder="O nº de convidados">
                </div>

                <div class="box">
                    <p>tipo evento <span>*</span></p>
                    <input type="text" class="input" name="tipoEve"placeholder="O tipo de evento">
                </div>
            </div>
         
            <button type="submit" class="btn">verificar disponibilidade</button>
         
        </form>
    </section>
    <!-- disponibilidade termina aqui -->
   
    <!-- saloes -->
    <section class="salao" id="salao">
        <h1 class="heading"  data-tooltip="os nossos salões de eventos">salões</h1>
        <div class="swiper room-slider">
            <div class="swiper-wrapper">
            <!--?php
				    if (empty($espacos)) {
                echo 'Ainda não há salões registrados aqui!';
                }else {
                foreach ($espacos as $value) {
            ?-->
                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="/admin/assets/imagens/saloes/<!--?php echo $value['foto_capa']; ?-->" alt="">
                        </div>
                        <div class="content"><br/>
                            <h3><!--?php echo $value['nomeEsp']; ?--></h3>
                            <p>Sobre: <span><!--?php echo $value['descricaoEsp']; ?--></span></p><br>
                            <div class="stars">
                            <!--?php
                                for ($i=0; $i < $comentario['estrelas']; $i++) {
                            ?>      
                                    <i class="fas fa-star"></i>
                            <!?php
                                } 
                            ?-->
                            </div>
                            <center><a href="/salao?id=<!--?php echo $value['idEsp']; ?-->" class="btn">saiba mais</a></center>
                        </div>
                    </div>
			    <!--?php
				    }
                }
            ?-->
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!-- end -->

    <!-- servicos -->

    <section class="servicos">
        <h1 class="heading"  data-tooltip="os nossos serviços">serviços</h1>
        <div class="swiper room-slider">
            <div class="swiper-wrapper">
            <!--?php
				    if (empty($servico)) {
                echo 'Ainda não há serviços registrados aqui!';
                }else {
				    foreach ($servico as $value) {
            ?-->

                <div class="swiper-slide slide">
                <div class="image">
                    <img src="/admin/assets/imagens/servicos/<!--?php echo $value['foto_capa']; ?-->" alt="">
                </div>
                <div class="content"><br/>
                    <h3><!--?php echo $value['nomeServ']; ?--></h3>
                    <p>Sobre: <span><!--?php echo $value['descricaoServ']; ?--></span></p>
                    <p>Fornecedor: <span><!--?php echo $value['nomeFor']; ?--></span></p><br>
                    <div class="stars">
                        <!--?php
                            for ($i=0; $i < $comentario['estrelas']; $i++) {
                        ?>      
                            <i class="fas fa-star"></i>
                        <!?php
                            } 
                        ?-->
                    </div>
                    <center><a href="/servico?id=<!--?php echo $value['idServ']; ?-->" class="btn">saiba mais</a></center>
                </div>
                </div>
			    <!--?php
				    }
            }
            ?-->
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
         

        <div class="swiper opniao-slider">
            <div class="swiper-wrapper">
			    <!--?php 
                foreach ($espacos as $e)
                foreach ($comentarios as $c) {
			    ?-->
                <div class="swiper-slide slide">
                <div class="user">
                    <img src="/admin/assets/imagens/comentarios/<!--?php echo $c['nomeImg']; ?-->" alt="">
                    <div class="user-info">
                        <h3><!--?php echo $c['nomeCom']; ?--></h3>
                        <div class="icon">
                            <a href="#"> <i class="fas fa-calender"></i>
                            <!--?php $data = new DateTime($c['dia']); echo $data->format('d/m/Y'); echo " - "; ?--><!--?php echo $c['horario']; ?--></a>
                        </div>
                        <div class="stars">
                            <!--?php
                            for ($i=0; $i < $c['estrelas'] ; $i++) {
                            ?>      
                                <i class="fas fa-star"></i>
                            <!?php
                            } 
                            ?-->
                        </div>
                    </div>
                </div>
                <i class="fas fa-quote-left"></i>
                <p>O Salão <!--?= $e['nomeEsp']; ?--> é <!--?php echo $c['comentario']; ?--></p>
                <i class="fas fa-quote-right"></i>
                </div>
                <!--?php        
                    }
                ?-->

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </section>
    <!-- end -->
               
@endsection