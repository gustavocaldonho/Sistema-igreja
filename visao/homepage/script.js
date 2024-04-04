// toda vez que o botão 'adicionar evento' for clicado, os campos são limpos
function setarModalFormEventos() {
  // Limpando os campos
  document.getElementById("tituloEvento").value = "";
  document.getElementById("presidenteEvento").value = "";
  document.getElementById("localEvento").value = "";
  document.getElementById("dataEvento").value = "";
  document.getElementById("horarioEvento").value = "";
  document.getElementById("descricaoEvento").value = "";
  document.getElementById("id_evento").value = "";
  const radioOpcao0 = document.querySelector(
    'input[name="radioEvento"][value="0"]'
  );
  radioOpcao0.checked = true;

  // resetando os contadores de caracteres
  msgContagem("tituloEvento", "spanTituloEvento", "70");
  msgContagem("descricaoEvento", "spanDescricaoEvento", "200");
}

function setarModalEventoUpdate(
  titulo,
  presidente,
  local,
  data,
  horario,
  descricao,
  abrangencia,
  id_eventos
) {
  document.getElementById("tituloEvento").value = titulo;
  document.getElementById("presidenteEvento").value = presidente;
  document.getElementById("localEvento").value = local;
  document.getElementById("dataEvento").value = data;
  document.getElementById("horarioEvento").value = horario;
  document.getElementById("descricaoEvento").value = descricao;
  document.getElementById("id_evento").value = id_eventos;
  const radioOpcao0 = document.querySelector(
    'input[name="radioEvento"][value="0"]'
  );
  radioOpcao0.checked = true;

  if (abrangencia == 0) {
    const radioOpcao0 = document.querySelector(
      'input[name="radioEvento"][value="0"]'
    );
    radioOpcao0.checked = true;
  } else {
    const radioOpcao1 = document.querySelector(
      'input[name="radioEvento"][value="1"]'
    );
    radioOpcao1.checked = true;
  }

  // Ajustando os contadores de caracteres
  msgContagem("tituloEvento", "spanTituloEvento", "70");
  msgContagem("descricaoEvento", "spanDescricaoEvento", "200");
}

// toda vez que o botão 'adicionar aviso' for clicado, os campos são limpos
function setarModalFormAvisos() {
  // Limpando os campos
  document.getElementById("tituloAviso").value = "";
  document.getElementById("descricaoAviso").value = "";
  document.getElementById("id_aviso").value = "";
  document.getElementById("id_comunidade").value =
    "<?php echo $_SESSION['id_comunidade'] ?>";
  const radioOpcao0 = document.querySelector(
    'input[name="radioAviso"][value="0"]'
  );
  radioOpcao0.checked = true;

  // resetando os contadores de caracteres
  msgContagem("tituloAviso", "spanAvisoTitulo", "100");
  msgContagem("descricaoAviso", "spanAvisoDescricao", "300");
}

// Carregando as informações para o modal de edição (pega direto da página, já que a query ao banco já foi feita)
function setarModalAvisoUpdate(
  titulo,
  descricao,
  abrangencia,
  id_aviso,
  id_comunidade
) {
  document.getElementById("tituloAviso").value = titulo;
  document.getElementById("descricaoAviso").value = descricao;
  document.getElementById("id_aviso").value = id_aviso;
  document.getElementById("id_comunidade").value = id_comunidade;

  if (abrangencia == 0) {
    const radioOpcao0 = document.querySelector(
      'input[name="radioAviso"][value="0"]'
    );
    radioOpcao0.checked = true;
  } else {
    const radioOpcao1 = document.querySelector(
      'input[name="radioAviso"][value="1"]'
    );
    radioOpcao1.checked = true;
  }

  // Ajustando a contagem dos caracteres (small)
  msgContagem("descricaoAviso", "spanAvisoDescricao", "300");
  msgContagem("tituloAviso", "spanAvisoTitulo", "100");
}

function setarIdModalExclusaoAviso(id) {
  document.getElementById("btnDeleteAvisoModal").value = id;
}

function setarIdModalExclusaoEvento(id) {
  document.getElementById("btnDeleteEventoModal").value = id;
}

function deleteAviso(id) {
  window.location.href = "../../controlador/deletarAviso.php?id=" + id;
}

function deleteEvento(id) {
  window.location.href = "../../controlador/deletarEvento.php?id=" + id;
}
