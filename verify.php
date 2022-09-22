<?php

    include("conexao.php");

    $nick = $_POST["name_mail"];
    $pass = $_POST["pass_box"];
 
    $sql = "SELECT user_pass FROM usuario WHERE user_nick='$nick'";

     $result = $pdo->query($sql)->fetch(); 


    /* $result = $pdo->($sql); */

    /*$result = $pdo->execute($sql); */
    
/*     $result = $pdo->mysql_query($sql); */
    
    /* $result = $pdo->mysql_query("SELECT user_pass FROM usuario WHERE user_nick=$nick"); */ 
    
    $rest = implode($result);
    echo $rest; 

/* 
    if($result!=$pass){
        echo "n foi dessa vez;)";
    }
    else
        echo "foiiiiiiiiiiii";
 */


?> 