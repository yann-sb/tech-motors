<?php

    include("conexao.php");
    session_start();
    $moto_id = $_POST["moto_id"];
    $model_id = $pdo->query("SELECT model_id FROM moto_user WHERE moto_id='$moto_id'")->fetch();

    $moto_photo = $pdo->query("SELECT moto_image FROM moto_user WHERE moto_id='$moto_id'")->fetch();
    $moto_year = $pdo->query("SELECT moto_year_fab FROM moto_user WHERE moto_id='$moto_id'")->fetch();
    
    $moto_name = $pdo->query("SELECT model_name FROM model WHERE model_id='$model_id[0]'")->fetch();
    $moto_cc = $pdo->query("SELECT model_cc FROM model WHERE model_id='$model_id[0]'")->fetch();

    $oil_id = $pdo->query("SELECT oil_id FROM model WHERE model_id='$model_id[0]'")->fetch();
    $oil_cod = $pdo->query("SELECT oil_cod FROM oil_cod WHERE oil_id='$oil_id[0]'")->fetch();
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

    .title_moto{
        color: white;
        font-size:25px;
    }

    .border{
        border-style:solid;
        border-radius:10px;
        border-color:white;
        border-width:2px;
        color:white;
        padding:10px;
        width:150px;
        margin-bottom:15px
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
                <div class="text_align row align border">
                    Total gasto:
                    <span id="total_value"></span>
                </div>

                <div class="text_align column border" style="height:50px">
                    Óleo recomendado:
                    <span id="oil" style="margin-top:5px"><?php echo $oil_cod[0]; ?></span>
                </div>

                <div class="text_align column border">
                    Ultima troca de óleo:
                    <span id="oil_km"></span>
                </div>
                <span id="oil_rec"></span>

                <form action='add_desc_pg.php' id="form_1" method='post' class="text_align column border">
                    <input type="hidden" name="moto_id" value=<?php echo '"'.$moto_id.'"' ?>>
                    <div onclick='sub();'>Adicionar nota+</div>
                </form>
                
            </div>
        </div>
        

    </div>

<script>

    function sub(){

        form_1.submit();

    }

</script>
<script src="js/js_login_1.js"></script>
</body>
</html>