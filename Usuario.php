<?php
  class Usuario{
    private $login;
    private $senha;

    public function Usuario($login, $senha){
      $this->setLogin($login);
      $this->setSenha($senha);
    }
    public function setLogin($login){
      $this->login = login;
    }
    public function setSenha($senha){
      $this->senha = senha;
    }
    public function getLogin(){
      return $this->login;
    }
    public function getSenha(){
      return $this->senha;
    }
  }
?>
