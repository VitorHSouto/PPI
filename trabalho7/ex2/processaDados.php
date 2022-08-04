<?php
    require "conexaoMysql.php";
    $pdo = mysqlConnect();

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

    try {
        $sql = <<<SQL
        INSERT INTO enderecos (cep, bairro, logradouro, cidade, estado)
        VALUES (?, ?, ?, ?, ?)
        SQL;
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cep, $bairro, $logradouro, $cidade, $estado]);
        
        header("location: mostra-enderecos.php");
        exit();
    } 
    catch (Exception $e) 
    { 
        if ($e->errorInfo[1] === 1062)
            exit('Dados duplicados: ' . $e->getMessage());
        else
            exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }

?>