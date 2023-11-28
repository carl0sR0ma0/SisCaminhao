<?php
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dt_atual = new DateTime();

  $id_caminhao = $_POST["truckId"];
  $dt_manutencao = $dt_atual->format('Y-m-d');
  $quilometragem = $_POST["quilometragemNow"];
  $maintenanceType = $_POST["maintenanceType"];
  $nextMaintenanceDate = $_POST["nextMaintenanceDate"];
  $observation = $_POST["observation"];

  $sql = "INSERT INTO historico_manutencao (id_caminhao, dt_manutencao, tipo, quilometragem, dt_proxima_troca, observacao)
          VALUES ('$id_caminhao', '$dt_manutencao', '$maintenanceType', '$quilometragem', '$nextMaintenanceDate', '$observation')";

  // Execute a consulta SQL
  if (mysqli_query($conexao, $sql)) {
    echo "Registro de manutenção inserido com sucesso!";
  } else {
    echo "Erro ao inserir registro de manutenção: " . mysqli_error($conexao);
  }
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
