<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Caminhão</title>
  <link rel="stylesheet" href="./css/editar-caminhao.css">
</head>

<body>
  <?php include "header.php"; ?>
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM caminhao WHERE id = $id";
    $con = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($con) > 0) {
      $dadosCaminhao = mysqli_fetch_assoc($con);
    } else {
      echo "Nenhum caminhão encontrado com o ID fornecido.";
    }
  } else {
    echo "ID do caminhão não fornecido.";
  }
  ?>

  <form action="processar-editar-caminhao.php" method="post">
    <input type="hidden" name="id" value="<?php echo $dadosCaminhao['id']; ?>">

    <label for="placa">Placa:</label>
    <input type="text" id="placa" name="placa" value="<?php echo $dadosCaminhao['placa']; ?>" required>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $dadosCaminhao['nome']; ?>" required>

    <label for="modelo">Modelo:</label>
    <input type="text" id="modelo" name="modelo" value="<?php echo $dadosCaminhao['modelo']; ?>" required>

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" value="<?php echo $dadosCaminhao['marca']; ?>" required>

    <label for="quilometragem">Quilometragem:</label>
    <input type="number" id="quilometragem" name="quilometragem" min="0" value="<?php echo $dadosCaminhao['quilometragem']; ?>" required>

    <button type="submit">Salvar</button>
  </form>

  <?php include "footer.php"; ?>
</body>

</html>