<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Novo Caminhão</title>
  <style>
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      box-sizing: border-box;
      display: grid;
      gap: 16px;
      margin: auto;
      margin-top: 50px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    select {
      height: 40px;
      /* Adjust the height for consistency with the input fields */
    }

    button {
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
  <form action="processar_formulario.php" method="post">
    <label for="modelo">Modelo:</label>
    <input type="text" id="modelo" name="modelo" required>

    <label for="ano">Ano:</label>
    <input type="number" id="ano" name="ano" min="1900" max="2099" step="1" required>

    <label for="capacidade">Capacidade:</label>
    <input type="text" id="capacidade" name="capacidade" required>

    <label for="troca_oleo">Troca de Óleo Necessária:</label>
    <select id="troca_oleo" name="troca_oleo" required>
      <option value="1">Sim</option>
      <option value="0">Não</option>
    </select>

    <button type="submit">Cadastrar</button>
  </form>

  <?php include "footer.php"; ?>

</body>

</html>