const url = '../../resources/templates/back/fetch_products.php'

const fetchProducts = async () => {
  try {
    const response = await fetch(url)
    const data = await response.json()
    return data
  } catch (error) {
    console.log('error')
  }
}

export default fetchProducts
