const loginBtn = document.querySelector('#login-btn')
const loginUsername = document.querySelector('#username')
const loginPassword = document.querySelector('#password')
const loginEye = document.querySelector('.fa-eye')
const err_login_hide = document.querySelector('.err_login_hide')

loginEye.addEventListener('click', () => {
  if (!loginEye.classList.contains('eye-close')) {
    loginEye.classList.add('eye-close')
    loginPassword.type = 'text'
  } else {
    loginPassword.type = 'password'
    loginEye.classList.remove('eye-close')
  }
})

setTimeout(function() {
  err_login_hide.classList.remove('err_login_hide')
}, 4000);