<?php
if ($acao == "" && $param == "") {
  echo json_encode(["ERROR" => 'Caminho não encontrado']);
}
if ($acao == "atualiza" && $param == "") {
  echo json_encode(["ERROR" => 'É necessário um id para atualizar']);
}

//lista/
if ($acao == "atualiza" && $param != "") {
  $entityBody = json_decode(file_get_contents('php://input'), true);
  if ($entityBody == NULL) {
    echo json_encode(["ERROR" => 'É necessário um preencher o BODY para atualizar']);
  } else {
    $sql = "UPDATE users SET ";
    $contador = 1;
    foreach (array_keys($entityBody) as $indice) {
      if (count($entityBody) > $contador) {
        $sql .= "{$indice} = '{$entityBody[$indice]}',";
      } else {
        $sql .= "{$indice} = '{$entityBody[$indice]}'";
      }
      $contador++;
    }
    $sql .= " WHERE id={$param}";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
      echo json_encode(["SUCCESS" => "Atualização bem sucedida!"]);
    } else {
      echo json_encode(["ERROR" => "Atualização mal sucedida!"]);
    }
  }
}
