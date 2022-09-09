/*exibir e ocultar senha*/
function pass_view(n){

    var pass = document.getElementById("pass_box")

    if(pass.type=="password"){
        pass.type="text";
    }else{
        pass.type="password";
    }

}

/*função para alterar a pagina*/
function pag_up(p){
    if(p=="create"){
        window.location.href = "create_user_pg.html"
    }
    if(p=="login"){
        window.location.href = "login_pg.html"
    }
};

function button_test(a){
    console.log("o botão '"+a+"' ta indo");
};

