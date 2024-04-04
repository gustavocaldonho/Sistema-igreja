document.addEventListener("DOMContentLoaded", function () {
  // Adicionando os campos dos membros automaticamente no carregamento da página (na edição da família).
  adicionarCampos(true);
});

var controleCampos = 1;

function adicionarCampos(carregamentoPagina) {
  // Pegando a quantidade de membros do campo escondido (edição família)
  qtd_membros = document.getElementById("qtd_membros").value;

  // contador da quantidade de repetições do código abaixo ao ser chamada esta função
  if (carregamentoPagina) {
    // primeiro carregamento da página (só será visto os campos padrões)
    repeticao = 0;
  } else {
    // se for clicado no botão 'add' (+)
    repeticao = 1;
  }

  // se passar pelo editarFamília (quando se deseja fazer alterações na família)
  if (qtd_membros != "") {
    // se não passar pelo editarFamilia.php (controlador), o valor do campo é ""
    repeticao = qtd_membros - 1; // o primeiro bloco de campos já é inserido por padrão, por isso o '-1'
  }

  // atribuindo a url a uma variável
  const urlParams = new URLSearchParams(location.search);

  urlParams.get("page");

  c = 0; //contador
  while (c < repeticao) {
    // Limite de 10 membros por família
    if (controleCampos < 10) {
      controleCampos++;

      // atribuindo os parâmetros da url as seguintes variáveis
      var nomeMb = urlParams.get("nomeMb" + controleCampos);
      var cpfMb = urlParams.get("cpfMb" + controleCampos);
      var dnMb = urlParams.get("dnMb" + controleCampos);
      var celMb = urlParams.get("celMb" + controleCampos);

      // caso as variáveis forem nulas, será atribuído "" (vazio) a elas
      if (nomeMb == null) {
        nomeMb = "";
      }

      if (cpfMb == null) {
        cpfMb = "";
      }

      if (dnMb == null) {
        dnMb = "";
      }

      if (celMb == null) {
        celMb = "";
      }

      document
        .getElementById("formulario-membros")
        .insertAdjacentHTML(
          "beforeend",
          '<div class="inputs-membro" id="membro' +
            controleCampos +
            '" ><input type="text" class="form-control nome" id="inputNomeMb' +
            controleCampos +
            '" name="inputNomeMb' +
            controleCampos +
            '" placeholder="' +
            controleCampos +
            'º Membro" onblur="verifText(this)" value="' +
            nomeMb +
            '"><input type="text" class="form-control cpf" id="inputCpfMb' +
            controleCampos +
            '" name="inputCpfMb' +
            controleCampos +
            '" placeholder="000.000.000-00" onfocus="getMaskCpf(id)" onblur="verifCpf(this)" value="' +
            cpfMb +
            '"><input type="text" class="form-control dn" id="inputDNMb' +
            controleCampos +
            '" name="inputDNMb' +
            controleCampos +
            '" placeholder="00/00/0000" onfocus="getMaskDN(id)" onblur="verifDN(this)" value="' +
            dnMb +
            '"> <input type = "text" class = "form-control cel" id = "inputCelMb' +
            controleCampos +
            '" name = "inputCelMb' +
            controleCampos +
            '" placeholder = "(00) 00000-0000" onfocus="getMaskCel(id)" onblur="verifCel(this)" value="' +
            celMb +
            '"></div>'
        );

      document.getElementById("controleCampos").value = controleCampos;
    }
    c++; //contador
  }

  // resetando o campo
  document.getElementById("qtd_membros").value = "";
}

function removerCampos() {
  // atribuindo a url a uma variável
  const urlParams = new URLSearchParams(location.search);
  qtd_membros = urlParams.get("qtd_membros"); // pegando a quantidade de membros que está na url

  // Não remove o primeiro campo (é obrigatório ter pelo menos um membro na família)
  if (controleCampos > qtd_membros) {
    document.getElementById("membro" + controleCampos).remove();
    controleCampos--;

    document.getElementById("controleCampos").value = controleCampos;
  }
}
