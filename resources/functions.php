<?php

/******************** helper function *********************/
$upload_directory = "uploads";


function empty_cart_sessions() {
  foreach ($_SESSION as $name => $value) {
    if ($value > 0) {
      if (substr($name, 0, 8) == "product_") {
        $length = strlen($name) - 8;
        $id = escape_string(substr($name, 8, $length));
        unset($_SESSION['product_' . $id]);
      }
    }
  }
  unset($_SESSION['item_total']);
  unset($_SESSION['item_total_frais']);
}
function last_id() {
  global $connection;
  return mysqli_insert_id($connection);
}
function display_image($picture) {
  global $upload_directory;
  return $upload_directory . DS . $picture;
}

function set_message($msg) {
  if (!empty($msg)) {
    $_SESSION['message'] = $msg;
  } else {
    $msg = "";
  }
}
function display_message() {

  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']); // remove the message after the page is refresh
  }
}

// alert message
function set_alert($msg, $text) {
  if (!empty($msg)) {
    $_SESSION['alert_message'] = "<h4 style='text-align:center' class='alert alert-{$text}'>$msg</h4>";
  } else {
    $msg = "";
  }
}
function display_alert() {

  if (isset($_SESSION['alert_message'])) {
    echo $_SESSION['alert_message'];
    unset($_SESSION['alert_message']); // remove the message after the page is refresh
  }
}

function redirect($location) {
  header("Location:  $location");
}

function query($sql) {
  global $connection;
  return mysqli_query($connection, $sql);
}

function confirm($result) {
  global $connection;
  if (!$result) {
    die("QUERY FAILED " . mysqli_error($connection));
  }
}

function escape_string($string) {
  global $connection;

  return mysqli_real_escape_string($connection, $string);
}


/************************ FRONT END FUNCTIONS ***************************/

function get_featured_products() {

  $query = query("SELECT * FROM products WHERE product_status = 'Featured' AND product_quantity > 0");
  confirm($query);

  while ($row = mysqli_fetch_array($query)) {
    $id = $row['id'];
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    $product_image = display_image($row['product_image']);
    $product_short_desc = $row['product_short_desc'];
    echo
    "<article class='product'>
  <div class='product-container'>
    <img class='img product-img' src='../resources/{$product_image}' alt='' />
    <div class='product-icons'>
      <a href='product.php?id=$id' class='product-icon'>
        <i class='bx bx-search'></i>
      </a>
      <a href='action_cart.php?add=$id' class='product-icon'>
        <i class='bx bx-shopping-bag'></i>
      </a>
    </div>
  </div>
  <div class='product-desc'>
    <p class='product-desc-tile'>{$product_title}</p>
    <h4 class='product-desc-desc'>{$product_short_desc}</h4>
    <p class='product-desc-price'>{$product_price} FCFA</p>
  </div>
</article> ";
  }
}
function single_product() {
  if (isset($_GET['id'])) {
    $id = escape_string($_GET['id']);
    $query = query("SELECT * FROM products WHERE id = '$id'");
    confirm($query);

    while ($row = mysqli_fetch_array($query)) {
      $product_title = $row['product_title'];
      $product_price = $row['product_price'];
      $product_image = display_image($row['product_image']);
      $product_desc = $row['product_desc'];

      echo "
    <div class='btn-container-product'>
      <a class='back' href='./index.php'>
        <button class='btn'><i class='bx bx-home'></i></button>
      </a>
      <a class='menu' href='./products.php'>
        <button class='btn'>menu</button>
      </a>
    </div>
    <div class='single-product'>
      <img class='img' src='../resources/{$product_image}' alt='' />
      <div class='single-product-desc'>
        <h2>{$product_title}</h2>
        <p>{$product_price} FCFA</p>
        <p>
        {$product_desc}
        </p>
        <a href='./action_cart.php?add=$id' class='btn'>ajoutez au pannier</a>
      </div>
    </div>
    ";
    }
  }
}
function get_all_products() {
  $query = query("SELECT * FROM products WHERE product_quantity > 0");
  confirm($query);
  if ((mysqli_num_rows($query) < 1)) {
    echo "<h3 class='empty-place'> rupture de stock...</h3>";
  } else {
    while ($row = mysqli_fetch_array($query)) {
      $id = $row['id'];
      $product_title = $row['product_title'];
      $product_price = $row['product_price'];
      $product_short_desc = $row['product_short_desc'];
      $product_image = display_image($row['product_image']);


      echo "
    <article class='product'>
    <div class='product-container'>
      <img class='img product-img' src='../resources/{$product_image}' alt='' />
      <div class='product-icons'>
        <a href='product.php?id=$id' class='product-icon'>
          <i class='bx bx-search'></i>
        </a>
        <a href='action_cart.php?add=$id' class='product-icon'>
          <i class='bx bx-shopping-bag'></i>
        </a>
      </div>
    </div>
    <div class='product-desc'>
      <p class='product-desc-tile'>{$product_title}</p>
      <h4 class='product-desc-desc'>{$product_short_desc}</h4>
      <p class='product-desc-price'>{$product_price} FCFA</p>
    </div>
  </article>  
    ";
    }
  }
}


