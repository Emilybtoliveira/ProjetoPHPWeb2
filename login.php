<?php
  session_start();
  include('conexao.php');

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  $query = "SELECT * FROM usuarios WHERE login = '$login' AND senha= '$senha'" or die(mysqli_error());
  $verificacao = mysqli_query($conexao, $query);

    /* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
   simplesmente não fazer o login e digitar na barra de endereço do seu navegador
   o caminho para a página principal do site (sistema), burlando assim a obrigação de
   fazer um login, com isso se ele não estiver feito o login não será criado a session,
   então ao verificar que a session não existe a página redireciona o mesmo
   para a index.php.*/

  if(mysqli_num_rows($verificacao) > 0 ){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:pagina_autenticada.php');
  }
  else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    echo"<script language='javascript' type='text/javascript'> alert('Login/Senha incorretos'); window.location.href='login.html'; </script>";
  }
?>
