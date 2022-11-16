<?php

    include("conexao.php");
    session_start();
    $moto_id = $_POST["moto_id"];
    $model_id = $pdo->query("SELECT model_id FROM moto_user WHERE moto_id='$moto_id'")->fetch();

    $moto_photo = $pdo->query("SELECT moto_image FROM moto_user WHERE moto_id='$moto_id'")->fetch();
    $moto_year = $pdo->query("SELECT moto_year_fab FROM moto_user WHERE moto_id='$moto_id'")->fetch();
    
    $moto_name = $pdo->query("SELECT model_name FROM model WHERE model_id='$model_id[0]'")->fetch();
    $moto_cc = $pdo->query("SELECT model_cc FROM model WHERE model_id='$model_id[0]'")->fetch();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/moto_profile.css">
    <link rel="stylesheet" href="css/config.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

    .moto_photo{
        width: 270px;
        height: 270px;
    }

</style>
<body>
    <div class="block_fundo align column">
        
        <div class="block_top align row">
            <div class="top_left align column">
                <span class="title_moto text_align"><?php echo $moto_name[0]." ".$moto_cc[0]."cc"." ".$moto_year[0]; ?></span>
                <?php
                    if($moto_photo[0]!==null){
                    echo '<img src="'.$moto_photo[0].'" class="align moto_photo">';
                    }else{
                        echo '<img src="images/icons/insert_photo.png" class="align moto_photo">';
                    }
                ?>
            </div>
            <div class="top_right align column">
                <div class="text_align row align">
                    Total gasto:
                    <span id="total_value"></span>
                </div>

                <div class="text_align column">
                    Óleo recomendado:
                    <span id="oil"></span>
                </div>

                <div class="text_align column">
                    Ultima troca de óleo:
                    <span id="oil_km"></span>
                </div>
                <span id="oil_rec"></span>

                <div class="text_align column" onclick="pag_up('add_desc_pg.php')">
                    Adicionar nota
                </div>
                
            </div>
        </div>
        

    </div>


<script src="js/js_login_1.js"></script>
</body>
</html>