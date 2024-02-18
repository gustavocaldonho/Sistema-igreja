function salvarLoginLocalStorage(key, user) {
  // Se um usuário diferente quiser salvar o seu cpf, este cpf substituirá o cpf antigo (caso tiver) que estava na chave 'Login', ou seja, somente um cpf pode ficar salvo no local storage.
  // obs.: o objeto salvo é convertido para string.
  localStorage.setItem(key, JSON.stringify({ user }));
}

function apagarDoLocalStorage(key) {
  localStorage.removeItem(key);
}

function lerChaveLocalStorage(key) {
  // O Value da Key 'Login' é um objeto salvo como string, portanto, ao pegar essa string, convertemos para objeto novamente.
  return JSON.parse(localStorage.getItem(key));
}
