<!-- register.php -->
<?php
    require('includes/connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $email = $_POST['email'];

        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if (mysqli_query($con, $sql)) {
            echo 'Registration successful';
        } else {
            echo 'Error: ' . mysqli_error($con);
        }
    }

    mysqli_close($con);
?>
