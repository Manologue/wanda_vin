/* global import(s) */
import '../toggleSidebar.js'
import '../scroll.js'
import '../footer.js'
import '../nav.js'

const form = document.querySelector('.info-contact .form')
const alert = document.querySelector('.info-contact .alert')

console.log(form)

form.addEventListener('submit', function (e) {
  e.preventDefault()
  const data = new URLSearchParams()
  for (const p of new FormData(form)) {
    data.append(p[0], p[1])
  }
  fetch('../resources/templates/front/add_subscriber.php', {
    method: 'POST',
    body: data,
  })
    .then((response) => response.text())
    .then((response) => {
      alert.innerHTML = response
      // setTimeout(() => {
      //   alert.innerHTML = ''
      // }, 3000)
    })
    .catch((error) => console.log(error))
})
