<?php

    include("conexao.php");

    $nick = $_POST["name_mail"];
    $pass = $_POST["pass_box"];
 
    if($nick==null){
        echo pag_up('index.php');
    }elseif($pass==null){
        echo pag_up('index.php');
    }else{

        $sql_name = "SELECT user_pass FROM usuario WHERE user_nick='$nick'";
        $sql_mail = "SELECT user_pass FROM usuario WHERE user_mail='$nick'";

        $result_name = $pdo->query($sql_name)->fetch(); 
        $result_mail = $pdo->query($sql_mail)->fetch(); 
        
        if(base64_decode($result_name[0])==$pass){
            echo "fooooiiiii";
        }else{
            if(base64_decode($result_mail[0])==$pass){
                echo "fooooiiiii";
            }else{
                echo "não foi dessa vez ;)";
            }
        }

    }

    
?> 