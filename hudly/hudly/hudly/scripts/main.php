<?php
    require_once './config/connection.php';
    $db = new Database();
    $db = $db->connect();
    require_once './model/scripts.php';
    $script = new Scripts($db);
    $page = 1;
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $products = $script->products($page);
if ($products->rowCount() > 0) {
    while ($row = $products->fetch(PDO:: FETCH_ASSOC)) {
        $pName = $row['product_name'];
        $pImage = $row['product_image'];
        $pPrice = $row['product_price'];
        $pDesc = substr($row['product_description'], 0, 40)."...";


        //$pCategory= $row['product_category'];
        //$pQuantity = $row['product_quantity'];
        $customid = "c".$row['id'];
        $hcolor = "";
        if (isset($_SESSION['email'])) {
            $ta = "";
            $uemail = $_SESSION['email'];
            $uid =  $_SESSION['id'];
            $td = "";
            $hre =  $script->getSavedProduct($uid, $row['id']);
            if($hre )
            if ($hre->rowCount() > 0) {
                while ($oh = $hre->fetch(PDO:: FETCH_ASSOC) ) {
                    $td = $oh['product_id'];
                 }
                 if ($td == $row['id']) {
                     $ta = "<style>
                     .hred".$row['id']." {
                         color: red;
                     }
                     .hred".$row['id'].":hover {
                         color: red;
                     }
                     </style>";
                 }

                }
            } else {
            $td="disabled title='Please login to save product'";
            $ta = "";
            }
        ?>



    <div class="content">
      <img src="./images/products/<?php echo $pImage; ?>" loading="lazy">
      <h6><?php echo $pName ?></h6>
      <p><?php echo $pDesc ?></p>
      <h6>$<?php echo number_format($pPrice); ?></h6>
      <ul>
        <li><i class="fa fa-star" onclick="rateProduct(1, <?php echo $row['id'] ?>)" id='star1<?php echo $row['id']?>' aria-hidden="true"></i></li>
        <li><i class="fa fa-star" onclick="rateProduct(2, <?php echo $row['id'] ?>)" id='star2<?php echo $row['id']?>' aria-hidden="true"></i></li>
        <li><i class="fa fa-star" onclick="rateProduct(3, <?php echo $row['id'] ?>)" id='star3<?php echo $row['id']?>' aria-hidden="true"></i></li>
        <li><i class="fa fa-star" onclick="rateProduct(4, <?php echo $row['id'] ?>)" id='star4<?php echo $row['id']?>' aria-hidden="true"></i></li>
        <li><i class="fa fa-star" onclick="rateProduct(5, <?php echo $row['id'] ?>)" id='star5<?php echo $row['id']?>' aria-hidden="true"></i></li>
      </ul>
      <center>
        <button class="atc" title="Add to Cart" onclick="addToCart(<?php echo $thu.','.$row['id']; ?>)" <?php echo $td; ?>> <i class="fa fa-cart-shopping"></i> ADD TO CART</button>
        <button class="hrt" title="Save for later" <?php echo $td ?> onclick="saveProduct(<?php echo $row['id']; ?>)"><i class="fa fa-heart"></i></button>
    </center>
    </div>

<?php echo "
<script>

document.getElementById('star1".$row['id']."').addEventListener('mouseover', function(event) {
    $('#star1".$row['id']."').css('color', 'gold');
});

document.getElementById('star1".$row['id']."').addEventListener('mouseleave', function(event) {
    $('#star1".$row['id']."').css('color', 'black');
});




document.getElementById('star2".$row['id']."').addEventListener('mouseover', function(event) {
    $('#star2".$row['id']."').css('color', 'gold');
    $('#star1".$row['id']."').css('color', 'gold');
});

document.getElementById('star2".$row['id']."').addEventListener('mouseleave', function(event) {
    $('#star2".$row['id']."').css('color', 'black');
    $('#star1".$row['id']."').css('color', 'black');
});




document.getElementById('star3".$row['id']."').addEventListener('mouseover', function(event) {
    $('#star3".$row['id']."').css('color', 'gold');
    $('#star2".$row['id']."').css('color', 'gold');
    $('#star1".$row['id']."').css('color', 'gold');
});

document.getElementById('star3".$row['id']."').addEventListener('mouseleave', function(event) {
    $('#star3".$row['id']."').css('color', 'black');
    $('#star2".$row['id']."').css('color', 'black');
    $('#star1".$row['id']."').css('color', 'black');
});




document.getElementById('star4".$row['id']."').addEventListener('mouseover', function(event) {
    $('#star3".$row['id']."').css('color', 'gold');
    $('#star2".$row['id']."').css('color', 'gold');
    $('#star1".$row['id']."').css('color', 'gold');
    $('#star4".$row['id']."').css('color', 'gold');
});

document.getElementById('star4".$row['id']."').addEventListener('mouseleave', function(event) {
    $('#star3".$row['id']."').css('color', 'black');
    $('#star2".$row['id']."').css('color', 'black');
    $('#star1".$row['id']."').css('color', 'black');
    $('#star4".$row['id']."').css('color', 'black');
});




document.getElementById('star5".$row['id']."').addEventListener('mouseover', function(event) {
    $('#star3".$row['id']."').css('color', 'gold');
    $('#star2".$row['id']."').css('color', 'gold');
    $('#star1".$row['id']."').css('color', 'gold');
    $('#star5".$row['id']."').css('color', 'gold');
    $('#star4".$row['id']."').css('color', 'gold');
});

document.getElementById('star5".$row['id']."').addEventListener('mouseleave', function(event) {
    $('#star3".$row['id']."').css('color', 'black');
    $('#star2".$row['id']."').css('color', 'black');
    $('#star1".$row['id']."').css('color', 'black');
    $('#star5".$row['id']."').css('color', 'black');
    $('#star4".$row['id']."').css('color', 'black');
});



</script>
";
echo $ta;
}
} else {
echo "0 results found";
}