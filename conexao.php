<?php

    $pdo = new PDO('mysql:host=localhost;dbname=tech_motors','root','');

    $sql = $pdo->prepare("SELECT * FROM usuario WHERE user_id=1");

    $sql->execute();

    echo $sql;
    
?>
