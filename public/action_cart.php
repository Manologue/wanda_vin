<?php require_once("../resources/config.php"); ?>
<?php

if (isset($_GET["add"])) {
 // echo $_SESSION["product_{$_GET["add"]}"];

 $query = query("SELECT * FROM products WHERE id=" . escape_string($_GET['add']) . "");
 confirm($query);
 while ($row = mysqli_fetch_array($query)) {
  if ($row['product_quantity'] != $_SESSION['product_' . $_GET["add"]]) {
   $_SESSION['product_' . $_GET["add"]] += 1;
   redirect("cart.php");
  } else {
   set_alert("nous avons juste " . $row['product_quantity'] . " " . "{$row['product_title']}" . " disponible", "danger");
   redirect("cart.php");
  }
 }
}         

if (isset($_GET['reduce'])) {
 $_SESSION['product_' . $_GET["reduce"]]--;
 if ($_SESSION['product_' . $_GET["reduce"]] < 1) {
  unset($_SESSION['product_' . $_GET["delete"]]);

  unset($_SESSION['item_total']);
  unset($_SESSION['item_total_frais']);


  redirect("cart.php");
 } else {
  redirect("cart.php");
 }
}

if (isset($_GET['delete_all'])) {
 // echo "ok";
 // $query = query("SELECT * FROM products");
 // confirm($query);
 // $num_products = mysqli_num_rows($query);
 // for ($i = 1; $i < $num_products + 1; $i++) {
 //  if (isset($_SESSION['product_' . $i])) {
 //   unset($_SESSION['product_' . $i]);
 //   echo $_SESSION['product_' . $i];
 //  }
 // }
 foreach ($_SESSION as $name => $value) {
  if ($value > 0) {
   if (substr($name, 0, 8) == "product_") {
    $length = strlen($name) - 8;
    $id = escape_string(substr($name, 8, $length));
    unset($_SESSION['product_' . $id]);
   }
  }
 }
 unset($_SESSION['item_total']);
 unset($_SESSION['item_total_frais']);
 redirect("cart.php");
}

if (isset($_GET['delete'])) {
 unset($_SESSION['product_' . $_GET["delete"]]);
 // $_SESSION['product_' . $_GET["delete"]] = '0';
 unset($_SESSION['item_total']);
 unset($_SESSION['item_total_frais']);


 redirect("cart.php");
}


?>