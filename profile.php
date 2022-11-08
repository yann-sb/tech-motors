<?php 
    
    error_reporting(0);
    ini_set('display_errors', 0);

    include("conexao.php");
    session_start();
    $user_id = $_SESSION["id_usuario"];

    $sql = "SELECT user_nick FROM usuario WHERE user_id='$user_id[0]'";

    $user_name = $pdo->query($sql)->fetch();

    $user_name = $user_name[0];

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

<style>

    .fundo{
        width: 80%;
        height: 100%;  

        min-width: 800px;
        min-height: 750px;
    }

    .top_bk{
        margin-top: 3%;
        width: 100%;
        height: 30%;
        background-color: #2F3D40;
    }

    .bottom_bk{
        width: 100%;
        height: 65%;
    }

    .bottom_left{
        width: 75%;
        height: 100%;
        background-color: #2F3D40;
        margin-right: 20px; 
    }
    
    .bottom_right{
        width: 25%;
        height: 100%;
        background-color: #2F3D40;
    }

    #user_image{
        margin-left: 10px;
        margin-top: 30px;
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }

    .border_bt{
        color: blanchedalmond;
        

        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-bottom-color: blanchedalmond;
    }

    #moto_quant{
        width: 35px;
        height: 35px;
        border-style: solid;
        border-width: 2px;
        border-color: red;
        border-radius: 50%; 

        font-size: 25px;
        margin-left: 10px; 
    }

    .border{
        width: 190px;
        height: 40px;

        padding: 5px;

        border-width: 2px;
        border-style: solid;
        border-color: blanchedalmond;
        border-radius: 10px;

        color: blanchedalmond;
    }

</style>

<body>

    <div class="align column fundo">
        
        <div class="top_bk" style="display: flex; flex-direction:row-reverse;">
            
        <div style="width: 100%">
            
            <div class="column" style="margin-left: 280px; margin-top: 10px">
            
                <div class="column top_left">
                    <div class="row align border">
                        <span class="top">Quantidade de motos:</span>
                        <div id="moto_quant"><span style="margin-left:5px;"></span></div>
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
            
                $sql = "SELECT user_image FROM usuario WHERE user_id='$user_id[0]'";

                $user_image = $pdo->query($sql)->fetch();

                $user_image = $user_image[0];

                if($user_image!==""){
                    echo '<img id="user_image" class="add_photo" src="'.$user_image.'">';
                }
                else{
                    echo '<img id="user_image" class="add_photo" src="images/icons/user_image.png">';
                }

                            
            ?>
                
        </div>
        <br><br>
        <div class="bottom_bk row">

            <div class="bottom_left">
                
                <div style="width:95%;margin-top: 20px" class="align">
                    <img src="images/icons/bar.png" style="width: 100%;">
                </div>

            </div>
            
            <div class="bottom_right column">
                <br>
                <button>
                    Sair da conta
                </button>
                <br>
                <button>
                    Menu de administrador
                </button>
                <br>
                <button>
                    Relatórios
                </button>
            </div>

        </div>

    </div>

<script src="js/js_login_1.js"></script>
</body>
</html>