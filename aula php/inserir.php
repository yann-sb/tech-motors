<?php

    include("conecta.php");

    $nome = $_POST["nome"];
    
    $comando = $pdo->prepare("INSERT INTO medicos(nome) VALUES(:nome)");
    $comando->bindValue(":nome",$nome);
    $comando->execute();

    echo("dados gravados");

?>