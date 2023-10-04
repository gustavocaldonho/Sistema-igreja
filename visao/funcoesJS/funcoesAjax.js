// verifica se o aviso está ativo (1) ou inativo (0)
function verificarChecked(checked) {
  if (checked === true) {
    return 1;
  } else {
    return 0;
  }
}

function ativarDesativarAviso(id_aviso, checked) {
  cod = verificarChecked(checked);

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A solicitação foi bem-sucedida, você pode tratar a resposta aqui se necessário
      // alert(xhr.responseText);
    }
  };

  xhr.open("POST", "../../controlador/ativarEDesativarAviso.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data = "id_aviso=" + id_aviso + "&cod=" + cod;
  xhr.send(data);

  // alert(id_aviso + " " + cod);
}

function ativarDesativarEvento(id_evento, checked) {
  cod = verificarChecked(checked);

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A solicitação foi bem-sucedida, você pode tratar a resposta aqui se necessário
      // alert(xhr.responseText);
    }
  };

  xhr.open("POST", "../../controlador/ativarEDesativarEvento.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data = "id_evento=" + id_evento + "&cod=" + cod;
  xhr.send(data);
}

function ativarDesativarComunidade(id_comunidade, checked) {
  cod = verificarChecked(checked);

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A solicitação foi bem-sucedida, você pode tratar a resposta aqui se necessário
      // alert(xhr.responseText);
    }
  };

  xhr.open("POST", "../../controlador/ativarEDesativarComunidade.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data = "id_comunidade=" + id_comunidade + "&cod=" + cod;
  xhr.send(data);
}

function ativarDesativarFamilia(id_familia, checked) {
  cod = verificarChecked(checked);

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A solicitação foi bem-sucedida, você pode tratar a resposta aqui se necessário
      alert(xhr.responseText);
    }
  };

  xhr.open("POST", "../../controlador/ativarEDesativarFamilia.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data = "id_familia=" + id_familia + "&cod=" + cod;
  xhr.send(data);
}
