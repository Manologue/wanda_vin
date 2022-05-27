<main>
 <div class="other-tabs reports-tab">
  <?php
  if (isset($_GET['id'])) {
   $order_id = $_GET['id'];
   echo "
   <h2>Reports on order ($order_id) </h2>
   ";
  }
  ?>
  <table>

   <h4 style='text-align:center' class='alert1'></h4>
   <thead>
    <tr>
     <th>Report Id</th>
     <th>Product Id</th>
     <th>Product Title</th>
     <th>Product Price</th>
     <th>Product Quantity</th>
     <!-- <th>Action</th> -->
    </tr>
   </thead>
   <tbody>
    <?php
    display_reports()
    ?>
   </tbody>
   <div class="btn-container"></div>
  </table>

  </br>
  </br>
  </br>
  <table>

   <h4 style='text-align:center' class='alert1'></h4>
   <thead>
    <tr>
     <th>Customer Name</th>
     <th>Customer Tel</th>
     <th>Customer Email</th>

    </tr>
   </thead>
   <tbody>
    <?php
    display_order_customer_info()
    ?>
   </tbody>
   <div class="btn-container"></div>
  </table>
  <!-- no product title -->
  <!-- <h1>Loading ....</h1> -->
 </div>
</main>
<!------------------ END OF MAIN ------------------>
<div class="right">
 <?php include(TEMPLATE_BACK . "/top.php") ?>
 <!-- end of top -->
</div>