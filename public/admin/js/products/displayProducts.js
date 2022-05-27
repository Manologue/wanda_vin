import deleteProduct from './deleteProduct.js'
import fetchProducts from './fetchProducts.js'
import {
  paginate,
  btnContainer,
  // displayButtons,
} from '../pages/products.js'
import displayButtons from './displayButtons.js'

const container = document.querySelector('.products-tab tbody')
const table = document.querySelector('.products-tab table')
const title = document.querySelector('.products-tab h1')
const bulkContainer = document.querySelector('.bulk-container')

// const btnContainer = document.querySelector('.btn-container')

const displayProducts = (products, i) => {
  let index = i
  let pages = []
  // data-id=${id}
  // <a class='danger' for="check  href=''><span class='material-icons-sharp'>delete</span></a>
  const newProducts = products
    .map((product) => {
      const product_image = product[0]
      const product_category = product[1]
      const { id, product_price, product_quantity, product_title, product_status } =
        product[2]

      // console.log(id)
      return `
      <tr>
      <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='${id}'></td>
      <td>${id}</td>
      <td class='product_title'>
        ${product_title}
        <img class='tab-img' src='../../resources/${product_image}' alt=''>
      </td>
      <td>${product_status}</td>
      <td>${product_quantity}</td>
      <td>${product_price}FCFA</td>
      <td>${product_category}</td>
      <td class='action'>
        <a class='danger' class="modal-btn " href=''><span class='material-icons-sharp'>delete</span></a>
        <a class='success' " href='admin.php?edit_products&id=${id}'> <span class='material-icons-sharp'>edit</span></a>
      </td>
    </tr> 
    <div class="modal-overlay">
      <div class="modal-container">
        <h3>delete item <span style='color:rgb(156, 34, 34)'>${id}</span> ?</h3>
        <button class="close-btn"><i class="fas fa-times"></i></button>
        <button data-id=${id} class="delete-btn">delete</i></button>
      </div>
    </div>
    
    `
    })
    .join('')
  container.innerHTML = newProducts

  /* delete btns */
  const deleteBtns = document.querySelectorAll('.action > a.danger')
  const delBtnModal = document.querySelectorAll('.delete-btn')

  const init = async () => {
    /* fetch products from db */
    const productList = await fetchProducts()
    localStorage.setItem('productList', JSON.stringify(productList))

    let storeProduct = JSON.parse(localStorage.getItem('productList'))

    deleteBtns.forEach((btn) => {
      // console.log('ok')
      btn.addEventListener('click', (e) => {
        e.preventDefault()
        const tabRow = e.target.parentElement.parentElement.parentElement

        const modal = tabRow.nextElementSibling
        const closeBtn = modal.querySelector('.close-btn')

        // console.log(delBtnModal)
        modal.classList.add('open-modal')

        closeBtn.addEventListener('click', function () {
          modal.classList.remove('open-modal')
        })
      })
    })

    /* delete products */

    delBtnModal.forEach((btn) => {
      btn.addEventListener('click', (e) => {
        // prevent page from refreshing
        e.preventDefault()

        // delete product in database
        deleteProduct(btn.dataset.id)
        // remove product in the table
        btn.parentElement.parentElement.remove()
        // alert mssg
        const alert = document.querySelector('.alert1')
        alert.textContent = `Product ${btn.dataset.id} deleted successfully`
        // console.log(alert)
        alert.classList.add('alert1-danger')
        alert.style.display = 'block'
        setTimeout(() => {
          alert.style.display = 'none'
        }, 2000)

        const deleteId = btn.dataset.id
        let filterProducts = storeProduct.filter((product) => {
          return product[2].id != deleteId
        })
        // console.log(filterProducts)
        localStorage.setItem('productList', JSON.stringify(filterProducts))
        storeProduct = JSON.parse(localStorage.getItem('productList'))
        // console.log(storeProduct)
        pages = paginate(storeProduct)
        // swap to the page behind when there is no more items in the page
        if (typeof pages[index] === 'undefined') {
          index--
        }

        // when page 1 is empty display none
        if (index === -1) {
          btnContainer.style.display = 'none'
          table.style.display = 'none'
          bulkContainer.style.display = 'none'
          setTimeout(() => {
            title.innerHTML = 'No products found'
            title.style.display = 'block'
          }, 2000)
          return
        }

        displayProducts(pages[index], index)
        displayButtons(btnContainer, pages, index)
      })
    })
  }

  init()
  // check box

  // try to check all pages at the same time
  const checkall = document.querySelector('#selectAllBoxes')
  const checkBoxes = document.querySelectorAll('.checkBoxes')

  checkall.addEventListener('click', (e) => {
    if (checkall.checked == true) {
      checkBoxes.forEach((box) => {
        box.checked = true
      })
    } else {
      checkBoxes.forEach((box) => {
        box.checked = false
      })
    }
  })
  if (checkall.checked == true) {
    checkBoxes.forEach((box) => {
      box.checked = true
    })
  } else {
    checkBoxes.forEach((box) => {
      box.checked = false
    })
  }
}

export default displayProducts
