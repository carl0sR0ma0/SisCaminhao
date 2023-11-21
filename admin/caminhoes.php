<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Caminhões</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="./css/caminhoes.css">
</head>

<body>
  <?php include "header.php"; ?>

  <h2>Lista de Caminhões</h2>

  <?php
  $sql = "SELECT * FROM caminhao WHERE nome != ''";
  $con = mysqli_query($conexao, $sql);
  if (mysqli_num_rows($con) == '')
    echo "No momento não existe caminhões cadastrados!";
  else { ?>
    <table>
      <thead>
        <tr>
          <th>Placa</th>
          <th>Nome</th>
          <th>Modelo</th>
          <th>Eixos</th>
          <th>Próxima Troca</th>
          <th>Ações</th>
        </tr>
      </thead>
      <?php
      while ($res_1 = mysqli_fetch_assoc($con)) {
        $dataBanco = $res_1['dt_proxima_troca'];
        $dataDoBanco = new DateTime($dataBanco);
        $dataAtual = new DateTime();

        $classe_css = $dataDoBanco->format('Y-m-d') >= $dataAtual->format('Y-m-d') ? 'needs-oil-change' : ''; ?>
        <tbody>
          <?php echo "<tr class='{$classe_css}'>" ?>
          <td><?php echo $id = $res_1['placa']; ?></td>
          <td><?php echo $res_1['nome']; ?></td>
          <td><?php echo $res_1['modelo']; ?></td>
          <td><?php echo $res_1['eixos']; ?></td>
          <td><?php echo $res_1['dt_proxima_troca']; ?></td>
          <?php echo "<td class='actions'>
                <a href='#'><i class='far fa-eye'></i></a>
                <a href='#'><i class='far fa-edit'></i></a>
                <a href='#'><i class='far fa-trash-alt'></i></a>
                <a href='#' class='maintenance' data-id='{$res_1['placa']}'><i class='fas fa-wrench'></i></a>
              </td>" ?>
          </tr>
        </tbody>
      <?php
      } ?>
    </table>
  <?php
  }
  ?>
  <!-- Modal de Manutenção -->
  <div id="maintenanceModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeMaintenanceModal()">&times;</span>
      <h3>Formulário de Manutenção</h3>
      <form>
        <label for="truckId">ID do Caminhão:</label>
        <input type="text" id="truckId" name="truckId" readonly>
        <label for="maintenanceType">Tipo de Manutenção:</label>
        <select id="maintenanceType" name="maintenanceType">
          <option value="troca_oleo">Troca de Óleo</option>
          <option value="troca_pneu">Troca de Pneu</option>
          <option value="ajustes_pequenos">Ajustes Pequenos</option>
          <option value="ajustes_grandes">Ajustes Grandes</option>
        </select>
        <label for="observation">Observação:</label>
        <textarea id="observation" name="observation"></textarea>
        <label for="nextMaintenanceDate">Próxima Manutenção:</label>
        <input type="date" id="nextMaintenanceDate" name="nextMaintenanceDate">
        <button type="submit">Enviar</button>
      </form>
    </div>
  </div>

  <script>
    function openMaintenanceModal(truckId) {
      var modal = document.getElementById('maintenanceModal');
      // Define o valor do campo ID do caminhão no modal
      document.getElementById('truckId').value = truckId;
      modal.style.display = 'block';
    }

    function closeMaintenanceModal() {
      var modal = document.getElementById('maintenanceModal');
      modal.style.display = 'none';
    }

    var maintenanceLinks = document.getElementsByClassName('maintenance');
    for (var i = 0; i < maintenanceLinks.length; i++) {
      maintenanceLinks[i].addEventListener('click', function() {
        var truckId = this.getAttribute('data-id');
        openMaintenanceModal(truckId);
      });
    }
  </script>

  <?php include "footer.php"; ?>

</body>

</html>