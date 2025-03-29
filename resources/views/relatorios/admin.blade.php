@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo')
@section('content')

   <!-- MAIN -->

       <main>
			<div class="head-title">
				<div class="left">
                @if(session('Msgx'))
                    <script> alert(`{{session('Msgx')}}`)</script>
                @endif
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
                        <li>
							<a class="active" href="#">BEM VINDO @if(session('user_info')[0]->name)@endif</a>
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
                    {{--         comentario               --}}
							<i class='bx bxs-calendar' ></i>
							<span class="text">
							<center>
									<h3>{{count($eventos)}}</h3>
									<p>Agendados</p>
								</center>
							</span>
				
					</li>
				</a>
                <a href="/agendar">
					<li>

                        
                    <i class='bx bxs-calendar' ></i>
							<span class="text">
								<center>
									<h3>{{count($eventosPendentes)}}</h3>
									<p>Pendentes</p>
								</center>
							</span>
				
					</li>
				</a>
				<a href="/realizados">
					<li>
                    
							<i class='bx bxs-detail' ></i>
							<span class="text">
								<center>
									<h3>0</h3>
									<p>Realizados</p>
								</center>
							</span>
					
					</li>
				</a>
				<a href="/funcionarios">
					<li>

							<i class='bx bxs-group' ></i>
							<span class="text">
								<center>
									<h3>{{count($funcionarios)}}</h3>
									<p>Funcionarios</p>
								</center>
							</span>

					</li>
				</a>
				<a href="/servicos">
					<li>
					
								</span>
								<i class='bx bxs-wrench' ></i>
								<span class="text">
									<center>
										<h3>{{count($Servicos)}}</h3>
										<p>Serviços</p>
									</center>
								</span>
						
					</li>
				</a>
                <a href="/comentarios">
					<li>
					
							<i class='bx bxs-cool' ></i>
							<span class="text">
								<center>
									<h3>{{count($comentarios)}}</h3>
									<p>Comentarios</p>
								</center>
							</span>
					
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
                                    <td>ESPACO</td>
                                    <td>DATA EVENTO</td>
                                    <td>CONVIDADOS</td>
                                    <td><center>TIPO EVENTO</center></td>
                                    <td>ORÇAMENTO</td>
                                    <td><center>FUNCIONARIO</center></td>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                
                                @if (count($eventos) > 0)
                                    @foreach($eventos as $ev)
                                
                                            <tr>
                                                <td>{{$ev->nomeCli}}</td>
                                                <td>{{$ev->telefoneCli}}</td>
                                                <td>{{$ev->emailCli}}</td>
                                                <td>Serv Serv Serv</td>
                                                <td>{{$ev->nomeEsp}}</td>
                                                <td>{{$ev->dataEvento}}</td>
                                                <td>{{$ev->numConv}}</td>
                                                <td>{{$ev->nomeEve}}</td>        
                                                <td>{{$ev->precoPla}}</td>
                                                <td>{{$ev->nomeCli}}</td>
                                                
                                            </tr>
                                    @endforeach
                                @else
                                    <p>Ainda não há Agendamentos Registrados!</p>
                                @endif
                            </tbody>
                        </table><br><br>

         
					<h2 class="heading">Salões</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>FOTO</td>
                                <td>&nbsp;ID</td>
                                <td>SALÂO</td>
                                <td>TELEFONE</td>
                                <td>EMAIL</td>
                                <td>REDES</td>
                                <td>LOCALIZAÇÃO</td>
                                <td>&nbsp;Nº MAX</td>
                                <td>ACÇÕES</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @if(count($espacos) > 0)
                                    @for($i=0; $i < 3; $i++)
                                    
                                        <tr>
                                        <td><img src="./img/teste/{{$espacos[$i]->fotoEsp}}" alt="" ></td>
                                            <td>{{$espacos[$i]->idEsp}}</td>
                                            <td>{{$espacos[$i]->nomeEsp}}</td>
                                            <td>{{$espacos[$i]->telefoneEsp}}</td>
                                            <td>{{$espacos[$i]->emailEsp}}</td>
                                            <td>{{$espacos[$i]->redes}}</td>
                                            <td>{{$espacos[$i]->moradaEsp}}</td>
                                            <td>3000</td>

                                        </tr>
                                    @endfor
                                @else
                                    <p>Ainda não há Salões Registrados!</p>
                                @endif
                            </tr>
                                
                        </tbody>
                    </table><br><br>

           
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

                        </tbody>
                    </table>
                    <br>
                    <br>

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
                        </tbody>
                    </table><br><br>

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
                        </tbody>
                    </table><br><br>

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

                    </tbody>
                    </table><br><br>

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

                    </tbody>
                    </table><br><br>

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
            <div>
                
            </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->
            
@endsection