const container = document.querySelector('.orders-tab tbody')
const table = document.querySelector('.orders-tab table')
const title = document.querySelector('.orders-tab h1')
let icon = ''
const displayOrders = (orders) => {
  const newOrders = orders.map((order) => {
    console.log(order)

    const { id, order_amount, order_date, order_status, order_time } = order

    if (order_status !== 'pending') {
      icon = '<i class="material-icons-sharp">done</i>'
    } else {
      icon = '<i class="material-icons-sharp">access_time</i>'
    }

    return `
    <tr>
    <td>${id}</td>
    <td>${order_amount}</td>
    <td>${order_status}</td>
    <td>${order_date} ${order_time}</td>
    <td class='order-details'>
    <a href='admin.php?reports&id=${id}'>
    <i class='fa-solid fa-eye'></i>
    </a>
    </td>
    <td class='action'>
      <a class='danger' href='../../resources/templates/back/delete_order.php?id=${id}'><span class='material-icons-sharp'>delete</span></a>
      <a class='success' href='../../resources/templates/back/complete_order.php?id=${id}'>${icon}</span></a>
    </td>
    </tr>
    `
  })
  container.innerHTML = newOrders
}

export default displayOrders
