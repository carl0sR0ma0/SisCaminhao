<?php
function conectar()
{
  $host = "localhost";
  $user = "root";
  $passoword = "mudar@123";
  $db = "sistema_caminhao";

  $con = mysqli_connect($host, $user, $passoword, $db);
  if (!$con)
    die("FALHA NA CONEXÃO <br>" . mysqli_connect_error());
  return $con;
}
$conexao = conectar();
