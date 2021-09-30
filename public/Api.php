<?php
define('DB_USERNAME', 'demo9tbi_utkarsh');
define('DB_PASSWORD', 'utkarsh');
define('DB_HOST', 'localhost');
define('DB_NAME', 'demo9tbi_utkarsh');

header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

if (function_exists($action)) {
    $action();
}

function conn(){
  $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check for database connection error
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // returing connection resource
    return $conn;
}

function login(){
    $email = $_GET['email'];
    $password = $_GET['password'];

    $bycryptPass = md5($password);

    $sql = "select * from users where email='$email' and password='$bycryptPass'";
    $result = mysqli_query(conn(), $sql);

    $user = array();
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);

        $user = $row;

        die(json_encode(array("error"=>false,"user"=>$user)));
    }else{
        die(json_encode(array("error"=>true,"message"=>"You have entered a wrong username and password. Please enter the correct one.")));
    }
}

function register(){
    $name = $_GET['name'];
    $email = $_GET['email'];
    $mobile = $_GET['mobile'];
    $password = $_GET['password'];

    $bycryptPass = md5($password);

    $sql = "insert into users
            (name, email, password, mobile)
            values
            ('$name', '$email', '$bycryptPass', '$mobile')";
    $result = mysqli_query(conn(), $sql);

    if ($result) {
        die(json_encode(array("error"=>false,"message"=>"Your account has been registered successfully. Please login to continue")));
    }else{
        die(json_encode(array("error"=>true,"message"=>"Failed to create account. Please try again")));
    }
}

function fetch_categories(){
    $category_image_base_url = "http://utkarshelectricals.in/public/categories/";

    $categories = array();

    $sql = "select * from categories where is_active=1 and is_deleted=0";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $category_image_base_url.$row['image'];
            array_push($categories, $row);
        }
    }

    die(json_encode(array("error"=>false,"categories"=>$categories)));
}

function fetch_home_data(){
    $category_image_base_url = "http://utkarshelectricals.in/public/categories/";
    $product_image_base_url = "http://utkarshelectricals.in/public/books/";
    $banner_image_base_url = "http://utkarshelectricals.in/public/banners/";

    $banners = array();
    $categories = array();
    $flash_products = array();
    $trending_products = array();

    $sql = "select * from banners where is_active=1 and is_deleted=0";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $banner_image_base_url.$row['image'];
            array_push($banners, $row);
        }
    }

    $sql = "select * from categories where is_active=1 and is_deleted=0";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $category_image_base_url.$row['image'];
            array_push($categories, $row);
        }
    }

    $sql = "select * from products where is_active=1 and is_deleted=0 and is_today_deal=1";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $product_image_base_url.$row['image'];
            array_push($flash_products, $row);
        }
    }

    $sql = "select * from products where is_active=1 and is_deleted=0 and is_new=1";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $product_image_base_url.$row['image'];
            array_push($trending_products, $row);
        }
    }

    die(json_encode(array("error"=>false,"banners"=>$banners,"categories"=>$categories,"flash_products"=>$flash_products,"trending_products"=>$trending_products)));
}

function fetch_products(){
    $category_image_base_url = "http://utkarshelectricals.in/public/categories/";
    $product_image_base_url = "http://utkarshelectricals.in/public/books/";

    $categories = array();
    $products = array();

    $sql = "select * from categories where is_active=1 and is_deleted=0";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $category_image_base_url.$row['image'];
            array_push($categories, $row);
        }
    }

    $sql = "select * from products where is_active=1 and is_deleted=0";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $product_image_base_url.$row['image'];
            array_push($products, $row);
        }
    }

    die(json_encode(array("error"=>false,"categories"=>$categories,"products"=>$products)));
}

function fetch_category_wise_products(){
    $category_id = $_GET['category_id'];

    $product_image_base_url = "http://utkarshelectricals.in/public/books/";

    $products = array();

    $sql = "select * from products where is_active=1 and is_deleted=0 and category_id='$category_id'";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $product_image_base_url.$row['image'];
            array_push($products, $row);
        }
    }

    die(json_encode(array("error"=>false,"products"=>$products)));
}

