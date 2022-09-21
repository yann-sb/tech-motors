<?php 

    $pdo = new PDO('mysql:host=localhost;dbname=tech_motors','root','');

    $sql = $pdo->prepare("SELECT * FROM 'usuario'")

    $sql->execute();

    $info = $sql->fetchAll();

    echo '<prev>'
    print_r($info); 
    echo '</prev'
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/config.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <title>Cadastro</title>

</head>
<body>
    
    <div class="column block_bk align pg1">
        
        <div class="row cem text_align">
            
            <img src="images/icons/arrow.png" class="return" onclick="pag_up('login_pg.html');">
        
            <h2 style="width: 90%;">CADASTRO</h2>

        </div>

        <div class="line align"></div>

        <div class="row cem">

            <div class="column align" style="margin-top: 3%;">
        
                <label for="user_name">Nome*</label>
                <input type="text" id="user_name" class="align">
                <br>

                <label for="user_nick">Nome de usuário*</label>
                <input type="text" id="user_nick" class="align">
                <br>
                
                <label for="user_email">E-mail*</label>
                <input type="email" id="user_email" class="align">
                <br>

                <label for="user_num">Numero de telefone</label>
                <input type="int" id="user_num" class="align">
                
                
            </div>
            
            <div class="column align" style="margin-top: 3%;">

                <label for="user_name">Sobrenome*</label>
                <input type="text" id="user_lastname" class="align">
                <br>

                <label for="user_bday">Data de nascimento*</label>
                <input type="date" style="margin-left:0px;" id="user_bday" class="align">
                <br>

                <label for="pass_box">Senha*</label>
                <input type="text" id="pass_box" class="align">
                <br>

                <label for="user_cpf">CPF*</label>
                <input type="email" id="user_email" class="align">
                <br>

                
            </div>

        </div>

        <button class="create align" onclick="button_test('foi');">Criar conta</button>

    </div>
    
    <script src="js/js_login_1.js"></script>
</body>
</html>