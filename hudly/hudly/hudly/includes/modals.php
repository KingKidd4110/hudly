<!--BEGINNING OF CART-->

  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hudly Cart <i class="fa fa-shopping-cart"></i></h5>
          <button type="button" class="close" style="border:none;" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body " id="cartbody">
            
    
        </div>
        <div class="modal-footer">
        <?php
                if (isset($_SESSION['email'])) {
                  echo '<button id="qqqq" type="button" class="btn btn-dark">Clear</button>
                  <button id="ccon" type="button" class="btn btn-primary">Checkout ($500)</button>';
                } else {
                    echo '<button id="qqqq" type="button" class="btn btn-dark" disabled>Clear cart</button>
                    <button id="ccon" type="button" class="btn btn-primary" disabled>Checkout ($500)</button>';
                }
                ?>
        </div>
      </div>
    </div>
  </div>



<!--END OF CART-->


    <!--SAVE MODAL-->


    <div class="modal fade bd-example-modal-lg" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Saved Items <i class="fa fa-heart"></i></h5>
          <button type="button" class="close" style="border:none;" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body " id="savebody">
            
    
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

  <!--END OF SAVE MODAL -->



  <!--BEGINNINGND OF LOGIN MODAL -->

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form action="scripts/login_script.php" method="post">
            <div class="form-group">
              <input type="email" class="form-control" id="email1" name="uemail" required placeholder="Your email address...">
            </div>
            <br>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" name="upass" required placeholder="Your password...">
            </div>
            <br>
            <button type="submit" class="btn btn-info btn-block btn-round" name="ulogin">Login</button>
          </form>
      </div>
    </div>
    <br>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="http://localhost/dashboard.hudly" target="_blank"> Sign Up</a>.</div>
      </div>
  </div>
</div>

<!--END OF SSAVE MODAL -->