<?php require_once("../../config.php");

if (isset($_GET['id'])) {

 $query = query("DELETE FROM orders WHERE id = " . escape_string($_GET['id']) . "");
 confirm($query);

 $query2 = query("DELETE FROM reports WHERE order_id = " . escape_string($_GET['id']) . "");
 confirm($query2);


 $msg = "Order with id {$_GET['id']} was deleted successfully";
 set_alert($msg, "danger");

 redirect("../../../public/admin/admin.php?orders");
}
