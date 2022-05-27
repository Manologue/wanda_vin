import fetchProducts from '../products/fetchProducts.js'
import displayProducts from '../products/displayProducts.js'
import paginate from '../products/paginate.js'
import displayButtons from '../products/displayButtons.js'
// import '../products/deleteProduct.js'
import '../products/checkAllBoxes.js'
const btnContainer = document.querySelector('.btn-container')
const table = document.querySelector('.products-tab table')
const title = document.querySelector('.products-tab h1')
const bulkContainer = document.querySelector('.bulk-container')
console.log(bulkContainer)

let index = 0
let pages = []

// if btn container condition is there to avoid undefined error in other pages
if (btnContainer) {
  const setupUI = () => {
    displayProducts(pages[index], index)
    let productList = JSON.parse(localStorage.getItem('productList'))
    pages = paginate(productList)
    console.log(pages)
    displayButtons(btnContainer, pages, index)
  }

  const init = async () => {
    const products = await fetchProducts()
    console.log(products)
    table.style.display = 'table'
    title.style.display = 'none'
    localStorage.setItem('productList', JSON.stringify(products))
    let productList = JSON.parse(localStorage.getItem('productList'))
    pages = paginate(productList)
    if (pages.length > 0) {
      setupUI()
    } else {
      table.style.display = 'none'
      title.style.display = 'block'
      bulkContainer.style.display = 'none'
      title.innerHTML = 'No products found'
    }
  }

  /* paginate btns */
  btnContainer.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-container')) return
    if (e.target.classList.contains('page-btn')) {
      index = parseInt(e.target.dataset.index)
    }
    if (e.target.classList.contains('next-btn')) {
      index++
      if (index > pages.length - 1) {
        index = 0
      }
    }
    if (e.target.classList.contains('prev-btn')) {
      index--
      if (index < 0) {
        index = pages.length - 1
      }
    }
    let storeProduct = JSON.parse(localStorage.getItem('productList'))

    pages = paginate(storeProduct)

    displayProducts(pages[index], index)
    displayButtons(btnContainer, pages, index)
  })
  window.addEventListener('load', init)

  // check all ckeckboxes in every page
}

export { paginate, btnContainer }
