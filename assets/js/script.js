function mostrarCadastro(){

    let formulario = document.getElementById("form-cadastro");
    formulario.classList.remove("escondido");

    let esconderBotao = document.getElementById("mostrar-cadastro");
    esconderBotao.classList.add("escondido");
    esconderBotao.classList.remove("botao-cadastrar");

    let formularioLogin = document.getElementById("form-login");
    formularioLogin.classList.add("escondido");

}