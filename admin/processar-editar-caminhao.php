<?php include "header.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $placa = $_POST["placa"];
  $nome = $_POST["nome"];
  $modelo = $_POST["modelo"];
  $marca = $_POST["marca"];
  $quilometragem = $_POST["quilometragem"];

  $sql = "UPDATE caminhao SET 
            placa = '$placa',
            nome = '$nome',
            modelo = '$modelo',
            marca = '$marca',
            quilometragem = $quilometragem
            WHERE id = $id";

  if (mysqli_query($conexao, $sql)) {
    header("Location: visualizar-caminhao.php?id=$id");
    exit();
  } else {
    echo "Erro ao atualizar registro: " . mysqli_error($conexao);
  }
}

mysqli_close($conexao);
