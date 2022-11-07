const miningIcon = document.querySelector('#mining-icon')
const homeIcon = document.querySelector('#home-icon')
const moreIcon = document.querySelector('#more-icon')

const slider = document.querySelector('#slider')

const miningPage = document.querySelector('#mining-page')
const homePage = document.querySelector('#home-page')
const morePage = document.querySelector('#more-page')

const loadingPage = document.querySelector('.loading-page')
const mainContainer = document.querySelector('#main-container')

const miningPageShow = () => {
  miningPage.style.transform = 'translateX(0%)'
  homePage.style.transform = 'translateX(-110%)'
  morePage.style.transform = 'translateX(110%)'
  miningIcon.classList.add('tab-bar-icon-active')
  homeIcon.classList.remove('tab-bar-icon-active')
  moreIcon.classList.remove('tab-bar-icon-active')
  slider.style.transform = `translateX(${miningIcon.offsetLeft - 4.5}px)`
}
const homePageShow = () => {
  miningPage.style.transform = 'translateX(-100%)'
  homePage.style.transform = 'translateX(0%)'
  morePage.style.transform = 'translateX(110%)'
  miningIcon.classList.remove('tab-bar-icon-active')
  homeIcon.classList.add('tab-bar-icon-active')
  moreIcon.classList.remove('tab-bar-icon-active')
  slider.style.transform = `translateX(${homeIcon.offsetLeft - 4.5}px)`
}
const morePageShow = () => {
  miningPage.style.transform = 'translateX(-100%)'
  homePage.style.transform = 'translateX(110%)'
  morePage.style.transform = 'translateX(0%)'
  miningIcon.classList.remove('tab-bar-icon-active')
  homeIcon.classList.remove('tab-bar-icon-active')
  moreIcon.classList.add('tab-bar-icon-active')
  slider.style.transform = `translateX(${moreIcon.offsetLeft - 4.5}px)`
}
const loadingPageShow = () => {
  loadingPage.style.display = 'flex'
}
const loadingPageHide = () => {
  loadingPage.style.display = 'none'
}

window.addEventListener('load', () => {
  homePageShow()
})
miningIcon.addEventListener('click', () => {
  miningPageShow()
})
homeIcon.addEventListener('click', () => {
  homePageShow()
})
moreIcon.addEventListener('click', () => {
  morePageShow()
})
