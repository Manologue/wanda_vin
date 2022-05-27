<?php require_once("../../config.php");

if (isset($_GET['id'])) {

 $query = query("DELETE FROM subscribers WHERE id = " . escape_string($_GET['id']) . "");
 confirm($query);

 $msg = "Subscriber with id {$_GET['id']} was deleted ";
 set_alert($msg, "danger");
 redirect("../../../public/admin/admin.php?subscribers");
} else {
 redirect("../../../public/admin/admin.php?subscribers");
}
