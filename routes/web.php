<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;

/*Sessao de rotas para home inicial */
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name(name:'home');

Route::get('/espaco', [EspacoController::class, 'index']);

Route::get('/espaco/novo', [EspacoController::class, 'novo']);

Route::get('/espaco/{$id}', [EspacoController::class, 'show']);

Route::get('/espaco/create_plano', [EspacoController::class, 'create_plano']);

Route::post('/espaco', [EspacoController::class, 'store']);

Route::get('/salao/{id?}',[EspacoController::class,'BuscarTodasInfoDoEspacoPorID']);

Route::get('/entrar',[HomeController::class,'entrar'])->name(name:'entrar');

/* Sessao de rotas para os servicos */
Route::get('/servico/{id?}',[ServicoController::class,'BuscarTodasInfoDoServicoPorID']);

Route::get('/servicos',[ServicoController::class,'BuscarTodasInfoDoServicos']);

Route::get('/servicos/associar_me',[ServicoController::class,'associar_me_espaco']);
/* Rota para usuario */
Route::get('/usuarios', [UsuarioController::class, 'BuscarTodosUsuariosPorID'])->name(name:'usuarios');

Route::post('/registar_usuario_novo', [UsuarioController::class,'RegistarNovoUsuario'])->name(name:'registar_usuario_novo');

Route::get('/usuario_novo', [UsuarioController::class, 'NovoUsuario'])->name(name:'usuario_novo');

Route::post('/login', [UsuarioController::class,'login'])->name('login');

Route::get('/logout', [UsuarioController::class,'logout'])->name('logout');

/*Rota para reserva */

Route::get('/reservar',[ReservaController::class,'store']);


/*Rota para sobre na home */

Route::get('/sobre',[HomeController::class,'sobre']);

/*Rota para agendamento na home */

Route::get('/agendar', function () {
    if(session('user_info')){
        return view('agendar');
    }
    else {
        return redirect('/');
    }
    
});


Route::get('/admin', [AdminController::class, 'index'])->name(name:'admin');

/*Rota para clientes Controller */
Route::get('/clientes', [ClienteController::class, 'index'])->name(name:'clientes');

Route::get('/areadeclientes', [ClienteController::class, 'BuscarClientesPorId'])->name(name:'areadeclientes');

/*Rota para funcionarios Controller */
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name(name:'funcionarios');