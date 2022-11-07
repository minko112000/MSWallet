const referralCodeCopyBtn = document.querySelector('#referral-code-copy-btn')
const referralLinkCopyBtn = document.querySelector('#referral-link-copy-btn')
const referralLearnMoreBtn = document.querySelector('.referral-learn-more-btn')

referralCodeCopyBtn.addEventListener('click', () => {
  navigator.clipboard.writeText(referralCode)
  topAlertShow('Copy to clipboard')
})
referralLinkCopyBtn.addEventListener('click', () => {
  navigator.clipboard.writeText(referralLink)
  topAlertShow('Copy to clipboard')
})

referralLearnMoreBtn.addEventListener('click', () => {
  moreDivPagesHide()
  rewardPageShow()
})