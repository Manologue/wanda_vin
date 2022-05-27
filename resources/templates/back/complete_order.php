<?php require_once("../../config.php");
if (isset($_GET['id'])) {

 $query = query("SELECT * FROM orders WHERE id = " . escape_string($_GET['id']) . "");
 confirm($query);

 while ($row = mysqli_fetch_array($query)) {
  if ($row['order_status'] == "pending") {
   $query1 = query("UPDATE orders SET order_status = 'complete' WHERE id = " . escape_string($_GET['id']) . "");
   confirm($query1);
   $query2 = query("SELECT * FROM reports WHERE order_id = " . escape_string($_GET['id']) . "");
   confirm($query);
   while ($row = mysqli_fetch_array($query2)) {
    $product_quantity = $row['product_quantity'];
    $query = query("UPDATE products SET product_quantity = product_quantity - $product_quantity WHERE id = " . escape_string($row['product_id']) . "");
   }
   $msg = "order with id {$_GET['id']} was completed successfully";
   set_alert($msg, "success");
   redirect("../../../public/admin/admin.php?orders");
  } else {
   $msg = "order with id {$_GET['id']} was already completed";
   set_alert($msg, "danger");
   redirect("../../../public/admin/admin.php?orders");
  }
 }
}
