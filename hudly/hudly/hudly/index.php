<?php
session_start();
include 'includes/header.html';

require_once './config/connection.php';
$db = new Database();
$db = $db->connect();
require_once './model/scripts.php';
$script = new Scripts($db);
?>

<!--BEGINNING OF ADVERT SLIDES-->

    <div class="slide">
        <?php include 'includes/ads.php'; ?>
        <img id="slide_image" src="./images/ads/default.png" alt="">
    </div>

   <!--END OF ADVERT SLIDES-->



<br>
<h6>&nbsp;&nbsp; CATEGORIES</h3>
<br>
<div class="brands">

<ul>

<li><a href="#supermarket" onclick="searchq('supermarket')"><i class="fa fa-apple-whole"></i> Supermarket </a</li>

<li><a href="#health&bueauty" onclick="searchq('health&beauty')"><i class="fa fa-medkit"></i> Health & Beauty</a></li>

<li><a href="#home&office" onclick="searchq('home&office')"><i class="fa fa-home"></i> Home & Office</a></li>

<li><a href="#phone&tablets" onclick="searchq('phones&tablets')"><i class="fa fa-phone"></i> Phones & Tablets</a></li>

<li><a href="#electronics" onclick="searchq('electronics')"><i class="fa fa-tv"></i> Electronics</a></li>

<li><a href="#womansFashion" onclick="searchq('womansFashion')"><i class="fa fa-female"></i> Women's Fashion</a></li>

<li><a href="#mensFashion" onclick="searchq('mensFashion')"><i class="fa fa-male"></i> Men's Fashion</a></li>

<li><a href="#babyProducts" onclick="searchq('babyProducts')"><i class="fa fa-baby"></i> Baby Products</a></li>

<li><a href="#gaming" onclick="searchq('gaming')"><i class="fa fa-gamepad"></i> Gaming</a></li>

<li><a href="#sportingGoods" onclick="searchq('sportingGoods')"><i class="fa fa-dumbbell"></i> Sporting Goods</a></li>

<li><a href="#automobile" onclick="searchq('automobile')"><i class="fa fa-car"></i> Automobile </a></li>

  
</ul>

</div>
<br> 







<div class="gallery">
<?php  
if (isset($_SESSION['email'])) {
  include 'scripts/db.php';
  $uemail = $_SESSION['email'];
  $thu = $_SESSION['id'];
  echo "<input type='text' id='state' value='Li' hidden>";
  echo "<input type='text' id='uid' value='".$thu."' hidden>";
} else {
  $thu = "";
  echo "<input type='text' id='state' value='Lo' hidden>";
}
include 'scripts/main.php';
  ?>




</div>








    <div class="mainOutput container-fluid" id="mainOutput">
    </div>

    <div id="alert"></div>


   
<br>
    <?php 
    include 'includes/modals.php'; 
    include 'includes/pagination.php'; 
    require 'includes/footer.html';
    ?>
    <script src="./assets/js/loading.js"></script>
    <script src="./assets/js/functions.js"></script>
    <script src="./assets/js/slide.js"></script>
    <script src="./assets/js/navbar.js"></script>
    <script src="./assets/js/quantity.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>