function get_categories() {
  $query = query("SELECT * FROM categories");
  confirm($query);

  echo "<a href='products.php' class='category-btn'>liste complete</a>";
  while ($row = mysqli_fetch_array($query)) {
    $id = $row['id'];
    $cat_title = $row['cat_title'];
    echo "<a href='category.php?cat_id=$id' class='category-btn'>$cat_title</a>";
  }
}

// not used anymore replaced by filter_price_in_cat
function get_cat_products() {
  if (isset($_GET['cat_id'])) {
    $cat_id = escape_string($_GET['cat_id']);
    $query = query("SELECT * FROM products WHERE product_category_id = $cat_id AND product_quantity > 0");
    confirm($query);
    if ((mysqli_num_rows($query) < 1)) {
      echo "<h3 class='empty-place'>cette category est en rupture de stock...</h3>";
    } else {
      while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_image = display_image($row['product_image']);

        $product_short_desc = $row['product_short_desc'];

        echo "
        <article class='product'>
        <div class='product-container'>
          <img class='img product-img' src='../resources/{$product_image}' alt='' />
          <div class='product-icons'>
            <a href='product.php?id=$id' class='product-icon'>
              <i class='bx bx-search'></i>
            </a>
            <a href='action_cart.php?add=$id' class='product-icon'>
              <i class='bx bx-shopping-bag'></i>
            </a>
          </div>
        </div>
        <div class='product-desc'>
          <p class='product-desc-tile'>{$product_title}</p>
          <h4 class='product-desc-desc'>{$product_short_desc}</h4>
          <p class='product-desc-price'>{$product_price} FCFA</p>
        </div>
      </article>  
        ";
      }
    }
  }
}
function search_products() {
  if (!empty($_POST['product_name'])) {

    $query = query("SELECT * FROM products WHERE product_title LIKE '%" . $_POST['product_name'] . "%'" . "AND product_quantity > 0");
    confirm($query);
    if ((mysqli_num_rows($query) < 1)) {
      echo "<h3 class='empty-place'> produits introuvable </h3>";
    } else {
      while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_image = display_image($row['product_image']);

        $product_short_desc = $row['product_short_desc'];

        echo "
    <article class='product'>
    <div class='product-container'>
      <img class='img product-img' src='../resources/{$product_image}' alt='' />
      <div class='product-icons'>
        <a href='product.php?id=$id' class='product-icon'>
          <i class='bx bx-search'></i>
        </a>
        <a href='action_cart.php?add=$id' class='product-icon'>
          <i class='bx bx-shopping-bag'></i>
        </a>
      </div>
    </div>
    <div class='product-desc'>
      <p class='product-desc-tile'>$product_title</p>
      <h4 class='product-desc-desc'>$product_short_desc</h4>
      <p class='product-desc-price'>$product_price FCFA</p>
    </div>
  </article>  
    ";
      }
    }
  }
}
function filter_price() {
  $query = query("SELECT * FROM products WHERE product_quantity > 0");
  confirm($query);
  if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
    $query =  query("SELECT * FROM products WHERE product_price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'" . "AND product_quantity > 0");
  }
  if ((mysqli_num_rows($query) < 1)) {
    echo "<h3 class='empty-place'> aucun resultat...</h3>";
  } else {
    while ($row = mysqli_fetch_array($query)) {
      $id = $row['id'];
      $product_title = $row['product_title'];
      $product_price = $row['product_price'];
      $product_image = display_image($row['product_image']);

      $product_short_desc = $row['product_short_desc'];

      echo "
    <article class='product'>
    <div class='product-container'>
      <img class='img product-img' src='../resources/{$product_image}' alt='' />
      <div class='product-icons'>
        <a href='product.php?id=$id' class='product-icon'>
          <i class='bx bx-search'></i>
        </a>
        <a href='action_cart.php?add=$id' class='product-icon'>
          <i class='bx bx-shopping-bag'></i>
        </a>
      </div>
    </div>
    <div class='product-desc'>
      <p class='product-desc-tile'>{$product_title}</p>
      <h4 class='product-desc-desc'>{$product_short_desc}</h4>
      <p class='product-desc-price'>{$product_price} FCFA</p>
    </div>
  </article>  
    ";
    }
  }
}
function filter_price_in_cat($cat_id) {
  $query = query("SELECT * FROM products WHERE product_category_id = $cat_id AND product_quantity > 0");
  confirm($query);
  if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
    $query =  query("SELECT * FROM products WHERE product_price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'" . "AND product_quantity > 0");
  }
  if ((mysqli_num_rows($query) < 1)) {
    echo "<h3 class='empty-place'> aucun resultat...</h3>";
  } else {
    while ($row = mysqli_fetch_array($query)) {
      $id = $row['id'];
      $product_title = $row['product_title'];
      $product_price = $row['product_price'];
      $product_image = display_image($row['product_image']);

      $product_short_desc = $row['product_short_desc'];

      echo "
    <article class='product'>
    <div class='product-container'>
      <img class='img product-img' src='../resources/{$product_image}' alt='' />
      <div class='product-icons'>
        <a href='product.php?id=$id' class='product-icon'>
          <i class='bx bx-search'></i>
        </a>
        <a href='action_cart.php?add=$id' class='product-icon'>
          <i class='bx bx-shopping-bag'></i>
        </a>
      </div>
    </div>
    <div class='product-desc'>
    <p class='product-desc-tile'>{$product_title}</p>
    <h4 class='product-desc-desc'>{$product_short_desc}</h4>
    <p class='product-desc-price'>{$product_price} FCFA</p>
    </div>
  </article>  
    ";
    }
  }
}
// function filter_price() {
//   $query = query("SELECT * FROM products");
//   confirm($query);
//   if ((mysqli_num_rows($query) < 1)) {
//   }
// }
// cart section //////////
function cart() {
  $_SESSION['frais'] = 2000;
  $total = 0;
  $item_quantity = 0;
  foreach ($_SESSION as $name => $value) {
    if ($value > 0) {
      if (substr($name, 0, 8) == "product_") {
        $length = strlen($name) - 8;

        $id = escape_string(substr($name, 8, $length));


        $query = query("SELECT * FROM products WHERE id = $id ");
        confirm($query);
        while ($row = mysqli_fetch_array($query)) {
          $id = $row['id'];
          $product_title = $row['product_title'];
          $product_price = $row['product_price'];
          $product_image = display_image($row['product_image']);

          $sub = $product_price * $value;
          $item_quantity += $value;

          echo "
      
      <tr class='cart-content'>
            <td class='cart-img-container'>
              <img class='img cart-img' src='../resources/{$product_image}' alt='' />
              <div class='cart-desc'>
                <h4 class='cart-title'>$product_title</h4>
                <h4 class='cart-price'>$product_price FCFA</h4>
              </div>
            </td>
            <td style='padding-left: 1rem;'>$value</td>
            <td style='font-weight: bold;'class='cart-total'>$sub FCFA</td>
            <td>
              <a href='action_cart.php?add=$id' class='cart-add-btn'>
                <i class='bx bx-plus'></i>
              </a>
              <a href='action_cart.php?reduce=$id' class='cart-reduce-btn'>
                <i class='bx bx-minus'></i>
              </a>
              <a href='action_cart.php?delete=$id' class='cart-delete-btn'>
                <i class='bx bxs-trash-alt'></i>
              </a>
            </td>
          </tr>
      
      
      ";
          $_SESSION['item_total'] = $total += $sub;
          $_SESSION['item_total_frais'] = $_SESSION['item_total'] + $_SESSION['frais'];
        }
      }
    }
  }
  // quantity of all products in cart
  $_SESSION['item_quantity'] = $item_quantity;
  isset($_SESSION['item_total_frais']) ? $_SESSION['item_total_frais'] : $_SESSION['item_total_frais'] = 0;
  isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = 0;
}


