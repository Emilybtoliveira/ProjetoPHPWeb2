<?php
  require_once 'Usuario.php';
  include('conexao.php');
  
  $usuario = new Usuario($_POST['login'], $_POST['senha']);
  
  $lgn = $usuario->getLogin();
  $senha = $usuario->getSenha();
  $query_select = "SELECT login FROM usuarios WHERE login = '$lgn'";
    
  $result = mysqli_query($conexao, $query_select);

  $array = mysqli_fetch_array($result);
  $logarray = $array['login'];

  if($usuario->getLogin() == "" || $usuario->getLogin() == null){
    echo"<script language='javascript' type='text/javascript'> alert('O campo login deve ser preenchido'); window.location.href='cadastro.html'; </script>";

    }else{
      if($logarray == $usuario->getLogin()){
        echo"<script language='javascript' type='text/javascript'> alert('Esse login já existe'); window.location.href='cadastro.html'; </script>";
        die();
      }else{       
        $sql = "INSERT INTO `usuarios`(`login`, `senha`) VALUES ('$lgn', '$senha')";
        if(mysqli_query($conexao, $sql)){
          echo"<script language='javascript' type='text/javascript'> alert('Usuário cadastrado com sucesso!'); window.location.href='login.html'; </script>";
        }else{
          echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
          echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
          echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        }
      }
    }
?>
