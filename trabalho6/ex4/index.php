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
            function carregaString($arquivo)
            {
                $arq = fopen($arquivo, "r");
                $string = fgets($arq);
                fclose($arq);
                return htmlspecialchars($string);
            }

            $email = carregaString("email.txt");
            $senhaHash = carregaString("senhaHash.txt");

            echo "<table> <tr> <th>Email</th> <th>Senha</th> </tr> <tr>";
            echo "<td> $email </td>";
            echo "<td> $senhaHash </td>";
            echo '</tr> </table>';
        ?>
    </main>
</body>
</html>