function count_cart() {
  $count = 0;
  foreach ($_SESSION as $name => $value) {

    if ($value > 0) {
      if (substr($name, 0, 8) == "product_") {
        $length = strlen($name) - 8;

        $id = escape_string(substr($name, 8, $length));


        $query = query("SELECT * FROM products WHERE id = $id");
        confirm($query);
        while ($row = mysqli_fetch_array($query)) {
          $count++;
        }
        if ($count >= 1) {
          echo " <span class='cart-item-count'>$count</span>";
        }
      }
    }
  }
}
function checkout() {
  if (isset($_POST['checkout'])) {
    $customer_name = escape_string($_POST['customer_name']);
    $customer_email = escape_string($_POST['customer_email']);
    $customer_tel = escape_string($_POST['customer_tel']);
    $order_amount = escape_string($_SESSION['item_total_frais']);
    // 
    $_SESSION['customer_name'] = $customer_name;
    $total = 0;
    $item_quantity = 0;
    $date = date("d-m-Y");
    $time = date("H:i:s");


    $query = query("INSERT INTO orders(order_amount, customer_name, customer_email, customer_tel, order_date, order_time) 
    VALUES( '{$order_amount}', '{$customer_name}', '{$customer_email}', '{$customer_tel}', '{$date}', '{$time}')");

    $last_id = last_id();

    confirm($query);

    foreach ($_SESSION as $name => $value) {
      if ($value > 0) {
        if (substr($name, 0, 8) == "product_") {
          $length = strlen($name) - 8;

          $id = escape_string(substr($name, 8, $length));


          $query = query("SELECT * FROM products WHERE id = $id");
          confirm($query);
          while ($row = mysqli_fetch_array($query)) {

            $sub = $row['product_price'] * $value;
            $item_quantity += $value;
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];

            $insert_report = query("INSERT INTO reports (product_image, product_id, order_id, product_title, product_price, product_quantity) VALUES ('{$product_image}', '{$id}', '{$last_id}', '{$product_title}', '{$product_price}', '{$value}')");
            confirm($insert_report);
          }
        }
      }
    }
    set_alert("$customer_name votre commande a été effectuée avec succès", "success");
    redirect("checkout.php");
  }
}

