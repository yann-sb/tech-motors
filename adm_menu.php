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

    <?php 
        $comando ="SELECT user_id FROM usuario";
        $resultado_user = $pdo->query($comando)->fetchAll(); 
        $count = count($resultado_user);
        
        $i_user = $count -1;        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adm_menu.css">
    <link rel="stylesheet" href="css/config.css">
    <title>Document</title>
</head>
<body> 

       
    
    <div class="align block_bk row">
        <div class="align column size">

            <form + method="post" class="align add">
                <div class="row">
                    <label class="top" for="brand_add" style="margin-right:3px;">Marca</label>
                    <input type="text" id="brand" name="brand">
                </div> 
                
                <div class="row">
                    <label class="top" for="oil_add" style="margin-right:12px;">Óleo</label>
                    <input type="text" id="oil_add" name="oil_add">
                </div>
                
                <input type="hidden" name="func" value="3">
                
                <input style="margin-left:90px;" type="submit" value="bora">
            
            </form>
    
            
            <br>
    
            <form  action="func.php" method="post" class="align model">
                <div class="row">
                
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
                
                </div>

                <div class="row">
                
                    <label for="brand">Nome do modelo</label>
                    <input type="text" id="model_name" name="model_name">
                
                </div>

                <div class="row">
                
                    <label for="model_cc">Cilindrada</label>
                    <input type="text" id="model_cc" name="model_cc">
                
                </div>

                <div class="row">
                
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
                
                </div>

                <div class="row">
                
                    <label for="oil_km">Km para a troca de óleo</label>
                    <input type="text" id="oil_km" name="oil_km">
                
                </div>


                    
                    
                    
                <input type="hidden" name="func" value="4">
                    
                <input type="submit" value="bora">
                    
            </form>
                    
            <br><br>
                    
        </div>
                    
        <div class="align column size">
            <table>

                <tr>

                    <td>
                        Dono
                    </td>

                    <td>
                        ADM
                    </td>
                    
                    <td>
                        ID do usuário
                    </td>

                    <td>
                        Nome do usuário
                    </td>


                </tr>

                <tr>
                    <?php 
                    echo $i_user;
                    while ($i_user > 0) {
                        $result_id = $resultado_user[$i_user];

                        $comando ="SELECT user_nick FROM usuario";
                        $resultado_nick = $pdo->query($comando)->fetch();
                        $result_nick = $resultado_nick[0];
                        echo("<td><form action='func.php' method='post'><input type='checkbox' name='rank' value='1' onChange='this.form.submit()'></form></td>");
                        echo("<td><form action='func.php' method='post'><input type='checkbox' name='rank' value='2' onChange='this.form.submit()'></form></td>");
                        print_r("<td>$result_id</td>");
                        echo("<td>$result_nick</td>");
                        $i_oil = $i_oil-1;
                    };
                    
                    ?>
                </tr>


            </table>
        

        </div>




    </div>
</body>
</html>