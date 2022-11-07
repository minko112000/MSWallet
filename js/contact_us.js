const mail1 = document.querySelector('#mail1')
const mail2 = document.querySelector('#mail2')
const mail3 = document.querySelector('#mail3')
const topAlert = document.querySelector('.top-alert')
const phone1 = document.querySelector('#phone1')
const phone2 = document.querySelector('#phone2')
const phone3 = document.querySelector('#phone3')


const topAlertShow = text => {
  topAlert.textContent = text
  topAlert.style.transform = 'translateY(0)'
  setTimeout(() => {
  topAlert.style.transform = 'translateY(-110%)'
  }, 5000);
}

mail1.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('mswallet.mm@gmail.com')
})

mail2.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('minkoko.r@gmail.com')
})

mail3.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('phonenanda17@gmail.com')
})


phone1.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('+959777153267')
})

phone2.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('+959984772816')
})

phone3.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('+66615845878')
})
