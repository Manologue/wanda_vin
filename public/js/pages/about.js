/* global import(s) */
import '../toggleSidebar.js'
import '../scroll.js'
import '../footer.js'
import '../nav.js'

const navBar = document.querySelector('.navbar')
const sideBarOverlay = document.querySelector('.overlay-sidebar')
const sideBar = document.querySelector('.sidebar')

const sideLink = document.querySelector('.sidebar .about-link')
const navLink = document.querySelector('.navbar .about-link')

if (sideLink) {
  sideLink.addEventListener('click', function (e) {
    //
    sideBarOverlay.classList.remove('show')
    sideBar.classList.remove('show')

    e.preventDefault()
    // navigate to specific spot
    const id = e.currentTarget.getAttribute('href').slice(1)
    const element = document.getElementById(id)

    const navHeight = navBar.getBoundingClientRect().height

    let position = element.offsetTop - navHeight

    window.scrollTo({
      left: 0,
      top: position,
    })
  })
}

if (navLink) {
  navLink.addEventListener('click', (e) => {
    // prevent default
    e.preventDefault()
    // navigate to specific spot
    const id = e.currentTarget.getAttribute('href').slice(1)
    const element = document.getElementById(id)

    const navHeight = navBar.getBoundingClientRect().height

    let position = element.offsetTop - navHeight

    window.scrollTo({
      left: 0,
      top: position,
    })
  })
}
