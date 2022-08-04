<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

function verificaEndereco($cep)
{
  $sql = <<<SQL
  SELECT rua, bairro, cidade
  FROM verificaCep
  WHERE cep = ?
  SQL;

  try 
  {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cep]);
    $row = $stmt->fetch();
    if (!$row)

    $rua = $row['rua'] ?? '';
    $bairro = $row['bairro'] ?? '';
    $cidade = $row['cidade'] ?? '';
    $endereco = new Endereco($rua, $bairro, $cidade);

    header('Content-type: application/json');  
    echo json_encode($endereco);
  } 
  catch (Exception $e) 
  {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

$cep = $_GET['cep'] ?? '';
verificaEndereco($cep);