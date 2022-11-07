const myBalance = document.querySelector('#my-balance')
const balanceView = document.querySelector('.balance-view')
const moreItems = document.querySelectorAll('.more-item')
const profileInformationPage = document.querySelector('#profile-information-page')
const referralPage = document.querySelector('#referral-page')
const rewardPage = document.querySelector('#reward-page')
const teamPage = document.querySelector('#team-page')
const bonusPage = document.querySelector('#bonus-page')
const rechargePage = document.querySelector('#recharge-page')
const withdrawalPage = document.querySelector('#withdrawal-page')
const rechargeRecordPage = document.querySelector('#recharge-record-page')
const withdrawalRecordPage = document.querySelector('#withdrawal-record-page')
const settingPage = document.querySelector('#setting-page')
const ourCompanyPage = document.querySelector('#our-company-page')
const backIcons = document.querySelectorAll('.back')
const moreDivPages = document.querySelectorAll('.more-div-pages')
const logOutAlert = document.querySelector('.log-out-alert')
const yesLogout = document.querySelector('#yes-logout')
const noLogout = document.querySelector('#no-logout')

const logOutAlertShow = () => {
  logOutAlert.classList.remove('hide')
}

const logOutAlertHide = () => {
  logOutAlert.classList.add('hide')
}

noLogout.addEventListener('click', () => {
  logOutAlertHide()
})

const profilePageShow = () => {
  profileInformationPage.style.transform = 'scale(1)'
}

const myBalanceShow = () => {
  balanceView.classList.remove('slash')
  myBalance.textContent = '***' + mmk
}
const myBalanceHide = () => {
  if (!balanceView.classList.contains('slash')) {
    balanceView.classList.add('slash')
    myBalance.textContent = balance + mmk
  } else {
    balanceView.classList.remove('slash')
    myBalance.textContent = '***' + mmk
  }
}
const bonusPageShow = () => {
  bonusPage.style.transform = 'scale(1)'
}
const rechargePageShow = () => {
  rechargePage.style.transform = 'scale(1)'
}
const withdrawalPageShow = () => {
  withdrawalPage.style.transform = 'scale(1)'
}
const referralPageShow = () => {
  referralPage.style.transform = 'scale(1)'
}
const rewardPageShow = () => {
  rewardPage.style.transform = 'scale(1)'
}
const teamPageShow = () => {
  teamPage.style.transform = 'scale(1)'
}
const ourCompanyPageShow = () => {
  ourCompanyPage.style.transform = 'scale(1)'
}
const moreDivPagesHide = () => {
  moreDivPages.forEach(moreDivPage => {
  moreDivPage.style.transform = 'scale(0)'
    })
}


window.addEventListener('load', () => {
  myBalanceShow()
})
balanceView.addEventListener('click', () => {
  myBalanceHide()
})
balanceView.addEventListener('mouseleave', () => {
  myBalanceShow()
})
moreItems.forEach(moreItem => {
  moreItem.addEventListener('click', event => {
    let itemContentResult = event.target.textContent.replace(/\s/g, '')
    if (itemContentResult == 'Profile') {
      profilePageShow()
    }
    if (itemContentResult == 'Referral') {
      referralPageShow()
    }
    if (itemContentResult == 'Reward') {
      rewardPageShow()
    }
    if (itemContentResult == 'Team') {
      teamPageShow()
    }
    if (itemContentResult == 'Bonus') {
      bonusPage.style.transform = 'scale(1)'
      bonusImgShow()
    }
    if (itemContentResult == 'Mining') {
      miningPageShow()
    }
    if (itemContentResult == 'Recharge') {
      rechargePageShow()
    }
    if (itemContentResult == 'Withdrawal') {
      withdrawalPageShow()
    }
    if (itemContentResult == 'RechargeRecord') {
      rechargeRecordPage.style.transform = 'scale(1)'
    }
    if (itemContentResult == 'WithdrawalRecord') {
      withdrawalRecordPage.style.transform = 'scale(1)'
    }
    if (itemContentResult == 'Setting') {
      settingPage.style.transform = 'scale(1)'
    }
    if (itemContentResult == 'LogOut') {
      logOutAlertShow()
    }
  })
})
backIcons.forEach(backIcon => {
  backIcon.addEventListener('click', () => {
    bonusImgHide()
    moreDivPagesHide()
  })
})