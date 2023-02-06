<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel"><i class="fa fa-cart-plus"> <i>Hudly</i></i></h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="tsc"></button>
    </div>
    <div class="offcanvas-body">
        <div class="sidebar">
          <a href="../"><p><i class="fa fa-home"> </i> &nbsp;Home</p></a>
            <br>
            <a href=""><p><i class="fa fa-message"> </i> &nbsp;Live Help</p></a>
            <hr>
            <?php 
          if (isset($_SESSION['fullname'])) {
            echo '<p><i class="fa fa-user"> </i> &nbsp;'.$_SESSION['fullname'].'</p><br>';
          } else {
              echo '<a href="account/register.php"><p><i class="fa fa-user-plus"> </i> &nbsp;Signup/register</p></a><br>';
          }
          ?>
              <?php
    if (isset($_SESSION['email'])) {
      echo '<p type="button" id="logoutbtn"><i class="fa fa-power-off"> </i> &nbsp;Logout</p><br>';
    } else {
      echo '<p type="button" id="loginbtn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-user" aria-hidden="true"> </i> &nbsp;Login</p><br>';
    }
    ?>
            <a href=""><p><i class="fa fa-archive"> </i>  &nbsp;Orders </p></a><br>
            <a href=""><p><i class="fa fa-envelope"> <sup>2</sup></i>  &nbsp;Inbox </p></a><br>
            <p data-bs-toggle="modal" data-bs-target="#saveModal" id="saveit" class='thlink'><i class="fa fa-heart"> </i>  &nbsp;Saved Items </p>
            <hr>
            <h6>OUR CATEGORIES</h6><br>
            <a href="#supermarket" onclick="searchq('supermarket')"><p><i class="fa fa-apple"> </i>  &nbsp;Supermarket </p></a><br>
            <a href="#health&buauty" onclick="searchq('health&buauty')"><p><i class="fa fa-medkit"> </i>  &nbsp;Health & Beauty </p></a><br>
            <a href="#home&office" onclick="searchq('home&office')"><p><i class="fa fa-home"> </i>  &nbsp;Home & Office </p></a><br>
            <a href="#phone&tablets" onclick="searchq('phones&tablets')"><p><i class="fa fa-phone"> </i>  &nbsp;Phone & Tablets </p></a><br>
            <a href="#electronics" onclick="searchq('electronics')"><p><i class="fa fa-tv"> </i>  &nbsp;Electronics </p><br>
            <a href="#womensFashion" onclick="searchq('womensFashion')"><p><i class="fa fa-female"> </i>  &nbsp;Women's Fashion </p></a><br>
            <a href="#mensFashion" onclick="searchq('mensFashion')"><p><i class="fa fa-male"> </i>  &nbsp;Men's Fashion </p></a><br>
            <a href="#babyProducts" onclick="searchq('babyProducts')"><p><i class="fa fa-child"> </i>  &nbsp;Baby Products </p></a><br>
            <a href="#gaming" onclick="searchq('gaming')"><p><i class="fa fa-gamepad"> </i>  &nbsp;Gaming </p></a><br>
            <a href="#sportingGoods" onclick="searchq('sportingGoods')"><p><i class="fa fa-futbol-o "> </i>  &nbsp;Sporting Goods </p></a><br>
            <a href="#automobile" onclick="searchq('automobile')"><p><i class="fa fa-car"> </i>  &nbsp;Automobile </p></a>
            <hr>
            <a href="../account/onlinestore.php"><p><i class="fa fa-home"> </i>  &nbsp;Get online store </p></a><br>
            <a href=""><p><i class="fa fa-bullhorn"> </i>  &nbsp;Place Adverts </p></a><br>
            <a href=""><p><i class="fa fa-support"> </i>  &nbsp;Support Us</p></a>
        </div>
        
    </div>
  </div>
