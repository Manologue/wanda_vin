<main>

 <div class="other-tabs users-tab">
  <h2>Admin User(s)</h2>
  <div class="button user-btn">
   <a href="../../public/admin/admin.php?add_user">Add</a>
  </div>
  <table>
   <?php display_alert(); ?>
   <!-- js alert mssg -->
   <h4 style='text-align:center' class='alert1'></h4>
   <thead>
    <tr>
     <th>Id</th>
     <th>User Name</th>
     <th>User Email</th>
     <th>User Photo</th>
     <!-- <th>Details</th> -->
    </tr>
   </thead>
   <tbody>
    <?php
    display_admin_users()
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