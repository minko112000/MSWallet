const bonusHours = document.querySelector('.bonus-h')
const bonusMinutes = document.querySelector('.bonus-m')
const bonusSeconds = document.querySelector('.bonus-s')
const bonusPoint = document.querySelector('.p-box')
const bls = document.querySelectorAll('.bl')
const bonusRoleContainer = document.querySelector('.bonus-role-container')
const dailyBonusClaimAlert = document.querySelector('.daily-bonus-claim-alert')
const dailyBonusDetailsBtn = document.querySelector('#daily-bonus-details-btn')
const dailyBonusClaimBtn = document.querySelector('#daily-bonus-claim-btn')
const dailyBonusClaimBalance = document.querySelector('.daily-bonus-claim-balance')


let dailyBonusBalance = 0

const dailyBonusClaimAlertShow = () => {
  dailyBonusClaimAlert.classList.remove('hide')
}

const dailyBonusClaimAlertHide = () => {
  dailyBonusClaimAlert.classList.add('hide')
}

const bonusRoleShow = () => {
  bonusRoleContainer.classList.add('brole')
}

const bonusRoleHide = () => {
  bonusRoleContainer.classList.remove('brole')
}

const bonusClaimAlertShow = () => {
  dailyBonusClaimAlertShow()
}

let bH = 24
let bM = 60
let bS = 60
let bP = 1000

const intervalID = setInterval(() => {
  bonusHours.textContent = bH
  bonusMinutes.textContent = bM
  bonusSeconds.textContent = bS
  bP -= 100
  bonusPoint.textContent = bP
  if(bP == 0) {
    bP = 1000
    bS -= 1
    if (bS == 0) {
      bS = 60
      bM -= 1
      if (bM == 0) {
        bM = 60
        bH -= 1
        if (bH == '00') {
          bH = 24
          bonusClaimAlertShow()
        }
      }
    }
  }
  bls.forEach(bl => {
    if (bl.textContent.length == 1) {
      blText = bl.textContent
      bl.textContent = '0' + blText
    }
  })
},100)

setInterval(() => {
  switch (type) {
    case 'silver':
      dailyBonusBalance = 20
      dailyBonusClaimBalance.textContent = dailyBonusBalance + mmk
      break;
    case 'platinum':
      dailyBonusBalance = 45
      dailyBonusClaimBalance.textContent = dailyBonusBalance + mmk
      break;
    case 'gold':
      dailyBonusBalance = 70
      dailyBonusClaimBalance.textContent = dailyBonusBalance + mmk
      break;
    case 'diamond':
      dailyBonusBalance = 100
      dailyBonusClaimBalance.textContent = dailyBonusBalance + mmk
      break;
    case 'vip':
      dailyBonusBalance = 200
      dailyBonusClaimBalance.textContent = dailyBonusBalance + mmk
      break;
  }
}, 200)


dailyBonusClaimBtn.addEventListener('click', () => {
  let spinBalance = balance + dailyBonusBalance
  var dailyBalanceAJAX = new XMLHttpRequest()
  dailyBalanceAJAX.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200) {
      topAlertShow('Successfully')
      dailyBonusClaimAlertHide()
    }
  }
  dailyBalanceAJAX.open("GET", "../php/spin_count.php?spinBalance="+spinBalance, true)
  dailyBalanceAJAX.send()
})

dailyBonusDetailsBtn.addEventListener('click', () => {
  let spinBalance = balance + dailyBonusBalance
  var dailyBalanceAJAX = new XMLHttpRequest()
  dailyBalanceAJAX.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200) {
      topAlertShow('Successfully')
      dailyBounsPageShow()
      dailyBonusClaimAlertHide()
      bonusRoleShow()
    }
  }
  dailyBalanceAJAX.open("GET", "../php/spin_count.php?spinBalance="+spinBalance, true)
  dailyBalanceAJAX.send()
})