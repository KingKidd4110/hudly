<?php
    if (isset($_GET['id'])) {
        include 'scripts/db.php';
        session_start();
        if(isset($_SESSION['id'])) {
          $td = "";
        } else {
          $td = "disabled";
        }
    $str = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hudly - <?php echo ucfirst($str) ?></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    
</head>
<body>
    <?php
include 'includes/nav.html';
include 'includes/sidebar.php';
?>
<br>
    
<div class="main">
<?php
    $store = mysqli_query($db, "SELECT * FROM store WHERE slink = '$str' ORDER BY id DESC");
    if (mysqli_num_rows($store) > 0) {
        while ($a = mysqli_fetch_assoc($store)) {
            $sDesc = $a['sdesc'];
            $sImage = $a['simage'];
            $sName = $a['sname'];
            $sEmail = $a['semail'];
            $sNo = $a['sphone'];

        }
    } else {
        $sAlt = "";
        $sDesc = "Description not Available";
    }
?>
  <div class="container-fluid store">
    <div class="store-image" style="margin-bottom: 1.7rem;">
    <img src="../images/store/<?php echo $sImage ?>" alt="Store Image" style="width:100%"/>
    <center style="width: 100%; color:white; padding-top:1em; padding-bottom:0.3em; margin-top:-3.5em; background: rgba(0,0,0,0.7);
    backdrop-filter: saturate(180%) blur(10px);">
    <h2><b><?php echo $sName?></b></h2>
  </center>
    </div>
    <!--
    <br>
    <a href="https://api.whatsapp.com/send?phone=<?php echo $sNo; ?>&text=I would like one of your products From Hudly" target="_blank"><button class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;&nbsp;Whatsapp</button></a>
    <a href="mailto:<?php echo $sEmail?>"><button class="btn btn-danger"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Email</button></a>
    <a href="tel:09071195594"><button class="btn btn-primary"><i class="fa fa-phone"></i>&nbsp;&nbsp;Call</button></a>
    <br><br>
    <br>
  -->
    <div class="all-product" id="output">
    <?php
    $sth = mysqli_query($db, "SELECT * FROM products WHERE store_link = '$str' ORDER BY id DESC");
    if (mysqli_num_rows($sth) > 0) {
        while ($c = mysqli_fetch_assoc($sth)) {
            $pi = $c['product_image'];
            $pID = $c['id'];
            $pn = $c['product_name'];
            $pd = $c['product_description'];
            $pp = $c['product_price'];

            //echo?>
            



            <div class='product shadow-lg p-3 mb-5 bg-body'>
    <center class='store-name'>
        <a href='../store/<?php echo $str;?>'>
            <h4>
                <b><?php echo $sName; ?></b>
            </h4>
        </a> 
    </center>
    <h4 id="heart">
            <span>
                <i class='fa fa-heart thlink hred<?php echo $pID; ?>' title='Save Item for later'
                    <?php echo $td ?> onclick="saveProduct(<?php echo $pID; ?>)">&nbsp;</i>
            </span>
        </h4>
        <br>
    <div class='product-image'>
        <img src='../images/products/<?php echo $pi; ?>' alt='Product Alt'>
    </div>
    <br>
    <div class='info'>
        <center>
            <h4><b><?php echo $pn ?></b>&nbsp;&nbsp;</h4>
        </center>
        <br>
        <h6>&nbsp;<b>Rate Product</b>&nbsp;
            <span>
                <i class='fa fa-star' onclick="rateProduct(1, <?php echo $pID ?>)" id='star1<?php echo $pID?>'></i>
                <i class='fa fa-star' onclick="rateProduct(2, <?php echo $pID ?>)" id='star2<?php echo $pID ?>'></i>
                <i class='fa fa-star' onclick="rateProduct(3, <?php echo $pID ?>)" id='star3<?php echo $pID?>'></i>
                <i class='fa fa-star' onclick="rateProduct(4, <?php echo $pID ?>)" id='star4<?php echo $pID?>'></i>
                <i class='fa fa-star' onclick="rateProduct(5, <?php echo $pID ?>)" id='star5<?php echo $pID?>'></i>
                
            </span>
        </h6>

        <br>

        <h6>&nbsp;<b>Price </b> &nbsp;
        <span style='text-align: right;'>$<?php echo $pp?></span></h6>
        <center>
            <button class='btn btn-primary' onclick="addToCart(<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];} else{echo ''; } ?>, <?php echo $pID; ?>)" <?php echo $td; ?>>
            <i class='fa fa-cart'></i>Add to Cart</button>
        </center>
        <br>

    </div>
</div>


<?php echo "
<script>

document.getElementById('star1".$pID."').addEventListener('mouseover', function(event) {
    $('#star1".$pID."').css('color', 'gold');
});

document.getElementById('star1".$pID."').addEventListener('mouseleave', function(event) {
    $('#star1".$pID."').css('color', 'black');
});




document.getElementById('star2".$pID."').addEventListener('mouseover', function(event) {
    $('#star2".$pID."').css('color', 'gold');
    $('#star1".$pID."').css('color', 'gold');
});

document.getElementById('star2".$pID."').addEventListener('mouseleave', function(event) {
    $('#star2".$pID."').css('color', 'black');
    $('#star1".$pID."').css('color', 'black');
});




document.getElementById('star3".$pID."').addEventListener('mouseover', function(event) {
    $('#star3".$pID."').css('color', 'gold');
    $('#star2".$pID."').css('color', 'gold');
    $('#star1".$pID."').css('color', 'gold');
});

document.getElementById('star3".$pID."').addEventListener('mouseleave', function(event) {
    $('#star3".$pID."').css('color', 'black');
    $('#star2".$pID."').css('color', 'black');
    $('#star1".$pID."').css('color', 'black');
});




document.getElementById('star4".$pID."').addEventListener('mouseover', function(event) {
    $('#star3".$pID."').css('color', 'gold');
    $('#star2".$pID."').css('color', 'gold');
    $('#star1".$pID."').css('color', 'gold');
    $('#star4".$pID."').css('color', 'gold');
});

document.getElementById('star4".$pID."').addEventListener('mouseleave', function(event) {
    $('#star3".$pID."').css('color', 'black');
    $('#star2".$pID."').css('color', 'black');
    $('#star1".$pID."').css('color', 'black');
    $('#star4".$pID."').css('color', 'black');
});




document.getElementById('star5".$pID."').addEventListener('mouseover', function(event) {
    $('#star3".$pID."').css('color', 'gold');
    $('#star2".$pID."').css('color', 'gold');
    $('#star1".$pID."').css('color', 'gold');
    $('#star5".$pID."').css('color', 'gold');
    $('#star4".$pID."').css('color', 'gold');
});

document.getElementById('star5".$pID."').addEventListener('mouseleave', function(event) {
    $('#star3".$pID."').css('color', 'black');
    $('#star2".$pID."').css('color', 'black');
    $('#star1".$pID."').css('color', 'black');
    $('#star5".$pID."').css('color', 'black');
    $('#star4".$pID."').css('color', 'black');
});



</script>
";


        }
    } else {
        echo "<center><h3>No Product Available</h3></center>";
    }

?>
</div>
<div id="alert"></div>




<!-- Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Login to</b> <i class="fa fa-cart-plus">Hudly</i></h5>
        <i type="button" class="close fa fa-close" data-bs-dismiss="modal" aria-label="Close">
        </i>
      </div>
      <div class="modal-body">
          <center>
        <div class="register" id="userl">
            <br>
           <center><h3>Login now to Checkout</h3></center>
            <hr>
            <br>
            <form action="../scripts/login_script.php" method="post">
                <input type="email" name="uemail" placeholder="Email" required>
                <br><br>
                <input type="password" name="upass" placeholder="Password" required>
                <br><br>
                <button type="submit" class="btn btn-primary" name="ulogin">Login</button>
                </form>
            <br>
        </div>

        <div class="register" id="storel" style="display: none; background-color: rgb(0, 22, 37);">
            <br>
           <center><h3>Login to My Online Store</h3></center>
            <hr>
            <br>
            <form action="" method="post">
                <input type="email" name="semail" id="semail" placeholder="Email" required>
                <br><br>
                <input type="password" name="spassword" id="spassword" placeholder="Password" required>
                <br><br>
                <button type="submit" class="btn btn-primary" id="slogin">Login to Store</button>
            </form>
            <br>
        </div>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  id="storeLogin" style="background-color: rgb(0, 22, 37);">Login to Store</button>
        <button type="button" class="btn btn-primary"  id="accLogin" style="background-color: black;">Login to my Account</button>
      </div>
    </div>
  </div>
</div>
<!--END OF LOGIN MODAL-->

<!--CART MODAL-->
  
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel"><i class="fa fa-cart-plus">Hudly</i><b>&nbsp;Cart</b><span id="output-cart-total"></span></h5>
          <i type="button" class="close fa fa-close" data-bs-dismiss="modal" aria-label="Close" id="trcc">
          </i>
        </div>
        <div class="modal-body" id="cartbody">

        </div>
        <div class="modal-footer">
                <?php
                if (isset($_SESSION['email'])) {
                  echo '<button id="qqqq" type="button" class="btn btn-primary" style="background-color: black;">Clear cart</button>';
                } else {
                    echo '<button id="qqqq" type="button" class="btn btn-primary" style="background-color: black;" disabled>Clear cart</button>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <!--END OF CART MODAL-->


<!--SAVE MODAL-->
  
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel"><i class="fa fa-cart-plus">Hudly</i><b>&nbsp;Saved Items</b><span id="output-cart-total"></span></h5>
          <i type="button" class="close fa fa-close" data-bs-dismiss="modal" aria-label="Close">
          </i>
        </div>
        <div class="modal-body" id="savebody">

        </div>
        <div class="modal-footer">
                <?php
                if (isset($_SESSION['email'])) {
                  echo '<button id="csi" type="button" class="btn btn-primary" style="background-color: black;">Clear Saved Items</button>';
                } else {
                    echo '<button id="qqqq" type="button" class="btn btn-primary" style="background-color: black;" disabled>Clear Saved Items</button>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <!--END OF CART MODAL-->

            </div>
            <br><br>

            

<?php

include 'includes/store-footer.html';

?>

</div><!--END OF CONTAINER-->
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../assets/jquery.js"></script>
<script src="../assets/store.js"></script>
</body>
</html>
<?php 
    } else {
        echo "Store does not exits";
    }
?>