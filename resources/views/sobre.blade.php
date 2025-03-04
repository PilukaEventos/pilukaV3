@extends('layouts.homeLayout')
@section('title','SOBRE')
@section('content')
    <!--************ sobre **************-->
    <section class="sobre" id="sobre">
        <h1 class="heading"  data-tooltip="um pouco sobre nós">sobre nós</h1>

        <div class="row">
            <div class="image">
                <img src="./img/dancing2.png" alt="Piluka">
            </div>
            <div class="content">
                <p> O Projecto Piluka Nasceu Em 2023 Com O Propósito De Colmatar O Espaço Entre As Aplicações Tradicionais De Divulgação De Espaços De Eventos. Orientado Para Funcionar Exclusivamente Online, O Piluka É Fruto Do Know-How E Experiência Da Nossa Equipa, Que Construiu Um Projeto Diferenciador. A Nossa Missão É Fornecer Aos Nossos Clientes Um Software Simples, Seguro E Acessível, Que Não Exige Formação E Que Pode Ser Usado Em Qualquer Lugar. Sem Contratos, Nem Complicações.</p>
                <p> O Piluka Encontra-Se Em Constante Evolução E É, Neste Momento, Um Software De Reserva De Salões De Eventos Online, Direcionado Ao Público De Luanda, Aos Diversos Stackholders (Fazedores).</p>
            </div>
        </div>
    </section>

    <!--************** Staff **************-->
    <section class="staff" id="staff">
        <h1 class="heading"  data-tooltip="a equipa do piluka">staff</h1>
        <div class="filterable_cards">
            <div class="card">
                <img src="./img/paulo.png" alt="Paulo">
                <div class="card_body">
                    <h6 class="card_title">Paulo Epalanga</h6>
                    <center><a class="card_text"><i class="fas fa-envelope "></i> mrx@piluka.com</center>   <br> <center><i class="fas fa-phone "> </i> +244 929 080 952</a></center>
                    <center><p class="card_text">Fullstack</p></center>
                </div>
            </div>

            <div class="card">
                <img src="./img/sofia.png" alt="Sofia">
                <div class="card_body">
                    <h6 class="card_title">Sófia Luis</h6>
                    <center><a class="card_text"><i class="fas fa-envelope "></i> sof@piluka.com</center>  <br><center> <i class="fas fa-phone "></i> +244 940 933 114</a></center>
                    <center><p class="card_text">Tecnica</p></center>
                </div>
            </div>

            <div class="card">
                <img src="./img/Sérgio1.png" alt="Sérgio">
                <div class="card_body">
                    <h6 class="card_title">Sérgio dos Santos Reis</h6>
                    <center><a class="card_text"><i class="fas fa-envelope "> </i> ser@piluka.com</center> <br> <center><i class="fas fa-phone "></i> +244 921 528 794</a></center>
                    <center><p class="card_text">Fullstack.</p></center>
                </div>
            </div>
        </div>
    </section>

   <!--************** perguntas **************-->
   <section class="perguntas" id="perguntas">

        <h1 class="heading"  data-tooltip="as perguntas mais frequentes">perguntas</h1>
        <div class="row">
            <div class="content">
                <div class="box active">
                <h3>Por que você deve investir em uma solução de marketing integrada?</h3>
                <p>Com o domínio das redes sociais sobre o comportamento dos usuários da internet o cenário do marketing mudou, ficou mais barato e centenas de milhares de empresas estão anunciando para seus clientes.</p>
                </div>

                <div class="box">
                <h3>Por que você deve investir em uma solução de marketing integrada?</h3>
                <p>Isso nos leva a uma concorrência alta pela atenção dos clientes, e por isso só fazer anúncios não trás o melhor resultado.</p>
                </div>

                <div class="box">
                <h3>Por que você deve investir em uma solução de marketing integrada?</h3>
                <p>Uma solução integrada passa por todas as etapas, desde trazer a atenção dos compradores até eles se tornarem clientes e continuarem comprando.</p>
                </div>

                <div class="box">
                <h3>Por que você deve investir em uma solução de marketing integrada?</h3>
                <p>de forma consistente e consciente para você obter o máximo de resultado com o investimento certo!</p>
                </div>

                <div class="box">
                <h3>quais são as formas de pagamento?</h3>
                <p>Multicaixa Express, BAI Directo, Deposito Bancário, Transferência Interbancária (ATM), dinheiro e Outros.</p>
                </div>
            </div>
        </div>
    </section>

    <!--************ contacto **************-->
    <section class="contacto" id="contacto">
        <h1 class="heading"  data-tooltip="entre em contacto para mais informações">contacto</h1>

        <div class="row">
            <div class="hero">
                <form method="POST" action="{{route('sent_email')}}" enctype="multipart-form-data">
                @csrf
                        <div class="input-group">
                            <input type="text" name="nomecompleto" id="nomecompletomsg" required>
                            <label for="nome"><i class="fas fa-user"></i> Nome</label>
                        </div>
                    <div class="rows">
                        <div class="input-group">
                            <input type="text" name="telefonemsg" id="numeromsg" required>
                            <label for="numero"><i class="fas fa-phone"></i> Contacto</label>
                        </div>
                    
                        <div class="input-group">
                            <input type="text" name="emailmsg" id="emailmsg" required>
                            <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        </div>
                    </div>
                     <div class="input-group">
                        <textarea id="mensagem" name="mensagem" rows="7" required></textarea>
                        <label for="mensagem"><i class="fas fa-comments"></i> A sua opinião</label>
                    </div>
                    <center><button type="submit" class="btn"><i class="fas fa-paper-plane"></i> SUBMIT</button></center>
                </form>
            </div>
        </div>
    </section>


@endsection