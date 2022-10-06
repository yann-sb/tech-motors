<?php

    include("conexao.php");

    $func = $_POST["func"];

    if($func=="1"){

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
                echo pag_up('profile.html');
            }else{
                if(base64_decode($result_mail[0])==$pass){
                    echo pag_up('profile.html');
                }else{
                    echo pag_up('index.php');
                }
            }

    }

    }

    if($func=="2"){

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

        echo pag_up('index.php');
    }





?>