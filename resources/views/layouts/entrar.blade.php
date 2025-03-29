@extends('layouts.homeLayout')
@section('title', 'Sistema de Gestão de Salões de Eventos e Serviços - PILUKA')
@section('content')

@if(session()->has('Msgx'))
    <script>alert(`{{session('Msgx')}}`)</script>
@endif
<!-- ================ novo registro ================= -->
        <section class="entrar" id="entrar">
	        <h2 class="heading">PILUKA</h2>
        <div class="mt-5">
        
        </div>
            <div class="row">

                <div class="hero">
                    <form method="POST" action="{{route('login')}}">
                    @csrf
                        <h2 class="heading">Area de Clientes</h2>
                        @if(session()->has('error'))
                            <div class="col-12">
                                <center><div class="alert alert-danger"> {{session('error')}} @auth{{auth()->user()->name}}@endauth</div>  </center>
                            </div>
                        @endif
                        <div class="input-group">
                            <input type="email" id="email" name="email" maxlength="40" required>
                            <label for="email"><i class="fas fa-envelope"></i><img src="./img/icones/envelope.png"> Nome ou email</label>
                        </div>
                        <div class="input-group">
                            <input type="password" id="senha" name="password" maxlength="255" required>
                            <label for="senha"><i class="fas fa-lock"></i><img src="./img/icones/lock.png"> Senha</label-->
                        </div>
                        @if(session('user_info'))
                        <center><button href="{{route('entrar')}}" class="btn"><i class="fas fa-paper-plane"></i>Entrar</button></center>
                        @else
                        <center><button type="submit" class="btn"><i class="fas fa-paper-plane"></i> ENTRAR</button></center>
                        @endif
		                <!--a href="./registrar">Registre-se agora!</a-->
                    </form>
                </div>
            </div>
        </section>

<!-- codigo php -->
<!--php
    if (isset($_POST['email'])) {
        $email = htmlentities(addslashes($_POST['email']));
        $senha = htmlentities(addslashes($_POST['senha']));

        if (!empty($email) && !empty($senha)) {
            require_once './admin/classes/classe_usuarios.php';
            $us = new Usuario("bd_piluka", "localhost", "root", "");
            echo 'dados recebidos';
            if ($us->entrar($email, $senha)) {
?-->    
                <!--script type = "text/javascript">
                    //alert(' conectado com sucesso!')
                    window.location = "./admin"
                </script-->
<!--?php       } else {
 ?>             <script type = "text/javascript">
                    alert('Email e/ou senha incorrectos!')
                </script-->
<!--?php       } 
        }else {
?>
            <script type = "text/javascript">
                alert('Preencha os campos obrigatórios!')
            </script-->
<!--?php   }
    }
?-->


<!-- codigo php com password_hash-->
<!--?php
    if (isset($_POST['email'])) {
        $email = htmlentities(addslashes($_POST['email']));
        $senha = htmlentities(addslashes($_POST['senha']));

        if (!empty($email) && !empty($senha)) {
            require_once './admin/classes/classe_usuarios.php';
            $us = new Usuario("bd_piluka", "localhost", "root", "");
            $dados = $us->buscarTodosUsuario();
            echo 'dados recebidos';
            
            if (password_verify($dados['senhaUsu'], $senha)) {
                if ($us->entrar2($email, $senha)) {
    ?>    
                    <script type = "text/javascript">
                        //alert(' conectado com sucesso!')
                        window.location = "./admin"
                    </script>
    <!?php       } else {
     ?>             <script type = "text/javascript">
                        alert('Email e/ou senha incorrectos!')
                    </script>
    <!?php       }
            }else {
    ?>
                <script type = "text/javascript">
                    alert('Email e/ou senha não correspondem ')
                </script>
    <!?php   }
        }else {
?>
            <script type = "text/javascript">
                alert('Preencha os campos obrigatórios!')
            </script>
<!?php   }
    }
?-->
@endsection