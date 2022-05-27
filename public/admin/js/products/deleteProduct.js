const deleteProduct = (id) => {
  const url = `../../resources/templates/back/delete_product.php?id=${id}`
  fetch(url)
    .then((res) => res.text())
    .then((data) => {
      // console.log(data)
    })
}

export default deleteProduct
