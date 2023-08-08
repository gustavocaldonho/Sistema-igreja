// função para  carregar a navbar
function carregaDocumento(arquivo, target) {
    var el = document.querySelector(target);

    //Se o elemento não existir então não requisita
    if (!el) return;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", arquivo, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status >= 200 && xhr.status < 300) {
            el.innerHTML = xhr.responseText;
        }
    };

    xhr.send(null);
}

function verifText(campo) {
    var valor = campo.value;

    if (valor.length < 5) {
        campo.classList.remove("is-valid");
        campo.classList.add("is-invalid");
        // nome.focus();
    } else {
        campo.classList.remove("is-invalid");
        campo.classList.add("is-valid");
    }
}

function verifEmail(campo) {
    var valor = campo.value;

    // se o campo estiver preenchido
    if (valor.length >= 1) {
        if (!valor.includes("@") || !valor.includes(".com")) {
            campo.classList.remove("is-valid");
            campo.classList.add("is-invalid");
            // campo.focus();
        } else {
            campo.classList.remove("is-invalid");
            campo.classList.add("is-valid");
        }
    } else { // se o campo estiver vazio
        campo.classList.remove("is-valid");
        campo.classList.add("is-invalid");
    }
}

// Se o usuário clicar no campo, não digitar nada e sair do mesmo, nenhuma verificação e nenhum 
// alerta será dado.
function verifCel() {
    var campoCelular1 = document.getElementById("inputCelular1");
    var celular1 = document.getElementById("inputCelular1").value;
    // var celular2 = document.getElementById("inputCelular2").value;

    if (celular1.length >= 1) {
        if (celular1.length < 15) {
            campoCelular1.classList.remove("is-valid");
            campoCelular1.classList.add("is-invalid");
            // campoCelular1.focus();
        } else {
            campoCelular1.classList.remove("is-invalid");
            campoCelular1.classList.add("is-valid");
        }
    } else { }
}

function verifComunidade() {
    var comunidade = document.getElementById("inputComunidade");

    if (comunidade.value == "Escolha...") {
        comunidade.classList.remove("is-valid");
        comunidade.classList.add("is-invalid");
        // comunidade.focus();
    } else {
        comunidade.classList.remove("is-invalid");
        comunidade.classList.add("is-valid");
    }
}

function msgContagem(idCampo, spanId, tamanho) {
    var texto = document.getElementById(idCampo).value;
    var contador = texto.length;

    document.getElementById(spanId).innerHTML = contador + "/" + tamanho;
}

function limparFormulario(id_formulario) {
    const formulario = document.querySelector('#' + id_formulario);
    formulario.reset();
}