const editRechargeIcon = document.querySelector('.edit-recharge-icon')
const rechargeAccountBox = document.querySelector('.recharge-account-box')
const rechargeAccountBoxDivs = document.querySelectorAll('.recharge-account-box > div')
const rechargeAmount = document.querySelector('#recharge-amount')
const rechargeAccount = document.querySelector('#recharge-account')
const rechargeAddress = document.querySelector('#recharge-address')
const rechargeBtn = document.querySelector('#recharge-btn')
const mkPhoneIcon = document.querySelector('#mk-phone')
const pndPhoneIcon = document.querySelector('#pnd-phone')
const rechargeConfirmPageCloseIcon = document.querySelector('#recharge-confirm-page-close-icon')
const rechargeConfirmPage = document.querySelector('#recharge-confirm-page')
const rechargeConfirmAccount = document.querySelector('.recharge-confirm-account')
const rechargeConfirmAmount = document.querySelector('.recharge-confirm-amount')
const rechargeConfirmAddress = document.querySelector('.recharge-confirm-address')
const rechargeConfirmBtn = document.querySelector('#recharge-confirm-btn')
const inputs = document.querySelectorAll('.input-group > input')
let rechargeConfirmDigitsCode = ''
let isClickedEditRechargeIcon = false
let rechargeAmountCheck = false
let rechargeAddressCheck = false
let rechargeConfirmDigitsCodeCheck = false
let sixDigit = false
let voucherUpload = false
var r_account = ''
var r_amount = ''
var r_address = ''
var r_digits = ''

const rechargeConfirmPageHide = () => {
  rechargeConfirmPage.classList.add('hide')
}

const rechargeConfirmPageShow = () => {
  rechargeConfirmPage.classList.remove('hide')
}

const checkDigit = () => {
  rechargeConfirmDigitsCode = ''
  sixDigit = false
  inputs.forEach(input => {
    rechargeConfirmDigitsCode += input.value
    if (rechargeConfirmDigitsCode.length == 6) {
      rechargeConfirmDigitsCodeCheck = true
      somethingWrongAlertHide()
      r_digits = rechargeConfirmDigitsCode
    } else {
        somethingWrongAlertShow('Invalid digits code number')
    }
    if (rechargeConfirmDigitsCodeCheck == true) {
      sixDigit = true
      rechargeConfirmDigitsCodeCheck = false
    }
  })
}

const checkVoucher = () => {
  if ($('#transaction-voucher-upload-file').val() != '') {
    voucherUpload = true
  } else {
    voucherUpload = false
    somethingWrongAlertShow('Please upload your transaction voucher')
  }
}

editRechargeIcon.addEventListener('click', () => {
  if (isClickedEditRechargeIcon == false) {
    editRechargeIcon.style.transform = 'rotate(90deg)'
    rechargeAccountBox.style.height = '165px'
    isClickedEditRechargeIcon = true
  } else {
    editRechargeIcon.style.transform = 'rotate(0deg)'
    rechargeAccountBox.style.height = '60px'
    isClickedEditRechargeIcon = false
  }
})
rechargeAccountBoxDivs.forEach(rechargeAccountBoxDiv => {
  rechargeAccountBoxDiv.addEventListener('click', e => {
    rechargeAccount.textContent = e.target.textContent
  })
})
rechargeAmount.addEventListener('keyup',() => {
  rechargeAmount.classList.remove('invalid')
})
rechargeAddress.addEventListener('keyup',() => {
  rechargeAddress.classList.remove('invalid')
})
rechargeBtn.addEventListener('click', () => {
  if (rechargeAmount.value == '') {
    rechargeAmount.classList.add('invalid')
    somethingWrongAlertShow('Invalid recharge amount')
  } else if (rechargeAmount.value > 500000) {
    rechargeAmount.classList.add('invalid')
    somethingWrongAlertShow('Maximum recharge amount is 500000 MMK')
  } else if (rechargeAmount.value < 40000) {
    rechargeAmount.classList.add('invalid')
    somethingWrongAlertShow('Minium recharge amount is 40000 MMK')
  } else {
    rechargeAmountCheck = true
    rechargeAmount.classList.remove('invalid')
  }
  if (rechargeAddress.value == '') {
    rechargeAddress.classList.add('invalid')
    somethingWrongAlertShow('Invalid recharge address')
  } else if (rechargeAddress.value.length > 11) {
    rechargeAddress.classList.add('invalid')
    somethingWrongAlertShow('Your number is over 11')
  } else if (rechargeAddress.value.length < 11) {
    rechargeAddress.classList.add('invalid')
    somethingWrongAlertShow('Your number is less than 11')
  } else {
    rechargeAddressCheck = true
    rechargeAddress.classList.remove('invalid')
  }
  if (rechargeAmountCheck == true && rechargeAddressCheck == true) {
    rechargeConfirmAccount.value = rechargeAccount.textContent
    rechargeConfirmAmount.value = rechargeAmount.value + mmk
    r_amount = rechargeAmount.value
    rechargeConfirmAddress.value = rechargeAddress.value
    rechargeAmount.value = ''
    rechargeAddress.value = ''
    rechargeAmountCheck = false
    rechargeAddressCheck = false
    rechargeConfirmPageShow()
  }
})
mkPhoneIcon.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('09757820869')
})
pndPhoneIcon.addEventListener('click', () => {
  topAlertShow('Copy to clipboard')
  navigator.clipboard.writeText('09441507148')
})
rechargeConfirmPageCloseIcon.addEventListener('touchstart', () => {
  rechargeConfirmPageHide()
})


$('#transaction-voucher-demo').click(() => {
  $('#transaction-voucher-upload-file').click()
})

$('#transaction-voucher-upload-file').change( function () {
  if (this.files[0]) {
    var reader = new FileReader()
    reader.onload = function (e) {
      var url = e.target.result
      $('#transaction-voucher-demo').html(`<img src='${url}'>`)
    }
    reader.readAsDataURL(this.files[0])
  }
})

$('#recharge-confirm-btn').click(() => {
  checkDigit()
  checkVoucher()
  if (sixDigit && voucherUpload) {
    var voucher = $('#transaction-voucher-upload-file').prop('files')[0]
    if (voucher.type == 'image/png' || voucher.type == 'image/jpg' || voucher.type == 'image/jpeg') {
      if (voucher.size <= 1000000) {
        r_account = rechargeConfirmAccount.value
        r_address = rechargeConfirmAddress.value
        $('#r_account').val(r_account)
        $('#r_amount').val(r_amount)
        $('#r_address').val(r_address)
        $('#r_digits').val(r_digits)
        const form = document.getElementById('r_form')
        const formData = new FormData(form)
        $.ajax ({
          url: '../php/recharge.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (r) {
            if (r == 'ok') {
              topAlertShow('Successfully.')
              rechargeConfirmPageHide()
              inputs.forEach(input => {
                input.value = ''
              })
              $('#transaction-voucher-upload-file').val('')
              $('#transaction-voucher-demo').html(`<i class="fa-solid fa-upload"></i>`)
            }
            }
        })
        
      } else {
        somethingWrongAlertShow('File size not allow')
        $('#transaction-voucher-upload-file').val('')
        $('#transaction-voucher-demo').html(`<i class="fa-solid fa-upload"></i>`)
      }
    } else {
      somethingWrongAlertShow('File type not allow')
      $('#transaction-voucher-upload-file').val('')
      $('#transaction-voucher-demo').html(`<i class="fa-solid fa-upload"></i>`)
    }
  }
})

