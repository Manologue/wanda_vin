/* global imports*/
import '../toggleSidebar.js'
import '../scroll.js'
import '../footer.js'
import '../nav.js'

const filtersContainer = document.querySelector('.filters-container')
if (filtersContainer) {
  window.addEventListener('scroll', myFunction)

  function myFunction() {
    const footer = document.querySelector('.footer')
    const scrollHeight = window.pageYOffset

    let limit = footer.getBoundingClientRect().bottom - 800

    if (scrollHeight > limit) {
      filtersContainer.style.position = 'sticky'
      filtersContainer.style.minWidth = '250px'
    }
  }
}
