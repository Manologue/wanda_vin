<aside>
 <!-- top section -->
 <div class="top">
  <div class="logo">
   <img src="./images/logo.png" alt="" />
   <h2>WANDA<span class="danger">VIN</span></h2>
  </div>
  <div class="close" id="close-btn">
   <span class="material-icons-sharp">close</span>
  </div>
 </div>
 <!-- end of top section -->
 <!-- sidebar -->
 <div class="sidebar">
  <a href="admin.php" class="sidebar-links">
   <span class="material-icons-sharp">grid_view</span>
   <h3>Dashboard</h3>
  </a>
  <a href="admin.php?user_admin" class="sidebar-links">
   <span class="material-icons-sharp">person_outline</span>
   <h3>Admin Users</h3>
  </a>
  <a href="admin.php?orders" class="sidebar-links">
   <span class="material-icons-sharp">receipt_long</span>
   <h3>Orders</h3>
  </a>
  <a href="admin.php?products" class="sidebar-links">
   <span class="material-icons-sharp">inventory</span>
   <h3>Products</h3>
  </a>
  <a href="admin.php?add_products" class="sidebar-links">
   <span class="material-icons-sharp">add</span>
   <h3>Add Product</h3>
  </a>
  <a href="admin.php?categories" class="sidebar-links">
   <span class="material-icons-sharp">category</span>
   <h3>Category</h3>
  </a>
  <a href="admin.php?subscribers" class="sidebar-links">
   <span class="material-icons-sharp">supervisor_account</span>
   <h3>Subscribers</h3>
  </a>
  <a href="admin.php?messages" class="sidebar-links">
   <span class="material-icons-sharp">mail_outline</span>
   <h3>Messages</h3>
   <?php
   count_unread_messages();
   ?>

  </a>

  <a href="../../public/admin/logout.php">
   <span class="material-icons-sharp">logout</span>
   <h3>Logout</h3>
  </a>
 </div>
 <!-- end of sidebar -->
</aside>