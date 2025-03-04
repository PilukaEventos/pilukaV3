@extends('layouts.homeLayout')
@section('title','MENSAGEM')
@section('content')
 
    <section class="contacto" id="contacto">
        <h1 class="heading"></h1>
        
    </section>
    <!--************ contacto **************-->
    <section class="contacto" id="contacto">
        <h1 class="heading"  data-tooltip="entre em contacto para mais informações">Escreva uma bela mensagem</h1>


        <div class="row">
            <div class="hero">
                <form method="POST" action="{{route('sent_email')}}" enctype="multipart-form-data">
                @csrf
                        <div class="input-group">
                            <input type="text" name="nomecompleto" id="nomecompletomsg" required>
                            <label for="nome"><i class="fas fa-user"></i> Nome Completo</label>
                        </div>
                    <div class="rows">
                        <div class="input-group">
                            <input type="text" name="telefonemsg" id="numeromsg" required>
                            <label for="numero"><i class="fas fa-phone"></i> telemovel</label>
                        </div>
                    
                        <div class="input-group">
                            <input type="text" name="emailmsg" id="emailmsg" required>
                            <label for="email"><i class="fas fa-envelope"></i>Seu email</label>
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

   <!--************** perguntas **************-->
   <section class="perguntas" id="perguntas">

        <h1 class="heading"  data-tooltip="as perguntas mais frequentes">perguntas frequentes</h1>
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
@endsection