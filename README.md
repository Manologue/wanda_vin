# Online wine shop delivery

This is an online shopping with wine delivery
it has the front and back section
the front which is the store it self made for the clients
the back which is for the admin

links.map((link) => {
link.addEventListener('click', (e) => {
e.preventDefault()
const url = link.getAttribute('href')
change(url)
})
})
