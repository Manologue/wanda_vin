<?php add_category(); ?>

<main>
 <div class="other-tabs cat-tabs">
  <h2>Product Categories</h2>
  <div class="content">
   <form action="" method="post" enctype="multipart/form-data">
    <?php display_alert()  ?>
    <div class="user-details">
     <div class="input-box">
      <span class="details">Title</span>
      <input name="cat_title" type="text" />
      <div class="input-box">
       <div class="button cat-btn">
        <input type="submit" name="add_category" value="Add" />
       </div>
      </div>
     </div>
     <div class="input-box">
      <div class="">
       <table>
        <?php display_alert(); ?>
        <thead>
         <tr class="row1">
          <th>Category Id</th>
          <th>Category Title</th>
          <!-- <th>Status</th> -->
         </tr>
        </thead>
        <tbody>
         <?php display_categories_admin(); ?>
        </tbody>
       </table>
      </div>
     </div>

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