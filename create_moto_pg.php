<?php  
    include("conexao.php");
    session_start();
    $brand_id = $_SESSION["brand_select"];
?>

<?php 
    $comando ="SELECT brand_name FROM brand";
    $resultado_brand = $pdo->query($comando)->fetchAll(); 
    $count = count($resultado_brand);
    
    $i_brand = $count-1;        
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
<body>
    
    <div class="column align block_bk">

        
        <div class="row cem text_align">
            
                <img src="images/icons/arrow.png" class="return" onclick="pag_up('user_perfil_pg.html');">
            
                <h2 style="width: 90%;">NOVA MOTO</h2>

        </div>

        <div class="align line"></div>

        <div class="row linha">
            <div class="column align block">

            <label for="nick">Apelido*</label>
            <input type="text" id="nick">
            <br>
            <div class="row align" style="width: 100%;">

                <div class="column">  
                <label for="brand">Marca</label>
                    <form action="func.php" method="post">
                        <input type="hidden" value="5" name="func">
                        <select id="brand" name="brand" onChange="this.form.submit()">
                            <?php 
                            
                            if($brand_id!==null){
                                $comando ="SELECT brand_name FROM brand WHERE brand_id=$brand_id";
                                $res_brand = $pdo->query($comando)->fetchAll(); 
                                $res_brand = $res_brand[0];
                                echo "<option>Selecionado $res_brand</option>";
                            }else{
                                echo "<option>Selecione...</option>";
                            }
                            
                            ?>

                        </select>
                    </form>

                    <br>
                        
                    <?php
                        $comando_fab ="SELECT model_fab FROM model WHERE brand_id='$brand_id'";
                        $comando_end ="SELECT model_end FROM model WHERE brand_id='$brand_id'";
                        $comando_cc ="SELECT model_cc FROM model WHERE brand_id='$brand_id'";
                        $comando_model ="SELECT model_name FROM model WHERE brand_id='$brand_id'";
                        $resultado_fab = $pdo->query($comando_fab)->fetchAll();
                        $resultado_end = $pdo->query($comando_end)->fetchAll();
                        $resultado_cc = $pdo->query($comando_cc)->fetchAll();
                        $resultado_model = $pdo->query($comando_model)->fetchAll(); 
                        $count = count($resultado_model);

                        $i_model = $count-1;        
                    ?>

                    <label for="mod">Modelo*</label>
                    <select id="mod">
                        <option value="null">Escolha a sua opção</option>
                        <?php
                                $c=0;
                                while ($c <= $i_model) {
                                    if($resultado_end[$c]==0){
                                        $resultado_end = "..."
                                    }

                                    $result = $resultado_model[$c]." ". ;
                                    print_r("<option>$result[0]</option>");
                                    $c = $c+1;
                                };
                                $c=0;
                            
                            ?>
                    </select>
                </div>

                <div class="column" style="margin-left: 13%">

                    <label for="ano_fab">Ano(fabricação)*</label>
                    <input id="ano_fab" type="int" style="width: 140px">
                    <br>
                    <label for="ano_mod">Ano(modelo)</label>
                    <input id="ano_mod" type="int" style="width: 140px">

                </div>
                
            </div>
            <br>
            <label for="desc">Descrição:</label>
            <textarea id="desc"></textarea>

            </div>

            <div class="column align block">

                <div class="row linha" style="width: 100%">
                    
                    <div class="column">
                        <label for="color">Cor*</label>
                        <select id="color">
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
                        <input type="text" id="plate" style="margin-left: 20%">
                    </div>
                    
                </div>
                
                <img src="images/icons/insert_photo.png" class="add_photo align">

                <button class="align create" onclick="button_test('foi');">Criar</button>

            </div>

        </div>

        
    </div>

    <script src="js/js_login_1.js"></script>
</body>
</html>