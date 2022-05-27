<?php require_once("../../config.php");


if (isset($_GET['id'])) {

 $query = query("DELETE FROM categories WHERE id = " . escape_string($_GET['id']) . "");
 confirm($query);

 $msg = "category with id {$_GET['id']} was deleted ";
 set_alert($msg, "danger");
 redirect("../../../public/admin/admin.php?categories");
} else {
 redirect("../../../public/admin/admin.php?categories");
}
