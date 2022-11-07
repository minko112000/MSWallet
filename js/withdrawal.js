const withdrawalAmount = document.querySelector('#withdrawal-amount')
const withdrawalFee = document.querySelector('#fee')
const moreWithdrawalAccount = document.querySelector('.more-withdrawal-account')
const withdrawalAccountBox = document.querySelector('.withdrawal-account-box')
const withdrawalAccounts = document.querySelectorAll('.withdrawal-account-box > div')
const myWithdrawalAccount = document.querySelector('.my-withdrawal-account')
const withdrawalAddress = document.querySelector('#withdrawal-address')
const withdrawalBtn = document.querySelector('#withdrawal-btn')

let isClickedMorewithdrawal = false
let withdrawalAmountCheck = false
let withdrawalAddressCheck = false

withdrawalAddress.addEventListener('keyup', () => {
  withdrawalAddress.classList.remove('invalid')
})
withdrawalAmount.addEventListener('keyup', () => {
  withdrawalAmount.classList.remove('invalid')
  withdrawalFee.textContent = withdrawalAmount.value * 0.025
  if (withdrawalAmount.value == '') {
    withdrawalFee.textContent = '0.00'
  }
})
moreWithdrawalAccount.addEventListener('click', () => {
  if (isClickedMorewithdrawal == false) {
    moreWithdrawalAccount.style.transform = 'rotate(90deg)'
    withdrawalAccountBox.style.height = '165px'
    isClickedMorewithdrawal = true
  } else {
    moreWithdrawalAccount.style.transform = 'rotate(0deg)'
    isClickedMorewithdrawal = false
    withdrawalAccountBox.style.height = '60px'
  }
})
withdrawalAccounts.forEach(withdrawalAccount => {
  withdrawalAccount.addEventListener('click', e => {
    myWithdrawalAccount.textContent = e.target.textContent
  })
})
withdrawalBtn.addEventListener('click', () => {
  if (withdrawalAmount.value == '') {
    somethingWrongAlertShow("Invalid withdrawal amount")
    withdrawalAmount.classList.add('invalid')
  } else if (withdrawalAmount.value > balance) {
    somethingWrongAlertShow("You don't have that much money")
    withdrawalAmount.classList.add('invalid')
  } else if (withdrawalAmount.value < 50000) {
    somethingWrongAlertShow("Minium withdrawal amount is 50000 MMK")
    withdrawalAmount.classList.add('invalid')
  } else if (withdrawalAmount.value > 150000) {
    somethingWrongAlertShow("Maximum withdrawal amount is 150000 MMK")
    withdrawalAmount.classList.add('invalid')
  }
  else {
    withdrawalAmountCheck = true
    withdrawalAmount.classList.remove('invalid')
  }
  if (withdrawalAddress.value == '') {
    somethingWrongAlertShow('Invalid phone number')
    withdrawalAddress.classList.add('invalid')
  } else if (withdrawalAddress.value.length > 11) {
    somethingWrongAlertShow('Your number is over 11')
    withdrawalAddress.classList.add('invalid')
  } else if (withdrawalAddress.value.length < 11) {
    somethingWrongAlertShow('Your number is less than 11')
    withdrawalAddress.classList.add('invalid')
  }
  else {
    withdrawalAddressCheck = true
    withdrawalAddress.classList.remove('invalid')
  }
  if (withdrawalAmountCheck == true && withdrawalAddressCheck == true) {
    $('#w_account').val(myWithdrawalAccount.textContent)
    $('#w_amount').val(withdrawalAmount.value)
    $('#w_fee').val(fee.textContent)
    $('#w_address').val(withdrawalAddress.value)
    const form = document.getElementById('w_form')
    const formData = new FormData(form)
    
    $.ajax({
      url: '../php/withdrawal.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (r) {
        if (r == 'ok') {
          withdrawalAmount.value = ''
          withdrawalAddress.value = ''
          fee.textContent = 0.00
          withdrawalAmountCheck = false
          withdrawalAddressCheck = false
          topAlertShow('Successfully.')
        }
      }
    })
    
  }
})