var search = document.getElementById("pesquisar");

search.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    searchData();
  }
});

function searchData() {
  window.location = "index.php?search=" + search.value;
}

function setarModalExclusao(id) {
  document.getElementById("btnDeleteComunidadeModal").value = id;
}

function deleteComunidade(id) {
  window.location.href =
    "../../controlador/deletarComunidade.php?id_comunidade=" + id;
}

function redirecionarPerfilComunidade(id) {
  window.location.href = "../perfil-com/index.php?id_comunidade=" + id;
}
