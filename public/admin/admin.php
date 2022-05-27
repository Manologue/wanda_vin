<?php require_once("../../resources/config.php") ?>
<?php if (!isset($_SESSION['admin_name'])) {
 header("Location: ./index.php");
} ?>
<?php include(TEMPLATE_BACK . "/header.php") ?>


<!---------------------- ASIDE ------------------>
<?php include(TEMPLATE_BACK . "/sidebar.php") ?>

<!-------------------- END OF ASIDE ----------------->

<?php

if ($_SERVER['REQUEST_URI'] == "/wanda_vin/public/admin/admin.php") {
 include(TEMPLATE_BACK . "/admin_content.php");
 // echo $_SERVER['REQUEST_URI'];
}
if (isset($_GET['products'])) {
 include(TEMPLATE_BACK . "/products.php");
}
if (isset($_GET['add_products'])) {
 include(TEMPLATE_BACK . "/add_products.php");
}
if (isset($_GET['edit_products'])) {
 include(TEMPLATE_BACK . "/edit_products.php");
}
if (isset($_GET['categories'])) {
 include(TEMPLATE_BACK . "/categories.php");
}
if (isset($_GET['orders'])) {
 include(TEMPLATE_BACK . "/orders.php");
}
if (isset($_GET['reports'])) {
 include(TEMPLATE_BACK . "/reports.php");
}
if (isset($_GET['user_admin'])) {
 include(TEMPLATE_BACK . "/user_admin.php");
}
if (isset($_GET['add_user'])) {
 include(TEMPLATE_BACK . "/add_user.php");
}
if (isset($_GET['edit_user'])) {
 include(TEMPLATE_BACK . "/edit_user.php");
}
if (isset($_GET['subscribers'])) {
 include(TEMPLATE_BACK . "/subscribers.php");
}
if (isset($_GET['messages'])) {
 include(TEMPLATE_BACK . "/messages.php");
}
if (isset($_GET['message_details'])) {
 include(TEMPLATE_BACK . "/message_details.php");
}
?>

<?php include(TEMPLATE_BACK . "/footer.php") ?>