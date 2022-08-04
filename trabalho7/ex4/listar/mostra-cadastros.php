<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT nome, peso, altura, tiposangue
  FROM pessoa INNER JOIN paciente ON pessoa.codigo = codigo_cliente
  SQL;

  // Neste exemplo não é necessário utilizar prepared statements
  // porque não há possibilidade de injeção de SQL, 
  // pois nenhum parâmetro é utilizado na query SQL
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  //error_log($e->getMessage(), 3, 'log.php');
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabelas</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <style>
    body {
      padding-top: 2rem;
    }
  </style>
</head>

<body>

  <div class="container">
    <h3>Entregas Programadas</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Tipo sanguíneo</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        // Limpa os dados produzidos pelo usuário
        // com possibilidade de ataque XSS
        $nome = htmlspecialchars($row['nome']);
        $peso = htmlspecialchars($row['peso']);
        $altura = htmlspecialchars($row['altura']);
        $tiposangue = htmlspecialchars($row['tiposangue']);

        echo <<<HTML
          <tr>
            <td>$nome</td>
            <td>$peso</td>
            <td>$altura</td>
            <td>$tiposangue</td> 
          </tr>      
        HTML;
      }
      ?>

    </table>
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>