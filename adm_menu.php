    <?php  
    include("conexao.php");
    ?>

    <?php 
            $comando ="SELECT oil_cod FROM oil_cod";
            $resultado_oil = $pdo->query($comando)->fetchAll(); 
            $count = count($resultado_oil);
            
            $i_oil = $count -1;        
    ?>

    <?php 
            $comando ="SELECT brand_name FROM brand";
            $resultado_brand = $pdo->query($comando)->fetchAll(); 
            $count = count($resultado_brand);
            
            $i_brand = $count -1;        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/config.css">
    <title>Document</title>
</head>
<body> 

       
    
    <div class="align block_bk column">
        <form action="func.php" method="post">

            <label for="brand_add">MARCA</label>
            <input type="text" id="brand" name="brand">
            
            <label for="oil_add">ÓLEO</label>
            <input type="text" id="oil_add" name="oil_add">
            
            <input type="hidden" name="func" value="3">
               
            <input type="submit" value="bora">
        
        </form>

        
        <br><br>

        <form  action="func.php" method="post">
            <label for="brand">Marca</label>
            <select id="brand" name="brand">
                <option>Selecione...</option>
                <?php
                    while ($i_brand >= 0) {
                        $result = $resultado_brand[$i_brand];
                        print_r("<option>$result[0]</option>");
                        $i_brand = $i_brand-1;
                    }; 
                ?>
            </select>
            <label for="brand">Nome do modelo</label>
            <input type="text" id="model_name" name="model_name">
            <label for="model_cc">Cilindrada</label>
            <input type="text" id="model_cc" name="model_cc">
            <label for="oil">Óleo</label>
            <select id="oil" name="oil">
                <option>Selecione...</option>
                <?php
                    while ($i_oil >= 0) {
                        $result = $resultado_oil[$i_oil];
                        print_r("<option>$result[0]</option>");
                        $i_oil = $i_oil-1;
                    }; 
                ?>
            </select>
            
            
            <label for="oil_km">Km para a troca de óleo</label>
            <input type="text" id="oil_km" name="oil_km">

            <input type="hidden" name="func" value="4">
               
            <input type="submit" value="bora">
            
        </form>
        
        <br><br>
            



    </div>

</body>
</html>