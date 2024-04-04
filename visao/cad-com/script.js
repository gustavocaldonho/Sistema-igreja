// Função para mostrar a div e depois escondê-la devagar
var mensagemOriginal = "";

function mostrarDivPorTempo(divId, pId, tempo, mensagem) {
  var div = document.getElementById(divId);
  var mensagemElement = document.getElementById(pId);

  // Se a mensagem original ainda não foi definida, armazena o conteúdo atual do parágrafo
  if (!mensagemOriginal) {
    mensagemOriginal = mensagemElement.innerHTML.trim();
  }

  // Atualiza o conteúdo do parágrafo com a mensagem original e a nova mensagem
  mensagemElement.innerHTML = mensagemOriginal + " " + mensagem;

  div.style.display = "block";
  div.classList.add("fadeIn");

  setTimeout(function () {
    div.classList.remove("fadeIn");
    div.classList.add("fadeOut");
    setTimeout(function () {
      div.style.display = "none";
      div.classList.remove("fadeOut");
      // Limpa o texto da mensagem após a animação de fadeOut
      mensagemElement.innerHTML = mensagemOriginal;
    }, 1000); // Tempo da animação de fadeOut
  }, tempo);
}

// Aguarde até que o DOM esteja carregado
document.addEventListener("DOMContentLoaded", function () {
  $("#formulario").submit(function () {
    // campos
    var campoPadroeiro = document.getElementById("inputPadroeiro");
    var campoLocalizacao = document.getElementById("inputLocalizacao");
    var campoEmail = document.getElementById("inputEmail");

    // Verifique se os campos têm dados incorretos
    if (
      campoPadroeiro.classList.contains("is-invalid") ||
      campoLocalizacao.classList.contains("is-invalid") ||
      campoEmail.classList.contains("is-invalid")
    ) {
      mostrarDivPorTempo("msg-erro", "mensagem-erro", 4000, "Campos Inválidos");
      return false;
    }
  });
});
