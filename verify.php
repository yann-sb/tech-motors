<?php

    include("conexao.php");

    $nick = $_POST["name_mail"];
    $pass = $_POST["pass_box"];
 
    if($nick==null){
        echo pag_up('index.php');
    }elseif($pass==null){
        echo pag_up('index.php');
    }else{

        $sql = "SELECT user_pass FROM usuario WHERE user_nick='$nick'";

        $result = $pdo->query($sql)->fetch(); 

        if($result[0]==$pass){
            echo "fooooiiiii";
        }else{
            echo "n foi dessa vez ;)";
        }

    }

    
?> 