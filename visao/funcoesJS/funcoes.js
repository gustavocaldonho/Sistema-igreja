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

// Funções de verificação do cadFamília e do cadComunidade
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

function verifComunidade(campo) {
    if (campo.value == 0) {
        campo.classList.remove("is-valid");
        campo.classList.add("is-invalid");
    } else {
        campo.classList.remove("is-invalid");
        campo.classList.add("is-valid");
    }
}

// Não valida se o cpf é válido (no controlador, em php, é feita essa verificação), mas apenas se o campo está preenchido completamente.
function verifCpf(campo) {
    var cpf = campo.value;

    if (cpf.length < 14) {
        campo.classList.remove("is-valid");
        campo.classList.add("is-invalid");
        // campo.focus();
    } else {
        campo.classList.remove("is-invalid");
        campo.classList.add("is-valid");
    }
}

// Apenas verifica se o campo foi completamente preenchido (não verifica se é uma data válida)
function verifDN(campo) {
    var data = campo.value;

    if (data.length < 10) {
        campo.classList.remove("is-valid");
        campo.classList.add("is-invalid");
        // campo.focus();
    } else {
        campo.classList.remove("is-invalid");
        campo.classList.add("is-valid");
    }
}

function verifCel(campo) {
    var cel = campo.value;

    if (cel.length < 15) {
        campo.classList.remove("is-valid");
        campo.classList.add("is-invalid");
        // campo.focus();
    } else {
        campo.classList.remove("is-invalid");
        campo.classList.add("is-valid");
    }
}

// Máscaras cad família
// CPF
function getMaskCpf(id) {
    var phoneMask = IMask(
        document.getElementById(id), {
        mask: '000.000.000-00'
    });
}
// Data de Nascimento
function getMaskDN(id) {
    var phoneMask = IMask(
        document.getElementById(id), {
        mask: '00/00/0000'
    });
}
// Celular
function getMaskCel(id) {
    var phoneMask = IMask(
        document.getElementById(id), {
        mask: '(00) 00000-0000'
    });
}

function msgContagem(idCampo, spanId, tamanho) {
    var texto = document.getElementById(idCampo).value;
    var contador = texto.length;

    document.getElementById(spanId).innerHTML = contador + "/" + tamanho;
}

// Não reseta o formulário após ter sido feito o envio e retornado com erro.
// function limparFormulario(id_formulario) {
//     const formulario = document.querySelector('#' + id_formulario);
//     formulario.reset();
// }

function limparFormularioComunidade() {
    document.getElementById('inputPadroeiro').value = "";
    document.getElementById('inputLocalizacao').value = "";
    document.getElementById('inputEmail').value = "";
}