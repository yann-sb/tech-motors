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
    console.log("entrou");
    
    window.location.href = p

};

function button_test(a){
    console.log("o botão '"+a+"' ta indo");
};

