<?php

    function carregaString($arquivo)
    {
        $arq = fopen($arquivo, "r");
        $string = fgets($arq);
        fclose($arq);
        return htmlspecialchars($string);
    }
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senhaHash = carregaString("senhaHash.txt");

    if($email == carregaString("email.txt") && password_verify($senha, $senhaHash))
        header("Location: sucesso.html");
    else
        header("Location: index.html");

    exit();
?>