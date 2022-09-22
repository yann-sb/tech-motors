''
<?php 

   include("conexao.php");
   
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
    <style>
        .block_bk input{
            height: 30px;
            width: 200px;
        }
    </style>
</head>
<body> 
      
    <div class="column block_bk align pg1">
        
        
        <form action="inserir_of.php" method="post" class="column">
            <div class="row cem text_align">

                <img src="images/icons/arrow.png" class="return" onclick="pag_up('login_pg.html');">

                <h2 style="width: 90%;">CADASTRO</h2>

            </div>

            <div class="line align"></div>

            <div class="row cem">

                <div class="column align" style="margin-top: 3%;">

                    <label for="user_name">Nome*</label>
                    <input type="text" name="user_name" class="align">
                    <br>

                    <label for="user_nick">Nome de usuário*</label>
                    <input type="text" name="user_nick" class="align">
                    <br>

                    <label for="user_email">E-mail*</label>
                    <input type="email" name="user_email" class="align">
                    <br>

                    <label for="user_num">Numero de telefone</label>
                    <input type="int" name="user_num" class="align">


                </div>

                <div class="column align" style="margin-top: 3%;">

                    <label for="user_name">Sobrenome*</label>
                    <input type="text" name="user_lastname" class="align">
                    <br>

                    <label for="user_bday">Data de nascimento*</label>
                    <input type="date" name="user_bday" class="align">
                    <br>

                    <label for="pass_box">Senha*</label>
                    <input type="text" name="pass_box" class="align">
                    <br>

                    <label for="user_cpf">CPF*</label>
                    <input type="int" name="user_cpf" class="align">
                    <br>
                </div>

            </div>
            <input type="submit" class="create align"value="Criar conta">
            
        </form>
    </div>
    
    <script src="js/js_login_1.js"></script>
</body>
</html>