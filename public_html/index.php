<?php
  include('conexao.php'); 
  
  if($retorno != null){
    $nameEntrar = "Sair";
    $onclickCadastrar = "document.getElementById('userLogado').style.display='block'";
    $onclickEntrar = "sair()";
    $nameInput = $retorno[0]["name"];
    $email = $retorno[0]["address"];
    $genero = $retorno[0]["gender"];
    $telefone = $retorno[0]["phone"];
    $cpf = $retorno[0]["cpf"];
    $id = $retorno[0]["id"];
    $password = $retorno[0]["password"];
    
  }else{
    $onclickCadastrar = "document.getElementById('cadastrar').style.display='block'";
    $onclickEntrar = "document.getElementById('entrar').style.display='block'";
    $nameEntrar = "Entrar";
    $nameInput = "Cadastrar";
    $email = "";
    $genero = "";
    $telefone = "";
    $cpf = "";
    $id = "";
    $password = "";
  }
  
  
  
?>
<!DOCTYPE html5>
<html lang="pt">
<title>ODS 14 - Vida na Água</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="./css/style.css">

<body>


<!-- Navbar -->
  <div class="w3-bar w3-theme-d2">
    <nav class="w3-sidebar w3-bar-block w3-card w3-teal" id="mySidebar">
      <div class="w3-container">
        <div class="w3-row w3-right">
          <span onclick="closeSidebar()" class="w3-button w3-large w3-center w3-theme-d2">&times;</span>
         
        </div>

      </div>
      <div class="w3-container ">
        <a href="#header" class="w3-bar-item w3-button w3-text-white">Vida na Água</a>
        <a href="#agua" class="w3-bar-item w3-button w3-text-white">Água</a>
        <a href="#bluekeepers" class="w3-bar-item w3-button w3-text-white">Projeto Blue Keepers</a>
        <a href="#ajudar" class="w3-bar-item w3-button w3-text-white">Como posso ajudar?</a>
        <a href="#footer" class="w3-bar-item w3-button w3-text-white">Saiba mais</a>
      </div>
    </nav>
    <button class="w3-bar-item w3-button w3-large w3-hover-theme" onclick="openSidebar()">&#9776;</button>
    
    
    <?php echo '<a onclick='.$onclickEntrar.' class="w3-bar-item w3-button w3-text-white w3-right">'.$nameEntrar.'</a>';?>
    <?php echo '<a onclick='.$onclickCadastrar.' class="w3-bar-item w3-button w3-text-white w3-right">'.$nameInput.'</a>';?>
   
    <!-- fazer login -->
    <div id="entrar" class="w3-modal w3-row">
      <div class=" w3-teal w3-display-middle w3-row w3-col s11 m8 l4">
        <div class="w3-container ">
          <span onclick="document.getElementById('entrar').style.display='none'"
          class="w3-button w3-display-topright">&times;</span>
          <h1>Login</h1>
          <form class="w3-container" action="index.php" method="POST">
            <label>E-mail</label>
            <input class="w3-input w3-margin-bottom" name="address" type="email">

            <label>Senha</label>
            <input class="w3-input w3-margin-bottom" name="password" type="password">
            
            <input type="hidden" name="acao" value="entrar">
            <input class="w3-input w3-margin-top" type="submit" name="entrar" value="Entrar">
          </form>
        </div>
      </div>
    </div>
    <!-- infos usuário -->
    <div id="userLogado" class="w3-modal w3-row">
      <div class=" w3-teal w3-display-middle w3-row w3-col s11 m8 l4">
        <div class="w3-container ">
          <span onclick="document.getElementById('userLogado').style.display='none';document.getElementById('tableInfos').style.display='block';document.getElementById('formAtualizar').style.display='none'"
          class="w3-button w3-display-topright">&times;</span>
          <h1><?=$nameInput?></h1>
          <table id="tableInfos" class="w3-table w3-teal">
            <tr>
              <th>E-mail:</th>
              <td><?=$email?></td>
            </tr>
            <tr>
              <th>CPF:</th>
              <td><?=$cpf?></td>
            </tr>
            <tr>
              <th>Gênero:</th>
              <td><?=$genero?></td>
            </tr>
            <tr>
              <th>Telefone:</th>
              <td><?=$telefone?></td>
            </tr>
            <tr>
            <th></th>
            <td><input class="w3-input w3-margin-top" type="submit" onclick="document.getElementById('tableInfos').style.display='none';document.getElementById('formAtualizar').style.display='block'" name="atualizar" value="Atualizar"> </td>
              
            </tr>
          </table>
          <form id="formAtualizar" class="w3-container" action="index.php" method="POST" style="display: none;">
            <input class="w3-input w3-margin-bottom" name="id" type="hidden" value="<?=$id?>">

            <label>Nome</label>
            <input class="w3-input w3-margin-bottom" name="name" type="text" value="<?=$nameInput?>">

            <label>E-mail</label>
            <input class="w3-input w3-margin-bottom" name="address" type="email" value="<?=$email?>">

            <label>Telefone</label>
            <input class="w3-input w3-margin-bottom" name="phone" type="text" value="<?=$telefone?>">

            <label>CPF</label>
            <input class="w3-input w3-margin-bottom" name="cpf" type="text" value="<?=$cpf?>">

            <?php 
              if($genero == "M"){
                $inputM = 'class="w3-radio w3-margin-bottom" type="radio" name="gender" value="M" checked';
                $inputF = 'class="w3-radio w3-margin-bottom" type="radio" name="gender" value="F"';
              }
              else{
                $inputM = 'class="w3-radio w3-margin-bottom" type="radio" name="gender" value="M"';
                $inputF = 'class="w3-radio w3-margin-bottom" type="radio" name="gender" value="F" checked';
              }
            ?>
            <label>Sexo:</label>
            <input <?=$inputM?>>
            <label>Masculino</label>
            <input <?=$inputF?>>
            <label>Feminino</label>

            <br>
            <label>Senha</label>
            <input class="w3-input w3-margin-bottom" name="password" type="password" value="<?=$password?>">
            
            
            <input type="hidden" name="acao" value="atualizar">
            <input class="w3-input w3-margin-top" type="submit" name="atualizar" value="Atualizar">
          </form>
        </div>
      </div>
    </div>
    <!-- fazer cadastro -->
    <div id="cadastrar" class="w3-modal w3-row">
      <div class=" w3-teal w3-display-middle w3-row w3-col s11 m8 l4">
        <div class="w3-container ">
          <span onclick="document.getElementById('cadastrar').style.display='none'"
          class="w3-button w3-display-topright">&times;</span>
          <h1>Login</h1>
          <form class="w3-container" action="index.php" method="POST">
            <label>Nome Completo</label>
            <input class="w3-input w3-margin-bottom" name="name" type="text">

            <label>E-mail</label>
            <input class="w3-input w3-margin-bottom" name="address" type="email">

            <label>Telefone</label>
            <input class="w3-input w3-margin-bottom" name="phone" type="text">

            <label>CPF</label>
            <input class="w3-input w3-margin-bottom" name="cpf" type="text">

            <label>Sexo:</label>
            <input class="w3-radio w3-margin-bottom" type="radio" name="gender" value="M">
            <label>Masculino</label>
            <input class="w3-radio w3-margin-bottom" type="radio" name="gender" value="F">
            <label>Feminino</label>

            <br>
            <label>Senha</label>
            <input class="w3-input w3-margin-bottom" name="password" type="password">
            
            <input type="hidden" name="acao" value="cadastrar">
            <input class="w3-input w3-margin-top" type="submit" name="cadastrar" value="Cadastrar">
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    closeSidebar();
    function openSidebar() {
      document.getElementById("mySidebar").style.display = "block";
    }
    
    function closeSidebar() {
      document.getElementById("mySidebar").style.display = "none";
    }
    function sair(){
      window.open('http://localhost:3000/index.php','_self')
    }
  </script>
