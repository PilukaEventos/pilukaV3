<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EspacoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ComentarioController;

/*Sessao de rotas para home inicial */
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name(name:'home');

Route::get('/espaco', [EspacoController::class, 'index']);

Route::get('/espaco/novo', [EspacoController::class, 'novo']);

Route::get('/espaco/{$id}', [EspacoController::class, 'show']);

Route::get('/espaco/create_plano', [EspacoController::class, 'create_plano']);

Route::post('/espaco_create', [EspacoController::class, 'store'])->name(name:'espaco_create');

Route::get('/salao/{id?}',[EspacoController::class,'BuscarTodasInfoDoEspacoPorID']);

Route::get('/entrar',[HomeController::class,'entrar'])->name(name:'entrar');

/*Sessao de rotas para os servicos */
Route::get('/servicos_editar{id?}',[ServicoController::class,'novo_servico'])->name(name:'servicos_editar');

Route::match(['GET','PUT'],'/atualizar_servicos{id?}',[ServicoController::class,'update'])->name(name:'atualizar_servicos');

Route::get('/servicos',[ServicoController::class,'BuscarTodasInfoDoServicos'])->name(name:'servicos');

Route::get('/servicos/novo',[ServicoController::class,'novo_servico']);

Route::get('/servico{id?}',[ServicoController::class,'BuscarTodasInfoDoServicoPorID'])->name(name:'servicosporid');

Route::post('/registar_servicos',[ServicoController::class,'store'])->name(name:'registar_servicos');

Route::get('/servicos/associar_me',[ServicoController::class,'associar_me_espaco']);

/* Rota para usuario */
Route::get('/usuarios', [UsuarioController::class, 'BuscarTodosUsuariosPorID'])->name(name:'usuarios');

Route::post('/registar_usuario_novo', [UsuarioController::class,'RegistarNovoUsuario'])->name(name:'registar_usuario_novo');

Route::get('/usuario_novo', [UsuarioController::class, 'NovoUsuario'])->name(name:'usuario_novo');

Route::get('/usuario_editar{id?}', [UsuarioController::class, 'EditarDadosUsuario'])->name(name:'usuario_editar');

Route::put('/usuario_actualizar{id?}', [UsuarioController::class, 'update'])->name(name:'usuario_actualizar');

Route::post('/login', [UsuarioController::class,'login'])->name('login');

Route::get('/logout', [UsuarioController::class,'logout'])->name('logout');

/*Rota para reserva */

Route::get('/reservar',[ReservaController::class,'store']);

Route::get('/sent_reserva_email',[ReservaController::class,'sent_email_reservas'])->name('sent_reserva_email');

/*Rota para sobre na home */

Route::get('/sobre',[HomeController::class,'sobre']);

/*Rota para galeria de imagens */

Route::get('/galerias',[FotoController::class,'MostrarGaleria'])->name('galerias');

Route::get('/create_gallery',[FotoController::class,'novasfotos'])->name('create_gallery');

Route::post('/adicionarfotos',[FotoController::class,'uploadfotos'])->name('adicionarfotos');

/*Rota para agendamento na home */

Route::get('/agendar',[EventoController::class,'index'])->name('agendar');

Route::get('/agendar_editar{id?}',[EventoController::class,'index'])->name('agendar_editar');

/****** Rota para agendamento na home *************/
Route::get('/admin', [AdminController::class, 'index'])->name(name:'admin');



/*Rota para clientes Controller */

Route::get('/mensagem', [HomeController::class, 'mensagem'])->name(name:'mensagem');

Route::get('/clientes', [ClienteController::class, 'index'])->name(name:'clientes');

Route::get('/perfil', [ClienteController::class, 'EditarClienteInfo'])->name(name:'perfil');

Route::match(['GET','PUT'],'/confirm_info/{id?}', [ClienteController::class, 'update'])->name(name:'confirm_info');

Route::get('/areadeclientes', [ClienteController::class, 'BuscarClientesPorId'])->name(name:'areadeclientes');


Route::get('/editarinfores', [ClienteController::class, 'BuscarClientesPorId'])->name(name:'editarinfores');

Route::match(['GET','PUT'],'/confirm_reserva_info/{id?}', [ClienteController::class, 'updateinforeserva'])->name(name:'confirm_reserva_info');

/*Rota para funcionarios Controller */
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name(name:'funcionarios');

Route::get('/funcionario_novo', [FuncionarioController::class, 'NovoFuncionario'])->name(name:'funcionario_novo');

Route::get('/funcionario_editar{id?}',[FuncionarioController::class, 'buscarFuncionariosPorId'])->name(name:'funcionario_editar');

Route::post('/registar_funcionario_novo',[FuncionarioController::class, 'RegistarFuncionario'])->name(name:'registar_funcionario_novo');

Route::match(['GET','PUT'],'/confirm_funcionario_info/{id?}', [FuncionarioController::class, 'updateDadosFuncionario'])->name(name:'confirm_funcionario_info');

/*Rota para comentarios Controller */
Route::post('/nova_mensagem', [ComentarioController::class, 'RegistarComentario'])->name(name:'nova_mensagem');

Route::post('/sent_email', [ComentarioController::class, 'send'])->name(name:'sent_email');