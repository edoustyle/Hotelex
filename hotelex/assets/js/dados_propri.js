let nome = document.querySelector('#nome')
let labelNome = document.querySelector('#labelNome')
let validNome = false

let email = document.querySelector('#email')
let labelemail = document.querySelector('#labelemail')
let validemail = false

let cnpj = document.querySelector('#cnpj')
let labelcnpj = document.querySelector('#labelcnpj')
let validcnpj = false

let endereco = document.querySelector('#endereco')
let labelEndereco = document.querySelector('#labelEndereco')
let validEndereco = false

let senha = document.querySelector('#senha')
let labelSenha = document.querySelector('#labelSenha')
let validSenha = false

let telefone = document.querySelector('#telefone')
let labelTelefone = document.querySelector('#labelTelefone')
let validTelefone = false

let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const nomeCompletoRegex = /^[A-Za-z]+(\s[A-Za-z]+)+$/;
const cnpjRegex = /^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/;

let olhex = document.querySelector('.fa-eye')


olhex.addEventListener('click', ()=>{
    let inputSenha = document.querySelector('#senha')
    
    if(inputSenha.getAttribute('type') == 'password'){
      inputSenha.setAttribute('type', 'text')
    } else {
      inputSenha.setAttribute('type', 'password')
    }

    let inputConfirmSenha = document.querySelector('#confirmSenha')
    
    if(inputConfirmSenha.getAttribute('type') == 'password'){
      inputConfirmSenha.setAttribute('type', 'text')
    } else {
      inputConfirmSenha.setAttribute('type', 'password')
    }
})

nome.addEventListener('keyup', () => {
  if(nome.value.length>1){
    labelNome.setAttribute('style', 'color: green')
    labelNome.innerHTML = 'Válidex'
    nome.setAttribute('style', 'border-color: green')
    validNome = true
  } else if(nome.value==''){
    labelNome.setAttribute('style', 'color: black')
    labelNome.innerHTML = 'NOME'
    nome.setAttribute('style', 'border-color: black')
    validNome = null   
  }else {
    labelNome.setAttribute('style', 'color: red')
    labelNome.innerHTML = 'Nome Completo *Inválido'
    nome.setAttribute('style', 'border-color: red')
    validNome = false
  }
})

email.addEventListener('keyup', () => {
 
    if (emailRegex.test(email.value)) {
        labelemail.setAttribute('style', 'color: green')
        labelemail.innerHTML = 'Email Correto'
        email.setAttribute('style', 'border-color: green')
        validemail = true
        //console.log('O e-mail é válido.');
    } 
    else if(email.value==''){
        labelemail.setAttribute('style', 'color: black')
        labelemail.innerHTML = 'EMAIL'
        email.setAttribute('style', 'border-color: black')
        validemail = false
    }
    else {
        labelemail.setAttribute('style', 'color: red')
        labelemail.innerHTML = 'Email *Inválido'
        email.setAttribute('style', 'border-color: red')
        validemail = false
        //console.log('O e-mail é inválido.');
    }
})

function validateCnpj(){
    if(cnpjRegex.test(cnpj.value)){
        labelcnpj.setAttribute('style', 'color: green')
        labelcnpj.innerHTML = 'CNPJ Válidex'
        cnpj.setAttribute('style', 'border-color: green')
        validcnpj = true
      } else if(cnpj.value=='') {
        labelcnpj.setAttribute('style', 'color: black')
        labelcnpj.innerHTML = 'CNPJ'
        cnpj.setAttribute('style', 'border-color: black')
        validcnpj = null
      }else{
        labelcnpj.setAttribute('style', 'color: red')
        labelcnpj.innerHTML = 'CNPJ *Insira no minimo 11 numeros'
        cnpj.setAttribute('style', 'border-color: red')
        validcnpj = false
    }
}

cnpj.addEventListener('keyup', () => {
    validateCnpj();
})

function cadastrar(){
  if(validNome && validemail && validSenha && validConfirmSenha){
    let listaUser = JSON.parse(localStorage.getItem('listaUser') || '[]')
    
    listaUser.push(
    {
      nomeCad: nome.value,
      userCad: email.value,
      senhaCad: senha.value
    }
    )
    
    localStorage.setItem('listaUser', JSON.stringify(listaUser))
    
   
    msgSuccess.setAttribute('style', 'display: block')
    msgSuccess.innerHTML = '<strong>Cadastrando usuário...</strong>'
    msgError.setAttribute('style', 'display: none')
    msgError.innerHTML = ''
    
    setTimeout(()=>{
        window.location.href = './html/signin.html'
    }, 3000)
  
    
  } else {
    msgError.setAttribute('style', 'display: block')
    msgError.innerHTML = '<strong>Preencha todos os campos corretamente antes de cadastrar</strong>'
    msgSuccess.innerHTML = ''
    msgSuccess.setAttribute('style', 'display: none')
  }
}

btn.addEventListener('click', ()=>{
  let inputSenha = document.querySelector('#senha')
  
  if(inputSenha.getAttribute('type') == 'password'){
    inputSenha.setAttribute('type', 'text')
  } else {
    inputSenha.setAttribute('type', 'password')
  }
})

btnConfirm.addEventListener('click', ()=>{
  let inputConfirmSenha = document.querySelector('#confirmSenha')
  
  if(inputConfirmSenha.getAttribute('type') == 'password'){
    inputConfirmSenha.setAttribute('type', 'text')
  } else {
    inputConfirmSenha.setAttribute('type', 'password')
  }
})

// Atualiza o nome do arquivo no elemento .file-name
function updateFileList(input) {
  const fileListElement = document.getElementById('fileList');
  fileListElement.innerHTML = ''; // Limpa a lista antes de atualizar
  

  for (const file of input.files) {
      const fileItem = document.createElement('div');
      fileItem.className = 'file-item';

      const fileNameElement = document.createElement('div');
      fileNameElement.className = 'file-name';
      fileNameElement.textContent = file.name;

      const removeIcon = document.createElement('i');
      removeIcon.className = 'fa-solid fa-circle-xmark fa-2xs remove-icon';
      removeIcon.style.color = 'red'; // Cor do ícone
      removeIcon.style.fontSize = '18px'

    removeIcon.onclick = function() {
        // Remove o item da lista ao clicar no ícone de remoção
        fileItem.remove();
    };
    fileItem.appendChild(fileNameElement);
    fileItem.appendChild(removeIcon);
    fileListElement.appendChild(fileItem);
  }
  // Ajuste da posição inicial
  fileListElement.style.marginTop = '-22vh';
  fileListElement.style.left = '0vh';
}
// Adiciona a lógica do rótulo flutuante para cada textarea
document.querySelectorAll('.label-float2 textarea').forEach(function (textarea) {
  textarea.addEventListener('input', function () {
      this.previousElementSibling.classList.toggle('active', this.value !== '');
  });
});
const tootltip = document.querySelector(".tooltip");
const menuButton = document.querySelector('.menu-button');

menuButton.addEventListener("click", (e) => {
    tootltip.classList.toggle("active");
    alternarMenuButtonIcon();
});
