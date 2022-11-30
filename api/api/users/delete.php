<?php
if ($acao == "" && $param == "") {
  echo json_encode(["ERROR" => 'Caminho não encontrado']);
}
if ($acao == "exclui" && $param == "") {
  echo json_encode(["ERROR" => 'É necessário um id para excluir']);
}

if ($acao == "exclui" && $param != "") {
  
    $sql = "DELETE FROM users WHERE id={$param}";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
      echo json_encode(["SUCCESS" => "Exclusão bem sucedida!"]);
    } else {
      echo json_encode(["ERROR" => "Exclusão mal sucedida!"]);
    }
  
}