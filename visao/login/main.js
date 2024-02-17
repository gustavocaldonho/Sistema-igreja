const msgErroElement = document.getElementById("msgErro");
const cpfElement = document.getElementById("inputCpf");
const senhaElement = document.getElementById("inputSenha");
const checkboxLembrarDeMim = document.getElementById("checkboxLembrarDeMim");
const buttonEntrar = document.getElementById("submit");

function exibirMsgErro() {
  // console.log(msgErroElement.value);
  // const p = document.createElemente('p');
}

function setMaskCpf() {
  var cpfMask = IMask(document.getElementById("inputCpf"), {
    mask: "000.000.000-00",
  });
}

function marcarCheckbox() {
  const loginObjectLocalStorage = lerChaveLocalStorage("login");

  // Se o objeto não estiver vazio:
  if (loginObjectLocalStorage) {
    cpfElement.value = loginObjectLocalStorage.user;
    checkboxLembrarDeMim.checked = true;
  }
}

function lerChaveLocalStorage(key) {
  // O Value da Key 'Login' é um objeto salvo como string, portanto, ao pegar essa string, convertemos para objeto novamente.
  return JSON.parse(localStorage.getItem(key));
}

function salvarLoginLocalStorage(user) {
  // Se um usuário diferente quiser salvar o seu cpf, este cpf substituirá o cpf antigo (caso tiver) que estava na chave 'Login', ou seja, somente um cpf pode ficar salvo no localStorage.
  // obs.: o objeto salvo é convertido para string.
  localStorage.setItem("login", JSON.stringify({ user }));
}

function apagarDoLocalStorage(key) {
  localStorage.removeItem(key);
}

function gerenciarLoginLocalStorage() {
  const cpfValue = cpfElement.value;

  // Se o campo 'cpf' estiver preenchido:
  if (cpfValue !== "") {
    // Se 'Lembrar de mim' estiver marcado:
    if (checkboxLembrarDeMim.checked) {
      salvarLoginLocalStorage(cpfValue);
    } else {
      // Se 'Lembrar de mim' não estiver marcado:
      apagarDoLocalStorage("login");
    }
  }
}

marcarCheckbox();
setMaskCpf();
exibirMsgErro();

buttonEntrar.addEventListener("click", gerenciarLoginLocalStorage);
