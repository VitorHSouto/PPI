<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
</head>
<body>
    <?php
        function salvaString($string, $arquivo)
        {
            $arq = fopen($arquivo, "w");
            fwrite($arq, $string);
            fclose($arq);
        }
        
        $email = $_POST["email"];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
        salvaString($email, "email.txt");
        salvaString($senha, "senhaHash.txt");

        echo "<h2>Cadastro realizado com sucesso!</h2>";
    ?>
</body>
</html>