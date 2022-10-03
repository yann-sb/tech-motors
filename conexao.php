<?php

date_default_timezone_set('America/Sao_Paulo');

try{
    $pdo = new PDO("mysql:dbname=tech_motors;host=localhost;charset=utf8","root","");
}
catch(PDOException $erro)
{
    echo("ERRO NA CONEXÃO: <br>".$erro->getMessage());
}
    

function pag_up($link){
    header("location: $link");
};



?>
