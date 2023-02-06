<?php
    session_start();
    if ($_POST['e'] == "logout") {
        session_destroy();
        header("location:../");
    } 