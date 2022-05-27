import fetchOrders from '../orders/fetchOrders.js'
import displayOrders from '../orders/displayOrders.js'

const table = document.querySelector('.orders-tab table')
const title = document.querySelector('.orders-tab h1')

console.log(table, title)

const init = async () => {
  const orders = await fetchOrders()
  console.log(orders)
  if (orders.length > 0) {
    table.style.display = 'table'
    title.style.display = 'none'
    displayOrders(orders)
  } else {
    table.style.display = 'none'
    title.style.display = 'block'
    title.innerHTML = 'No orders found'
  }
}

window.addEventListener('load', init)
