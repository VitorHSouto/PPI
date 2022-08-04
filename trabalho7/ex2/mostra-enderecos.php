<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT cep, bairro, logradouro, cidade, estado
  FROM enderecos
  SQL;

  // Neste exemplo não é necessário utilizar prepared statements
  // porque não há possibilidade de injeção de SQL, 
  // pois nenhum parâmetro do usuário é utilizado na query SQL. 
  // Além disso, como há resultados a serem processados, 
  // utilizamos o método query (e não o exec).
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
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

    img {
      width: 15px;
      height: 15px;
    }

  </style>
</head>

<body>

  <div class="container">
    <h3>Clientes Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th></th>
        <th>Cep</th>
        <th>Bairro</th>
        <th>Email</th>
        <th>Nascimento</th>
        <th>Civil</th>
        <th>Altura</th>
        <th>SenhaHash</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        // Limpa os dados produzidos pelo usuário
        // com possibilidade de ataque XSS
        // antes de inserí-los na página HTML
        $cep = htmlspecialchars($row['cep']);
        $bairro = htmlspecialchars($row['bairro']);
        $logradouro = htmlspecialchars($row['logradouro']);
        $cidade = htmlspecialchars($row['cidade']);
        $estado = htmlspecialchars($row['estado']);

        echo <<<HTML
          <tr>
            <td>
              <a href="exclui-cliente.php?cpf=$cpf">
              <img src="images/delete.png"></a>
            </td> 
            <td>$cep</td> 
            <td>$bairro</td>
            <td>$logradouro</td>
            <td>$cidade</td>
            <td>$estado</td>
          </tr>      
        HTML;

      }
      ?>

    </table>
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>