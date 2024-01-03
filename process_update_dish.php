<?php
    require('includes/connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Отримання даних з форми
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Оновлення даних страви в базі даних
        $update_sql = "UPDATE dish SET name='$name', description='$description', price=$price WHERE id=$id";

        if (mysqli_query($con, $update_sql)) {
            // Якщо оновлення успішне, вивести повідомлення про успіх
            echo '<div class="success-message">';
            echo '<p>Dish updated successfully</p>';
            echo '</div>';
        } else {
            // Якщо виникла помилка під час оновлення, вивести повідомлення про помилку
            echo '<div class="success-message">';
            echo '<p>Error updating dish: ' . mysqli_error($con) . '</p>';
            echo '</div>';
        }
    } else {
        // Якщо форма не була відправлена методом POST, вивести повідомлення про помилку
        echo '<div class="success-message">';
        echo '<p>Invalid request</p>';
        echo '</div>';
    }

    mysqli_close($con);
?>

<style>
    body {
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f2f2f2;
    }

    .success-message {
        text-align: center;
        font-size: 36px;
        color: #4CAF50;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        margin-top: 20px;
    }

    .dish-id {
        font-family: 'Cursive', sans-serif;
        color: #3498db;
    }

    .return-btn {
        background-color: #3498db;
        color: #fff;
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s;
        margin-top: 20px;
        font-size: 18px;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
    }

    .return-btn:hover {
        background-color: #2980b9;
    }
</style>

<a class="return-btn" href="dish_list.php">Return to Dish List</a>
