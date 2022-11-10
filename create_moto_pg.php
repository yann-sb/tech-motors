<?php  
    error_reporting(0);
    ini_set('display_errors', 0);
    
    include("conexao.php");
    session_start();
    $brand_id = $_SESSION["brand_select"];
?>





<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/config.css">
    <link rel="stylesheet" href="css/create_moto_pg.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <title>Listagem</title>
</head>
<style>

    .add_photo{
        height: 200px;
        width: 200px;
        margin-top: 20px
    }

    #desc{

        height: 50px;
        max-height: 200px;

        min-width: 325px;
        max-width: 325px;
        width: 325px;

        background-color: #507D72;
        border-radius: 15px;
        border-style: none;
    }

    .block_bk{
        color: aliceblue;
    }

    #image_add{
        display:none;
    }


</style>
<body>
    
    <div class="column align block_bk">

        
        <div class="row cem text_align">
            
                <img src="images/icons/arrow.png" class="return" onclick="pag_up('profile.php');">
            
                <h2 style="width: 90%;">NOVA MOTO</h2>

        </div>

        <div class="align line"></div>

        <form action="func.php" method="POST" enctype="multipart/form-data">
            <div class="row linha">
                <div class="column align block">

                <label for="nick">Apelido*</label>
                <input type="text" id="nick" name="nick">
                <br>
                <div class="row align" style="width: 100%;">

                    <div class="column">  
                    <label for="brand">Marca</label>    

                    <select id="brand" name="brand" onChange="this.form.submit()">
                        <?php 
                            $comando ="SELECT brand_name FROM brand";
                            $resultado_brand = $pdo->query($comando)->fetchAll(); 
                            $count = count($resultado_brand);
                            $i_brand = $count-1;        
                        ?>
                        <?php 
                            if($brand_id!==null){
                                $comando ="SELECT brand_name FROM brand WHERE brand_id=$brand_id";
                                $res_brand = $pdo->query($comando)->fetchAll(); 
                                $res_brand = $res_brand[0];
                                print_r("<option>Selecionado ".$res_brand[0]."</option>") ;
                                $comando ="SELECT brand_name FROM brand";
                                $res_brand = $pdo->query($comando)->fetchAll(); 
                            }else{
                                $comando ="SELECT brand_name FROM brand";
                                $res_brand = $pdo->query($comando)->fetchAll(); 
                                echo "<option>Selecione...</option>";
                            }
                            $c=0;
                            while ($c <= $i_brand) {
                                $result_brand = $res_brand[$c];
                                print_r("<option>$result_brand[0]</option>");
                                $c = $c+1;
                            }       
                            $c=0;
                            $brand_id = $_SESSION["brand_select"];
                        ?>
                    </select>
                        
                        </form>

                        <br>
                                
                        <?php
                            $comando_fab ="SELECT model_fab FROM model WHERE brand_id='$brand_id'";
                            $comando_end ="SELECT model_end FROM model WHERE brand_id='$brand_id'";
                            $comando_cc ="SELECT model_cc FROM model WHERE brand_id='$brand_id'";
                            $comando_model ="SELECT model_name FROM model WHERE brand_id='$brand_id'";
                            $comando_id ="SELECT model_id FROM model WHERE brand_id='$brand_id'";
                            $resultado_id = $pdo->query($comando_id)->fetchAll();
                            $resultado_fab = $pdo->query($comando_fab)->fetchAll();
                            $resultado_end = $pdo->query($comando_end)->fetchAll();
                            $resultado_cc = $pdo->query($comando_cc)->fetchAll();
                            $resultado_model = $pdo->query($comando_model)->fetchAll(); 
                            $count = count($resultado_model);

                            $i_model = $count-1;        
                        ?>

                        <label for="model">Modelo*</label>
                        <select id="model" name="model" >
                            <option value="null">Escolha a sua opção</option>
                            <?php
                                    $c=0;
                                    while ($c <= $i_model) {
                                        $result_end = $resultado_end[$c];
                                        if($result_end[0]==0){
                                            $result_id = $resultado_id[$c];
                                            $result_model = $resultado_model[$c]; 
                                            $result_cc = $resultado_cc[$c];
                                            $result_fab = $resultado_fab[$c];
                                            $result = $result_model[0]." ".$result_cc[0]."cc (".$result_fab[0]."/...)";
                                            print_r('<option value="'.$result_id[0].'">'.$result.'</option>');
                                        }else{
                                            $result_id = $resultado_id[$c];
                                            $result_model = $resultado_model[$c]; 
                                            $result_cc = $resultado_cc[$c];
                                            $result_fab = $resultado_fab[$c];
                                            $result = $result_model[0]." ".$result_cc[0]."cc (".$result_fab[0]."/".$result_end[0].")";
                                            print_r('<option value="'.$result_id[0].'">'.$result.'</option>');
                                        }
                                        $c = $c+1;

                                    };
                                    $c=0;
                                    
                                ?>
                        </select>
                    </div>

                    <div class="column" style="margin-left: 13%">

                        <label for="ano_fab">Ano(fabricação)*</label>
                        <input id="ano_fab" name="ano_fab" type="int" style="width: 140px">
                        <br>
                        <label for="ano_mod">Ano(modelo)</label>
                        <input id="ano_mod" name="ano_mod" type="int" style="width: 140px">

                    </div>
                                
                </div>
                <br>
                <label for="desc">Descrição:</label>
                <textarea id="desc" name="desc"></textarea>

                </div>

                <div class="column align block">

                    <div class="row linha" style="width: 100%">
                                
                        <div class="column">
                            <label for="color">Cor*</label>
                            <select id="color" name="color">
                                <option value="null">Escolha a sua opção</option>
                                <option value="blue">azul</option>
                                <option value="black">preto</option>
                                <option value="red">vermelho</option>
                                <option value="gray">cinza</option>
                                <option value="orange">laranja</option>
                                <option value="white">branco</option>
                                <option value="purple">roxo</option>
                                <option value="yellow">amarelo</option>
                                <option value="green">verde</option>
                            </select>
                        </div>

                        <div class="column">
                            <label for="plate" style="margin-left: 20%">Placa*</label>
                            <input type="text" id="plate" name="plate" style="margin-left: 20%">
                        </div>
                                
                    </div>
                    <label class="align" for="image_add"> 

                        <span id="image_show"><img id="preview" class="add_photo" src="images/icons/insert_photo.png"></span>
                    
                    </label>

                    <input type="file" id="image_add" name="imagem" multiple accept="image/*">

                    <input type="hidden" name="func" value="5">
                    <input type="submit" class="align create" value="criar">

                </div>

            </div>
        </form>


        
    </div>

    <script >
    
        /*função para alterar a pagina*/
        function pag_up(p){    
            // console.log("entrou");  
            window.location.href = p
        };


        // function change_photo(a){
            
        //     var foto = document.getElementById('image_add').files[0];
        //     var arquivo = document.querySelector('input[type=file]') ;

        //     if (arquivo!==null) {
        //         place.value = foto;
        //     } else {
        //         foto.src = "";
        //     }

        //     console.log("foi");
        // };

        function readImage() {
            if (this.files && this.files[0]) {
                var file = new FileReader();
                file.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                };       
                file.readAsDataURL(this.files[0]);
            }
        }
        document.getElementById("image_add").addEventListener("change", readImage, false);

    </script>
</body>
</html>