@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo')
@section('content')

   <!-- MAIN -->
        <main>
			<div class="head-title">
				<div class="left">
					<!--?php 
						if (isset($informacoes)) {//tem uma sessão
					?>
							<h1>
								<-?php
									echo "bem vindo(a)! ";
									echo $informacoes['tipoUsu'] . "(a) ";
									echo $informacoes['nomeUsu'];
								?>
							<h1>
					<-?php		
						}
					?-->
					<ul class="breadcrumb">
						<li>
							<a href="/">Painel Administrativo</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Inicio</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>


			<ul class="box-info">
				<a href="/agendar">
					<li>
					<!--?php 
						if (count($agen) > 0) {
							// se tiver usuarios na bd
					?>
							<i class='bx bxs-calendar' ></i>
							<span class="text">
					<-?php
							foreach ($agen as $a) {
					?>
								<center>
									<h3><-?php echo $a['numAgen']; ?></h3>
					<-?php		
							}
					?>
									<p>Agendados</p>
								</center>
					<-?php
						}else{
					?-->
							<i class='bx bxs-calendar' ></i>
							<span class="text">
								<center>
									<h3>0</h3>
									<p>Agendados</p>
								</center>
							</span>
					<!--?php
						}   
					?-->
					</li>
				</a>
				<a href="/realizados">
					<li>
					<!--?php 
						if (count($eventos) > 0) {
							// se tiver usuarios na bd
					?>
							<i class='bx bxs-detail' ></i>
							<span class="text">
					<-?php
							foreach ($eventos as $e) {
					?>
								<center>
										<h3><-?php echo $e['numEve']; ?></h3>
					<-?php		
							}
					?>
									<p>Realizados</p>
								</center>
					<-?php
						}else{
					?-->
							<i class='bx bxs-detail' ></i>
							<span class="text">
								<center>
									<h3>0</h3>
									<p>Realizados</p>
								</center>
							</span>
					<!--?php
						}  
					?-->
					</li>
				</a>
				<a href="/funcionarios">
					<li>
					<!--?php 
						if (count($fun) > 0) {
							// se tiver usuarios na bd
					?>
							<i class='bx bxs-group' ></i>
							<span class="text">
					<-?php
							foreach ($fun as $f) {
					?>
									<center>
										<h3><-?php echo $f['numFun']; ?></h3>
					<-?php	}
					?>
										<p>Funcionarios</p>
									</center>
					<-?php	
						}else{
					?-->
							<i class='bx bxs-group' ></i>
							<span class="text">
								<center>
									<h3>0</h3>
									<p>Funcionarios</p>
								</center>
							</span>
					<!--?php
						}  
					?-->
					</li>
				</a>
				<a href="/servicos">
					<li>
						<!--?php 
							if (count($servico) > 0) {
								// se tiver usuarios na bd
						?>
								<i class='bx bxs-wrench' ></i>
								<span class="text">
						<-?php
								foreach ($servico as $u) {
						?>
									<center>
										<h3><-?php echo $u['numServ']; ?></h3>
						<-?php		}
						?>
										<p>Serviços</p>
									</center>
						<-?php
							}else {
						?-->
								</span>
								<i class='bx bxs-wrench' ></i>
								<span class="text">
									<center>
										<h3>0</h3>
										<p>Serviços</p>
									</center>
								</span>
						<!--?php		
							}
						?-->
					</li>
				</a>
			</ul>
         
			<!-- section table  -->
			<div class="table-data">
				<div class="order">
                    <h2 class="heading">Eventos Agendados</h2><table>
                            <thead>
                                <tr>
                                    <td>CLIENTE</td>
                                    <td>TELEFONE</td>
                                    <td>EMAIL</td>
                                    <td>SERVIÇO</td>
                                    <td>SALÃO</td>
                                    <td>CONVIDADOS</td>
                                    <td>PREÇO</td>
                                    <td>EVENTO</td>
                                    <td>FUNCIONARIO</td>
                                    <td>DATA EVENTO</td>
                                    <td>HORA EVENTO</td>
                                    <td>ACÇÕES</td>
                                </tr>
                            </thead>

                            <tbody>
                                <!--?php 
                                if (count($agenda) > 0)
                                    foreach($agenda as $v)
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
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <--?php
                                                            }  
                                                    ?-->     
                                                </td>
                                            </tr>
                           <!--        endforeach
                                else
                                    <p>Ainda não há Agendamentos Registrados!</p>
                                endif
                                                        -->     </tbody>
                        </table><br><br>

            <!--?php 
                if (isset($_SESSION['id_admin']) || isset($_SESSION['id_gerente'])) {
			?-->
					<h2 class="heading">Salões</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>FOTO</td>
                                <td>SALÂO</td>
                                <td>TELEFONE</td>
                                <td>EMAIL</td>
                                <td>REDES</td>
                                <td>Nº</td>
                                <td>PREÇO</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @if(count($espacos) > 0)
                                    @foreach($espacos as $v)
                                
                                        <tr>
                                            <td>
                                                <img src="/img/espacos/{{$v->foto}}" alt="{{$v->nomeSalao}}">
                                            </td>
                                            <td>{{$v->nomeSalao}}</td>
                                            <td>{{$v->telefoneSalao}}</td>
                                            <td>{{$v->emailSalao}}</td>
                                            <td>{{$v->redesSalao}}</td>
                                            <td>{{$v->numConv}}</td>
                                            <td>{{$v->precoPla}}</td>
                                            <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="/espacos/editar$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <--?php
                                                            }  
                                                    ?-->     
                                                </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>Ainda não há Salões Registrados!</p>
                                @endif
                            </tr>
                                
                        </tbody>
                    </table><br><br>

            <!--?php 
                if (isset($_SESSION['id_admin']) || isset($_SESSION['id_gerente']) || isset($_SESSION['id_fun'])) {
			?-->
                    <h2 class="heading">Serviços</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>FORNECEDOR</td>
                                <td>TELEFONE</td>
                                <td>EMAIL</td>
                                <td>SERVIÇO</td>
                                <td>CATEGORIA</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <!--?php 
                                if (count($servicos) > 0) {
                                    foreach($servicos as $v){
                            ?-->
                                        <tr>
                                            <td><!--?php echo $v['nomeFor']; ?--></td>
                                            <td><!--?php echo $v['telefoneFor']; ?--></td>
                                            <td><!--?php echo $v['emailFor']; ?--></td>
                                            <td><!--?php echo $v['nomeServ']; ?--></td>
                                            <td><!--?php echo $v['nomeCat']; ?--></td>
                                            <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?->
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <-?php
                                                        }  
                                                    ?-->     
                                                </td>
                                        </tr>
                                <!--?php   }
                                    }else {
                                        echo "Ainda não há Serviços Registrados!";
                                    }
                                ?-->
                            </tr>
                            
                        </tbody>
                    </table><br><br>
            <!--?php
                }
            ?-->

            <!--?php 
                if (isset($_SESSION['id_admin']) || isset($_SESSION['id_gerente']) || isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
			?-->
                    <h2 class="heading">Eventos Realizados</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>NOME</td>
                                <td>ESPAÇO</td>
                                <td>CONVIDADOS</td>
                                <td>PARCEIRO</td>
                                <td>TIPO</td>
                                <td>DATA EVENTO</td>
                                <td>AÇÔES</td>
                            </tr>
                        </thead>

                        <tbody>
                        <!--?php 
                            if (count($evento) > 0) {
                                foreach($evento as $v){
                        ?-->
                            <tr>
                                <td><!--?php echo $v['nomeCli']; ?--></td>
                                <td><!--?php echo $v['nomeEsp']; ?--></td>
                                <td><!--?php echo $v['numConv']; ?--></td>
                                <td><!--?php echo $v['nomePar']; ?--></td>
                                <td><!--?php echo $v['tipoEve']; ?--></td>
                                <td>
                                    <!--?php
                                        $data = new DateTime($v['dataEve']);
                                        echo $data->format('d/m/Y');
                                    ?-->
                                </td>
                                <td>
                                        <!--?php
                                            if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                //verificando se é o usuario
                                        ?-->
                                                <a href="#">
                                                    <span class="icon">
                                                        <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                    </span>
                                                </a>
                                                |
                                                <a href="#">
                                                    <span class="icon">
                                                        <i class="bx bxs-trash-alt" ></i>
                                                    </span>
                                                    <span class="title"></span>
                                                </a>
                                        <!--?php
                                            }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                        ?>
                                                <a href="./editar_servico.php?id=$id">
                                                    <span class="icon">
                                                        <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                    </span>
                                                </a>
                                                |
                                                <a href="#">
                                                    <span class="icon">
                                                        <i class="bx bxs-trash-alt" ></i>
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
                                echo "Ainda não há Eventos realizados Registrados!";
                            }
                        ?-->
                        </tbody>
                    </table><br><br>  

                    <h2 class="heading">Clientes</h2>
                    <table>
                        <thead>
                            <tr> 
                                <td>CLIENTE</td>
                                <td>EMAIL</td>
                                <td>TELEFONE</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                        <!--?php 
                            if (count($clientes) > 0) {
                                foreach($clientes as $v){
                        ?-->
                                    <tr>
                                        <td><!--?php echo $v['nomeCli']; ?--></td>
                                        <td><!--?php echo $v['emailCli']; ?--></td>
                                        <td><!--?php echo $v['telefoneCli']; ?--></td>
                                        <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
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
                                echo "Ainda não há usuarios registrados!";
                            }
                        ?-->
                        </tbody>
                    </table><br><br>
                <!--?php
                    } 
                ?->
				
            <--?php 
                if (isset($_SESSION['id_admin'])) {
			?-->	
					<h2 class="heading">Usuarios</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>USUARIO</td>
                                <td>EMAIL</td>
                                <td>NIVEL</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                        <!--?php 
                            if (count($dados) > 0) {
                                foreach($dados as $v){
                        ?-->
                                    <tr>
                                        <td><!--?php echo $v['nomeUsu']; ?--></td>
                                        <td><!--?php echo $v['emailUsu']; ?--></td>
                                        <td><!--?php echo $v['tipoUsu']; ?--></td>
                                        <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?->
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
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
                                echo "Ainda não há usuarios registrados!";
                            }
                        ?-->
                        </tbody>
                    </table><br><br>
					
					<h2 class="heading">Comentarios</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>CLIENTE</td>
                                <td>NOME Espaço</td>
                                <td>COMENTARIO</td>
                                <td>DATA</td>
                                <td>HORA</td>
                                <td>ESTRELAS</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                        <!--?php 
                            if (count($comentarios) > 0) {
                                foreach($comentarios as $v){
                        ?-->
                                    <tr> 
                                        <td><!--?php echo $v['nomeCom']; ?--></td>
                                        <td><!--?php echo $v['nome']; ?--></td>
                                        <td><!--?php echo $v['comentario']; ?--></td>
                                        <td>
                                            <!--?php
                                                $data = new DateTime($v['dia']);
                                                echo $data->format('d/m/Y');
                                            ?-->
                                        </td>
                                        <td><!--?php echo $v['horario']; ?--></td>
                                        <td><!--?php echo $v['estrelas']; ?--></td>
                                        <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <-?php
                                                            }  
                                                    ?-->     
                                                </td>
                                    </tr>
                        <!--?php   }
                            }else {
                                echo "Ainda não há comentarios registrados!";
                            }
                        ?-->
                        </tbody>
                    </table><br><br>
            <!--?php 
                }
            ?-->
                    
                    
            <!--?php 
                if (isset($_SESSION['id_admin']) || isset($_SESSION['id_gerente']) || isset($_SESSION['id_fun'])) {
			?-->
                    <h2 class="heading">Fornecedores</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>FORNECEDOR</td>
                                <td>TELEFONE</td>
                                <td>EMAIL</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                        <!--?php 
                            if (count($servicos) > 0) {
                                foreach($servicos as $v){
                        ?-->
                                    <tr>
                                        <td><!--?php echo $v['nomeFor']; ?--></td>
                                        <td><!--?php echo $v['telefoneFor']; ?--></td>
                                        <td><!--?php echo $v['emailFor']; ?--></td>
                                        <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <-?php
                                                            }  
                                                    ?-->     
                                                </td>
                                    </tr>
                        <!--?php   }
                            }else {
                                echo "Ainda não há Fornecedores registrados!";
                            }
                        ?-->
                        </tbody>
                    </table><br><br>
                <!--?php
                    }
                ?>

                    
            <--?php 
                if (isset($_SESSION['id_admin']) || isset($_SESSION['id_gerente'])) {
			?-->
                    <h2 class="heading">Funcionarios</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>FUNCIONARIO</td>
                                <td>DATA NASCIMENTO</td>
                                <td>MORADA</td>
                                <td>TELEFONE</td>
                                <td>EMAIL</td>
                                <td>DATA INGRESSO</td>
                                <td>CARGO</td>
                                <td>FUNÇÃO</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <!--?php 
                                if (count($func) > 0) {
                                    foreach($func as $v){
                            ?-->
                                        <tr>
                                            <td><!--?php echo $v['nomeFun']; ?--></td>
                                            <td>
                                                <!--?php
                                                    $data = new DateTime($v['dataNascFun']);
                                                    echo $data->format('d/m/Y');
                                                ?-->
                                            </td>
                                            <td><!--?php echo $v['moradaFun']; ?--></td>
                                            <td><!--?php echo $v['telefoneFun']; ?--></td>
                                            <td><!--?php echo $v['emailFun']; ?--></td>
                                            <td>
                                                <!--?php
                                                    $data = new DateTime($v['dataIngreFun']);
                                                    echo $data->format('d/m/Y');
                                                ?-->
                                            </td>
                                            <td><!--?php echo $v['nomeCargo']; ?--></td>
                                            <td><!--?php echo $v['nomeFuncao']; ?--></td>
                                            <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <-?php
                                                            }  
                                                    ?-->     
                                                </td>
                                        </tr>
                                <!--?php   }
                                    }else {
                                        echo "Ainda não há Funcionarios Registrados!";
                                    }
                                ?-->
                            </tbody>
                    </table><br><br>
            <!--?php
                }
            ?>

            
            <-?php 
                if (isset($_SESSION['id_admin']) || isset($_SESSION['id_gerente']) || isset($_SESSION['id_fun'])) {
			?-->

                    <h2 class="heading">Outros Dados</h2><br>
                    <h2 class="heading">Categorias</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>CATEGORIA</td>
                                <td>DESCRIÇÃO</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <!--?php 
                                if (count($servicos) > 0) {
                                    foreach($servicos as $v){
                            ?-->
                                        <tr>
                                            <td><!--?php echo $v['nomeCat']; ?--></td>
                                            <td><!--?php echo $v['descricaoCat']; ?--></td>
                                            <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <-?php
                                                            }  
                                                    ?-->     
                                                </td>
                                        </tr>
                            <!--?php   }
                                }else {
                                    echo "Ainda não há Categorias Registradas!";
                                }
                            ?-->
                        </tbody>
                    </table><br><br>

                    <h2 class="heading">Cargos</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>CARGO</td>
                                <td>DESCRIÇÃO</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <!--?php 
                                if (count($func) > 0) {
                                    foreach($func as $v){
                            ?-->
                                        <tr>
                                            <td><!--?php echo $v['nomeCargo']; ?--></td>
                                            <td><!--?php echo $v['descricaoCargo']; ?--></td>
                                            <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <-?php
                                                            }  
                                                    ?-->     
                                                </td>
                                        </tr>
                            <!--?php   }
                                }else {
                                    echo "Ainda não há Cargos Registrados!";
                                }
                            ?-->
                            </tr>
                                
                        </tbody>
                    </table><br><br>


                    <h2 class="heading">Funções</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>FUNÇÂO</td>
                                <td>DESCRIÇÃO</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <!--?php 
                                if (count($func) > 0) {
                                    foreach($func as $v){
                            ?-->
                                        <tr>
                                            <td><!--?php echo $v['nomeFuncao']; ?--></td>
                                            <td><!--?php echo $v['descricaoFuncao']; ?--></td>
                                            <td>
                                                    <!--?php
                                                        if (isset($_SESSION['id_fun']) || isset($_SESSION['id_forn'])) {
                                                            //verificando se é o usuario
                                                    ?-->
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
                                                                </span>
                                                                <span class="title"></span>
                                                            </a>
                                                    <!--?php
                                                        }elseif (isset($_SESSION['id_gerente']) || isset($_SESSION['id_admin'])) {
                                                    ?>
                                                            <a href="./editar_servico.php?id=$id">
                                                                <span class="icon">
                                                                    <i class="bx bxs-edit-alt" style="color: #00FFFF;"></i>
                                                                </span>
                                                            </a>
                                                            |
                                                            <a href="#">
                                                                <span class="icon">
                                                                    <i class="bx bxs-trash-alt" ></i>
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
                                    echo "Ainda não há Funções Registradas!";
                                }
                            ?-->
                            </tr>
                            
                        </tbody>
                    </table><br><br>
            <!--?php
                }
            ?-->
                </div>
            </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->
            
@endsection