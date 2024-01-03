<?php
    session_start();
    require('includes/connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($con, $sql);
            
            if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                // Вхід успішний, створення сесійного токена або іншого механізму ідентифікації
                $_SESSION['user_id'] = $row['id'];
                echo 'Login successful';
            } else {
                echo 'Incorrect password';
            }
        } else {
            echo 'User not found';
            }
            
            mysqli_close($con);
            }
            ?>