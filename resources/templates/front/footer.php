<footer class="footer section">
  <div class="section-center footer-center">
    <p class="contact-footer">
      <i class="bx bx-phone-call"></i>
      contacter nous au <span>678102332</span>
    </p>
    <p>&copy; <span id="year"></span> WandaVin All rights reserved</p>
  </div>
</footer>
</body>
<!-- js for pages -->
<script type="module" src="./js/pages/cart.js"></script>
<script type="module" src="./js/pages/checkout.js"></script>
<script type="module" src="./js/pages/index.js"></script>
<script type="module" src="./js/pages/products.js"></script>
<script type="module" src="./js/pages/product.js"></script>
<script type="module" src="./js/pages/about.js"></script>
<!-- jquery ajax  -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>









<!-- jquery ajax code  -->






<script type="text/javascript">
  // search products from db
  $(document).ready(function() {
    $('#product_name').keyup(function(event) {
      event.preventDefault();
      var action = 'searchRecord';
      var product_name = $('#product_name').val();
      if (product_name != '') {
        $.ajax({
          url: "action_products.php",
          method: 'POST',
          data: {
            action: action,
            product_name: product_name
          },
          success: function(data) {
            $('#output').html(data);
          }
        });
      } else {
        var action = "fetchData";
        $.ajax({
          url: "action_products.php",
          method: "POST",
          data: {
            action: action
          },
          success: function(data) {
            $('#output').html(data);
          }
        })
      }
    });
  });
</script>
<!-- removed from products page -->



<!-- for product page -->

<script>
  $(document).ready(function() {
    filter_data();


    function filter_data() {
      $('.filter_data').html('<div id="loading" style="" ></div>');
      // var action = 'fetch_data';
      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var action = 'filter_price';

      // var id = <?php echo isset($id) ? $id : null; ?>;
      $.ajax({
        // url: "action_products.php?cat_id=" + id,
        url: "action_products.php",
        method: "POST",
        data: {
          action: action,
          minimum_price: minimum_price,
          maximum_price: maximum_price
        },
        success: function(data) {
          $('.filter_data').html(data);
        }
      });
    }
    $("#price_range").slider({
      range: true,
      min: 2000,
      max: 100000,
      values: [2000, 100000],
      step: 2000,
      stop: function(event, ui) {

        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
        $('#hidden_minimum_price').val(ui.values[0]);
        $('#hidden_maximum_price').val(ui.values[1]);
        filter_data();
      }
    });
  });
</script>

<!-- <script type="text/javascript">
  // fetch products from db
  $(document).ready(function fetchData() {
    var action = "fetchData";
    $.ajax({
      url: "action_products.php",
      method: "POST",
      data: {
        action: action
      },
      success: function(data) {
        $('#output').html(data);
      }
    })
  })
</script> -->



<!-- for category page -->
<script>
  $(document).ready(function() {
    filter_data_in_cat();


    function filter_data_in_cat() {
      $('.filter_data_in_cat').html('<div id="loading" style="" ></div>');
      // var action = 'fetch_data';
      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var action = 'filter_price_in_cat';
      <?php
      if (isset($_GET['cat_id'])) {
        $id = $_GET['cat_id'];
      }

      ?>
      var id = <?php echo $id ?>;
      $.ajax({
        url: "action_products.php?cat_id=" + id,
        // url: "action_products.php",
        method: "POST",
        data: {
          action: action,
          minimum_price: minimum_price,
          maximum_price: maximum_price
        },
        success: function(data) {
          $('.filter_data_in_cat').html(data);
        }
      });
    }
    $("#price_range_in_cat").slider({
      range: true,
      min: 2000,
      max: 100000,
      values: [2000, 100000],
      step: 2000,
      stop: function(event, ui) {

        $('#price_show_in_cat').html(ui.values[0] + ' - ' + ui.values[1]);
        $('#hidden_minimum_price').val(ui.values[0]);
        $('#hidden_maximum_price').val(ui.values[1]);
        filter_data_in_cat();
      }
    });
  });
</script>

</html>