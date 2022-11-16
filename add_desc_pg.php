<?php
    include("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/config.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <title>Adicionar nota</title>
</head>

<style>

    .input{
        border-radius: 15px;
        background-color: #507D72;
        border-style: none;
        word-wrap: break-word;
        word-break: break-all;
        height: 50%;

    }



    .desc{
        max-height: 300px;
        max-width: 400px;   
    }

    .input2{
        background-color: #507D72;
        height: 40px;

        border-radius: 10px;
        border-style: none;
    }

    .con1{
        width: 180px;
    }
    .con2{
        width: 280px;
    }
    .con2 select{
        width: 250px;
    }

</style>

<body>
    
    <div class="column block_bk align">

        <div class="row cem text_align">
            
            <img src="images/icons/arrow.png" class="return" onclick="pag_up('moto_profile.php');">
        
            <h2 style="width: 90%;">NOVA NOTA</h2>

        </div>

        <div class="align line"></div>

        <form action="func.php" method="POST" class="row">
            <div class="column block" style="margin-top: 0px;">
                <h3 class="title">Descrição*</h3>
                <div style="display:flex;flex-direction:row-reverse;font-size:large;"><span id="cont">0</span>280/</div>

                <br>
                
                <textarea onkeyup="limite_textarea(this.value)" id="texto" class="desc input" name="desc"></textarea>

                <input type="hidden" name="func" value="6">

                <input type="submit" class="align" style="width:95px;height:25px;margin-top:20px;font-size:medium;" value="Adicionar">

            </div>

            

            <div class="column block" style="margin-top: 0px;">

                <div class="row top_right align">
                    <div class="column con1">
                        <label for="price" class="label"><h3 class="title">Preço*:</h3></label>
                        <input type="int" class="input2" style="width: 140px;" id="price" name="price">
                    </div>

                    <?php 
                        $comando ="SELECT service_type FROM service";
                        $resultado_service = $pdo->query($comando)->fetchAll(); 
                        $count = count($resultado_service);
                        $i_service = $count-1;        
                    ?>
                    
                    <div class="column con2">
                        <label for="type" class="label"> <h3 class="title">Tipo da manutenção*:</h3></label>
                        <select id="type" name="type" class="input2" style="width: 180px;">
                            <?php

                                echo "<option>Selecione...</option>";
                                $c=0;
                                while ($c <= $i_service) {
                                    $result_service = $resultado_service[$c];
                                    print_r("<option>$result_service[0]</option>");
                                    $c = $c+1;
                                }       
                                $c=0;

                            ?>
                        </select>

                    </div>
                    
                </div>

                <br><br>
                <img src="images/logo.png">


            </div>

        </form>
    </div>
    <script>
        
        function limite_textarea(valor) {
            quant = 280;
            total = valor.length;
            if(total <= quant) {
                document.getElementById('cont').innerHTML = total;
            } else {
                document.getElementById('texto').value = valor.substr(0,quant);
            }
        }
    </script>
    <script src="js/js_login_1.js"></script>
</body>
</html>