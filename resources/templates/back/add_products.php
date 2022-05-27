<?php add_product(); ?>
<main>
  <div class="other-tabs">
    <h2>Add Products</h2>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data">
        <?php display_alert()  ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Product Title</span>
            <input name="product_title" type="text" />
          </div>
          <div class="input-box">
            <span class="details">Category</span>
            <select name="product_category_id" id="" class="select">

              <option value=''>Select Category</option>
              <?php show_categories_add_product(); ?>

            </select>
          </div>
          <div class="input-box">
            <span class="details">description</span>
            <textarea name="product_desc" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="input-box">
            <span class="details">short description</span>
            <textarea class="short-text" name="product_short_desc" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="input-box">
            <span class="details">Product price</span>
            <input type="number" name="product_price" min=2000 max="100000" class="form-control" size="70">
          </div>
          <div class="input-box">
            <span class="details">Product quantity</span>
            <input type="number" name="product_quantity" min=1 value=1 class="form-control" size="60">
          </div>
          <div class="input-box">
            <span class="details">Status</span>
            <select name="product_status" id="" class="status">
              <option value='no'>Select Status</option>
              <option value='featured'>featured</option>
              <option value='no'>no status</option>
            </select>
          </div>
        </div>
        <!-- img upload -->
        <div class="img-container">
          <div class="wrapper">
            <div class="image">
              <img class="img-upload" src="" alt="" />
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
          <input type="submit" name="publish" value="Publish" />
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