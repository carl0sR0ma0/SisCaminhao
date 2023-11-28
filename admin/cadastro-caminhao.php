<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Novo Caminhão</title>
  <link rel="stylesheet" href="./css/cadastrar-caminhao.css">
</head>

<body>
  <?php include "header.php"; ?>
  <?php
  if (isset($_POST['button'])) {
    // Receba os dados do formulário
    $placa = $_POST["placa"];
    $nome = $_POST["nome"];
    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $quilometragem = $_POST["quilometragem"];

    // Prepare a consulta SQL para inserção
    $sql = "INSERT INTO caminhao (placa, nome, modelo, marca, quilometragem) 
            VALUES ('$placa', '$nome', '$modelo', '$marca', $quilometragem)";

    // Execute a consulta SQL
    if (mysqli_query($conexao, $sql)) {
      echo "<script language='javascript'>window.alert('Caminhao cadastrado com Sucesso!!!');window.location='caminhoes.php';</script>";
    } else {
      echo "<script language='javascript'>window.alert('Ocorreu um erro ao cadastrar');</script>";
    }
  }
  mysqli_close($conexao);
  ?>

  <form action="cadastro-caminhao.php" method="post">
    <label for="placa">Placa:</label>
    <input type="text" id="placa" name="placa" required>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="modelo">Modelo:</label>
    <input type="text" id="modelo" name="modelo" required>

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" required>

    <label for="quilometragem">Quilometragem:</label>
    <input type="number" id="quilometragem" name="quilometragem" min="0" required>

    <button type="submit" value="Cadastrar" name="button">Cadastrar</button>
  </form>

  <?php include "footer.php"; ?>

</body>

</html>