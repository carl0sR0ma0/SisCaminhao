<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Histórico de Abastecimento</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      box-sizing: border-box;
    }

    button.open-modal {
      background-color: #4CAF50;
      color: white;
      padding: 12px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>

<body>
  <?php include "header.php"; ?>

  <h2>Histórico de Abastecimento</h2>

  <button class="open-modal" onclick="openModal()">Adicionar Abastecimento</button>

  <table>
    <thead>
      <tr>
        <th>Data e Hora</th>
        <th>Quilometragem</th>
        <th>Caminhão + Placa</th>
        <th>Quantidade em Litros</th>
        <th>Data do Próximo Abastecimento</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Exemplo de dados (substitua isso com seus dados reais do banco de dados)
      $historico_abastecimento = [
        ["data_hora" => "2023-01-15 10:30", "quilometragem" => 50000, "caminhao_placa" => "Caminhão XYZ - ABC123", "litros_abastecidos" => 100, "data_proximo_abastecimento" => "2023-02-15"],
        ["data_hora" => "2023-02-10 15:45", "quilometragem" => 50500, "caminhao_placa" => "Caminhão XYZ - ABC123", "litros_abastecidos" => 80, "data_proximo_abastecimento" => "2023-03-10"],
        ["data_hora" => "2023-03-05 08:20", "quilometragem" => 51000, "caminhao_placa" => "Caminhão ABC - XYZ789", "litros_abastecidos" => 120, "data_proximo_abastecimento" => "2023-04-05"],
      ];

      foreach ($historico_abastecimento as $abastecimento) {
        echo "<tr>";
        echo "<td>{$abastecimento['data_hora']}</td>";
        echo "<td>{$abastecimento['quilometragem']}</td>";
        echo "<td>{$abastecimento['caminhao_placa']}</td>";
        echo "<td>{$abastecimento['litros_abastecidos']}</td>";
        echo "<td>{$abastecimento['data_proximo_abastecimento']}</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

  <?php include "footer.php"; ?>

  <!-- Modal para adicionar novo abastecimento -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <!-- Conteúdo do formulário de novo abastecimento aqui -->
      <span onclick="closeModal()" style="cursor: pointer; float: right;">&times;</span>
      <h3>Novo Registro de Abastecimento</h3>
      <!-- Formulário aqui -->
    </div>
  </div>

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