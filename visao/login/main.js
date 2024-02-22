const cpfElement = document.getElementById("inputCpf");
const senhaElement = document.getElementById("inputSenha");
const checkboxLembrarDeMim = document.getElementById("checkboxLembrarDeMim");
const buttonEntrar = document.getElementById("submit");
const boxReferenceInputCpf = document.getElementById("box__inputCpf");
const boxReferenceInputSenha = document.getElementById("box__inputSenha");
const msgErroElementAuxiliar = document.getElementById("msgErroAuxiliar");
const codErroElementAuxiliar = document.getElementById("codErroAuxiliar");
const cpfErroElementAuxiliar = document.getElementById("cpfErroAuxiliar");

// criar uma função que lê a barra de endereço e separa as informações numa lista
// window.location.parthname

// const listaEndereco = catchMsgBarraDeEndereco() => {
// return {
//   cod: 0,
//   msg: "message",
//   cpf: 123456789,
// }
// };

function setMaskCpf2() {
  var cpfMask = IMask(cpfElement, {
    mask: "000.000.000-00",
  });
}

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

function exibirMsgErro() {
  const p = createMessageErro(msgErroElementAuxiliar.value);

  if (codErroElementAuxiliar.value === "0") {
    boxReferenceInputCpf.appendChild(p);
  } else {
    boxReferenceInputSenha.appendChild(p);
  }
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

setMaskCpf(); //máscara do cpf.
marcarCheckbox(); //lembrar-me.
exibirMsgErro(); //cpf ou senha.

buttonEntrar.addEventListener("click", gerenciarLoginLocalStorage);