function display_report_in_checkout() {
  $_SESSION['frais'] = 2000;
  $total = 0;
  $item_quantity = 0;
  foreach ($_SESSION as $name => $value) {
    if ($value > 0) {
      if (substr($name, 0, 8) == "product_") {
        $length = strlen($name) - 8;

        $id = escape_string(substr($name, 8, $length));


        $query = query("SELECT * FROM products WHERE id = $id ");
        confirm($query);
        while ($row = mysqli_fetch_array($query)) {
          $id = $row['id'];
          $product_title = $row['product_title'];
          $product_price = $row['product_price'];
          $product_image = display_image($row['product_image']);

          $sub = $product_price * $value;
          $item_quantity += $value;

          echo "
      
      <tr class='cart-content'>
            <td class='cart-img-container'>
              <img class='img cart-img' src='../resources/{$product_image}' alt='' />
              <div class='cart-desc'>
                <h4 class='cart-title'>$product_title</h4>
                <h4 class='cart-price'>$product_price FCFA</h4>
              </div>
            </td>
            <td style='padding-left: 1rem;'>$value</td>
            <td style='font-weight: bold;'class='cart-total'>$sub FCFA</td>
           
          </tr>
      
      
      ";
          // $_SESSION['item_total'] = $total += $sub;
          // $_SESSION['item_total_frais'] = $_SESSION['item_total'] + $_SESSION['frais'];
        }
      }
    }
  }
}

// function process_transaction() {

//   if (isset($_GET['tx'])) {
//     $amount = $_GET['amt'];
//     $currency = $_GET['cc'];
//     $transaction = $_GET['tx'];
//     $status = $_GET['st'];
//     $total = 0;
//     $item_quantity = 0;




//     $send_order = query("INSERT INTO orders (order_amount, order_transaction,
//   order_currency, order_status) VALUES ('{$amount}', '{$transaction}', '{$currency}','{$status}') ");

//     $last_id = last_id();

//     confirm($send_order);





//     foreach ($_SESSION as $name => $value) {
//       if ($value > 0) {
//         if (substr($name, 0, 8) == "product_") {
//           $length = strlen($name) - 8;

//           $id = escape_string(substr($name, 8, $length));


//           $query = query("SELECT * FROM products WHERE product_id = $id");
//           confirm($query);
//           while ($row = mysqli_fetch_array($query)) {

//             $sub = $row['product_price'] * $value;
//             $item_quantity += $value;
//             $product_title = $row['product_title'];
//             $product_price = $row['product_price'];

//             $insert_report = query("INSERT INTO reports (product_id,  order_id, product_title, product_price, product_quantity) VALUES ('{$id}', '{$last_id}', '{$product_title}', '{$product_price}', '{$value}')");
//             confirm($insert_report);
//           }
//           $total = $total += $sub;
//           $item_quantity;
//         }
//       }
//     }
//     // session_destroy();

//   } else {
//     redirect("index.php");
//   }
// }

/********  subcriber section */


