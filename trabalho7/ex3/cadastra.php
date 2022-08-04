
<?php
    require "conexaoMysql.php";
    $pdo = mysqlConnect();

    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    try {
        $sql = <<<SQL
        INSERT INTO cadastros (email, senhaHash)
        VALUES (?, ?)
        SQL;
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $senha]);
        
        header("location: index.php");
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