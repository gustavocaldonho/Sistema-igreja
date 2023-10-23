function resetarModalPagamento() {
  document.getElementById("valorPagamento").value = "";
  document.getElementById("box__infosPagamento").style.display = "block";
  document.getElementById("img-QRcode").style.display = "none";
  document.getElementById("codigoCampo").style.display = "none";
  document.getElementById("botaoCopia").style.display = "none";
  document.getElementById("tituloCodigoPix").style.display = "none";
  document.getElementById("box__buttons-simulacao").style.display = "none";
}

function visualizarQRcode() {
  document.getElementById("box__infosPagamento").style.display = "none";
  document.getElementById("img-QRcode").style.display = "block";
  document.getElementById("codigoCampo").style.display = "block";
  document.getElementById("botaoCopia").style.display = "block";
  document.getElementById("tituloCodigoPix").style.display = "block";
  document.getElementById("box__buttons-simulacao").style.display =
    "inline-flex";
}

function copiarCodigo() {
  // Seleciona o campo de texto
  var campoCodigo = document.getElementById("codigoCampo");
  campoCodigo.select();
  campoCodigo.setSelectionRange(0, 99999); // Para dispositivos móveis

  // Copia o texto selecionado para a área de transferência
  document.execCommand("copy");

  // Deseleciona o campo
  campoCodigo.setSelectionRange(0, 0);
}

function efetuarPagamentoDizimo(id_pagamento, id_familia, status, cod) {
  var mes = document.getElementById("select-mes").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A solicitação foi bem-sucedida, você pode tratar a resposta aqui se necessário
      // alert(xhr.responseText);
    }
  };

  xhr.open("POST", "../../controlador/pagamentoDizimo.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data =
    "id_pagamento=" +
    id_pagamento +
    "&id_familia=" +
    id_familia +
    "&mes=" +
    mes +
    "&status=" +
    status +
    "&cod=" +
    cod;
  xhr.send(data);

  // alert(id_pagamento + " " + id_familia + " " + mes + " " + status + " " + cod);
}

function alterarStatusPagamentoDizimo(id_pagamento, id_familia, status, cod) {
  var mes = document.getElementById("select-mes").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A solicitação foi bem-sucedida, você pode tratar a resposta aqui se necessário
      // alert(xhr.responseText);
    }
  };

  xhr.open("POST", "../../controlador/pagamentoDizimo.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data =
    "id_pagamento=" +
    id_pagamento +
    "&id_familia=" +
    id_familia +
    "&mes=" +
    mes +
    "&status=" +
    status +
    "&cod=" +
    cod;
  xhr.send(data);
}

function buscarStatusSelect(id_familia) {
  var mes = document.getElementById("select-mes").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A solicitação foi bem-sucedida, você pode tratar a resposta aqui se necessário
      // alert(xhr.responseText);

      atualizarStatusPagina(xhr.responseText);
    }
  };

  xhr.open("POST", "../../controlador/getStatusDizimo.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data = "id_familia=" + id_familia + "&mes=" + mes;
  xhr.send(data);
}

function atualizarStatusPagina(status) {
  campoStatus = document.getElementById("statusPagamento");

  switch (status) {
    case "0":
      campoStatus.innerHTML = "Não Pago";
      break;
    case "1":
      campoStatus.innerHTML = "Pago";
      break;
    case "2":
      campoStatus.innerHTML = "Pendente";
      break;
    default:
      campoStatus.innerHTML = "Não Pago";
      break;
  }
}
