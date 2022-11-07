const label = document.getElementsByTagName('label')
const input = document.getElementsByTagName('input')
const signupEye = document.querySelector('.fa-eye')
const signupBtn = document.querySelector('#signup-btn')

window.addEventListener('load', () => {
  for (let i = 0; i < 6; i ++ ) {
      if (input[i].value != '') {
      label[i].style.transform = 'translate(12px, -28px)'
      label[i].style.zIndex = 1
      } else {
      label[i].style.zIndex = -1
      label[i].style.transform = 'translate(0px, 0px)'
      }
  }
})

for (let i = 0; i < 5; i ++ ) {
    input[i].addEventListener('keyup', () => {
      label[i].style.transform = 'translate(8px, -28px)'
      label[i].style.zIndex = 1
      if (input[i].value == '') {
      label[i].style.zIndex = -1
      label[i].style.transform = 'translate(0px, 0px)'
      }
    })
  }

signupEye.addEventListener('click', () => {
  if (!signupEye.classList.contains('eye-close')) {
    signupEye.classList.add('eye-close')
    input[3].type = 'text'
  } else {
    input[3].type = 'password'
    signupEye.classList.remove('eye-close')
  }
})
