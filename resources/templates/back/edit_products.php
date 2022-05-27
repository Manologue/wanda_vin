<?php update_product();  ?>


<?php



if (isset($_GET['id'])) {


  $query = query("SELECT * FROM products WHERE id = " . escape_string($_GET['id']) . " ");
  confirm($query);
  while ($row = mysqli_fetch_array($query)) {
    $product_title = escape_string($row['product_title']);
    $product_category_id = escape_string($row['product_category_id']);
    $category = show_product_category_title($product_category_id);
    $product_price = escape_string($row['product_price']);
    $product_desc = escape_string($row['product_desc']);
    $product_short_desc = escape_string($row['product_short_desc']);
    $product_quantity = escape_string($row['product_quantity']);
    $product_status = escape_string($row['product_status']);
    $product_image = escape_string($row['product_image']);

    $product_image = display_image($product_image);
    // echo $product_image;
  }
}




?>











<main>
  <div class="other-tabs">
    <h2>UPDATE Product</h2>
    <div class="button edit-btn">
      <!-- <input type="submit" name="add_category" value="products" /> -->
      <a href="admin.php?products">products</a>
    </div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data">
        <?php display_alert()  ?>
        <div class="user-details">


          <div class="input-box">
            <span class="details">Product Title</span>
            <input name="product_title" type="text" value="<?php echo $product_title; ?>" />
          </div>
          <div class="input-box">
            <span class="details">Category</span>
            <select name="product_category_id" id="" class="select">

              <option value='<?php echo $product_category_id; ?>'><?php echo $category; ?></option>
              <?php show_categories_add_product(); ?>

            </select>
          </div>
          <div class="input-box">
            <span class="details">description</span>
            <textarea name="product_desc" id="" cols="30" rows="10" value="<?php echo $product_desc; ?>"><?php echo $product_desc; ?></textarea>
          </div>
          <div class="input-box">
            <span class="details">short description</span>
            <textarea class="short-text" name="product_short_desc" id="" cols="30" rows="10" value="<?php echo $product_short_desc; ?>"><?php echo $product_short_desc; ?></textarea>
          </div>
          <div class="input-box">
            <span class="details">Product price</span>
            <input type="number" name="product_price" class="form-control" min=2000 max="100000" size="60" value="<?php echo $product_price; ?>">
          </div>
          <div class="input-box">
            <span class="details">Product quantity</span>
            <input type="number" name="product_quantity" class="form-control" min=1 size="60" value="<?php echo $product_quantity; ?>">
          </div>
          <div class="input-box">
            <span class="details">Status</span>
            <select name="product_status" id="" class="status">
              <option value='<?php echo $product_status; ?>'><?php echo $product_status; ?></option>
              <?php if ($product_status == 'featured') {
                echo "
        <option value='no'>no</option>
        
          ";
              } else {
                echo "
        <option value='featured'>featured</option>
        ";
              }
              ?>
            </select>
          </div>
        </div>
        <!-- img upload -->
        <div class="img-container">
          <div class="wrapper">
            <div class="image">
              <img class="img-upload" src="../../resources/<?php echo $product_image; ?>" alt="" />
            </div>
            <div class="content-img">
              <div class="icon">
                <i class="fas fa-cloud-upload-alt"></i>
              </div>
              <div class="text">No file chosen, yet!</div>
            </div>
            <div id="cancel-btn">
              <i class="fas fa-times"></i>
            </div>
            <div class="file-name">File name here</div>
          </div>
          <button type="button" id="custom-btn">
            Choose a file
          </button>
          <input id="default-btn" name="file" type="file" hidden />
          <!-- end of img upload -->
        </div>
        <div class="button">
          <input type="submit" name="update" value="Update" />
        </div>
      </form>
    </div>
  </div>
</main>
<!------------------ END OF MAIN ------------------>
<div class="right">

  <?php include(TEMPLATE_BACK . "/top.php") ?>
  <!-- end of top -->
</div>