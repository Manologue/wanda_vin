/* toggle sidebar */
import { getElement } from './utils.js'

const toggleBtn = getElement('.toggle-btn')
const closeBtn = getElement('.close-btn')
const overlay = getElement('.overlay-sidebar')
const sidebar = getElement('.sidebar')

toggleBtn.addEventListener('click', () => {
  overlay.classList.add('show')
  sidebar.classList.add('show')
})

closeBtn.addEventListener('click', () => {
  overlay.classList.remove('show')
  sidebar.classList.remove('show')
})
