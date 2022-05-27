import { getElement } from './utils.js'

const year = getElement('#year')

year.innerHTML = new Date().getFullYear()
// console.log(new Date().getFullYear());
