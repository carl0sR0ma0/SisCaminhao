<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
  <link rel="stylesheet" typ="text/css" href="../jquery.superbox.css" media="all">
  <script type="text/javascript" src="../jquery.superbox-min.js"></script>
  <?php include "../conexao.php"; ?>
</head>

<body>
  <header>
    <div style="text-align: center; margin-top: 20px;">
      <img src="../img/caminhao.png" alt="Caminhão Simples">
    </div>
  </header>

  <nav>
    <a href="index.php">Home</a>
    <div class="dropdown">
      <a href="#">Serviços</a>
      <div class="submenu">
        <a href="caminhoes.php">Listagem</a>
        <a href="cadastro-caminhao.php">Cadastro</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="#">Historico</a>
      <div class="submenu">
        <a href="historico-abastecimento.php">Abastecimento</a>
        <a href="historico-abastecimento.php">Manutenção</a>
      </div>
    </div>
    <a href="#">Contato</a>
  </nav>
</body>

</html>