const updateBtns = document.getElementsByClassName('update-btn')
const updateAlertBox = document.querySelector('.update-alert-box')
const updateAlertBoxHideBtn = document.querySelector('.update-alert-box-hide')
const updateMemberType = document.querySelector('.update-member-type')
const detailBox = document.querySelector('.detail-box')
const rechargeBtns = document.querySelectorAll('.recharge-btn')
const updateNowBtn = document.querySelector('#update-now-btn')
const shortcutIcons = document.querySelectorAll('.shortcut-icon')
const bucket = document.querySelector('.bucket')

$('#chat-icon').click(function () {
  location.href = 'group_chat.php'
})

const updateAlertBoxShow = () => {
  mainContainer.style.opacity = .5
  updateAlertBox.style.transform = 'scale(1)'
}
const updateAlertBoxHide = () => {
  mainContainer.style.opacity = 1
  updateAlertBox.style.transform = 'scale(0)'
}

updateAlertBoxHideBtn.addEventListener('click', () => {
  updateAlertBoxHide()
})

setInterval(() => {
  if (type == 'silver') {
    runningDay = 1100
    updateBtns[0].textContent = 'Current'
    updateBtns[0].style.opacity = .6
  } else {
    updateBtns[0].textContent = 'Update'
    updateBtns[0].style.opacity = 1
  }
  
  if (type == 'platinum') {
    runningDay = 250
    updateBtns[1].textContent = 'Current'
    updateBtns[1].style.opacity = .6
  } else {
    updateBtns[1].textContent = 'Update'
    updateBtns[1].style.opacity = 1
  }
  
  if (type == 'gold') {
    runningDay = '2 years'
    updateBtns[2].textContent = 'Current'
    updateBtns[2].style.opacity = .6
  } else {
    updateBtns[2].textContent = 'Update'
    updateBtns[2].style.opacity = 1
  }
  
  if (type == 'diamond') {
    runningDay = '2 years 5 months'
    updateBtns[3].textContent = 'Current'
    updateBtns[3].style.opacity = .6
  } else {
    updateBtns[3].textContent = 'Update'
    updateBtns[3].style.opacity = 1
  }
  
  if (type == 'vip') {
    runningDay = '3 years'
    updateBtns[4].textContent = 'Current'
    updateBtns[4].style.opacity = .6
  } else {
    updateBtns[4].textContent = 'Update'
    updateBtns[4].style.opacity = 1
  }
},500)

updateBtns[0].addEventListener('click', () => {
  updateAlertBoxShow()
  updateMemberType.textContent = 'Silver Member'
  detailBox.innerHTML = `
  <small>1 Day Output - 1100 MMK</small>
  <small>Running Day - 200 days</small>
  <h5>72000 MMK</h5>
  `
})
updateBtns[1].addEventListener('click', () => {
  updateAlertBoxShow()
  updateMemberType.textContent = 'Platinum Member'
  detailBox.innerHTML = `
  <small>1 Day Output - 1240 MMK</small>
  <small>Running Day - 250 days</small>
  <h5>148000 MMK</h5>
  `
})
updateBtns[2].addEventListener('click', () => {
  updateAlertBoxShow()
  updateMemberType.textContent = 'Gold Member'
  detailBox.innerHTML = `
  <small>1 Day Output - 2450 MMK</small>
  <small>Running Day - 2 years</small>
  <h5>360000 MMK</h5>
  `
})
updateBtns[3].addEventListener('click', () => {
  updateAlertBoxShow()
  updateMemberType.textContent = 'Diamond Member'
  detailBox.innerHTML = `
  <small>1 Day Output - 3800 MMK</small>
  <small>Running Day - 2 years 5 months</small>
  <h5>532000 MMK</h5>
  `
})
updateBtns[4].addEventListener('click', () => {
  updateAlertBoxShow()
  updateMemberType.textContent = 'VIP Member'
  detailBox.innerHTML = `
  <small>1 Day Output - 8200 MMK</small>
  <small>Running Day - 3years</small>
  <h5>1184000 MMK</h5>
  `
})

