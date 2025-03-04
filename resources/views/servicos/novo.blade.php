@extends('layouts.adminLayout')
@section('title', 'Painel Administrativo - Novo espaco')
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
						<a class="active" href="#">Novo Salão</a>
					</li>
				</ul>
			</div>
			<a href="#" class="btn">
				<i class='bx bxs-cloud-download' ></i>
				<span class="text">Download PDF</span>
			</a>
		</div>
    
    @if(isset($editar))
    @foreach($Servicos as $serv)
    <div class="novoReg">
            <div class="row">
                <div class="hero">
                    <form action="/atualizar_servicos" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h1 class="heading">Novo Fornecedor</h1>
 
                        <div class="input-group">
                            <input type="file" id="foto" name="foto" class="from-control-file">
                            <label for="foto">Fotos De Capa:</label>
                        </div>
                        
                        <div class="input-group" style="display:none;">
                            <input type="text" name="idServ" id="idServ"  value="{{$serv->idServ}}"  required>
                            <input type="text" name="idFor" id="idFor"  value="{{$serv->idFor}}"  required>
                            
                        </div>
                        <div class="input-group">
                            <input type="text" name="nomeFor" id="nomeFor"  value="{{$serv->nomeFor}}"  required>
                            <label for="nomeFor">Nome Fornecedor:</label>
                        </div>

                        <div class="rows">
                            <div class="input-group">
                                <input type="text" name="telefoneFor" id="telefoneFor"  value="{{$serv->telefoneFor}}"  maxlength="40" required>
                                <label for="telefoneFor">Telefone:</label>
                            </div>
                            <div class="input-group">
                                <input type="emailFor" name="emailFor" id="emailFor"  value="{{$serv->emailFor}}"  maxlength="40" required>
                                <label for="emailFor">endereço de email:</label>
                            </div>

                        </div>
                            <div class="rows">
                            <div class="input-group">
                                <input type="text" name="alternativo" id="telefoneSalao"  value="{{$serv->telefoneServ}}" maxlength="40" required>
                                <label for="alternativo">Telefone de Servico:</label>
                            </div>

                            <div class="input-group">
                                <input type="text" name="nifFor" id="moradaSalao"  value="{{$serv->nif}}" maxlength="80" required>
                                <label for="nifFor"><span>NIF:</span></label>
                            </div>
                        </div>

                        <div class="input-group">
                            <textarea name="sobreFor" id="sobreFor" maxlength="100" rows="7"  required>{{$serv->descricaoFor}}</textarea>
                            <label for="sobreFor"><span>Palavras Chaves:</span></label>
                        </div>
                        <div class="input-group">
                        <center><h3><span>-----------Novo Servico------------</span></h3></center>
                        </div>
                            <div class="input-group">
                                <input type="text" name="nomeservico" id="nomeservico"  value="{{$serv->nomeServ}}" maxlength="40" required>
                                <label for="nomeservico">Nome da Empresa:</label>
                            </div>
                            <br>
                            <div class="rows">
                            <div class="input-group">
                                
                                <select name="nomefornecedor" id="nomefornecedor"   maxlength="40">
                                        <option value="{{$serv->idFor}}">{{$serv->nomeFor}}"</option>
                                </select>
                                
                                <label for="nomefornecedor">Seleciona um Fornecedor:</label>
                            </div>
                            <div class="input-group">
                                @if(count($categorias)>0)
                                <select name="categoriaservico" id="categoriaservico" maxlength="40" required>
                                <option></option>
                                    @foreach($categorias as $cat)
                                        <option value="{{$cat->idCat}}">{{$cat->nomeCat}}</option>
                                    @endforeach
                                    
                                </select>
                                @endif
                                <label for="categoriaservico">Seleciona uma categoria:</label>
                                
                            </div>
                            </div>                        
                            <div class="input-group">
                                <textarea name="descricaoservico" id="descricaoservico" maxlength="100"  rows="7" required>{{$serv->descricaoServ}}</textarea>
                                <label for="descricaoservico">Descricao Do Servico</label>
                            </div>
                            
                            <div class="input-group">
                                <input type="text" name="redesServico" id="redesServico" value="{{$serv->redes}}" required>
                                <label for="redesServico">redesSalao Sociais:</label>
                            </div>
                        
                        <center>
                            <div>
                                <button value="REGISTRAR" class="btn" ><i class="fas fa-paper-plane">REGISTRAR</i></button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
     @else
        <div class="novoReg">
            <div class="row">
                <div class="hero">
                    <form action="/registar_servicos" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1 class="heading">Novo Fornecedor</h1>
 
                        <div class="input-group">
                            <input type="file" id="foto" name="foto" class="from-control-file">
                            <label for="foto">Fotos De Capa:</label>
                        </div>
                        
                        <div class="input-group">
                            <input type="text" name="nomeFor" id="nomeFor"  required>
                            <label for="nomeFor">Nome Fornecedor:</label>
                        </div>

                        <div class="rows">
                            <div class="input-group">
                                <input type="text" name="telefoneFor" id="telefoneFor" maxlength="40" required>
                                <label for="telefoneFor">Telefone:</label>
                            </div>
                            <div class="input-group">
                                <input type="emailFor" name="emailFor" id="emailFor" maxlength="40" required>
                                <label for="emailFor">endereço de email:</label>
                            </div>

                        </div>
                            <div class="rows">
                            <div class="input-group">
                                <input type="text" name="alternativo" id="telefoneSalao" maxlength="40" required>
                                <label for="alternativo">Telefone de Servico:</label>
                            </div>

                            <div class="input-group">
                                <input type="text" name="nifFor" id="moradaSalao" maxlength="80" required>
                                <label for="nifFor">NIF:</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <textarea name="sobreFor" id="sobreFor" maxlength="100" rows="7" placeholder="Exemplos: Servico de restauração,musica,bar... " required></textarea>
                            <label for="sobreFor">Palavras Chaves:</label>
                        </div>
                        <div class="input-group">
                        <center><h3><span>-----------Novo Servico------------</span></h3></center>
                        </div>
                            <div class="input-group">
                                <input type="text" name="nomeservico" id="nomeservico" maxlength="40" required>
                                <label for="nomeservico">Nome da Empresa:</label>
                            </div>
                            <br>
                            <div class="rows">
                            <div class="input-group">
                                @if(count($fornecedores)>0)
                                <select name="nomefornecedor" id="nomefornecedor" maxlength="40">
                                <option value="Novo">Novo</option>
                                    @foreach($fornecedores as $for)
                                        <option value="{{$for->nomeFor}}">{{$for->nomeFor}}</option>
                                    @endforeach
                                </select>
                                
                                @else
                                <select name="nomefornecedor" id="nomefornecedor" maxlength="40">
                                    <option value="Novo">Novo</option>
                                </select>
                                @endif
                                <label for="nomefornecedor">Seleciona um Fornecedor:</label>
                            </div>
                            <div class="input-group">
                                @if(count($categorias)>0)
                                <select name="categoriaservico" id="categoriaservico" maxlength="40" required>
                                    <option value="Selecionar">Selecionar</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{$cat->idCat}}">{{$cat->nomeCat}}</option>
                                    @endforeach
                                    
                                </select>
                                @endif
                                <label for="categoriaservico">Seleciona uma categoria:</label>
                                
                            </div>
                            </div>                        
                            <div class="input-group">
                                <textarea name="descricaoservico" id="descricaoservico" maxlength="100" rows="7" required></textarea>
                                <label for="descricaoservico">Descricao Do Servico</label>
                            </div>
                            
                            <div class="input-group">
                                <input type="text" name="redesServico" id="redesServico" maxlength="40" required>
                                <label for="redesServico">redesSalao Sociais:</label>
                            </div>
                        
                        <center>
                            <div>
                                <button value="REGISTRAR" class="btn" ><i class="fas fa-paper-plane">REGISTRAR</i></button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </main>
                    
@endsection