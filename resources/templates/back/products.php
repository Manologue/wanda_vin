<main>

  <div class="other-tabs products-tab">
    <h2>Products</h2>
    <form action="" method="post">

      <table id="example">
        <?php
        checkBoxes_operation();
        display_alert()
        ?>
        <!-- js alert mssg -->
        <h4 style='text-align:center' class='alert1'></h4>



        <div id="bulkOptionsContainer" class="bulk-container">

          <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="delete">Delete</option>
            <option value="featured">featured</option>
            <option value="no">no status</option>
          </select>

          <input type="submit" name="submit" class="apply-btn" value="Apply">
        </div>

        <thead>
          <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Status</th>
            <th>Product quantity</th>
            <th>Product price</th>
            <th>Category</th>
            <!-- <th>Status</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          // display_admin_products()
          ?>
        </tbody>
        <div class="btn-container"></div>
      </table>
    </form>
    <!-- no product title -->
    <h1>Loading ....</h1>
  </div>
</main>
<!------------------ END OF MAIN ------------------>
<div class="right">
  <?php include(TEMPLATE_BACK . "/top.php") ?>
  <!-- end of top -->
</div>