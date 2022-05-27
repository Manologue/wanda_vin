<!-- navbar -->

<nav class="navbar">
  <div class="section-center navbar-center">
    <!-- hamburger toggle icon -->
    <button class="toggle-btn">
      <i class="bx bx-menu"></i>
    </button>
    <!-- logo -->
    <img src="./img/LogoMakr-3bPWtb.png" class="logo" alt="" />
    <!-- list -->
    <ul class="nav-links">
      <li><a class="nav-link" href="index.php">accueil</a></li>
      <li><a class="nav-link" href="products.php">nos vins</a></li>
      <li><a class='nav-link ' href='index.php#about'>a propos</a></li>
      <li><a class='nav-link' href='index.php#contact'>contact</a></li>
    </ul>
    <!-- cart icon -->
    <div class="cart-container">
      <button class="cart-btn">
        <a href="./cart.php">
          <i class="bx bx-shopping-bag"></i>
        </a>
      </button>
      <?php count_cart() ?>
    </div>
  </div>
</nav>
<!-- overlay sidebar for small screen -->
<div class="overlay overlay-sidebar">
  <aside class="sidebar">
    <button class="close-btn">
      <i class="bx bx-x"></i>
    </button>
    <ul class="sidebar-list">
      <li>
        <a class="sidebar-link" href="index.php">
          <i class="fas fa-home fa-fw"></i> accueil</a>
      </li>

      <li>
        <a class="sidebar-link" href="products.php">
          <i class="fas fa-wine-bottle"></i> nos vins</a>
      </li>
      <?php
      if (isset($_SESSION['about'])) {

        echo "
          <li>
            <a class='sidebar-link about-link' href='#about'>
              <i class='fas fa-book fa-fw'></i> a propos</a>
          </li>
          ";
      }
      ?>
    </ul>
  </aside>
</div>