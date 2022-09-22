<?php

    include("conexao.php");

    $nick = $_POST["name_mail"];

    $comando = $pdo->prepare("SELECT user_pass FROM usuario WHERE user_nick=($nick)");

    $comando->execute();

    print_r($comando);


?>