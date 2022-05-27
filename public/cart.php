<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php
unset($_SESSION['about'])

?>
<?php include(TEMPLATE_FRONT . DS . "nav_side_bar.php"); ?>


<section class="cart">

  <div class="section-center cart-center">
    <?php display_alert(); ?>

    <table id='cart-table'>
      <tr class='cart-header'>
        <th>Produit</th>
        <th>Quantite</th>
        <th>total</th>

      </tr>
      <?php cart(); ?>
    </table>
    <div class='cart-btns-decision'>
      <a href='./products.php' class='btn cart-btn-products'>
        continuer vos achats
      </a>
      <a href='action_cart.php?delete_all' class='btn cart-btn-delete-all'>
        nettoyer le panier
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
        <?php checkout(); ?>

        <?php if ($_SESSION['item_quantity'] > 0) {
          echo "
          
          <button class='btn btn-block'>Commander</button>
          ";
        }
        ?>

      </article>
    </div>
  </div>
  <!-- modal -->
  <div class="modal-overlay">
    <div class="modal-container">
      <!-- <h3>modal content</h3> -->
      <button class="close-btn"><i class="fas fa-times"></i></button>

      <div class="cart-form">

        <form method="post">
          <span class="title">Infos</span>
          <div class="input-field">
            <i class="uil uil-user"></i>
            <input type="text" name="customer_name" placeholder="Entez votre nom" required>
          </div>
          <div class="input-field">
            <i class="uil uil-envelope icon"></i>
            <input type="email" name="customer_email" placeholder="Entez votre email">
          </div>
          <div class="input-field">
            <i class="uil uil-phone-volume"></i>
            <input type="number" name="customer_tel" placeholder="Entez votre numero" required>
          </div>
          <div class="input-field button">
            <input name="checkout" type="submit" value="valider">
          </div>
        </form>

      </div>


    </div>
  </div>
  <!-- end modal -->
</section>



<!--<script src="script.js"></script>-->



<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>