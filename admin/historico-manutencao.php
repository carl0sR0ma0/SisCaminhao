<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Histórico de Manutenção</title>
  <link rel="stylesheet" href="./css/historico-manutencao.css">
</head>

<body>
  <?php include "header.php"; ?>

  <h2>Histórico de Manutenção</h2>

  <table>
    <thead>
      <tr>
        <th>ID do Caminhão</th>
        <th>Data da Manutenção</th>
        <th>Nome + Placa</th>
        <th>Tipo de Manutenção</th>
        <th>Km Atual</th>
        <th>Km próxima Manutenção</th>
        <th>Data da Próxima Manutenção</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
      }

      $sql = "SELECT id_caminhao, dt_manutencao, tipo, quilometragem, quilometragem_proxima_troca, dt_proxima_troca FROM historico_manutencao";
      $result = $conexao->query($sql);

      if ($result->num_rows > 0) {
        while ($manutencao = $result->fetch_assoc()) {
          $id_caminhao = $manutencao['id_caminhao'];
          $sql2 = "SELECT placa, nome FROM caminhao WHERE id = $id_caminhao";
          $result2 = $conexao->query($sql2);
          echo "<tr>";
          echo "<td>{$manutencao['id_caminhao']}</td>";
          echo "<td>{$manutencao['dt_manutencao']}</td>";
          while ($manutencao2 = $result2->fetch_assoc()) {
            echo "<td>{$manutencao2['nome']} {$manutencao2['placa']}</td>";
          }
          echo "<td>{$manutencao['tipo']}</td>";
          echo "<td>{$manutencao['quilometragem']}</td>";
          echo "<td>{$manutencao['quilometragem_proxima_troca']}</td>";
          echo "<td>{$manutencao['dt_proxima_troca']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
      }
      $conexao->close();
      ?>
    </tbody>
  </table>

  <?php include "footer.php"; ?>

  <script>
    function openModal() {
      document.getElementById("myModal").style.display = "flex";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
  </script>

</body>

</html>