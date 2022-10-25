<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/config.css">
    <link rel="stylesheet" href="css/login_pg.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <div class="block_bk row left align">
        
            <div class="column align title block">
                
                <br>
                <h2>Faça o seu login</h2>
                <h2>entre para o nosso time</h2>

                <img src="images/logo.png" id="logo">

            </div>

            <div class="column block align right">
                <h1 class="text_align" style="margin-left:30px; color: aliceblue;">Acessar conta</h1>
                
                <form action="func.php" method="post" class="align">
                    <div class="row align">
                        <img src="images/icons/user.png" class="icon top">
                        <div class="in">
                            <input type="text" placeholder="Nome de usuário ou E-mail" name="name_mail">
                        </div>
                    </div>
                    <br><br>
                    <div class="row align">
                        <img src="images/icons/pass.png" class="icon top">
                        <div class="in">
                            <input type="password" placeholder="Senha" id="pass_box" name="pass_box">
                            <img src="images/icons/view_pto.png" style="margin-bottom: -13px;" onclick="pass_view();">
                        </div>
                    </div>
                    <div class="align" style="padding-left:30px">
                        <br><br>
                        <input type="submit" class="but full align text_align" style="margin-left:23px; height:40px; border-radius:10px" value="Acessar conta">
                        <br><br><br>
                        <div class="but align text_align" onclick="pag_up('create_user_pg.html');" style="height:35px" ><p class="top" style="margin-top:5px">Criar conta</p></div>
                    </div>
                    <input type="hidden" value="1" name="func"> 
                </form>

            </div>

    </div>


<script src="js/js_login_1.js"></script>
</body>
</html>