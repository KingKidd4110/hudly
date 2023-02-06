<?php
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
            $total += $pPrice;
            echo "<hr><div class='cart-item'><h4><a href='store/$sLink'>".$pStore."</a></h4><img src='../images/products/".$pImage."'/><br><h5>".$pName."<span>$".$pPrice."</span></h5>
            <br>
            <i class='cart-remove thlink' onclick='removeCartSaved(".$cartid.")'>Remove Item</i></div><br><br>
            ";

        }
        echo "<input type='hidden' value='".$total."' id='carttotal'>";




    }
    echo "<script>updateTotal($total)</script>";
} else {
    echo "Cart is empty";
    echo "<script>updateTotal($total)</script>";
}
} else {
    echo "<br>Please Login to Access Cart";
}



?>