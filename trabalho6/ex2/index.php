<!DOCTYPE html>
<html lang="pt–BR">
  <head>
    <meta charset="UTF–8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <title>Exercício 2</title>
</head>
  <body class="container">

    <?php
		$nome = ["Celular", "Televisão", "Geladeira", "Cadeira", "Mesa", "Computador", "Escrivaninha", "Armario", "Microondas", "Armário"];
		$desc = ["é um Celular", "é uma Televisão", "é uma Geladeira", "é uma Cadeira", "é uma Mesa", "é um Computador", "é uma Escrivaninha", "é um Armario", "é um Microondas", "é um Armário"];
		
		$qde = 3;
		if(isset($_GET["qde"]))
			$qde = $_GET["qde"];
		if($qde > 10)
			$qde = 10;

		for($i = 0; $i < $qde; $i++)
		{
			$rand = rand(0,9);
			echo '<div class="row">';
			echo "<div class='col-sm-2'> $i </div>";
			echo "<div class='col-sm-4'> $nome[$rand] </div>";
			echo "<div class='col-sm-6'> $desc[$rand] </div>";
			echo "</div>";		
		}

    ?>

        

  </body>
</html>
