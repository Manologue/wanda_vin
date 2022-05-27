<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php
unset($_SESSION['about'])

?>
<?php include(TEMPLATE_FRONT . DS . "nav_side_bar.php"); ?>
<main>
  <div class="section-center">
    <?php single_product() ?>
  </div>
</main>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>