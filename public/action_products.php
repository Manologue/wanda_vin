<?php require_once("../resources/config.php"); ?>
<?php

if (isset($_POST['action'])) {
  /**  action on search bar ***********/
  //fetch all products when the words in the search box are removed
  if ($_POST['action'] == 'fetchData') {

    get_all_products();
  }
  // search products
  if ($_POST['action'] == 'searchRecord') {
    search_products();
  }
  /**  action on filter price ***********/
  if ($_POST['action'] == 'filter_price') {
    filter_price();
  }
  if ($_POST['action'] == 'filter_price_in_cat') {
    if (isset($_GET['cat_id'])) {
      filter_price_in_cat($_GET['cat_id']);
    }
  }
}
