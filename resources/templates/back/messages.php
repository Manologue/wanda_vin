<main>

 <div class="other-tabs messages-tab">
  <h2>Messages</h2>


  <table>
   <?php
   display_alert()
   ?>
   <!-- js alert mssg -->
   <h4 style='text-align:center' class='alert1'></h4>

   <thead>
    <tr>

    </tr>
   </thead>
   <tbody>
    <?php
    display_messages()
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