<!-- SlideShow -->
  <div class="w3-teal" style="max-height: 500px;" id="slideshow">
    <div class="w3-content w3-display-container" style="height: 100%; width: 100%;" >
      <img class="mySlides imgslideshow w3-display-middle" alt="Peixe dentro de uma sacola plástica" src="images\img1.jpg">
      <img class="mySlides imgslideshow w3-display-middle" alt="Tartaruga levando uma sacola plástica" src="images\img2.jpeg" >
      <img class="mySlides imgslideshow w3-display-middle" alt="Mulher de baixo do mar rodeada por lixo" src="images\img3.jpeg">
      <img class="mySlides imgslideshow w3-display-middle" alt="Carangueijo dentro de um copo plástico" src="images\img4.jpg" >
      <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" id="count">
        <span class="w3-badge demo w3-border"></span>
        <span class="w3-badge demo w3-border"></span>
        <span class="w3-badge demo w3-border"></span>
        <span class="w3-badge demo w3-border"></span>
      </div>
    </div>
  </div>
  <script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 2000);
    }
  </script>

<!-- ODS Vida na água -->
  <div class="w3-container w3-teal w3-text-white w3-padding" id="header">
    <div class="w3-row-padding colorInfo1">
      <div class="w3-col s12 m8 l10">
        <h2> Objetivo 14 – Vida na Água </h2>
        <p>O ODS 14 tem como finalidade conservar e promover o uso sustentável dos oceanos, dos mares e dos recursos
          marinhos para o desenvolvimento sustentável. Inegavelmente, os oceanos facilitam a sociedade através da provisão de 
    alimentos, energia, transporte, turismo, etc. Além disso, regulam muitos os ecossistemas mais críticos da Terra. 
    Podemos dizer que, os oceanos representam aproximadamente US$3 trilhões da economia mundial por ano ou 5% do PIB 
    global. Entretanto, quase50% dos oceanos estão sendo afetados por atividades realizadas pelo homem. Sobretudo, 
    a poluição e pesca predatória, que causa a perda de habitat e o surgimento de espécies invasoras. Ao mesmo tempo 
    que, o lixo também ajuda na degradação dos oceanos. Foram constatados mais de 13.000 pedaços de lixo plástico 
    em cada quilômetro quadrado. Com o propósito de enfrentar todos esses desafios, o ODS 14 foi baseado. </p>
      </div>
      <div class="w3-col s12 m4 l2">
        <img width="100%" alt="ODS 14 - Vida na água" src="images\img0.png">
      </div>
    </div>  
  </div>

