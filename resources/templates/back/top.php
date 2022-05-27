<div class="top">
 <button id="menu-btn">
  <span class="material-icons-sharp">menu</span>
 </button>
 <div class="theme-toggler">
  <span class="material-icons-sharp active">light_mode</span>
  <span class="material-icons-sharp">dark_mode</span>
 </div>
 <div class="profile">
  <div class="info">
   <p>Hey, <b><?php echo $_SESSION['admin_name'] ?></b></p>
   <small class="text-muted">Admin</small>
  </div>
  <div class="profile-photo">
   <img src="../../resources/uploads/<?php echo $_SESSION['admin_photo'] ?>" alt="admin_photo">
  </div>
 </div>
</div>