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

            <div>

                <label for="brand">MARCA</label>
                <input type="text" id="brand" name="brand">
                
                <label for="oil">ÓLEO</label>
                <input type="text" id="oil" name="oil">
                
                <input type="hidden" name="func" value="3">
                
                
            
            </div>
            <br><br>
            <div>
                <label for="brand">Nome do modelo</label>
                <input type="text" id="model_name" name="model_name">

                <select id="cidades" name="cidades">
                <option>Selecione...</option>
                <?php 
                    include("conexao.php");
                    $comando = $pdo->prepare("SELECT oil_cod FROM oil");
                    $comando->execute();
                    $i = count($comando);
                    
                    while ($i > 0) {
                        $result = $comando[$i];
                        echo("<option>$result</option>");
                        $i = $i-1;
                    };
                    echo("</section>");
                ?>
                

                <label for="brand">MARCA</label>
                <input type="text" id="oil_km" name="oil_km">
                
                <label for="brand">MARCA</label>
                <input type="text" id="oil_id" name="oil_id">

                <label for="brand">MARCA</label>
                <input type="text" id="brand_id" name="brand_id">


                

            </div>
            
            <br><br>
            
            <input type="submit" value="bora">
        </form>


    </div>


</body>
</html>