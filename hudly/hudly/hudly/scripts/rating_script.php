<?php
session_start();
if (isset($_SESSION['email']) && isset($_POST['rate_product'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);
    $uid = $_SESSION['id'];
    $rate = $_POST['rate'];
    $pid = $_POST['pid'];

            $cr = $script->checkIfProductRated($uid, $pid);
            if ($cr == true) {
                    $rid = $script->getProductRated($uid, $pid);


                if ($script->updateProductRated($rid, $rate)) {
                    echo "<script>alert('Rating Updated')</script>";
                } else {
                    echo "<script>alert('1There was a problem updating rating this product')</script>";
                }

            } else {
                if ($script->rateProduct($uid, $pid, $rate)) {
                 echo "<script>alert('Product rated')</script>";
                } else {
                    echo "<script>alert('There was a problem rating this product')</script>";
                }
            }

} else {
    echo "<script>alert('Please login to rate product')</script>";
}