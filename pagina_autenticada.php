<?php
  session_start();
  include('verificar_session.inc');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
    <title>Index</title>
  </head>
  <body>
    <div style="text-align: center;">
      <p style="font-size: 25px;"><strong>BEM-VINDO</strong></p>
      <form method="GET">
        <input type="submit" name="logout" value="Sair" id="buttonSair">
      </form>
    </div>
    <footer>
      <t>Emily Brito de Oliveira - 914A</t>
    </footer>
  </body>
</html>