function add_subscriber() {

  $name = $_POST['name'];
  $message = $_POST['description'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $date = date("d-m-Y H:i:s");  // date d'insertion

  //insert into database
  $select = query("SELECT * FROM subscribers WHERE email = '{$email}'");

  if (mysqli_num_rows($select) > 0) {
    if (!empty($message)) {
      while ($row = mysqli_fetch_array($select)) {
        $sub_id = $row['id'];
      }

      $message = query("INSERT INTO messages (sub_id, message, date) VALUES ('{$sub_id}', '{$message}', '{$date}')");
      confirm($message);
      echo "<h4 class='alert alert-success'>votre message a ete envoye avec success</h4>";
    } else {
      echo "<h4 class='alert alert-danger'>Veuillez saisir un message</h4>";
    }
  } else {
    if (!empty($name) && !empty($email) && !empty($tel)) {

      $query = query("INSERT INTO subscribers(name, tel, email , date) VALUES('{$name}', '{$tel}', '{$email}', '{$date}')");
      confirm($query);
      $last_id = last_id();
      if (!empty($message)) {
        $mssg = query("INSERT INTO messages (sub_id, message, date) VALUES ('{$last_id}', '{$message}', '{$date}')");
        confirm($mssg);
        echo "<h4 class='alert alert-success'>subscription et message effectuées avec succès</h4>";
      } else {
        echo "<h4 class='alert alert-success'>subscription effectuées avec succès</h4>";
      }
    } else {
      echo "<h4 class='alert alert-danger'>Veillez entrer votre nom , numero de telephone et email enfin de subscrire </h4>";
    }
  }
}










/************************ BACK END FUNCTIONS ***************************/


function login_user() {

  if (isset($_POST['login'])) {
    // echo 'ok';
    $user_email =  escape_string($_POST['user_email']);
    $user_password =  escape_string($_POST['user_password']);

    $query = query("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'");
    confirm($query);
    while ($row = mysqli_fetch_array($query)) {
      $user_name = $row['user_name'];
      $user_photo = $row['user_photo'];
    }
    if (mysqli_num_rows($query) == 0) {

      set_alert("Your Password or email are wrong", "danger");
      redirect("index.php");
    } else {
      $_SESSION['admin_name'] =  $user_name;
      $_SESSION['admin_photo'] =  $user_photo;
      redirect("admin.php");
    }
  }
}



function show_product_category_title($product_category_id) {
  $query = query("SELECT * FROM categories WHERE id = " . escape_string($product_category_id) . " ");
  confirm($query);

  while ($row = mysqli_fetch_array($query)) {
    return $row['cat_title'];
  }
}

function show_categories_add_product() {
  $query = query("SELECT * FROM categories");

  confirm($query);
  while ($row = mysqli_fetch_array($query)) {

    echo "<option value='{$row['id']}'>{$row['cat_title']}</option>";
  }
}


/**************  products page ***********/
function display_admin_products() {
  $query = query("SELECT * FROM products");
  confirm($query);
  if ((mysqli_num_rows($query) < 1)) {
    echo "<h3 class='empty-place'> rupture de stock...</h3>";
  } else {
    while ($row = mysqli_fetch_array($query)) {
      // $category =  show_product_category_title($row['product_category_id']);
      $product_image = display_image($row['product_image']);

      $id = $row['id'];
      $product_title = $row['product_title'];
      $product_price = $row['product_price'];
      $product_quantity = $row['product_quantity'];
      $product_category = show_product_category_title($id);
      echo "
    <tr>
      <td>$id</td>
      <td class='product-title'>
        $product_title
        <img class='tab-img' src='../../resources/{$product_image}' alt=''>
      </td>
      <td>$product_quantity</td>
      <td>{$product_price}FCFA</td>
      <td>$product_category</td>
      <td class='action'>
        <a class='danger' href='../../resources/templates/back/delete_product.php?id={$row['id']}'><span class='material-icons-sharp'>delete</span></a>
        <a class='success' href='admin.php?edit_products&id={$row['id']}'> <span class='material-icons-sharp'>edit</span></a>
      </td>
    </tr>
      
      
      ";
    }
  }
}

/* ajax alternative */
function fetch_products() {
  $query = query("SELECT * FROM products ORDER BY id DESC");
  confirm($query);

  $data = array();



  if (mysqli_num_rows($query) > 0) {

    while ($row = mysqli_fetch_array($query)) {
      $data2 = array();
      $img = display_image($row['product_image']);
      $category = show_product_category_title($row['product_category_id']);
      $data2[] = $img;
      $data2[] =  $category;


      $data2[] = $row;
      $data[] = $data2;
    }
  }


  echo json_encode($data);
}

function add_product() {
  if (isset($_POST['publish'])) {
    $product_title = escape_string($_POST['product_title']);
    $product_category_id = escape_string($_POST['product_category_id']);
    $product_price = escape_string($_POST['product_price']);
    $product_desc = escape_string($_POST['product_desc']);
    $product_short_desc = escape_string($_POST['product_short_desc']);
    $product_quantity = escape_string($_POST['product_quantity']);
    $product_status = escape_string($_POST['product_status']);
    $product_image = ($_FILES['file']['name']);
    $image_temp_location = ($_FILES['file']['tmp_name']);

    move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

    $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_desc, product_short_desc, product_quantity, product_image, product_status) 
    VALUES('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_desc}', '{$product_short_desc}', '{$product_quantity}', '{$product_image}' , '{$product_status}')");
    confirm($query);

    $last_id = last_id();
    $msg = "New Product with id {$last_id} was Added";
    set_alert($msg, "success");

    // redirect("admin.php?add_products");
  }
}
function update_product() {

  if (isset($_POST['update'])) {
    // echo "ok";
    if (isset($_POST['update'])) {
      $product_title = escape_string($_POST['product_title']);
      $product_category_id = escape_string($_POST['product_category_id']);
      $product_price = escape_string($_POST['product_price']);
      $product_desc = escape_string($_POST['product_desc']);
      $product_short_desc = escape_string($_POST['product_short_desc']);;
      $product_status = escape_string($_POST['product_status']);
      $product_quantity = escape_string($_POST['product_quantity']);
      $product_image = ($_FILES['file']['name']);
      $image_temp_location = ($_FILES['file']['tmp_name']);

      if (!empty($product_image)) {
        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);
        $query = query("UPDATE products SET product_title = '{$product_title}', product_category_id = '{$product_category_id}', product_price = '{$product_price}', product_desc = '{$product_desc}', product_short_desc = '{$product_short_desc}', product_quantity = '{$product_quantity}', product_image = '{$product_image}' , product_status = '{$product_status}' WHERE id = " . escape_string($_GET['id']) . " ");
      } else {
        $get_pic = query("SELECT product_image FROM products WHERE id = " . escape_string($_GET['id']) . " ");
        confirm($get_pic);
        while ($pic = mysqli_fetch_array($get_pic)) {
          $product_image = $pic['product_image'];
        }
        $query = query("UPDATE products SET product_title = '{$product_title}', product_category_id = '{$product_category_id}', product_price = '{$product_price}', product_desc = '{$product_desc}', product_short_desc = '{$product_short_desc}', product_quantity = '{$product_quantity}' , product_status = '{$product_status}' WHERE id = " . escape_string($_GET['id']) . " ");
      }

      confirm($query);
      $msg = "Product {$_GET['id']} has been Updated successfully";
      set_alert($msg, "success");
      // redirect("admin.php?products");
    }
  }
}



