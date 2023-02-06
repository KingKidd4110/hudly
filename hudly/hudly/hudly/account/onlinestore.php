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
<body style="background-color: rgb(0, 22, 37);">
    <div class="regcontainer" style="background-color: rgb(0, 22, 37);">
        <div class="sidenote" style="background-color: black;">
            <center><h2>Welcome to <i class="fa fa-cart-plus"></i> Hudly</h4></i></h2></center>
            <br>
            <center><h4>&nbsp; Signup and Start Selling Now</h4></center>
            <br>
            <center><a href="register.php"><button class="btn btn-light">Create User Account</button></a></center>

            <center><p>By signing up you agree to our <a href="">terms and conditions</a></p></center>
            <br>
        </div>
        <div class="registerab" style="background-color: rgb(0, 22, 37);">
            <br>
            <h4>Create An Online Store With <b><i class="fa fa-cart-plus"></i>Hudly</h4></i></b></h4>
            <br>
            <a href='../'><button class='btn btn-light'>Login to Store</button></a>
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
                            echo "
                            <script>
                            $('#er').css('display', 'none');
                            </script>
                            <div class='alert alert-success alert-dismissible'>
                            Your Online Store has been Created
                            <p>A Verification link has been sent to your Store email</p>
                            </div>";
                        } 
                    }
                ?>
            </div>
                <form action="../scripts/create_store.php" method="post">
                <input type="text" name="sname" id="sname" placeholder="Store Name" required>
                <br>
                <br>
                <input type="email" name="semail" id="semail" placeholder="Store Email" required>
                <br><br>
                <input type="number" name="sphone" id="sphone" placeholder="Store Phone" required>
                <br><br>
                <input type="password" name="spassword" id="spassword" placeholder="Password" required>
                <br><br>
                <input type="password" name="srpassword" id="srpassword" placeholder="Repeat Password" required>
                <br><br><br>
                <button type="submit" class="btn btn-primary" name="Cstore" id="Cstore">Create Store</button>
            </form>
            <br>
        </div>
    </div>
<center>


</center>
<br>
<script>
    $("#sname").keyup(function() {
        $.ajax({
            type: 'POST',
            url: '../scripts/check_store.php',
            data: {
                sname:$("#sname").val()
            },
            success: function(data){
            $("#error").html(data);
        }
        });
    })

    $("#semail").keyup(function() {
        $.ajax({
            type: 'POST',
            url: '../scripts/check_store_email.php',
            data: {
                semail:$("#semail").val()
            },
            success: function(data){
            $("#error").html(data);
        }
        });
    });
    
</script>
</body>
</html>