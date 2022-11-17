<?php 
    error_reporting(0);
    ini_set('display_errors', 0);

    include("conexao.php");
    session_start();
    $_SESSION["moto_id"] = null;
    $user_id = $_SESSION["id_usuario"];

    $user_rank = $pdo->query("SELECT user_rank FROM usuario WHERE user_id='$user_id[0]'")->fetch();

    $user_rank = $user_rank[0];

    $user_name = $pdo->query("SELECT user_nick FROM usuario WHERE user_id='$user_id[0]'")->fetch();

    $user_name = $user_name[0];

    $moto_id = $pdo->query( "SELECT moto_id FROM moto_user WHERE user_id='$user_id[0]'")->fetchAll();

    $moto_nick = $pdo->query("SELECT moto_nick FROM moto_user WHERE user_id='$user_id[0]'")->fetchAll();

    $moto_image = $pdo->query("SELECT moto_image FROM moto_user WHERE user_id='$user_id[0]'")->fetchAll();

    $moto_color = $pdo->query("SELECT moto_color FROM moto_user WHERE user_id='$user_id[0]'")->fetchAll();  

    $i_list = count($moto_id);  

    $quant = $i_list;

    $i_list = $i_list-1;

    $user_image = $pdo->query("SELECT user_image FROM usuario WHERE user_id='$user_id[0]'")->fetch();

    $user_image = $user_image[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/config.css">
    <title>Document</title>
    
</head>
<body style="overflow: hidden;">

    <div class="align column fundo">
        
        <div class="top_bk" style="display: flex; flex-direction:row-reverse;">
            
        <div style="width: 100%">
            
            <div class="column" style="margin-left: 280px; margin-top: 10px">
            
                <div class="column top_left">
                    <div class="row align border">
                        <span class="top">Quantidade de motos:</span>
                        <div id="moto_quant"><span style="margin-left:5px;">

                                <?php 
                                    if($quant<10){
                                        echo "0".$quant;
                                    }
                                    else{
                                        echo $quant;
                                    }
                                 
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="column top_left">
                    <div class="row align border">
                        <span class="top">Total gasto:</span>
                        <div id="moto_total"><span></span></div>
                    </div>
                </div>
            
                <br>
            
                <div class="column top_left">
                    <div class="row align border">
                        <span class="top">Média de gastos:</span>
                        <div id="moto_media"><span></span></div>
                    </div>
                </div>
            
            </div>
        </div>

        <div class="top_midle column" style="width: 100%">

            <div class="row">

                <span id="user_name" class="border_bt"><?php echo $user_name; ?></span>

                <img src="images/icons/pen.png" style="width: 20px;margin-left: 5px; margin-bottom: 2px" id="alter_name">
            </div>

            <form action="func.php" method="POST" enctype="multipart/form-data">

                <label class="align" for="image_add" style="margin-left:0px"> 

                    <img src="images/icons/add_photo.png" style="margin-top: 150px; width:30px;">

                </label>

                <input type="hidden" name="user_id" value="<?php echo $user_id[0]; ?>">
                <input type="hidden" name="func" value="7">
                <input type="file" id="image_add" name="imagem" style="display:none;" multiple accept="image/*" onChange=this.form.submit()>

            </form>
        </div>

            <?php 

                if($user_image!==null){
                    echo '<img id="user_image" class="add_photo" src="'.$user_image.'">';
                }
                else{
                    echo '<img id="user_image" class="add_photo" src="images/icons/user_image.png">';
                }

                            
            ?>
                
        </div>
        <br><br>
        <div class="bottom_bk row">

            <div class="bottom_left" style="overflow-y: auto;">

                <div style="width:95%;margin-top: 20px" class="align">
                    <img src="images/icons/bar.png" style="width: 100%;" onclick="pag_up('create_moto_pg.php');">
                </div>
                
                <div style="width:95%;" class="align">
                    
                    

                    

                    <?php
                        $counter=1;
                        $c=0;
                        while($c<=$i_list){
                            echo '<form action="moto_profile.php" id="form_1" method="post">';
                            echo '<div class="row table_bk" style="margin-bottom:5px;" onclick="sub();">';
                            echo '<div class="counter"><h2 class="text_align">'.$counter.'</h2></div>';
                            echo '<div class="up_line"></div>';
                            echo '<div class="bt_midle row">';
                            echo '<span id="moto_image"><img src="'.$moto_image[$c][0].'" style="width:80px;height:80px;"></span>';                         
                            echo '<div class="column">';
                            echo '<div id="moto_title">';
                            echo '<span class="moto_nick">'.$moto_nick[$c][0].'</span>';
                            echo '<div class="moto_color" style="background-color:'.$moto_color[$c][0].'"></div>';
                            echo '</div></div></div>';
                            echo '<div class="up_line"></div>';
                            echo '<label for="plate">';
                            echo '<span id="leter"></span>';
                            echo '<span id="number"></span>';
                            echo '</label>';
                            echo '<div class="plate">';
                            echo '<div class="plate_top text_align">BRASIL</div>';
                            echo '<div class="column">';                                
                            echo '<span class="plate_letter">aaa</span>';
                            echo '<span class="plate_number">2a88</span>';
                            echo '<span class="BR">BR</span>';
                            echo '<input type="hidden" name="moto_id" value="'.$moto_id[$c][0].'">';
                            echo'</div></div></div></form>';  
                            $c++;
                            $counter++;
                        }
                        $c=0;
                        $counter=0
                    ?>

                </div>
            </div>
            
            <div class="bottom_right column">
                
                <?php

                echo 
                    "<br>
                    <button>
                    Sair da conta
                    </button>
                    <br>";
                
                if($user_rank==1){
                    echo 
                        '<button onClick="'.'pag_up('."'adm_menu.php'".')">
                        Menu de administrador
                        </button>
                        <br>
                        <button>
                        Relatórios
                        </button>';
                }

                if($user_rank==2){
                    echo   
                        "<button>
                        Menu de administrador
                        </button>";
                }


            ?>
               
            </div>

        </div>

    </div>

<script src="js/js_login_1.js"></script>
</body>
</html>