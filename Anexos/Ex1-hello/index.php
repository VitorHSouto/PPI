<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Exemplo PHP</title>
</head>

<body>

  <h1>Primeiro Título</h1>

  <?php
  for ($i = 0; $i < 5; $i++)
    echo "<h5>Subtitulo gerado dinamicamente com PHP</h5>\n";
  ?>

  <h1>Segundo Título</h1>

  <?php
  for ($i = 0; $i < 5; $i++)
    echo "<h5>Outro subtitulo gerado com PHP</h5>\n";
  ?>

</body>

</html>