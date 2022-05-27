<?php require_once("../../config.php");

if (isset($_GET['id'])) {

 $query = query("DELETE FROM products WHERE id = " . escape_string($_GET['id']) . "");
 confirm($query);


 // $msg = "Product with id {$_GET['id']} was deleted successfully";
 // set_alert($msg, "danger");

 // redirect("../../../public/admin/admin.php?products");
}
