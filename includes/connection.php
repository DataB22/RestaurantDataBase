<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "restaurant");

    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

