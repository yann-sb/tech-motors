<?php
    session_start();
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
            
            if(base64_decode($result_name[0])==$pass){
                $sql_user_id = "SELECT user_id FROM usuario WHERE user_nick='$nick'";
                $result_id = $pdo->query($sql_user_id)->fetch();

                $_SESSION['id_usuario'] = $result_id;
                $_SESSION['loggedin'] = true;    
                    
                echo pag_up('profile.html');
            }else{
                $result_mail = $pdo->query($sql_mail)->fetch();
                if(base64_decode($result_mail[0])==$pass){
                    
                    $_SESSION['id_usuario'] = $result_id;
                    $_SESSION['loggedin'] = true;    
                    
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

        if($nome!=null){
            if($sobre!=null){
                if($nick!=null){
                    if($email!=null){
                        if($pass!=null){
                            if($bday!=null){
                                if($cpf!=null){
                                    if($nome!=null){
                                        $comando->execute();
                                        echo pag_up('index.php');
                                    }else{
                                        echo pag_up('create_user_pg.html');
                                    }
                                }else{
                                    echo pag_up('create_user_pg.html');
                                }
                            }else{
                                echo pag_up('create_user_pg.html');
                            }
                        }else{
                            echo pag_up('create_user_pg.html');
                        }
                    }else{
                        echo pag_up('create_user_pg.html');
                    }
                }else{
                    echo pag_up('create_user_pg.html');
                }
            }else{
                echo pag_up('create_user_pg.html');
            }
        }else{
            echo pag_up('create_user_pg.html');
        }

    };

    if($func=="3"){

        $brand_add = $_POST["brand"];
        $oil_add = $_POST["oil"];
    
        if ($oil_add!=null) {
            $comando = $pdo->prepare("INSERT INTO oil_cod(oil_cod) VALUES(:oil)");
            $comando->bindValue(":oil",$oil_add);
            $comando->execute();
            echo pag_up('adm_menu.php');
        }
    
        if ($brand_add!=null) {
            $comando = $pdo->prepare("INSERT INTO brand(brand_name) VALUES(:brand)");
            $comando->bindValue(":brand",$brand_add);
            $comando->execute();
            echo pag_up('adm_menu.php');
        }        

        
    };

    if($func=="4"){

        $brand = $_POST["brand"];
        $oil = $_POST["oil"];
        $model_name = $_POST["model_name"];
        $oil_km = $_POST["oil_km"];
        $model_cc = $_POST["model_cc"];
        $model_fab = $_POST["start_fab"];
        $model_end = $_POST["end_fab"];

        $sql_oil = "SELECT oil_id FROM oil_cod WHERE oil_cod='$oil'";

        $result_oil = $pdo->query($sql_oil)->fetch();  

        $sql_brand = "SELECT brand_id FROM brand WHERE brand_name='$brand'";

        $result_brand = $pdo->query($sql_brand)->fetch(); 


        if($brand!=null && $model_cc!=null && $oil!=null && $model_name!=null && $oil_km!=null){
            $comando = $pdo->prepare("INSERT INTO model(model_name,model_cc,model_fab,model_end,model_oil_km,oil_id,brand_id) VALUES(:model_name,:model_cc,:model_fab,:model_end,:model_oil_km,:oil_id,:brand_id)");
            $comando->bindValue(":model_name",$model_name);
            $comando->bindValue(":model_cc",$model_cc);
            $comando->bindValue(":model_fab",$model_fab);
            $comando->bindValue(":model_end",$model_end);
            $comando->bindValue(":model_oil_km",$oil_km);
            $comando->bindValue(":oil_id",$result_oil[0]);
            $comando->bindValue(":brand_id",$result_brand[0]);
            $comando->execute();
            echo pag_up('adm_menu.php');
            
        } 


        echo $result_oil[0];
        echo "<br>";
        echo $result_brand[0];

    }


    $rank = $_POST["rank"];
    $user_id = $_POST["adm_check"];
    $delete = $_POST["delete"];

    if($rank!==null){
        $comando = $pdo->prepare("UPDATE usuario SET user_rank=$rank WHERE user_id=$user_id");

        // echo $rank;
        // echo "<br>";

        // print_r($comando);

        $comando->execute();

        echo pag_up('adm_menu.php');
    };

    if($delete!==null){
        
        $comando = $pdo->prepare("UPDATE usuario SET user_rank=3 WHERE user_id=$delete");

        // echo $rank;
        // echo "<br>";

        // print_r($comando);

        $comando->execute();

        echo pag_up('adm_menu.php');
    


    }

    if($func==5){
        $brand_selector = $_POST["brand"];

        $sql_brand = "SELECT brand_id FROM brand WHERE brand_name='$brand_selector'";

        $result_brand = $pdo->query($sql_brand)->fetch();

        $result_brand = $result_brand[0];

        $_SESSION['brand_select'] = $result_brand;
        // echo $_SESSION['brand_select'];
        echo pag_up('create_moto_pg.php');
    }

?>