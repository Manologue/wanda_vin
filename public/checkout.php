<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php
unset($_SESSION['about'])

?>
<?php include(TEMPLATE_FRONT . DS . "nav_side_bar.php"); ?>

<?php
if (!isset($_SESSION['customer_name'])) {
 redirect("index.php");
 return;
}

?>
<section class="cart">

 <div class="section-center cart-center">
  <?php display_alert(); ?>

  <table id='cart-table'>
   <tr class='cart-header'>
    <th>Produit</th>
    <th>Quantite</th>
    <th>total</th>

   </tr>
   <?php display_report_in_checkout(); ?>
  </table>
  <div class='cart-btns-decision'>
   <a href='./products.php' class='btn cart-btn-products'>
    continuer vos achats
   </a>
  </div>

  <div class='cart-total-display'>
   <article>
    <div class='display'>
     <div class='display-value'>
      <h4>total:</h4>
      <h4> <?php echo $_SESSION['item_total'] ?>FCFA </h4>
     </div>
     <div class='display-value'>
      <p>frais:</p>
      <p><?php echo $_SESSION['frais']; ?> FCFA</p>
     </div>
     <div class='line'></div>
     <div class='display-value'>
      <h4>total de la commande:</h4>
      <h4><?php echo $_SESSION['item_total_frais']; ?>FCFA</h4>
     </div>
    </div>


   </article>
  </div>
 </div>
 <?php

 unset($_SESSION['customer_name']);
 empty_cart_sessions()
 ?>

 <!-- end modal -->
</section>