updateNowBtn.addEventListener('click', () => {
  let updateBalance = 0
  if (updateMemberType.textContent == 'Silver Member') {
    if (type == 'silver') {
      alert("Current type is 'silver'")
      updateAlertBoxHide()
    } else {
      if (balance >= 72000) {
      loadingPageShow()
      updateAlertBoxHide()
      updateBalance = balance - 72000
      const silverAJAX = new XMLHttpRequest();
      silverAJAX.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          loadingPageHide()
          alert('Update Successfully ... ')
      }
    };
    silverAJAX.open("GET", "../php/update_type.php?type=silver&reward_balance=4000&balance="+updateBalance, true);
    silverAJAX.send();
  } else {
      loadingPageShow()
      updateAlertBoxHide()
      setTimeout(() => {         
        loadingPageHide()
        alert('Your balance is too low')
        }, 2000);
    }
    }
  }
  
  if (updateMemberType.textContent == 'Platinum Member') {
    if (type == 'platinum') {
      alert("Current type is 'platinum'")
      updateAlertBoxHide()
    } else {
      if (balance >= 148000) {
      loadingPageShow()
      updateAlertBoxHide()
      updateBalance = balance - 148000
      
      const platinumAJAX = new XMLHttpRequest();
        platinumAJAX.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          loadingPageHide()
          alert('Update Successfully ... ')
      }
    };
    platinumAJAX.open("GET", "../php/update_type.php?type=platinum&reward_balance=7000&balance="+updateBalance, true);
    platinumAJAX.send();
  } else {
      loadingPageShow()
      updateAlertBoxHide()
      setTimeout(() => {         
        loadingPageHide()
        alert('Your balance is too low')
        }, 2000);
    }
    }
  }
  
  if (updateMemberType.textContent == 'Gold Member') {
    if (type == 'gold') {
      alert("Current type is 'gold'")
      updateAlertBoxHide()
    } else {
      if (balance >= 360000) {
      loadingPageShow()
      updateAlertBoxHide()
      updateBalance = balance - 360000
      
      const goldAJAX = new XMLHttpRequest();
        goldAJAX.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        loadingPageHide()
        alert('Update Successfully ... ')
      }
    };
    goldAJAX.open("GET", "../php/update_type.php?type=gold&reward_balance=12000&balance="+updateBalance, true);
    goldAJAX.send();
  } else {
      loadingPageShow()
      updateAlertBoxHide()
      setTimeout(() => {         
        loadingPageHide()
        alert('Your balance is too low')
        }, 2000);
    }
    }
  }
  
  if (updateMemberType.textContent == 'Diamond Member') {
    if (type == 'diamond') {
      alert("Current type is 'diamond'")
      updateAlertBoxHide()
    } else {
      if (balance >= 532000) {
      loadingPageShow()
      updateAlertBoxHide()
      updateBalance = balance - 532000
      
      const diamondAJAX = new XMLHttpRequest();
        diamondAJAX.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          loadingPageHide()
          alert('Update Successfully ... ')
      }
    };
    diamondAJAX.open("GET", "../php/update_type.php?type=diamond&reward_balance=16000&balance="+updateBalance, true);
    diamondAJAX.send();
  } else {
      loadingPageShow()
      updateAlertBoxHide()
      setTimeout(() => {         
        loadingPageHide()
        alert('Your balance is too low')
        }, 2000);
    }
    }
  }
  
  if (updateMemberType.textContent == 'VIP Member') {
    if (type == 'vip') {
      alert("Current type is 'vip'")
      updateAlertBoxHide()
    } else {
      if (balance >= 1184000) {
      loadingPageShow()
      updateAlertBoxHide()
      updateBalance = balance - 1184000
      
      const vipAJAX = new XMLHttpRequest();
        vipAJAX.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          loadingPageHide()
          alert('Update Successfully ... ')
      }
    };
    vipAJAX.open("GET", "../php/update_type.php?type=vip&reward_balance=20000&balance="+updateBalance, true);
    vipAJAX.send();
  } else {
      loadingPageShow()
      updateAlertBoxHide()
      setTimeout(() => {         
        loadingPageHide()
        alert('Your balance is too low')
        }, 2000);
    }
    }
  }
  
})
rechargeBtns.forEach(goRechargeBtn => {
  goRechargeBtn.addEventListener('click', () => {
    updateAlertBoxHide()
    moreDivPagesHide()
    rechargePageShow()
  })
})
shortcutIcons.forEach(shortcutIcon => {
  shortcutIcon.addEventListener('click', () => {
    let shortcutIconContentResult = shortcutIcon.textContent.replace(/\s/g, '')
    switch (shortcutIconContentResult) {
      case 'Referral':
        referralPageShow()
        break;
      case 'Reward':
        rewardPageShow()
        break;
      case 'Withdrawal':
        withdrawalPageShow()
        break;
        case 'Recharge':
        rechargePageShow()
        break;
        case 'Bonus':
        bonusImgShow()
        bonusPageShow()
        break;
    }
  })
})