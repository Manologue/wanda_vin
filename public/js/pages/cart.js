/* global imports*/
import '../toggleSidebar.js'
import '../scroll.js'
import '../footer.js'
import '../nav.js'

// modal

const modal = document.querySelector('.modal-overlay')
const modalBtn = document.querySelector('.btn-block')
const closeBtn = document.querySelector('.cart .close-btn')
const cartForm = document.querySelector('.cart-form')

if (modalBtn) {
  modalBtn.addEventListener('click', function () {
    modal.classList.add('open-modal')
    cartForm.classList.add('open-modal')
  })
}

if (closeBtn) {
  closeBtn.addEventListener('click', function () {
    modal.classList.remove('open-modal')
    cartForm.classList.remove('open-modal')
  })
}
