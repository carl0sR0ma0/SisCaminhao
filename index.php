<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gestão de Veículos</title>
</head>

<body>
  <div id="logo">
    <img src="img/caminhao.png" alt="Logo da Escola">
  </div>
  <div id="caixa-login">
    <?php
    if (isset($_POST['button'])) {
      echo "<script language='javascript'>window.location='admin';</script>";
    }
    ?>
    <form action="" method="post" name="form" enctype="multipart/form-data">
      <table>
        <td><input class="input" type="submit" name="button" value="Entrar"></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>