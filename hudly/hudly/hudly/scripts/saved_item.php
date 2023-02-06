<?php
    session_start();
if (isset($_SESSION['email'])) {
    require_once '../config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once '../model/scripts.php';
    $script = new Scripts($db);
    $saved = $script->getAllSaved($_SESSION['id']);
if (!$saved == false) {
    foreach ($saved->fetchAll(PDO::FETCH_ASSOC) as $a) {
        $pid = $a['product_id'];
        $cartid = $a['id'];
        $rcustomid = "s".$a['id'];
        $pid_info = $script->getProduct($pid);
        $total = 0;
        while ($b = $pid_info->fetch(PDO::FETCH_ASSOC)) {
            $pImage = $b['product_image'];
            $pStore = $b['store'];
            $pName = $b['product_name'];
            $pPrice = $b['product_price'];
            $sLink = $b['store_link'];
?>

<div class="row" style="position: relative;" id="cartId<?php echo $cartid; ?>">
                <h6 class="storeName"><a href="store/<?php echo $sLink; ?>"><?php echo $pStore; ?></a></h6>
                <div class="col"><img src="./images/products/<?php echo $pImage; ?>" alt="item"></div>
               <div class="col"> <p><b><?php echo $pName; ?></b> <br><br>Description....</p></div>
               <div class="col cart-price"><p><b>Price</b>: $<?php echo $pPrice; ?></p></div>
              <div class="col actions">
                <button class="fa fa-trash delete" style="background-color: white; color:red;" onclick="removeItemSaved(<?php echo $cartid; ?>)"></button> 
              </div>
              <hr>
            </div>

            <?php

        }
    }
} else {
    echo "0 Items has been Saved";
}
} else {
    echo "<br>Please Login to Access Saved Items";
}



?>