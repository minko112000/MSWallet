const eye = document.getElementsByClassName('fa-eye')
const input = document.getElementsByTagName('input')
const errPass = document.getElementsByClassName('err-pass')[0]

let oldPassSee = false
let newPassSee = false
let confirmPassSee = false

eye[0].addEventListener('click', () => {
  if (oldPassSee == false) {
    input[0].type = 'text'
    eye[0].classList.add('eye-close')
    oldPassSee = true
  } else {
    input[0].type = 'password'
    eye[0].classList.remove('eye-close')
    oldPassSee = false
  }
})
eye[1].addEventListener('click', () => {
  if (newPassSee == false) {
    input[1].type = 'text'
    eye[1].classList.add('eye-close')
    newPassSee = true
  } else {
    input[1].type = 'password'
    eye[1].classList.remove('eye-close')
    newPassSee = false
  }
})
eye[2].addEventListener('click', () => {
  if (confirmPassSee == false) {
    input[2].type = 'text'
    eye[2].classList.add('eye-close')
    confirmPassSee = true
  } else {
    input[2].type = 'password'
    eye[2].classList.remove('eye-close')
    confirmPassSee = false
  }
})


setTimeout(() => {
  errPass.style.transform = 'translateY(-100%)'
}, 3500)