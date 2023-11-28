<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados do Caminhão</title>
  <link rel="stylesheet" href="./css/visualizar-caminhao.css">
</head>

<body>
  <?php include "header.php"; ?>

  <main>
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM caminhao WHERE id = $id";
      $con = mysqli_query($conexao, $sql);

      if (mysqli_num_rows($con) == '') {
        echo "<p>Nenhum caminhão encontrado com o ID fornecido.</p>";
      } else {
        $row = mysqli_fetch_assoc($con);
        echo "<h1>Dados do Caminhão</h1>";
        echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
        echo "<p><strong>Placa:</strong> " . $row['placa'] . "</p>";
        echo "<p><strong>Nome:</strong> " . $row['nome'] . "</p>";
        echo "<p><strong>Modelo:</strong> " . $row['modelo'] . "</p>"; 
        echo "<p><strong>Marca:</strong> " . $row['marca'] . "</p>"; 
        echo "<p><strong>Quilometragem (Km):</strong> " . $row['quilometragem'] . "</p>";
        echo "<p><strong>Próxima Quilometragem (Km):</strong> " . $row['quilometragem_proxima_troca'] . "</p>";
        echo "<p><strong>Próxima data para troca óleo:</strong> " . $row['dt_proxima_troca'] . "</p>";
      }
    } else {
      echo "<p>ID do caminhão não fornecido.</p>";
    }
    ?>
  </main>

  <?php include "footer.php"; ?>
</body>

</html>