function checkBoxes_operation() {

  if (isset($_POST['submit'])) {
    if (isset($_POST['checkBoxArray'])) {
      foreach ($_POST['checkBoxArray'] as $checkBoxValue) {

        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
          case 'featured':
            $query = query("UPDATE products SET product_status = '{$bulk_options}' WHERE id = {$checkBoxValue}");
            confirm($query);
            set_alert("modified with success", "success");
            break;
          case 'no status':
            $query = query("UPDATE products SET product_status = '{$bulk_options}' WHERE id = {$checkBoxValue}");
            confirm($query);
            set_alert("modify with success", "success");
            break;
          case 'delete':
            $query = query("DELETE FROM products WHERE id = {$checkBoxValue}");
            confirm($query);
            set_alert("deleted with success", "danger");
            break;
        }
      }
    }
  }
}




/***********  category page *******/
function display_categories_admin() {
  $category_query = query("SELECT * FROM categories");
  confirm($category_query);
  while ($row = mysqli_fetch_array($category_query)) {
    $category_title = $row['cat_title'];
    $id = $row['id'];
    echo " 
    <tr class='row1'>
    <td>{$id}</td>
      <td>{$category_title}</td>
    <td class='action'>
     <a class='danger' href='../../resources/templates/back/delete_category.php?id=${id}'><span class='material-icons-sharp'>delete</span></a>
    </td>
   </tr>
    ";
  }
}


function add_category() {
  if (isset($_POST['add_category'])) {
    $cat_title = escape_string($_POST['cat_title']);
    if (empty($cat_title)) {
      $msg = "Please enter a category";
      set_alert($msg, "danger");
    } else {
      $query = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
      confirm($query);
      $msg = "Category {$cat_title} has been Added successfully";
      set_alert($msg, "success");
    }

    // redirect("admin.php?categories");
  }
}
/************** Orders page **************/

function display_orders() {
  $query = query("SELECT * FROM orders ORDER BY id DESC");
  confirm($query);
  while ($row = mysqli_fetch_array($query)) {
    $id = $row['id'];
    $order_amount = $row['order_amount'];
    $order_status = $row['order_status'];

    $order_date = $row['order_date'];
    $order_time = $row['order_time'];
    if ($order_status == 'pending') {
      $icon = '<i class="material-icons-sharp">access_time</i>';
    } else {
      $icon = '<i class="material-icons-sharp">done</i>';
    }

    echo "
    <tr>
    <td>$id</td>
    <td class='order-amount'>
    $order_amount FCFA
    </td>
    <td>$order_status</td>
    <td>$order_date  $order_time</td>
    <td class='order-details'>
    <a href='admin.php?reports&id={$row['id']}'>
    <i class='fa-solid fa-eye'></i>
    </a>
    </td>
    <td class='action'>
      <a class='danger' href='../../resources/templates/back/delete_order.php?id={$row['id']}'><span class='material-icons-sharp'>delete</span></a>
      <a class='success' href='../../resources/templates/back/complete_order.php?id={$row['id']}'>$icon</a>
    </td>
  </tr>
    ";
  }
}

