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
        
        $i_brand = $count-1;        
    ?>

    <?php 
        $comando ="SELECT user_id FROM usuario";
        $resultado_user = $pdo->query($comando)->fetchAll(); 
        
        $comando ="SELECT user_rank FROM usuario";
        $resultado_rank = $pdo->query($comando)->fetchAll(); 
        
        $count = count($resultado_user);
        
        $i_user = $count -1;        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/config.css">
    <link rel="stylesheet" href="css/adm_menu.css">
    <title>Document</title>
</head>
<body> 

       
    
    <div class="align block_bk row">
        <div class="align column size">

            <img src="images/icons/arrow.png" class="return" onclick="pag_up('profile.html');" style="margin-top: -15px;margin-left:-20px" >

            <form action="func.php" method="post" class="align add" style="margin-top:-20px">
                <div class="row">
                    <label for="brand_add" style="margin-right:3px;">Marca</label>
                    <input type="text" id="brand" name="brand">
                </div> 
                
                <div class="row">
                    <label for="oil_add" style="margin-right:12px;">Óleo</label>
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
                            $c=0;
                            while ($c <= $i_brand) {
                                $result = $resultado_brand[$c];
                                print_r("<option>$result[0]</option>");
                                $c = $c+1;
                            };
                            $c=0;
                        ?>
                    </select>
                
                </div>

                <div class="row">
                
                    <label for="brand">Nome do modelo</label>
                    <input type="text" id="model_name" name="model_name" style="width:90px">
                
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
                            $c=0;
                            while ($c <= $i_oil) {
                                $result = $resultado_oil[$c];
                                print_r("<option>$result[0]</option>");
                                $c = $c+1;
                            }; 
                            $c=0;
                        ?>
                    </select>
                
                </div>

                <div class="row">
                
                    <label for="oil_km">Km entre troca de óleo</label>
                    <input type="text" id="oil_km" name="oil_km">
                
                </div>

                <div class="row">
                
                    <label for="oil_km">De:</label>
                    <input type="text" id="oil_km" name="oil_km">

                    <label for="oil_km" style="margin-left:10px">Até:</label>
                    <input type="text" id="oil_km" name="oil_km">
                
                </div>
                    
                <input type="hidden" name="func" value="4">
                <input type="submit" value="bora" style="margin-left:70px;">
                    
            </form>
                    
            <br><br>
                    
        '</div>
                    
        <div class="align column size right">
            <table class="table table-striped table-bordered table-condensed table-hover">

                <thead>

                    <tr>

                        <td>Dono</td>
                        <td>ADM</td>
                            
                        <td>ID do usuário</td>
                            
                        <td>Nome do usuário</td>

                    </tr>
                
                </thead>
                        
                <tbody>
                    <?php 
                    // print_r ($resultado_user);
                    // echo "<br>";
                    // echo $i_user;
                    while ($i_user > 0) {
                        $result_id = $resultado_user[$i_user];
                        $result_id = $result_id[0];
                        $result_rank = $resultado_rank[$i_user];
                        $result_rank = $result_rank[0];
                        // echo "<br>";
                        // echo $result_id;
                        // echo "<br>";
                        $comando = "SELECT user_nick FROM usuario WHERE user_id='$result_id'";
                        // echo $comando;
                        // echo "<br>";
                        $resultado_nick = $pdo->query($comando)->fetch();
                        // echo $resultado_nick[0];
                        $result_nick = $resultado_nick[0];

                        if($result_rank==1){
                            echo("<tr>");
                            echo("<td><form action='func.php' method='post'><input type='checkbox' onChange='this.form.submit()' checked><input type='hidden' name='adm_check' value='$result_id'><input type='hidden' name='rank' value='1'></form></td>");
                            echo("<td><form action='func.php' method='post'><input type='checkbox' onChange='this.form.submit()'><input type='hidden' name='adm_check' value='$result_id'><input type='hidden' name='rank' value='2'></form></td>"); 
                        }elseif ($result_rank==2) {
                            echo("<tr>");
                            echo("<td><form action='func.php' method='post'><input type='checkbox' onChange='this.form.submit()'><input type='hidden' name='adm_check' value='$result_id'><input type='hidden' name='rank' value='1'></form></td>");
                            echo("<td><form action='func.php' method='post'><input type='checkbox' onChange='this.form.submit()'checked><input type='hidden' name='adm_check' value='$result_id'><input type='hidden' name='rank' value='2'></form></td>");
                        }else{
                            echo("<tr>");
                            echo("<td><form action='func.php' method='post'><input type='checkbox' name='rank' value='1' onChange='this.form.submit()'><input type='hidden' name='adm_check' value='$result_id'></form></td>");
                            echo("<td><form action='func.php' method='post'><input type='checkbox' name='rank' value='2' onChange='this.form.submit()'><input type='hidden' name='adm_check' value='$result_id'></form></td>");
                        }
                            print_r("<td>$result_id</td>");
                            echo("<td>$result_nick</td>");
                            echo("<td><form action='func.php' method='post'><input type='image' src='images/icons/x.png' style='width: 20px;background-color: #2F3D40;' onclick='this.form.submit()'><input type='hidden' name='delete' value='$result_id'></form></td>");
                            echo("</tr>");

                        
                        $i_user = $i_user-1;
                    };

                    ?>
                </tbody>
                
            </table>

            

        </div>

    </div>


<script src="js/js_login_1.js"></script>
</body>
</html>