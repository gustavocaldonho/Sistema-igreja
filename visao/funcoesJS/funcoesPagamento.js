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
      // "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-x-circle-fill ms-2 mb-1' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/></svg>";

      // "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='green' class='bi bi-x-circle ms-2 mb-1' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/></svg>";
      break;
    case "1":
      campoStatus.innerHTML =
        "Pago" +
        "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='green' class='bi bi-check-circle-fill ms-2 mb-1' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>";
      break;
    case "2":
      campoStatus.innerHTML =
        "Pendente" +
        "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='yellow' class='bi bi-exclamation-circle-fill ms-2 mb-1' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z'/></svg>";
      break;
    default:
      campoStatus.innerHTML =
        "Não Pago" +
        "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-x-circle-fill ms-2 mb-1' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/></svg>";
      break;
  }
}
