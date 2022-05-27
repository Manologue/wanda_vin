<main>
 <h1>Dashboard</h1>
 <div class="date">
  <input type="date" />
 </div>
 <div class="insights">
  <div class="sales">
   <span class="material-icons-sharp">analytics</span>
   <div class="middle">
    <div class="left">
     <h3>Total Sales</h3>
     <h1>$25,024</h1>
    </div>
    <!-- <div class="progress">
     <svg>
      <circle cx="38" cy="38" r="36"></circle>
     </svg>
     <div class="number">
      <p>81%</p>
     </div>
    </div> -->
   </div>
   <small class="text-muted">Last 24 Hours</small>
  </div>
  <!-------- end of sales --------->
  <div class="expenses">
   <span class="material-icons-sharp">bar_chart</span>
   <div class="middle">
    <div class="left">
     <h3>Total Expenses</h3>
     <h1>$65,024</h1>
    </div>
    <!-- <div class="progress">
     <svg>
      <circle cx="38" cy="38" r="36"></circle>
     </svg>
     <div class="number">
      <p>62%</p>
     </div>
    </div> -->
   </div>
   <small class="text-muted">Last 24 Hours</small>
  </div>
  <!-------- end of expenses --------->
  <div class="income">
   <span class="material-icons-sharp">stacked_line_chart</span>
   <div class="middle">
    <div class="left">
     <h3>Total Incomes</h3>
     <h1>$10,84</h1>
    </div>
    <!-- <div class="progress">
     <svg>
      <circle cx="38" cy="38" r="36"></circle>
     </svg>
     <div class="number">
      <p>44%</p>
     </div>
    </div> -->
   </div>
   <small class="text-muted">Last 24 Hours</small>
  </div>
  <!-------- end of income --------->
 </div>
 <!-------- end of insights --------->

 <div class="recent-orders orders-tab">
  <?php display_orders_pending(); ?>
  <a class="show-it" href="../../public/admin/admin.php?orders">Show all</a>
 </div>
</main>
<!------------------ END OF MAIN ------------------>
<div class="right">

 <?php include(TEMPLATE_BACK . "/top.php") ?>
 <!-- end of top -->
 <div class="sales-analytics">
  <h2>Sales Analytics</h2>
  <div class="item online">
   <div class="icon">
    <span class="material-icons-sharp">shopping_cart</span>
   </div>
   <div class="right">
    <div class="info">
     <h3>ONLINE ORDERS</h3>
     <small class="text-muted">Last 24 Hours</small>
    </div>

    <h3>3849</h3>
   </div>
  </div>

  <div class="item customers">
   <div class="icon">
    <span class="material-icons-sharp">person</span>
   </div>
   <div class="right">
    <div class="info">
     <h3>NEW SUBSCRIBER</h3>
     <small class="text-muted">Last 24 Hours</small>
    </div>

    <h3>849</h3>
   </div>
  </div>
  <a href="admin.php?add_products" class="item add-product">
   <div>
    <span class="material-icons-sharp">add</span>
    <h3>Add Product</h3>
   </div>
  </a>
 </div>
 <!-- end of recent updates -->
</div>