<!-- Água -->
  <div class="w3-container w3-teal w3-padding" id="agua">
    <div class="w3-row-padding colorInfo">
      
      <div class="w3-col s12 m8 l10">
        <h2>Água</h2>
        <p>A água é um recurso finito essencial para a manutenção da vida no planeta. Através de atividades antrópicas
          relacionadas ao descarte indevido de efluentes, uso inadequado de substâncias químicas, extração de recursos e
          modificação de condições físico químicas causamos a redução na qualidade da água, poluindo-a de diferentes
          maneiras
          e graus, causando consequências negativas tanto para os demais componentes da biosfera quanto para a própria
          sociedade
          humana.</p>
      </div>
      <div class="w3-col s12 m4 l2">
        <img width="100%" alt="Peixe palhaço" src="images\imgb.gif">
      </div>
    </div>
  </div>

<!-- Projeto Blue Keepers -->
  <div class="w3-container w3-teal  w3-padding">
    <div class="w3-row-padding colorInfo">
      <div class="w3-col s12 m4 l3">
        <img width="100%" alt="Peixe nadando" src="images\imgc.gif">
      </div>
      <div class="w3-col s12 m8 l9">
        <h2>Projeto Blue Keepers</h2>
        <p>A Rede Brasil do Pacto Global da ONU anuncia a criação do Projeto Blue Keepers, iniciativa nacional que busca
          a efetiva mobilização de recursos e inovação tecnológica no combate à poluição do plástico em bacias
          hidrográficas e
          oceanos, com o envolvimento de empresas de todos os setores, diferentes níveis de governo e da sociedade civil
          na
          preservação do ecossistema. A iniciativa faz parte da Década dos Oceanos, criada pela ONU em 2020, que visa a
          conservação
          e uso sustentável dos oceanos, mares e recursos marinhos para o desenvolvimento sustentável.</p>
      </div>
    </div>
    
  </div>

<!-- Como posso ajudar? -->
  <div class="w3-container w3-teal w3-padding" id="ajudar">
    <div class="w3-row-padding colorInfo">
    <div class="w3-col s12 m8 l9">
      <h2>Como posso ajudar?</h2>
      <p>Para ajudar no controle da poluição marinha seria interessante diminuir o consumo de plástico, sobretudo
        os descartáveis. Além disso, apostar na sua reciclagem é uma alternativa extremamente interessante.
        Existem muitas outras medidas que podemos adotar para ajudar controlar e diminuir a poluição marinha, como: </p>
      <ul>
        <li>Não jogar lixo em locais inadequados (plásticos, bitucas de cigarro, móveis velhos);</li>
        <li>Diminuir o consumo de energia;</li>
        <li>Evitar o desperdício de água;</li>
        <li>Optar por andar a pé ou de bicicleta em vez de veículos, sempre que possível;</li>
        <li>Apoiar ONG’s voltadas à preservação dos oceanos;</li>
        <li>Investir em produtos e itens reutilizáveis;</li>
        <li>Escolher empresas que tenham projetos sustentáveis.</li>
      </ul>
    </div>
    <div class="w3-col s12 m4 l3">
      <img width="100%" alt="Tartaruga nadando" src="images\imgd.gif">
    </div>
  </div>
  </div>

<!-- Footer -->
  <div class="w3-container w3-blue w3-center" id="footer">
    <a href="https://www.ipea.gov.br/ods/ods14.html" target="_blank">
      <h5>Saiba mais sobre os ODS</h5>
    </a>
    <p class="footer">© Copyright 2022</p>
  </div>

</body>

</html>
