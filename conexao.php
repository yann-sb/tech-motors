<?php

date_default_timezone_set('America/Sao_Paulo');

// CONEXÃO COM A BASE DE DADOS: verifique sempre o dbname
try{
    $pdo = new PDO("mysql:dbname=tech_motors;host=localhost;charset=utf8","root","");
}
catch(PDOException $erro)
{
    echo("ERRO NA CONEXÃO: <br>".$erro->getMessage());
}
    
?>
