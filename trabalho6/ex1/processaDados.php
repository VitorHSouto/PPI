<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 01</title>
</head>

<?php

    $estado = $cidade = $bairro = $cep = $logradouro = "";

    if(isset($_POST["cep"]))
        $cep = htmlspecialchars($_POST["cep"]);

    if(isset($_POST["bairro"]))
        $bairro = htmlspecialchars($_POST["bairro"]);
        
    if(isset($_POST["logradouro"]))
        $logradouro = htmlspecialchars($_POST["logradouro"]);

    if(isset($_POST["cidade"]))
        $cidade = htmlspecialchars($_POST["cidade"]);

    if(isset($_POST["estado"]))
        $estado = htmlspecialchars($_POST["estado"]);

    echo '<div class="row">';
    echo "<div class='col-sm'> $cep </div>";
    echo "<div class='col-sm'> $bairro </div>";
    echo "<div class='col-sm'> $logradouro </div>";
    echo "<div class='col-sm'> $cidade </div>";
    echo "<div class='col-sm'> $estado </div>";
    echo '</div>';

?>
</body>

</html>