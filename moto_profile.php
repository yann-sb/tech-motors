<?php

    include("conexao.php");
    session_start();
    $moto_id = $_SESSION["moto_id"];
    if($moto_id==null){
        $moto_id = $_POST["moto_id"];
    }
    $model_id = $pdo->query("SELECT model_id FROM moto_user WHERE moto_id='$moto_id'")->fetch();

    $moto_photo = $pdo->query("SELECT moto_image FROM moto_user WHERE moto_id='$moto_id'")->fetch();
    $moto_year = $pdo->query("SELECT moto_year_fab FROM moto_user WHERE moto_id='$moto_id'")->fetch();
    
    $moto_name = $pdo->query("SELECT model_name FROM model WHERE model_id='$model_id[0]'")->fetch();
    $moto_cc = $pdo->query("SELECT model_cc FROM model WHERE model_id='$model_id[0]'")->fetch();
    $oil_km = $pdo->query("SELECT model_oil_km FROM model WHERE model_id='$model_id[0]'")->fetch();

    $oil_id = $pdo->query("SELECT oil_id FROM model WHERE model_id='$model_id[0]'")->fetch();
    $oil_cod = $pdo->query("SELECT oil_cod FROM oil_cod WHERE oil_id='$oil_id[0]'")->fetch();

    $_SESSION["moto_id"] = $moto_id[0];

    
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

    .table_bk{
        background-color: #3D5A73;
        width:100%;
        height:100px;
    }

</style>
<body>
    <div class="block_fundo align column">
        
        <div class="block_top align row">
        <img src="images/icons/arrow.png" class="return" onclick="pag_up('profile.php');">
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
                    <span id="total_value"><?php echo "R$".$total.",00";?></span>
                </div>

                <div class="text_align column border">
                    Óleo recomendado:
                    <span id="oil" style="margin-top:5px"><?php echo $oil_cod[0]; ?></span>
                    <span id="oil_rec"><?php echo "*É recomendada troca"."<br>"."a cada ".$oil_km[0]."Km";?></span>
                </div>



                <form action='add_desc_pg.php' id="form_1" method='post' class="text_align column border">
                
                    <div onclick='sub();'>Adicionar nota+</div>
                </form>
                
            </div>
        </div>
        <div class="block_bottom column" style="width: 65%;margin-top:30px">

            <?php
                
                $note_desc = $pdo->query("SELECT note_desc FROM note WHERE moto_id='$moto_id[0]'")->fetch();
                $note_price = $pdo->query("SELECT note_price FROM note WHERE moto_id='$moto_id[0]'")->fetch();
                
                $i_list = count($note_price);  

                $quant = $i_list;

                $i_list = $i_list-1;
            ?>

            <?php 
            
            $counter=1;
            $c=0;
            while($c<=$i_list){
                echo '<form action="moto_profile.php" id="form_1" method="post">';
                echo '<div class="row table_bk" style="margin-bottom:5px;" onclick="sub();">';
                echo '<div class="counter"><h2 class="text_align">'.$counter.'</h2></div>';
                echo '<div class="up_line"></div>';

                echo '<span id="moto_image"><img src="'.$note_desc[$c][0].'" style="width:80px;height:80px;"></span>';                         
                echo '<div class="column">';
                echo '<div id="moto_title">';
                echo '<span class="moto_nick">'.$note_price[$c][0].'</span>';
                echo '</div></div>';
                echo'</div></div></div></form>'; 
                $total= $total + $note_price[$c][0];
                $c++;
                $counter++;
            }
            $c=0;
            $counter=0
           
            
            ?> 
            

        </div>

    </div>

<script>

    

</script>
<script src="js/js_login_1.js"></script>
</body>
</html>