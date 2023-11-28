function openMaintenanceModal(truckId, quilometragemNow) {
  var modal = document.getElementById('maintenanceModal');
  // Define o valor do campo ID do caminhão no modal
  document.getElementById('truckId').value = truckId;
  document.getElementById('quilometragemNow').value = quilometragemNow;
  modal.style.display = 'block';
}

function closeMaintenanceModal() {
  var modal = document.getElementById('maintenanceModal');
  modal.style.display = 'none';
}

var maintenanceLinks = document.getElementsByClassName('maintenance');
for (var i = 0; i < maintenanceLinks.length; i++) {
  maintenanceLinks[i].addEventListener('click', function () {
    var truckId = this.getAttribute('data-id');
    var quilometragemNow = this.getAttribute('quilometragem-Now');
    openMaintenanceModal(truckId, quilometragemNow);
  });
}

function submitMaintenanceForm() {
  // Coletar os dados do formulário
  var truckId = $("#truckId").val();
  var maintenanceType = $("#maintenanceType").val();
  var observation = $("#observation").val();
  var nextMaintenanceDate = $("#nextMaintenanceDate").val();
  var quilometragemNow = $("#quilometragemNow").val();

  $.ajax({
    type: "POST",
    url: "processar-manutencao.php",
    data: {
      truckId: truckId,
      maintenanceType: maintenanceType,
      observation: observation,
      nextMaintenanceDate: nextMaintenanceDate,
      quilometragemNow: quilometragemNow
    },
    success: function (response) {
      console.log(response);
      closeMaintenanceModal();
    },
    error: function (error) {
      console.error("Erro na requisição Ajax: ", error);
    }
  });
}