<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facedes\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\EspacoController;
use App\Http\Controllers\ServicoController;

use App\Models\Comentario;
use App\Models\Espaco;
use App\Models\Fornecedore;
use App\Models\Plano;
use App\Models\Evento;
use App\Models\Foto;
use App\Models\Servico;
use App\Models\Categoria;

class HomeController extends Controller
{
    public function index(){
        $dataAtual=Carbon::today()->format('Y-m-d');
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        $categorias = Categoria::all();

        $categoriaServicos=request('searchservico');
        $CategoriaServico=request('categoriaServico');
        if (isset($categoriaServicos)) {
            if (Categoria::where('descricaoCat','like','%'.$categoriaServicos.'%')->exists()){
                $searchservico=Categoria::where('descricaoCat','like','%'.$categoriaServicos.'%')->select('*')->distinct()->get();

                /*Busca de dados nas tabelas servicos e fornecedores*/
            $Servicos=Servico::where('idCat',$searchservico[0]->idCat)
            ->join('fornecedores','fornecedores.idFor','=','servicos.idFor')
            ->select('*')
            ->distinct()
            ->get();    
            }    
            else {
                $searchservico="";

            /*Busca de dados nas tabelas servicos e fornecedores*/
                
                $Servicos=Servico::join('fornecedores','fornecedores.idFor','=','servicos.idFor')
                ->select('*')
                ->distinct('nome')
                ->get();
                
            }
               
        }
        else {
            $searchservico="";

            /*Busca de dados nas tabelas servicos e fornecedores*/
            $Servicos=Servico::query()
                ->join('fornecedores','fornecedores.idFor','=','servicos.idFor')
                ->select('*')
                ->distinct()
                ->get();                
        }       

        /*comentarios e tabelas relacionadas*/
            $Comentarios=Comentario::join('espacos','comentarios.nomeEsp','=','espacos.nomeEsp')
            ->join('fotos','comentarios.idCom','=','fotos.idCom')
            ->select('*')
            ->distinct()
            ->get();

        /* Validação da disponibilidade */
        $dataForm=request('date');
        $nomeSalaoForm=request('nomeSalao');
        

        if (isset($dataForm) && isset($nomeSalaoForm)) {


            /*foreach para extair dodos da coluna dataEvento*/



            /*condição para verificar se dados que vêm da DB sao iguais aos que vieram do form*/

            if ($agendamentos){
            /*consulta no banco de dados retorna data agendada em eventos e salva todos os dados na variavel $buscaData */
            $buscaData=Evento::where([
                ['dataEvento','like','%'.$dataForm.'%']])
                ->join('espacos','eventos.idEsp','=','espacos.idEsp')
                ->select('*')
                ->distinct()
                ->get();

                if (!empty($buscaData[0])){
                    $dataBD=$buscaData[0]->dataEvento;
                    $SalaoBD=$buscaData[0]->nomeEsp;
                }
                else{
                    $dataBD=$agendamentos[0]->dataEvento;
                    $SalaoBD=$espacos[0]->nomeEsp;
                }   
                /*condição para verificar se as datas do form e da BD são iguais*/
                    $DataDeHoje=strtotime($dataAtual);
                    $DataDoFormulario=strtotime($dataForm);

                    if ($dataBD==$dataForm && $SalaoBD==$nomeSalaoForm){
                            return view('home',['espacos'=>$espacos,'categorias'=>$categorias,'searchservico'=>$searchservico,'SalaoBD'=>$SalaoBD,'nomeSalaoForm'=>$nomeSalaoForm,'dataBD'=>$dataBD],['agendamentos'=>$agendamentos,'dataBD'=>$dataBD,'dataForm'=>$dataForm,'fotos'=>$fotos],['planos'=>$planos]); 
                    }
                    
                    else {
                        if(($DataDoFormulario)<=($DataDeHoje)+2600000){
                            $Msgxs="A Data escolhida já passou, ou está muito proxima a data actual segundo o nosso calendario. Tente pelo menos 30 dias de antecendência.";
                            return view('home',['espacos'=>$espacos,'categorias'=>$categorias,'searchservico'=>$searchservico,'Msgxs'=>$Msgxs,'SalaoBD'=>$SalaoBD,'nomeSalaoForm'=>$nomeSalaoForm,'dataBD'=>$dataBD],['agendamentos'=>$agendamentos,'dataBD'=>$dataBD,'dataForm'=>$dataForm,'fotos'=>$fotos],['planos'=>$planos]);
                        }else{
                            $idEsp=Espaco::where([[
                                'nomeEsp','=',$nomeSalaoForm
                            ]])
                            ->select('idEsp')
                            ->get();
                            $IDESP=$idEsp[0]->idEsp;
                            
                            return redirect('/salao'.'?'.'id='.$IDESP.'/#reserva');
                        }
                    } 
            }
            else
                {

                    return view('home',['espacos'=>$espacos,'categorias'=>$categorias,'searchservico'=>$searchservico,'Servicos'=>$Servicos],['fotos'=>$fotos],['buscaData'=>$buscaData,'planos'=>$planos]);  
                }
            

        }
        else
                {

                    return view('home',['Servicos'=>$Servicos,'categorias'=>$categorias,'Comentarios'=>$Comentarios,'searchservico'=>$searchservico,'espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);  
                }            
        /* Validação da disponibilidade termina aqui */        
    }

    /* rota para a pagina sobre */        
    public function sobre(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        
        return view('sobre',['espacos'=>$espacos],['agendamentos'=>$agendamentos,'fotos'=>$fotos],['planos'=>$planos]);
    }
        
    public function entrar(){
        return view('layouts/entrar');
    } 
    public function mensagem(){
        $espacos = Espaco::all();
        $agendamentos=Evento::all();
        $planos = Plano::all();
        $fotos = Foto::all();
        

        return view('clientes/mensagem');
    }        
        
    
}

