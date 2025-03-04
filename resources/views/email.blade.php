



@if(session('email_reserva'))


--------- BEM VINDO AO PILUKA EVENTOS ------------
<br>
Este é um email de Reserva:

<h2>Nome do Responsavel: {{$data['nomeCli']}}</h2>
<hr>
<h2>Telefone: {{$data['telefoneCli']}}</h2>
<hr>
<h2>Endereço de email: {{$data['emailCli']}}</h2>
<hr>
<h2>Nome do salão: {{$data['nomedoespaco']}}</h2>
<hr>
<h2>Data do Evento:  {{$data['dataEve']}}</h2>
<hr>
<h2>Tipo de Evento: {{$data['tipoEve']}}</h2>
<hr>
<h2>Numero de Convidados: {{$data['numConv']}}</h2>
<hr>
<br>
<h2>Servicos : {{implode(',',$data['servicos'])}}</h2>
<br>
<hr>
<h2>Data da Visita {{$data['dataVi']}}</h2>
<hr>

<br><br>
Agora pode aceder a area de clientes no aplicativo Piluka, com o seu <span>EMAIL</span> e o seu numero de <span>TELEFONE</span> como password na primeira sessão
<br>depois pode alterar essa senha por segurança se preferir...
<br><br>
Obrigado pela atenção, <br>
from: Piluka Eventos



@else

--------- BEM VINDO AO PILUKA EVENTOS ------------
<br>
Este é um email de opnião:
<br>

<h2>Nome completo: {{$data['nomecompleto']}}</h2>
<hr>
<h2>Telefone: {{$data['telefonemsg']}}</h2>
<hr>
<h2>Email: {{$data['emailmsg']}}</h2>
<hr>
<h2>Mensagem: {{$data['mensagem']}}</h2>
<br>
<br>
<hr>


Obrigado pela sua opnião,<br>
from: Piluka Eventos

@endif