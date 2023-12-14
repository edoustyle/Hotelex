let btn = document.querySelector('#verSenha')
let btnConfirm = document.querySelector('#verConfirmSenha')

let nome = document.querySelector('#nome')
let labelNome = document.querySelector('#labelNome')
let validNome = false

let email = document.querySelector('#email')
let labelemail = document.querySelector('#labelemail')
let validemail = false

let cpf = document.querySelector('#cpf')
let labelcpf = document.querySelector('#labelcpf')
let validcpf = false

let senha = document.querySelector('#senha')
let labelSenha = document.querySelector('#labelSenha')
let validSenha = false

let confirmSenha = document.querySelector('#confirmSenha')
let labelConfirmSenha = document.querySelector('#labelConfirmSenha')
let validConfirmSenha = false

let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const nomeCompletoRegex = /^[A-Za-z]+(\s[A-Za-z]+)+$/;

let olhex = document.querySelector('.fa-eye')

let count=1;
document.getElementById("radio1").checked=true;
setInterval(function(){
  nextImage();
},4000)

function nextImage(){
    count++;
    if (count>4) {
      count=1;
    }
    document.getElementById("radio"+count).checked=true;
}

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
  if(nomeCompletoRegex.test(nome.value)){
    labelNome.setAttribute('style', 'color: green')
    labelNome.innerHTML = 'Válidex'
    nome.setAttribute('style', 'border-color: green')
    validNome = true
  } else if(nome.value==''){
    labelNome.setAttribute('style', 'color: black')
    labelNome.innerHTML = 'NOME COMPLETO'
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


cpf.addEventListener('keyup', () => {
    if(cpf.value.length <= 13 && cpf.value.length > 0){
      labelcpf.setAttribute('style', 'color: red')
      labelcpf.innerHTML = 'CPF *Insira no minimo 11 numeros'
      cpf.setAttribute('style', 'border-color: red')
      validcpf = false
    } else if(cpf.value.length==14) {
      labelcpf.setAttribute('style', 'color: green')
      labelcpf.innerHTML = 'CPF Válidex'
      cpf.setAttribute('style', 'border-color: green')
      validcpf = true
    }else{
        labelcpf.setAttribute('style', 'color: black')
        labelcpf.innerHTML = 'CPF'
        cpf.setAttribute('style', 'border-color: black')
        validcpf = null
    }
})

senha.addEventListener('keyup', () => {
  if(senha.value.length <= 7){
    labelSenha.setAttribute('style', 'color: red')
    labelSenha.innerHTML = 'Senha *Insira no minimo 8 caracteres'
    senha.setAttribute('style', 'border-color: red')
    validSenha = false
  } else if(senha.value.length == ''){
    labelSenha.setAttribute('style', 'color: black')
    labelSenha.innerHTML = 'SENHA'
    senha.setAttribute('style', 'border-color: black')
    validSenha = null
  } else {
    labelSenha.setAttribute('style', 'color: green')
    labelSenha.innerHTML = 'SENHA OK'
    senha.setAttribute('style', 'border-color: green')
    validSenha = true
  }
})

confirmSenha.addEventListener('keyup', () => {
  if(senha.value != confirmSenha.value){
    labelConfirmSenha.setAttribute('style', 'color: red')
    labelConfirmSenha.innerHTML = 'Confirmar Senha *As senhas não conferem'
    confirmSenha.setAttribute('style', 'border-color: red')
    validConfirmSenha = false
  } else if(confirmSenha.value==''){
    labelConfirmSenha.setAttribute('style', 'color: black')
    labelConfirmSenha.innerHTML = 'CONFIRME SUA SENHA'
    confirmSenha.setAttribute('style', 'border-color: black')
    validConfirmSenha = null
  } else {
    labelConfirmSenha.setAttribute('style', 'color: green')
    labelConfirmSenha.innerHTML = 'Senhas iguais'
    confirmSenha.setAttribute('style', 'border-color: green')
    validConfirmSenha = true
  }
})

// function cadastrar(){
//   if(validNome && validemail && validSenha && validConfirmSenha){
//     let listaUser = JSON.parse(localStorage.getItem('listaUser') || '[]')
    
//     listaUser.push(
//     {
//       nomeCad: nome.value,
//       userCad: email.value,
//       senhaCad: senha.value
//     }
//     )
    
//     localStorage.setItem('listaUser', JSON.stringify(listaUser))
    
   
//     msgSuccess.setAttribute('style', 'display: block')
//     msgSuccess.innerHTML = '<strong>Cadastrando usuário...</strong>'
//     msgError.setAttribute('style', 'display: none')
//     msgError.innerHTML = ''
    
//     // setTimeout(()=>{
//     //     window.location.href = './html/signin.html'
//     // }, 3000)
  
    
//   } else {
//     msgError.setAttribute('style', 'display: block')
//     msgError.innerHTML = '<strong>Preencha todos os campos corretamente antes de cadastrar</strong>'
//     msgSuccess.innerHTML = ''
//     msgSuccess.setAttribute('style', 'display: none')
//   }
// }

btn.addEventListener('click', ()=>{
  let inputSenha = document.querySelector('#senha')
  
  if(inputSenha.getAttribute('type') == 'password'){
    inputSenha.setAttribute('type', 'text')
  } else {
    inputSenha.setAttribute('type', 'password')
  }
})

// btnConfirm.addEventListener('click', ()=>{
//   let inputConfirmSenha = document.querySelector('#confirmSenha')
  
//   if(inputConfirmSenha.getAttribute('type') == 'password'){
//     inputConfirmSenha.setAttribute('type', 'text')
//   } else {
//     inputConfirmSenha.setAttribute('type', 'password')
//   }
// })