function fetch_product_details(){
    $product_id = $_GET['product_id'];
    $product_image_base_url = "http://utkarshelectricals.in/public/books/";

    $product = array();

    $sql = "select * from products where id=$product_id";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $row['image'] = $product_image_base_url.$row['image'];
        $product = $row;
    }

    die(json_encode(array("error"=>false,"product"=>$product)));
}

function add_to_cart(){
    $device_id = $_GET['device_id'];
    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];
    $product_code = $_GET['product_code'];
    $product_image = $_GET['product_image'];
    $quantity = $_GET['quantity'];
    $price = $_GET['price'];

    $sql = "insert into carts
            (mac, product_id, product_name, product_code, product_image, quantity, price, is_active)
            values
            ('$device_id', '$product_id', '$product_name', '$product_code', '$product_image', '$quantity', '$price', '1')";
    $result = mysqli_query(conn(), $sql);

    if ($result) {
        die(json_encode(array("error"=>false,"message"=>"This item has been successfully added to your cart")));
    }else{
        die(json_encode(array("error"=>true,"message"=>"Failed to add item")));
    }
}

function update_cart_item(){
    $id = $_GET['id'];
    $quantity = $_GET['quantity'];

    $sql = "update carts set quantity='$quantity' where id='$id'";

    $result = mysqli_query(conn(), $sql);

    if ($result) {
        die(json_encode(array("error"=>false,"message"=>"This item has been successfully updated in your cart")));
    }else{
        die(json_encode(array("error"=>true,"message"=>"Failed to update item")));
    }
}

function fetch_cart_items(){
    $device_id = $_GET['device_id'];

    $cart_items = array();

    $sql = "select * from carts where is_active=1 and is_deleted=0 and mac='$device_id'";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($cart_items, $row);
        }
    }

    die(json_encode(array("error"=>false,"cart_items"=>$cart_items)));
}

function remove_from_cart(){
    $id = $_GET['id'];

    $sql = "delete from carts where id='$id'";

    $result = mysqli_query(conn(), $sql);

    if ($result) {
        die(json_encode(array("error"=>false,"message"=>"This item has been successfully removed from your cart")));
    }else{
        die(json_encode(array("error"=>true,"message"=>"Failed to delete item")));
    }
}

function add_to_wishlist(){
    $user_id = $_GET['user_id'];
    $product_id = $_GET['product_id'];

    $sql = "insert into wish_lists
            (user_id, product_id)
            values
            ('$user_id', '$product_id')";

    $result = mysqli_query(conn(), $sql);

    if ($result) {
        die(json_encode(array("error"=>false,"message"=>"This item has been added to your wishlist")));
    }else{
        die(json_encode(array("error"=>true,"message"=>"Failed to add item")));
    }
}

function remove_from_wish_list(){
    $id = $_GET['id'];

    $sql = "delete from wish_lists where id='$id'";

    $result = mysqli_query(conn(), $sql);

    if ($result) {
        die(json_encode(array("error"=>false,"message"=>"This item has been successfully removed from your wishlist")));
    }else{
        die(json_encode(array("error"=>true,"message"=>"Failed to delete item")));
    }
}

function fetch_wishlist(){
    $user_id = $_GET['user_id'];

    $product_image_base_url = "http://utkarshelectricals.in/public/books/";

    $items = array();

    $sql = "select products.*, wish_lists.id as wish_list_id
            from products join wish_lists
            on (products.id=wish_lists.product_id)
            where wish_lists.user_id=$user_id";

    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $product_image_base_url.$row['image'];
            array_push($items, $row);
        }
    }

    die(json_encode(array("error"=>false,"items"=>$items)));
}

function fetch_orders(){
    $user_id = $_GET['user_id'];

    $orders = array();

    $sql = "select * from bookings where user_id='$user_id'";

    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($orders, $row);
        }
    }

    die(json_encode(array("error"=>false,"orders"=>$orders)));
}

function fetch_order_details(){
    $order_id = $_GET['order_id'];

    $order = array();
    $items = array();

    $sql = "select * from bookings where id='$order_id'";

    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $order = $row;
    }

    $sql = "select * from booking_products where booking_id='$order_id'";
    $result = mysqli_query(conn(), $sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }
    }

    die(json_encode(array("error"=>false,"order"=>$order,"items"=>$items)));
}
?>