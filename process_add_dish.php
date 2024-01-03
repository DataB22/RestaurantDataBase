<?php
    require('includes/connection.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Отримання даних з форми
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        
        // Запит для додавання нової страви
        $sql = "INSERT INTO dish (name, description, price) VALUES ('$name', '$description', $price)";

        if (mysqli_query($con, $sql)) {
            $last_inserted_id = mysqli_insert_id($con);
            
            // Формування HTML-коду з використанням стилів
            echo '<div class="success-message">';
            echo '<p class="success-text">Dish added successfully</p>';
            echo '</div>';
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    // Закриття підключення до бази даних
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
