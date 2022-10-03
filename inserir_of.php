<?php

    include("conexao.php");

    $nome = $_POST["user_name"];
    $sobre = $_POST["user_lastname"];
    $nick = $_POST["user_nick"];
    $email = $_POST["user_email"];
    $pass = base64_encode($_POST["pass_box"]);
    $bday = $_POST["user_bday"];
    $num = $_POST["user_num"];
    $cpf = $_POST["user_cpf"];
    
    $comando = $pdo->prepare("INSERT INTO usuario(user_rank,user_name,user_last_name,user_nick,user_mail,user_pass,user_bday,user_number,user_cpf) VALUES('3',:nome,:sobre,:nick,:mail,:pass,:bday,:num,:cpf)");
    $comando->bindValue(":nome",$nome);
    $comando->bindValue(":sobre",$sobre);
    $comando->bindValue(":nick",$nick);
    $comando->bindValue(":mail",$email);
    $comando->bindValue(":pass",$pass);
    $comando->bindValue(":bday",$bday);
    $comando->bindValue(":num",$num);
    $comando->bindValue(":cpf",$cpf);
    $comando->execute();

    print_r($pass);
    echo("<br>");
    print_r(base64_decode($pass));

    /* echo pag_up('index.php') */

?>