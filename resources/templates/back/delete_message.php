<?php require_once("../../config.php");

if (isset($_GET['id'])) {

 $query = query("DELETE FROM messages WHERE id = " . escape_string($_GET['id']) . "");
 confirm($query);


 $msg = "message with id {$_GET['id']} was deleted ";
 set_alert($msg, "danger");

 redirect("../../../public/admin/admin.php?messages");
}