function display_orders_pending() {
  $query = query("SELECT * FROM orders WHERE order_status = 'pending' ORDER BY id DESC LIMIT 10");
  confirm($query);
  echo "<h2>Recent Pending Orders</h2>";
  if (mysqli_num_rows($query) > 0) {
    echo "
  <table>
   <thead>
    <tr>
     <th>Id</th>
     <th>Amount</th>
     <th>Status</th>
     <th>Date</th>
     <th>Details</th>
    </tr>
   </thead>
   <tbody> ";
    while ($row = mysqli_fetch_array($query)) {
      $id = $row['id'];
      $order_amount = $row['order_amount'];
      $order_status = $row['order_status'];

      $order_date = $row['order_date'];
      $order_time = $row['order_time'];

      echo "
    <tr>
    <td>$id</td>
    <td class='order-amount'>
    $order_amount FCFA
    </td>
    <td>$order_status</td>
    <td>$order_date  $order_time</td>
    <td class='order-details'>
    <a href='admin.php?reports&id={$row['id']}'>
    <i class='fa-solid fa-eye'></i>
    </a>
    </td>
    <td class='action'>
      <a class='danger' href='../../resources/templates/back/delete_order.php?id={$row['id']}'><span class='material-icons-sharp'>delete</span></a>
      <a class='success' href='../../resources/templates/back/complete_order.php?id={$row['id']}'><i class='material-icons-sharp'>access_time</i></a>
    </td>
  </tr>
    ";
    }
    echo "
   </tbody>
  </table>
  ";
  } else {
    echo "
    <h2 class='no-pending'>No Recent Orders</h2>
    ";
  }
}
function fetch_orders() {
  $query = query("SELECT * FROM orders ORDER BY id DESC");
  confirm($query);

  $data = array();

  if (mysqli_num_rows($query) > 0) {

    while ($row = mysqli_fetch_array($query)) {

      $data[] = $row;
    }
  }

  echo json_encode($data);
}

function display_order_customer_info() {
  $query = query("SELECT * FROM orders WHERE id = " . escape_string($_GET['id']) . " ");
  confirm($query);
  while ($row = mysqli_fetch_array($query)) {

    $customer_name = $row['customer_name'];
    $customer_email = $row['customer_email'];
    $customer_tel = $row['customer_tel'];
    echo "
    <tr>
    <td>$customer_name</td>
    <td>$customer_tel</td>
    <td>$customer_email</td>
    </tr>
    ";
  }
}


/****************** report page  **************/

function display_reports() {
  $query = query("SELECT * FROM reports WHERE order_id = " . escape_string($_GET['id']) . " " . "ORDER BY id DESC");
  confirm($query);
  while ($row = mysqli_fetch_array($query)) {
    $id = $row['id'];
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];
    $product_image = display_image($row['product_image']);

    echo "
    <tr>
    <td>$id</td>
    <td>$product_id</td>
    <td class='product-title'>
        $product_title
        <img class='tab-img' src='../../resources/{$product_image}' alt=''>
    </td>
    <td>$product_price</td>
    <td>$product_quantity</td>
    </tr>
    ";
  }
}


/******user page ************/

function  display_admin_users() {
  $query = query("SELECT * FROM users");
  confirm($query);

  while ($row = mysqli_fetch_array($query)) {

    $user_photo = display_image($row['user_photo']);

    $user_id = $row['user_id'];
    $user_name = $row['user_name'];

    $user_email = $row['user_email'];

    echo "
    <tr>
      <td>$user_id</td>
      <td>$user_name</td>
      <td>$user_email</td>
      <td>
        <img class='tab-img' src='../../resources/{$user_photo}' alt=''>
      </td>
      <td class='action'>
        <a class='danger' href='../../resources/templates/back/delete_user.php?id={$row['user_id']}'><span class='material-icons-sharp'>delete</span></a>
        <a class='success' href='admin.php?edit_user&id={$row['user_id']}'> <span class='material-icons-sharp'>edit</span></a>
      </td>
    </tr>
      
      
      ";
  }
}


function add_user() {
  if (isset($_POST['add_user'])) {
    $user_name = escape_string($_POST['user_name']);
    $user_email = escape_string($_POST['user_email']);
    echo $user_email;
    $user_password = escape_string($_POST['user_password']);
    $user_photo = $_FILES['file']['name'];
    $user_photo_tmp = $_FILES['file']['tmp_name'];

    // hide password in db
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    move_uploaded_file($user_photo_tmp, UPLOAD_DIRECTORY . DS . $user_photo);

    $query = query("INSERT INTO users(user_name, user_email, user_password, user_photo) VALUES('{$user_name}', '{$user_email}', '{$user_password}', '{$user_photo}')");
    confirm($query);

    set_alert("User Added", "success");

    redirect("../../public/admin/admin.php?user_admin");
  }
}


