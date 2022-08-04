<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT email, senhaHash
  FROM cadastros
  SQL;
  
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 4</title>

    <style>
        body{
            background-color: #ddd;
            font-family: "Helvetica Neue", Helvetica, sans-serif;
        }
        main{
            background-color: white;
            max-width: 90%;
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px gray;
        }
        td, th{
            padding-right: 40px;
        }
    </style>
</head>
<body>
    <main>
        <?php

            echo "<table> <tr> <th>Email</th> <th>Senha</th> </tr> <tr>";

            while ($row = $stmt->fetch())
            {
                $email = htmlspecialchars($row['email']);
                $senhaHash = htmlspecialchars($row['senhaHash']);
        
                echo <<<HTML
                  <tr>
                    <td>$email</td> 
                    <td>$senhaHash</td>
                  </tr>      
                HTML;
        
            }

            echo '</tr> </table>';
        ?>
        
    </main>
</body>
</html>