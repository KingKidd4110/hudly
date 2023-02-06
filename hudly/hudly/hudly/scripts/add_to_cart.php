<?php
if (isset($_POST['add_to_cart'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    if($script->inCart($uid, $pid) == true) {
        echo "Item already in cart";
    } else {

        $cart = $script->addToCart($uid, $pid);
        if($cart == true){
            echo "Added";
        } else {
            echo "failed";
        }

    }
    
}