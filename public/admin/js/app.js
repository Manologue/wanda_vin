import './pages/products.js'
import './pages/add_product.js'
import './pages/orders.js'

const sideMenu = document.querySelector('aside')
const menuBtn = document.querySelector('#menu-btn')
const closeBtn = document.querySelector('#close-btn')
const themeToggler = document.querySelector('.theme-toggler')
const sidebarLinks = [...document.querySelectorAll('.sidebar-links')]

// show the sidebar
menuBtn.addEventListener('click', () => {
  sideMenu.classList.add('show')
})

closeBtn.addEventListener('click', () => {
  sideMenu.classList.remove('show')
})

// change the theme
themeToggler.addEventListener('click', () => {
  document.body.classList.toggle('dark-theme-variables')

  themeToggler.querySelector('span:nth-child(1)').classList.toggle('active')
  themeToggler.querySelector('span:nth-child(2)').classList.toggle('active')
})

// sidebar active link

sidebarLinks.map((sidebarLink) => {
  sidebarLink.addEventListener('click', () => {
    sidebarLinks.map((link) => {
      link.classList.remove('active')
    })
    sidebarLink.classList.add('active')
  })
})