function edit_user() {
  if (isset($_POST['edit_user'])) {
    $user_name = escape_string($_POST['user_name']);
    $user_email = escape_string($_POST['user_email']);
    $user_password = escape_string($_POST['user_password']);
    $user_photo = $_FILES['file']['name'];
    $user_photo_tmp = $_FILES['file']['tmp_name'];
    
    // hide password in db
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));


    // check if photo is uploaded
    if (!empty($user_photo)) {
      move_uploaded_file($user_photo_tmp, UPLOAD_DIRECTORY . DS . $user_photo);
      $query = query("UPDATE users SET user_name = '{$user_name}', user_email = '{$user_email}', user_password = '{$user_password}', user_photo = '{$user_photo}' WHERE user_id = " . escape_string($_GET['id']) . " ");
      confirm($query);
    } else {
      $query = query("UPDATE users SET user_name = '{$user_name}', user_email = '{$user_email}', user_password = '{$user_password}' WHERE user_id = " . escape_string($_GET['id']) . " ");
      confirm($query);
    }


    set_alert("User Updated", "success");
  }
}


/***** subcriber page   *************/

function display_subscribers() {
  $query = query("SELECT * FROM subscribers ORDER BY id DESC");
  confirm($query);
  echo "<h2>Subscribers</h2>";

  if (mysqli_num_rows($query) > 0) {
    echo "
  <table>
   <thead>
    <tr>
     <th>Id</th>
     <th>Name</th>
     <th>Tel</th>
     <th>Email</th>
     <th>Date</th>
    </tr>
   </thead>
   <tbody> ";
    while ($row = mysqli_fetch_array($query)) {
      $id = $row['id'];
      $email = $row['email'];
      $tel = $row['tel'];
      $date = $row['date'];
      $name = $row['name'];
      // $description = $row['description'];

      echo "
    <tr>
    <td>$id</td>
    <td>$name</td>
    <td>$tel</td>
    <td>$email</td>
    <td>$date</td>
    <td class='action'>
      <a class='danger' href='../../resources/templates/back/delete_subscriber.php?id={$row['id']}'><span class='material-icons-sharp'>delete</span></a>
    </td>
  </tr>
    ";
    }
    echo "
   </tbody>
  </table>
  ";
  } else {
    echo "
    <h2 class='no-subscriber'>No Subscriber</h2>
    ";
  }
}

/**** messages page  *************/


function display_messages() {

  $query = query("SELECT * FROM messages ORDER BY id DESC");
  confirm($query);
  while ($row = mysqli_fetch_array($query)) {
    $id_mssg = $row['id'];
    $sub_id = $row['sub_id'];
    $date = $row['date'];
    $status = $row['status'];
    if ($status == 'non lu') {
      $mssg_status = '<td class="alert-danger">non lu</td>';
    } else {
      $mssg_status = '<td class="alert-success">lu</td>';
    }
    $subscriber = query("SELECT * FROM subscribers WHERE id = $sub_id");
    confirm($subscriber);
    while ($row = mysqli_fetch_array($subscriber)) {
      $tel = $row['tel'];
      $email = $row['email'];
      $name = $row['name'];

      echo "
      <tr>
        <td>$id_mssg</td>
        <td>$date</td>
        <td>$email</td>
        <td>$tel</td>
        <td>$name</td>
        $mssg_status
        <td class='message-details'>
        <a href='admin.php?message_details&id={$id_mssg}'>
        <i class='fa-solid fa-eye'></i>
        </a>
      
        <td class='action'>
          <a class='danger' href='../../resources/templates/back/delete_message.php?id={$id_mssg}'><span class='material-icons-sharp'>delete</span></a>
        </td>
      </tr>
      ";
    }
  }
}

function display_message_details() {
  if ($_GET['id']) {
    $query = query("SELECT * FROM messages WHERE id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    $update_status = query("UPDATE messages SET status = 'lu' WHERE id = " . escape_string($_GET['id']) . " ");
    confirm($update_status);

    while ($row = mysqli_fetch_array($query)) {
      $message = $row['message'];
      $date = $row['date'];

      echo "
      
      <div>
  
          <p>Date : $date </p>
        
          <p>
          $message
          </p>

      </div>
      
      
      
      
      
      
      
      
      
      ";
    }
  }
}

function count_unread_messages() {


  $query = query("SELECT * FROM messages WHERE status = 'non lu'");
  confirm($query);
  $num_rows = mysqli_num_rows($query);
  if ($num_rows > 0) {

    echo "
    
    <span class='message-count'>$num_rows</span>
    ";
  }
}
