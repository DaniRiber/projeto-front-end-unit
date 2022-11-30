<?php
$retorno = "";
if(isset($_POST["acao"])){
  if($_POST["acao"] == "cadastrar"){
    cadastrarPessoa();
  }
  if($_POST["acao"] == "atualizar"){
    $credenciais = atualizarPessoa();
    $retorno = entrarPessoa($credenciais[0], $credenciais[1]);
    if($retorno == null){
      echo "<script>alert('Login inválido')</script>";
    }
  }
  if($_POST["acao"] == "entrar"){
    $retorno = entrarPessoa($_POST["address"], $_POST["password"]);
    if($retorno == null){
      echo "<script>alert('Login inválido')</script>";
    }
    
  }
  if($_POST["acao"] == "deletar"){
    deletarPessoa();
  }
}

function abrirBanco(){
  $conexao = new mysqli("localhost", "root", "", "avaliacao_frontend");
  //$conexao = new mysqli("localhost", "id19777102_root", "Gabriel27062001@@", "id19777102_avaliacao_frontend");
  return $conexao;
}

function cadastrarPessoa(){
  $banco = abrirBanco();
  $sql = "INSERT INTO users(name, gender, address, phone, cpf, password) 
  VALUES ('{$_POST["name"]}','{$_POST["gender"]}','{$_POST["address"]}','{$_POST["phone"]}','{$_POST["cpf"]}','{$_POST["password"]}')";
  $banco->query($sql);
  $banco->close();
}

function entrarPessoa($adress, $password){
  $banco = abrirBanco();
  $sql = "SELECT * FROM users WHERE address = '{$adress}' AND password = '{$password}'";
  $resultado = $banco->query($sql);
  $banco->close();

 
  while($row = mysqli_fetch_array($resultado)){
    $user[] = $row;
  }
  
  if(isset($user)){
    return $user;
  }
  return null; 
}

function  atualizarPessoa(){
  $banco = abrirBanco();
  $sql = "UPDATE users SET name='{$_POST["name"]}',gender='{$_POST["gender"]}',address='{$_POST["address"]}',phone='{$_POST["phone"]}',cpf='{$_POST["cpf"]}',password='{$_POST["password"]}' WHERE id={$_POST["id"]}";
  $banco->query($sql);
  $banco->close();
  return [$_POST["address"], $_POST["password"]];
}

function deletarPessoa(){
  $banco = abrirBanco();
  $sql = "DELETE FROM users WHERE id={$_POST["id"]}"; 
  $banco->query($sql);
  $banco->close();
}