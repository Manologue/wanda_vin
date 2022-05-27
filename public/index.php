<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php
$_SESSION['about'] = 'yes'

?>
<?php include(TEMPLATE_FRONT . DS . "nav_side_bar.php"); ?>

<!-- header of home page only -->
<header class="header">
  <div class="section-center header-center">
    <div class="header-desc">
      <h1>des vins de <span>bonnes qualites</span> pour etancher votre soif</h1>
      <p>
        Nous vous proposons une variete de vins selectionnes avec soin et amour par un
        groupe d'experts specialement pour vous
      </p>
      <a href="products.php">
        <button class="btn header-btn">acheter maintenant</button>
      </a>
    </div>
  </div>
</header>
<!-- sections -->
<section class="section featured">

  <h3 class="title">notre meilleur selection</h3>
  <div class="title-underline"></div>
  <div class="section-center product-center featured-center">
    <!--featured wines -->
    <?php
    get_featured_products();
    ?>

    <!-- end of featured wines -->
  </div>


  <a class="product-link" href="products.php">
    <button class="btn">Voir toutes les boissons</button>
  </a>
</section>
<section class="section description" id="about">
  <div class="section-center description-center">
    <div class="first-block">
      <h3>du bon vin livrer en temps et en heure pour votre satisfaction</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quas quasi
        expedita facere, omnis culpa.
      </p>
    </div>
    <div class="second-block">
      <!-- note  -->
      <article class="note reveal">
        <span class="note-icon">
          <svg class="note-svg" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
            <path d="m8 16 5.991-2L16 8l-6 2z"></path>
          </svg>
        </span>
        <h4>mission</h4>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum fugiat
          accusamus nihil possimus! Minus inventore obcaecati, voluptate consectetur
          sapiente totam.
        </p>
      </article>
      <!-- end of note -->
      <!-- note  -->
      <article class="note reveal">
        <span class="note-icon">
          <svg class="note-svg" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
            <path d="M17.813 3.838A2 2 0 0 0 16.187 3H7.813c-.644 0-1.252.313-1.667.899l-4 6.581a.999.999 0 0 0 .111 1.188l9 10a.995.995 0 0 0 1.486.001l9-10a.997.997 0 0 0 .111-1.188l-4.041-6.643zM12 19.505 5.245 12h13.509L12 19.505zM4.777 10l3.036-5 8.332-.062L19.222 10H4.777z"></path>
          </svg>
        </span>
        <h4>vission</h4>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum fugiat
          accusamus nihil possimus! Minus inventore obcaecati, voluptate consectetur
          sapiente totam.
        </p>
      </article>
      <!-- end of note -->
      <!-- note  -->
      <article class="note reveal">
        <span class="note-icon">
          <svg class="note-svg" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
            <path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM9 11V5h6v6H9zm6 2v6H9v-6h6zM5 5h2v2H5V5zm0 4h2v2H5V9zm0 4h2v2H5v-2zm0 4h2v2H5v-2zm14.002 2H17v-2h2.002v2zm-.001-4H17v-2h2.001v2zm0-4H17V9h2.001v2zM17 7V5h2v2h-2z"></path>
          </svg>
        </span>
        <h4>histoire</h4>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum fugiat
          accusamus nihil possimus! Minus inventore obcaecati, voluptate consectetur
          sapiente totam.
        </p>
      </article>
      <!-- end of note -->
    </div>
  </div>
</section>
<section class="section info-contact" id="contact">
  <div class="section-center info-contact-center">
    <div class="info-contact-desc">
      <h4>des nouvelles venant de wandaVin</h4>
      <p>
        soyez informer lorsque nous avons des nouveaux vins ou quand nous faisons des
        offres exclusive juste pour vous
      </p>
      </br>
      <p>
        subscrire a notre site pour recevoir des nouvelles et si possible nous envoyer un message
      </p>
    </div>
    <!-- contact form -->

    <form class="form">
      <div class="alert"></div>
      <h4>formulaire</h4>
      <div class="form-row">
        <label for="name" class="form-label">Nom</label>
        <input type="text" id="name" name="name" class="form-input" />
      </div>
      <div class="form-row">
        <label for="number" class="form-label">Numero</label>
        <input type="number" id="number" name="tel" class="form-input" />
      </div>
      <div class="form-row">
        <label for="email" class="form-label">Address email</label>
        <input type="email" id="email" name="email" class="form-input" required />
        <small class="form-alert">s'il vous plait veillez entrer votre address</small>
      </div>
      <div class="form-row">
        <label for="textarea" class="form-label">message</label>
        <textarea id="message" name="description" class="form-textarea"></textarea>
      </div>
      <input type="submit" name="add_sub" class="btn btn-block" value="Envoyer" id="save" />
    </form>
  </div>
</section>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>