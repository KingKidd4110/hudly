<?php

$db = mysqli_connect("localhost", "root", "", "hudly");
if (!$db) {
    echo "Connection Failed ".mysqli_connect_error();
}