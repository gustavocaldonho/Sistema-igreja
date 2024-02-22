const cpfElement = document.getElementById("inputCpf");
const senhaElement = document.getElementById("inputSenha");
const checkboxLembrarDeMim = document.getElementById("checkboxLembrarDeMim");
const buttonEntrar = document.getElementById("submit");
const boxReferenceInputCpf = document.getElementById("box__inputCpf");
const boxReferenceInputSenha = document.getElementById("box__inputSenha");

function setMaskCpf() {
  var cpfMask = IMask(cpfElement, {
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

function createMessageErro(message) {
  const p = document.createElement("p");
  p.classList.add("erro");
  p.innerHTML = message;

  return p;
}

function exibirMsgErro(paramsUrl) {
  cpfElement.value = paramsUrl.user;
  const p = createMessageErro(paramsUrl.msg);

  if (paramsUrl.cod === "0") {
    boxReferenceInputCpf.appendChild(p);
  } else {
    boxReferenceInputSenha.appendChild(p);
  }
}

function getObjectParametersUrl() {
  const params = new URLSearchParams(window.location.search);

  return {
    cod: params.get("cod"),
    user: params.get("user"),
    msg: params.get("msg"),
  };
}

function gerenciarLoginLocalStorage() {
  const cpfValue = cpfElement.value;

  // Se o campo 'cpf' estiver preenchido:
  if (cpfValue !== "") {
    // Se 'Lembrar de mim' estiver marcado:
    if (checkboxLembrarDeMim.checked) {
      salvarLoginLocalStorage("login", cpfValue);
    } else {
      // Se 'Lembrar de mim' não estiver marcado:
      apagarDoLocalStorage("login");
    }
  }
}

const paramsUrl = getObjectParametersUrl();

exibirMsgErro(paramsUrl); //cpf ou senha.
marcarCheckbox(); //lembrar-me.
setMaskCpf(); //máscara do cpf.

buttonEntrar.addEventListener("click", gerenciarLoginLocalStorage);
