<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php
unset($_SESSION['about'])

?>
<?php include(TEMPLATE_FRONT . DS . "nav_side_bar.php"); ?>


<!-- products -->
<section class="section products">
 <!-- filters -->
 <div class="filters">
  <div class="filters-container">
   <!-- search -->
   <form class="input-form" method="POST">
    <input type="text" class="search-input" name="product_name" placeholder="Recherche..." id="product_name" />
   </form>
   <!-- categories -->
   <h4>Category</h4>
   <article class="categories">
    <?php get_categories(); ?>
   </article>
   <!-- filter with price -->

   <form class="price-form">

    <h4>Prix</h4>
    <input type="hidden" id="hidden_minimum_price" value="0" />
    <input type="hidden" id="hidden_maximum_price" value="65000" />
    <p id="price_show_in_cat">2000 - 100000</p>
    <div id="price_range_in_cat"></div>
   </form>
  </div>
 </div>
 <!-- products -->
 <div class="products-container filter_data_in_cat " id="output">
  <!-- all products wine -->
  <?php
  // get_cat_products();
  ?>
  <!-- end of all products wine -->
 </div>
</section>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>