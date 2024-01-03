<?php
    require('includes/connection.php');
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

    .return-btn {
        background-color: #3498db;
        color: #fff;
        padding: 15px 30px; /* Збільшено розмір кнопки */
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s;
        margin-top: 20px;
        font-size: 18px; /* Змінено розмір шрифту */
        font-family: 'Arial', sans-serif;
        font-weight: bold;
    }

    .return-btn:hover {
        background-color: #2980b9;
    }
</style>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        // Отримання ID страви для видалення
        $dish_id = $_GET['id'];

        // Запит для видалення страви за її ID
        $delete_sql = "DELETE FROM dish WHERE id = $dish_id";

        if (mysqli_query($con, $delete_sql)) {
            echo '<div class="success-message">';
            echo '<p>Dish deleted successfully</p>';
            echo '</div>';
        } else {
            echo '<div class="success-message">';
            echo '<p>Error deleting dish: ' . mysqli_error($con) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<div class="success-message">';
        echo '<p>Invalid request</p>';
        echo '</div>';
    }

    mysqli_close($con);
?>

<a class="return-btn" href="dish_list.php">Return to Dish List</a>
