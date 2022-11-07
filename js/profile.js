const rechargeIcon = document.querySelector('.recharge-icon')
const withdrawalIcon = document.querySelector('.withdrawal-icon')

rechargeIcon.addEventListener('click', () => {
  moreDivPagesHide()
  rechargePageShow()
})

withdrawalIcon.addEventListener('click', () => {
  moreDivPagesHide()
  withdrawalPageShow()
})