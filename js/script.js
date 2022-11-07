const REFERRALcODES = document.querySelectorAll('.referral-code')
const REFERRALlINKS = document.querySelectorAll('.referral-link')
const myBalances = document.querySelectorAll('.my-balance')
const types = document.querySelectorAll('.member-type')
const teamCounts = document.querySelectorAll('.team-count')
const totalRewards = document.querySelectorAll('.total-reward')

const somethingWrong = document.querySelector('.something-wrong')
const somethingWrongCloseBtn = document.querySelector('.something-wrong-close-btn')
const profileIcon = document.querySelector('#profile-icon')
const somethingWrongText = document.querySelector('#something-wrong-text')
const topAlert = document.querySelector('.top-alert')
const withdrawalBtns = document.querySelectorAll('.withdrawal-btn')
const introPage = document.querySelector('.intro-page')
const banner = document.querySelector('#banner')
const NAME = document.querySelector('.name')
const EMAIL = document.querySelector('.email')
const PHONE = document.querySelector('.phone')
const REGION = document.querySelector('.region')
const CITY = document.querySelector('.city')

let name = '';
let email = ''
let phone = ''
let referralCode = ''
let referralLink = ''
let type = ''
let currentDay;
let balance;
let team;
let reward;
let spin_count;
let region = ''
let city = ''

const mmk = ' MMK'
let people = ''
let username = ''


const responseData = () => {
  var AJAX = new XMLHttpRequest();
    AJAX.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let dataObject = JSON.parse(this.responseText);
       name = dataObject.name
       email = dataObject.email
       phone = dataObject.phone
       referralCode = dataObject.referral_code
       referralLink = `http://localhost:8000/php/signup.php?ref=${referralCode}`
       type = dataObject.type
       currentDay = parseInt(dataObject.current_day, 10)
       balance = parseInt(dataObject.balance, 10)
       team = dataObject.team
       people = (team <= 1) ? ' people' : ' peoples'
       reward = dataObject.reward
       spin_count = dataObject.spin_count
       region = dataObject.region
       city = dataObject.city
       NAME.textContent = name
       EMAIL.textContent = email
       PHONE.textContent = phone
       REGION.textContent = region
       CITY.textContent = city
       myBalances.forEach(myBalance => {
          myBalance.textContent = balance + mmk
      })
       types.forEach(TYPE => {
          TYPE.textContent = type
      })
       teamCounts.forEach(TEAMcOUNT => {
        TEAMcOUNT.textContent = team + people
      })
       totalRewards.forEach(TOTALrEWARD => {
          TOTALrEWARD.textContent = reward + mmk
      })
       REFERRALcODES.forEach(REFERRALcODE => {
          REFERRALcODE.textContent = referralCode
      })
       REFERRALlINKS.forEach(REFERRALlINK => {
          REFERRALlINK.textContent = referralLink
      })
      }
    };
    AJAX.open("GET", "../php/get_data.php", true);
    AJAX.send();
}

setInterval(() => {
  responseData()
},500)


const topAlertShow = text => {
  topAlert.textContent = text
  topAlert.style.transform = 'translateY(0)'
  setTimeout(() => {
  topAlert.style.transform = 'translateY(-110%)'
  }, 5000);
}
const somethingWrongAlertShow = (text) => {
  somethingWrong.classList.remove('hide')
  somethingWrongText.textContent = text
}
const somethingWrongAlertHide = () => {
  somethingWrong.classList.add('hide')
}


somethingWrongCloseBtn.addEventListener('click', () => {
  somethingWrongAlertHide()
})


withdrawalBtns.forEach(withdrawalBtn => {
withdrawalBtn.addEventListener('click', () => {
  moreDivPagesHide()
  withdrawalPageShow()
})
})

profileIcon.addEventListener('click', () => {
  profilePageShow()
})

