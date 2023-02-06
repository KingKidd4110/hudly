<?php

/*

TEMPLATE

<div class="row" style="position: relative;">
                <h6 class="storeName"><a href="#">Store Name</a></h6>
                <div class="col"><img src="./images/products/1.jpeg" alt="item"></div>
               <div class="col"> <p><b>Ascar Aspire</b> <br><br>Description....</p></div>
               <div class="col cart-price"><p><b>Price</b>: $500</p></div>
              <div class="col actions">
                <button class="fa fa-minus" id="minusQ"></button> 
                <b id="quantity">1</b> 
                <button class="fa fa-plus" id="addQ"></button>
                <button class="fa fa-trash delete"></button> 
              </div>
            </div><hr>

*/
require_once '../config/connection.php';
$db = new Database();
$db = $db->connect();
require_once '../model/scripts.php';
$script = new Scripts($db);
session_start();
if (isset($_SESSION['email'])) {

$thu = "";
$uemail = $_SESSION['email'];
$uid =  $_SESSION['id'];
$cart = $script->getCart($uid);
$total =0;

if ($cart->rowCount() > 0) {
    
    while ($a = $cart->fetch(PDO:: FETCH_ASSOC)) {
        $pid = $a['product_id'];
        $cartid = $a['id'];
        $rcustomid = "r".$a['id'];
        $pid_info = $script->getProduct($pid);
        
        while ($b = $pid_info->fetch(PDO:: FETCH_ASSOC)) {
            $pImage = $b['product_image'];
            $pStore = $b['store'];
            $pName = $b['product_name'];
            $pPrice = $b['product_price'];
            $sLink = $b['store_link'];
            $pQ = $b['product_quantity'];
            $total += $pPrice; ?>

            <div class="row" style="position: relative;" id="cartId<?php echo $cartid; ?>">
            <i id="pMax<?php echo $cartid; ?>" style = "display:none;"><?php echo $pQ; ?></i>
                <h6 class="storeName"><a href="store/<?php echo $sLink; ?>"><?php echo $pStore; ?></a></h6>
                <div class="col"><img src="./images/products/<?php echo $pImage; ?>" alt="item"></div>
               <div class="col"> <p><b><?php echo $pName; ?></b> <br><br>Description....</p></div>
               <div class="col cart-price"><p><b>Price</b>: $<?php echo $pPrice; ?></p></div>
              <div class="col actions">
                <button class="fa fa-minus" onclick="minusQ(<?php echo $cartid; ?>)"></button> 
                <b class="quantity">1</b> 
                <button class="fa fa-plus" onclick="addQ(<?php echo $cartid; ?>)"></button>
                <button class="fa fa-trash delete" onclick="removeCartSaved(<?php echo $cartid; ?>)"></button> 
              </div>
              <hr>
            </div>
<?php


        }
      
    }
} else {
    echo "<h3>Cart is empty</h3>";
}
} else {
    echo "<br>Please Login to Access Cart";
}



?>