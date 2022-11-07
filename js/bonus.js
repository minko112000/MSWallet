const bonusImg = document.querySelector('.bonus-img')
const luckyWheelBoxs = document.querySelectorAll('.lucky-wheel-box')
const luckyWheelPage = document.querySelector('#lucky-wheel-page')
const referralBonusBox = document.querySelector('.referral-bonus-box')
const dailyBounsBox = document.querySelector('.daily-bonus-box')
const dailyBounsPage = document.querySelector('#daily-bonus-page')
const bonusBacks = document.querySelectorAll('.bonus-back')



const bonusImgShow = () => {
  bonusImg.classList.remove('hide')
}
const bonusImgHide = () => {
  bonusImg.classList.add('hide')
}

const dailyBounsPageShow = () => {
  dailyBounsPage.style.transform = 'scale(1)'
}

luckyWheelBoxs.forEach(luckyWheelBox => {
  luckyWheelBox.addEventListener('click', () => {
    luckyWheelPage.style.transform = 'scale(1)'
    bonusImgHide()
  })
})

referralBonusBox.addEventListener('click', () => {
  moreDivPagesHide()
  referralPageShow()
  bonusImgHide()
})

dailyBounsBox.addEventListener('click', () => {
  dailyBounsPageShow()
  bonusRoleShow()
  bonusImgHide()
})

bonusBacks.forEach(bonusBack => {
  bonusBack.addEventListener('click', () => {
    bonusPageShow()
    bonusImgShow()
    bonusRoleHide()
    spinClaimAlertHide()
  })
})