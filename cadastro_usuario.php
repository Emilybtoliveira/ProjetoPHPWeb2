<?php
  require_once 'Usuario.php';
  include('conexao.php');

  $login = mysqli_real_escape_string(new mysqli($conexao), $_POST['login']);
  $senha = mysqli_real_escape_string(new mysqli($conexao), $_POST['senha']);
  $usuario = new Usuario($login, $senha);
  echo "$usuario->getLogin()";

  $_SESSION['login'] = $usuario.getLogin();
  $_SESSION['senha'] = $usuario.getSenha();

  $query_select = "SELECT 'login' FROM 'usuarios' WHERE login = '$usuario->getLogin()'";
  $select = mysqli_query($conexao, $query_select) or die(mysqli_error());
  $array = mysqli_fetch_array($select);
  $logarray = $array['login'];

  if($usuario->getLogin() == "" || $usuario->getLogin() == null){
    echo"<script language='javascript' type='text/javascript'> alert('O campo login deve ser preenchido'); window.location.href='cadastro.html'; </script>";

    }else{
      if($logarray == $usuario->getLogin()){
        echo"<script language='javascript' type='text/javascript'> alert('Esse login já existe'); window.location.href='cadastro.html'; </script>";
        die();

      }else{
        $query = "INSERT INTO 'usuarios' ('id','login','senha') VALUES ('','$usuario->getLogin()','$usuario->getSenha()')";
        $insert = mysqli_query($query,$conexao);

        if($insert){
          echo"<script language='javascript' type='text/javascript'> alert('Usuário cadastrado com sucesso!'); window.location.href='login.html'; </script>";
        }else{
          echo"<script language='javascript' type='text/javascript'> alert('Não foi possível cadastrar esse usuário'); window.location.href='cadastro.html'; </script>";
        }
      }
    }
?>
