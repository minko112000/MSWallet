const teamMembersAllIcon = document.querySelector('.team-members-all-icon')
const teamMembersSilverIcon = document.querySelector('.team-members-silver-icon')
const teamMembersPlatinumIcon = document.querySelector('.team-members-platinum-icon')
const teamMembersGoldIcon = document.querySelector('.team-members-gold-icon')
const teamMembersDiamondIcon = document.querySelector('.team-members-diamond-icon')
const teamMembersVipIcon = document.querySelector('.team-members-vip-icon')
const teamMembersTypeIcons = document.querySelectorAll('.team-members-type-box > div')
const teamMembersMainBox = document.querySelector('.team-members-main-box')


const teamMembersAllIconActive = () => {
  teamMembersAllIcon.classList.add('team-members-type-icon-active')
  teamMembersSilverIcon.classList.remove('team-members-type-icon-active')
  teamMembersPlatinumIcon.classList.remove('team-members-type-icon-active')
  teamMembersGoldIcon.classList.remove('team-members-type-icon-active')
  teamMembersDiamondIcon.classList.remove('team-members-type-icon-active')
  teamMembersVipIcon.classList.remove('team-members-type-icon-active')
}
const teamMembersSilverIconActive = () => {
  teamMembersAllIcon.classList.remove('team-members-type-icon-active')
  teamMembersSilverIcon.classList.add('team-members-type-icon-active')
  teamMembersPlatinumIcon.classList.remove('team-members-type-icon-active')
  teamMembersGoldIcon.classList.remove('team-members-type-icon-active')
  teamMembersDiamondIcon.classList.remove('team-members-type-icon-active')
  teamMembersVipIcon.classList.remove('team-members-type-icon-active')
}
const teamMembersPlatinumIconActive = () => {
  teamMembersAllIcon.classList.remove('team-members-type-icon-active')
  teamMembersSilverIcon.classList.remove('team-members-type-icon-active')
  teamMembersPlatinumIcon.classList.add('team-members-type-icon-active')
  teamMembersGoldIcon.classList.remove('team-members-type-icon-active')
  teamMembersDiamondIcon.classList.remove('team-members-type-icon-active')
  teamMembersVipIcon.classList.remove('team-members-type-icon-active')
}
const teamMembersGoldIconActive = () => {
  teamMembersAllIcon.classList.remove('team-members-type-icon-active')
  teamMembersSilverIcon.classList.remove('team-members-type-icon-active')
  teamMembersPlatinumIcon.classList.remove('team-members-type-icon-active')
  teamMembersGoldIcon.classList.add('team-members-type-icon-active')
  teamMembersDiamondIcon.classList.remove('team-members-type-icon-active')
  teamMembersVipIcon.classList.remove('team-members-type-icon-active')
}
const teamMembersDiamondIconActive = () => {
  teamMembersAllIcon.classList.remove('team-members-type-icon-active')
  teamMembersSilverIcon.classList.remove('team-members-type-icon-active')
  teamMembersPlatinumIcon.classList.remove('team-members-type-icon-active')
  teamMembersGoldIcon.classList.remove('team-members-type-icon-active')
  teamMembersDiamondIcon.classList.add('team-members-type-icon-active')
  teamMembersVipIcon.classList.remove('team-members-type-icon-active')
}
const teamMembersVipIconActive = () => {
  teamMembersAllIcon.classList.remove('team-members-type-icon-active')
  teamMembersSilverIcon.classList.remove('team-members-type-icon-active')
  teamMembersPlatinumIcon.classList.remove('team-members-type-icon-active')
  teamMembersGoldIcon.classList.remove('team-members-type-icon-active')
  teamMembersDiamondIcon.classList.remove('team-members-type-icon-active')
  teamMembersVipIcon.classList.add('team-members-type-icon-active')
}

const teamEmailHide = () => {
  const teamMails = document.querySelectorAll('.team-mail')
  teamMails.forEach(mail => {
    let currentMail = mail.textContent
    let teamMailstart = currentMail.substr(0, 3)
    let mailEnd = currentMail.substr(currentMail.length - 13)
    let mailHide = '*******'
    let demoMail = teamMailstart + mailHide + mailEnd
    mail.textContent = demoMail
  })
}

const getTeam = team => {
  var allAJAX = new XMLHttpRequest()
  allAJAX.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      teamMembersMainBox.innerHTML = this.responseText
      teamEmailHide()
    }
  }
  allAJAX.open("GET", "../php/team.php?team="+team, true)
  allAJAX.send()
}

const allTeamShow = () => {
  teamMembersAllIconActive()
  getTeam('all')
}
const silverTeamShow = () => {
  teamMembersSilverIconActive()
  getTeam('silver')
}
const platinumTeamShow = () => {
  teamMembersPlatinumIconActive()
  getTeam('platinum')
}
const goldTeamShow = () => {
  teamMembersGoldIconActive()
  getTeam('gold')
}
const diamondTeamShow = () => {
  teamMembersDiamondIconActive()
  getTeam('diamond')
}
const vipTeamShow = () => {
  teamMembersVipIconActive()
  getTeam('vip')
}

window.addEventListener('load', () => {
  allTeamShow()
})

teamMembersTypeIcons.forEach(teamMembersTypeIcon => {
teamMembersTypeIcon.addEventListener('click', e => {
  getTeamMembersType = e.currentTarget.textContent.replace(/\s/g,'')
  switch (getTeamMembersType) {
    case 'All':
      allTeamShow()
      break;
    case 'Silver':
      silverTeamShow()
      break;
    case 'Platinum':
      platinumTeamShow()
      break;
    case 'Gold':
      goldTeamShow()
      break;
    case 'Diamond':
      diamondTeamShow()
      break;
    case 'VIP':
      vipTeamShow()
      break;
  }
})
})