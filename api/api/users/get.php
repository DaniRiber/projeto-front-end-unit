<?php
if ($acao == "" && $param == "") {
  echo json_encode(["ERROR" => 'Caminho não encontrado']);
}

//lista/
if ($acao == "lista" && $param == "") {
  $db = DB::connect();
  $rs = $db->prepare("SELECT * FROM users ORDER BY name");
  $rs->execute();
  $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

  if (isset($obj)) {
    echo json_encode(["users" => $obj]);
  } else {
    echo json_encode(["users" => 'Não existe usuários para retornar']);
  }
}
//lista/1
if ($acao == "lista" && $param != "") {
  $db = DB::connect();
  $rs = $db->prepare("SELECT * FROM users WHERE id = {$param}");
  $rs->execute();
  $obj = $rs->fetchObject();

  if (isset($obj)) {
    echo json_encode(["user" => $obj]);
  } else {
    echo json_encode(["user" => 'Não existe usuário para retornar']);
  }
}
