<?php
edit_user();
?>

<?php

$query = query("SELECT * FROM users WHERE user_id = " . escape_string($_GET['id']) . "");
confirm($query);


while ($row =  mysqli_fetch_array($query)) {

 $user_name = $row['user_name'];
 $user_email = $row['user_email'];
 $user_password = $row['user_password'];
 $user_photo = $row['user_photo'];

 $user_photo = display_image($user_photo);
}


?>


<main>
 <div class="other-tabs">
  <h2>Add Users</h2>
  <div class="content">
   <form action="" method="post" enctype="multipart/form-data">
    <?php display_alert()  ?>
    <div class="user-details">
     <div class="input-box">
      <span class="details">User Name</span>
      <input name="user_name" type="text" value="<?php echo $user_name; ?>" required />
     </div>
     <div class="input-box">
      <span class="details">User Email</span>
      <input name="user_email" type="email" value="<?php echo $user_email ?>" required />
     </div>
     <div class="input-box">
      <span class="details">User Password</span>
      <input name="user_password" type="password" value="<?php echo $user_password ?>" required />
     </div>
    </div>
    <!-- img upload -->
    <div class="img-container">
     <div class="wrapper">
      <div class="image">
       <img class="img-upload" src="../../resources/<?php echo $user_photo; ?>" alt="" />
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
     <input type="submit" name="edit_user" value="Update" />
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