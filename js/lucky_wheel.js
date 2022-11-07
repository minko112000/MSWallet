let spinGetMmk = document.querySelector('.spin-get-mmk')
const spinBtn = document.querySelector('#spin-btn')
const spanCount = document.querySelector('.span-count')
const luckyWheelCircle = document.querySelector('.lucky-wheel-circle')
const spinClaimAlert = document.querySelector('.spin-claim-alert')
const spinClaimBtn = document.querySelector('#spin-claim-btn')
const spinCountErrAlert = document.querySelector('.spin-count-err-alert')
const spinCountBuyCancelBtn = document.querySelector('.spin-count-buy-cancel-btn')
const buySpinCountBtn = document.querySelector('.buy-spin-count-btn')
const spinCountDecreaseBtn = document.querySelector('#spin-count-decrease-btn')
const spinCountIncreaseBtn = document.querySelector('#spin-count-increase-btn')
const spinCountQuantity = document.querySelector('#spin-count-quantity')
const spinCountBalanceAmount = document.querySelector('#spin-count-balance-amount')
const spinCountBuynowBtn = document.querySelector('#spin-count-buynow-btn')
const buySpinCountPageHideBtn = document.querySelector('#buy-spin-count-page-hide-btn')
const buySpinCountPage = document.querySelector('.buy-spin-count-page')


let spQuantity = 1
let spBalanceAmount = 450

const buySpinCountPageShow = () => {
  buySpinCountPage.style.transform = 'translateY(0)'
}

const buySpinCountPageHide = () => {
  buySpinCountPage.style.transform = 'translateY(100%)'
}



let spinBalance = 0
setInterval(() => {
  spanCount.textContent = spin_count
}, 100)

const increaseSpinBalance = () => {
  balance += spinBalance
  var spinBalanceAJAX = new XMLHttpRequest()
  spinBalanceAJAX.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200) {
      spanCount.textContent = spin_count
    }
  }
  spinBalanceAJAX.open("GET", "../php/spin_count.php?spinBalance="+balance, true)
  spinBalanceAJAX.send()
}

const wheelRotationStart = () => {
  spin_count -= 1
  var spcAJAX = new XMLHttpRequest()
  spcAJAX.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200) {
      spanCount.textContent = spin_count
    }
  }
  spcAJAX.open("GET", "../php/spin_count.php?spin_count="+spin_count, true)
  spcAJAX.send()
  luckyWheelCircle.style.transform = `rotate(0deg)`
  let r = Math.floor(5000 + Math.random() * 5000)
  luckyWheelCircle.style.transform = `rotate(${r}deg)`
  luckyWheelCircle.addEventListener('transitionend', () => {
    let sr = r % 360
    sp100 = false
    sp300 = false
    sp500 = false
    sp900 = false
    if (sr >= 340 && sr <= 360 || sr >= 0 && sr <= 21) {
      spinGetMmk.textContent = '100' + mmk
      spinBalance = 100
      sp100 = true
    }
    if (sr >= 70 && sr <= 111) {
      spinGetMmk.textContent = '900' + mmk
      
      spinBalance = 900
      sp900 = true
    }
    if (sr >= 160.5 && sr <= 201) {
      spinGetMmk.textContent = '500' + mmk
      
      spinBalance = 500
      sp500 = true
    }
    if (sr >= 250.5 && sr <= 291) {
      spinGetMmk.textContent = '300' + mmk
      
      spinBalance = 300
      sp300 = true
    }
    if (sp100 == false && sp300 == false && sp500 == false && sp900 == false) {
      spinGetMmk.textContent = '0' + mmk
      spinBalance = 0
      
    }
  })
}
const spinClaimAlertShow = () => {
  spinClaimAlert.classList.remove('hide')
}
const spinClaimAlertHide = () => {
  spinClaimAlert.classList.add('hide')
}
const spinCountErrAlertShow = () => {
  spinCountErrAlert.classList.remove('hide')
}
const spinCountErrAlertHide = () => {
  spinCountErrAlert.classList.add('hide')
}


spinBtn.addEventListener('click', () => {
  spinBtn.style.pointerEvents = 'none'
  if (spin_count > 0) {
    wheelRotationStart()
    setTimeout(function() {
    spinClaimAlertShow()
    spinBtn.style.pointerEvents = 'auto'
    }, 
    4000);
  } else {
    spinCountErrAlertShow()
    spinBtn.style.pointerEvents = 'auto'
  }
})

spinClaimBtn.addEventListener('click', () => {
  spinClaimAlertHide()
  increaseSpinBalance()
})

spinCountBuyCancelBtn.addEventListener('click', () => {
  spinCountErrAlertHide()
})

buySpinCountBtn.addEventListener('click', () => {
  buySpinCountPageShow()
  spinCountErrAlertHide()
})

spinCountDecreaseBtn.addEventListener('click', () => {
  if (spQuantity > 0) {
    spQuantity -= 1
    spinCountQuantity.textContent = spQuantity
    spBalanceAmount = spQuantity * 450
    spinCountBalanceAmount.textContent = spBalanceAmount + mmk
  }
})

spinCountIncreaseBtn.addEventListener('click', () => {
  spQuantity += 1
  spinCountQuantity.textContent = spQuantity
  spBalanceAmount = spQuantity * 450
  spinCountBalanceAmount.textContent = spBalanceAmount + mmk
})

spinCountBuynowBtn.addEventListener('click', () => {
  if (balance >= spBalanceAmount) {
    let updateSPQuantity = parseInt(spin_count, 10) + spQuantity
    let buySPQuantityUpdateBalance = balance - spBalanceAmount
    var spinCountBuyAJAX = new XMLHttpRequest()
    spinCountBuyAJAX.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200) {
        spanCount.textContent = spin_count
        spQuantity = 1
        spinCountQuantity.textContent = spQuantity
        spBalanceAmount = 450
        spinCountBalanceAmount.textContent = spBalanceAmount + mmk
        topAlertShow('Successfully')
      }
    }
    spinCountBuyAJAX.open("GET", `../php/spin_count.php?spin_count_buy_balance=${buySPQuantityUpdateBalance}&spin_count_buy=${updateSPQuantity}`, true)
    spinCountBuyAJAX.send()
  } else {
    topAlertShow('Your balance is very low')
  }
})

buySpinCountPageHideBtn.addEventListener('touchstart', () => {
  buySpinCountPageHide()
})
