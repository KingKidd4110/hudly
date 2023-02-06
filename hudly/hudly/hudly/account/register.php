<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hudly Signup</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/jquery.js"></script>
</head>
<body style="background-color: black;">
    <div class="regcontainer">
        <div class="sidenote">
            <center><h2>Welcome to <i class="fa fa-cart-plus"></i>Hudly</h4></i></h2></center>
        <br>
            <center><h4>&nbsp; Signup and Get Unlimited access to Goods</h4></center>
            <br>
            <center><a href="onlinestore.php"><button class="btn btn-light">Create Online Store</button></a></center>

            <center><p>By signing up you agree to our <a href="">terms and conditions</a></p></center>
            <br>
        </div>
        <div class="registerab">
            <br>
            <h4>Register Now and Start Shopping</h4>
            <br>
            <a href='../'><button class='btn btn-light'>Login to Account</button></a>
            <br><br>
            <div class="error" id="error">
                <?php
                    if (isset($_GET['e'])) {
                        if ($_GET['e'] == "eae") {
                            echo "<div class='alert alert-danger'>Email Already Exits With Another Account</div>";
                        } elseif ($_GET['e'] == "pdnm") {
                            echo "<div class='alert alert-danger'>Passwords do not Match</div>";
                        } 
                        elseif ($_GET['e'] == "s") {
                            echo "<div class='alert alert-success'>
                            Your Account has been Created
                            <p>An activation link has been sent to your email</p></div>";
                        } 
                    }
                ?>
            </div>
            <form action="../scripts/create_user.php" method="post">
                <input type="text" name="fname" id="fname" placeholder="First Name">
                <br><br>
                <input type="text" name="lname" id="lname" placeholder="Last Name">
                <br><br>
                <input type="email" name="email" id="email" placeholder="Email">
                <br><br>
                <input type="password" name="password" id="password" placeholder="Password">
                <br><br>
                <input type="password" name="rpassword" id="rpassword" placeholder="Repeat Password">
                <br><br><br>
                <button type="submit" class="btn btn-primary" name="Cuser">Signup</button>
                <br><br>
            </form>
            <br>
        </div>
    </div>
<center>


</center>
<br>
<script>
    $("#close-register").click(function() {
        $(".registerab").css("display", "none");
    });

    $("#email").keyup(function() {
        $.ajax({
            type: 'POST',
            url: '../scripts/check_user_email.php',
            data: {
                email:$("#email").val()
            },
            success: function(data){
            $("#error").html(data);
        }
        });
    });
</script>
</body>
</html>