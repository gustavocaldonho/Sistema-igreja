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
  document.getElementById("btnDeleteFamiliaModal").value = id;
}

function deleteFamilia(id) {
  window.location.href =
    "../../controlador/deletarFamilia.php?id_familia=" + id;
}

function redirecionarPerfilFamilia(id) {
  window.location.href = "../perfil-fml/index.php?id_familia=" + id;
}
