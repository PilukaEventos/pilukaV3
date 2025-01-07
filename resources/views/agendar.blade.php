@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo - Eventos Agendados')
@section('content')
       
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Painel Administrativo</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Painel Administrativo</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Agendados</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
     
            <!-- section table  -->
			<div class="table-data">
				<div class="order">
                <a href="home" onclick="return confirm('Você será redirecionado para home na sessão de reserva do salão clica em OK para continuar')" class="btn">Novo Agendamento</a>
                    <h2 class="heading">Agendamentos</h2>
                    <table>
                            <thead>
                                <tr>
                                    <td>NOME</td>
                                    <td>TELEFONE</td>
                                    <td>EMAIL</td>
                                    <td>SERVIÇO</td>
                                    <td>SALÃO</td>
                                    <td>CONVIDADOS</td>
                                    <td>PREÇO</td>
                                    <td>EVENTO</td>
                                    <td>FUNCIONARIO</td>
                                    <td>DATA</td>
                                    <td>HORA</td>
                                    <td>ACÇÕES</td>
                                </tr>
                            </thead>

                            <tbody>
                                <!--?php 
                                    if (count($agenda) > 0) {
                                        foreach($agenda as $v){
                                ?-->
                                            <tr>
                                                <td><!--?php echo $v['nomeCli']; ?--></td>
                                                <td><!--?php echo $v['telefoneCli']; ?--></td>
                                                <td><!--?php echo $v['emailCli']; ?--></td>
                                                <td><!--?php echo $v['nomeServ']; ?--></td>
                                                <td><!--?php echo $v['nomeEsp']; ?--></td>
                                                <td><!--?php echo $v['numConv']; ?--></td>
                                                <td><!--?php echo $v['precoPla']; ?--></td>
                                                <td><!--?php echo $v['nomeEve']; ?--></td>
                                                <td><!--?php echo $v['nomeFun']; ?--></td>
                                                <td>
                                                    <!--?php
                                                        $data = new DateTime($v['dataEvento']);
                                                        echo $data->format('d/m/Y');
                                                    ?-->
                                                </td>
                                                <td><!--?php echo $v['horaEvento']; ?--></td>
                                                <td>
                                                    <a href="#" id='$idAgen' onclick="visUsuario($id)">
                                                        <span class="icon">
                                                            <i class="bx bx-show-alt" style="color: #006400;"></i>
                                                        </span>
                                                    </a>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" style="color: #8B0000;"></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?->
                                                            |
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" style="color: #8B0000;"></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <--?php
                                                            }  
                                                    ?-->     
                                                </td>
                                            </tr>
                                <!--?php   }
                                    }else {
                                        echo "Ainda não há Agendamentos Registrados!";
                                    }
                                ?-->
                            </tbody>
                        </table>
                </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
            
@endsection
