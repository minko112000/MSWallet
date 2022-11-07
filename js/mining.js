const joinNowBtns = document.querySelectorAll('.join-now-btn')
const pointed = document.querySelector('.pointed')
const startMiningBtn = document.querySelector('#start-mining-btn')
const claimMiningBtn = document.querySelector('#claim-mining-btn')
const outputBox = document.querySelector('.output-box')
const RUNNINGDAY = document.querySelector('.running-day')
const DAILYOUTPUT = document.querySelector('.daily-output')
const miningLockPage = document.querySelector('.mining-lock-page')
const silverBrand = document.querySelector('#silver-brand')
const platinumBrand = document.querySelector('#platinum-brand')
const goldBrand = document.querySelector('#gold-brand')
const diamondBrand = document.querySelector('#diamond-brand')
const vipBrand = document.querySelector('#vip-brand')

let runningDay = 0
let dailyOutput = 0
outputBox.textContent = 0 + mmk


const miningLockPageHide = () => {
  miningLockPage.style.display = 'none'
}
const miningLockPageShow = () => {
  miningLockPage.style.display = 'flex'
}


const mining = (duration, increase, output, ms) => {
  outputBox.textContent = 0 + mmk
  outputText = parseInt(outputBox.textContent, 10)
  claimMiningBtn.style.opacity = .4
  claimMiningBtn.style.display = 'block'
  startMiningBtn.style.display = 'none'
  pointed.style.animationDuration = duration
  const intervalId = setInterval(() => {
    outputText += increase
    outputBox.textContent = outputText + mmk
    if (outputText >= output.slice(0, -4)) {
      clearInterval(intervalId)
      claimMiningBtn.style.opacity = 1
      pointed.style.animationDuration = ''
    }
  },ms);
}

joinNowBtns.forEach(joinNowBtn => {
  joinNowBtn.addEventListener('click', () => {
    homePageShow()
  })
})


startMiningBtn.addEventListener('click', () => {
  localStorage.setItem('miningBtn', 'clicked')
  switch (type) {
    case 'silver':
      mining('5s', 1, '1100 MMK', 78545.454545454)
      break;
    case 'platinum':
      mining('4s', 2, '1240 MMK', 34838.709677419)
      break;
    case 'gold':
      mining('3s', 3, '2450 MMK', 11755.102040816)
      break;
    case 'diamond':
      mining('2s', 4, '3800 MMK', 5684.2105263157)
      break;
    case 'vip':
      mining('1s', 5, '8200 MMK', 2107.3170731707)
      break;
  }
})

claimMiningBtn.addEventListener('click', () => {
  if (claimMiningBtn.style.opacity == 1) {
    outputBox.textContent = 0 + mmk
    claimMiningBtn.style.display = 'none'
    startMiningBtn.style.display = 'block'
  }
})

setInterval(() => {
  
  const silverBrandShow = () => {
    silverBrand.style.display = 'block'
    platinumBrand.style.display = 'none'
    goldBrand.style.display = 'none'
    diamondBrand.style.display = 'none'
    vipBrand.style.display = 'none'
  }
  const platinumBrandShow = () => {
    silverBrand.style.display = 'none'
    platinumBrand.style.display = 'block'
    goldBrand.style.display = 'none'
    diamondBrand.style.display = 'none'
    vipBrand.style.display = 'none'
  }
  const goldBrandShow = () => {
    silverBrand.style.display = 'none'
    platinumBrand.style.display = 'none'
    goldBrand.style.display = 'block'
    diamondBrand.style.display = 'none'
    vipBrand.style.display = 'none'
  }
  const diamondBrandShow = () => {
    silverBrand.style.display = 'none'
    platinumBrand.style.display = 'none'
    goldBrand.style.display = 'none'
    diamondBrand.style.display = 'block'
    vipBrand.style.display = 'none'
  }
  const vipBrandShow = () => {
    silverBrand.style.display = 'none'
    platinumBrand.style.display = 'none'
    goldBrand.style.display = 'none'
    diamondBrand.style.display = 'none'
    vipBrand.style.display = 'block'
  }
  
  if (type != 'none') {
    miningLockPageHide()
  } else {
    miningLockPageShow()
    silverBrand.style.display = 'none'
    platinumBrand.style.display = 'none'
    goldBrand.style.display = 'none'
    diamondBrand.style.display = 'none'
    vipBrand.style.display = 'none'
  }
  
  if (type == 'silver') {
    silverBrandShow()
    runningDay = 200
    dailyOutput = 1100
    RUNNINGDAY.textContent = currentDay + '/' + runningDay + ' days'
    DAILYOUTPUT.textContent = outputBox.textContent.slice(0, -4) + '/' + dailyOutput + mmk
  }
  
  if (type == 'platinum') {
    platinumBrandShow()
    runningDay = 250
    dailyOutput = 1240
    RUNNINGDAY.textContent = currentDay + '/' + runningDay + ' days'
    DAILYOUTPUT.textContent = outputBox.textContent.slice(0, -4) + '/' + dailyOutput + mmk
  }
  
  if (type == 'gold') {
    goldBrandShow()
    runningDay = 720
    dailyOutput = 2450
    RUNNINGDAY.textContent = currentDay + '/' + runningDay + ' days'
    DAILYOUTPUT.textContent = outputBox.textContent.slice(0, -4) + '/' + dailyOutput + mmk
  }
  
  if (type == 'diamond') {
    diamondBrandShow()
    runningDay = 870
    dailyOutput = 3800
    RUNNINGDAY.textContent = currentDay + '/' + runningDay + ' days'
    DAILYOUTPUT.textContent = outputBox.textContent.slice(0, -4) + '/' + dailyOutput + mmk
  }
  
  if (type == 'vip') {
    vipBrandShow()
    runningDay = 1080
    dailyOutput = 8200
    RUNNINGDAY.textContent = currentDay + '/' + runningDay + ' days'
    DAILYOUTPUT.textContent = outputBox.textContent.slice(0, -4) + '/' + dailyOutput + mmk
  }
  
},500)

const changeTypeNone = () => {
  var silverChange = new XMLHttpRequest();
  silverChange.open("GET", "../php/update_type.php?type=none", true);
  silverChange.send();
}

setInterval(() => {
  if (type != 'none') {
    currentDay += 1
    var addCurrentDayAJAX = new XMLHttpRequest();
    addCurrentDayAJAX.open("GET", "../php/update_type.php?currentDay="+currentDay, true);
    addCurrentDayAJAX.send();
    
    if (type == 'silver' && currentDay >= 200) {
        changeTypeNone()
      }
    if (type == 'platinum' && currentDay >= 250) {
        changeTypeNone()
      }
    if (type == 'gold' && currentDay >= 720) {
        changeTypeNone()
      }
    if (type == 'diamond' && currentDay >= 870) {
        changeTypeNone()
      }
    if (type == 'vip' && currentDay >= 1080) {
        changeTypeNone()
      }
  }
}, 86400000)
