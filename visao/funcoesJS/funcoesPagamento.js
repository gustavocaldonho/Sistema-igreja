function resetarModalPagamento() {
  document.getElementById("valorPagamento").value = "";
  document.getElementById("box__infosPagamento").style.display = "block";
  document.getElementById("img-QRcode").style.display = "none";
  document.getElementById("codigoCampo").style.display = "none";
  document.getElementById("botaoCopia").style.display = "none";
  document.getElementById("tituloCodigoPix").style.display = "none";
}

function visualizarQRcode() {
  document.getElementById("box__infosPagamento").style.display = "none";
  document.getElementById("img-QRcode").style.display = "block";
  document.getElementById("codigoCampo").style.display = "block";
  document.getElementById("botaoCopia").style.display = "block";
  document.getElementById("tituloCodigoPix").style.display = "block";
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
