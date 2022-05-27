<?php require_once("../../config.php");


if (isset($_GET['id'])) {

 $query = query("DELETE FROM users WHERE user_id = " . escape_string($_GET['id']) . "");
 confirm($query);

 $msg = "user with id {$_GET['id']} was deleted ";
 set_alert($msg, "danger");
 redirect("../../../public/admin/admin.php?user_admin");
} else {
 redirect("../../../public/admin/admin.php?user_admin");
}
