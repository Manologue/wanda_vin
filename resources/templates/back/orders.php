<main>

 <div class="other-tabs orders-tab">
  <h2>Orders</h2>
  <table>
   <?php display_alert(); ?>
   <!-- js alert mssg -->
   <h4 style='text-align:center' class='alert1'></h4>
   <thead>
    <tr>
     <th>Id</th>
     <th>Amount</th>
     <th>Status</th>
     <th>Date</th>
     <th>Details</th>
     <!-- <th>Action</th> -->
    </tr>
   </thead>
   <tbody>
    <?php
    // display_orders()
    ?>
   </tbody>
   <div class="btn-container"></div>
  </table>
  <!-- no product title -->
  <h1>Loading ....</h1>
 </div>
</main>
<!------------------ END OF MAIN ------------------>
<div class="right">
 <?php include(TEMPLATE_BACK . "/top.php") ?>
 <!-- end of top -->
</div>