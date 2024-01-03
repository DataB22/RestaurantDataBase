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

    /* Стилі для полів вводу та форми */
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    label {
        font-size: 18px;
        margin-bottom: 8px;
    }

    input {
        padding: 10px;
        margin-bottom: 15px;
        width: 300px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }
</style>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        // Отримання ID страви для оновлення
        $dish_id = $_GET['id'];

        // Запит для отримання даних страви за її ID
        $select_sql = "SELECT * FROM dish WHERE id = $dish_id";
        $result = mysqli_query($con, $select_sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo '<div class="success-message">';
            echo '<p>Edit Dish </p>';
            echo '<form method="post" action="process_update_dish.php">';
            echo '<label for="name">Name:</label>';
            echo '<input type="text" name="name" value="' . $row['name'] . '" required><br>';
            echo '<label for="description">Description:</label>';
            echo '<input type="text" name="description" value="' . $row['description'] . '" required><br>';
            echo '<label for="price">Price:</label>';
            echo '<input type="number" name="price" value="' . $row['price'] . '" required><br>';
            echo '<input type="hidden" name="id" value="' . $dish_id . '">';
            echo '<input type="submit" value="Update Dish">';
            echo '</form>';
            echo '</div>';
        } else {
            echo '<div class="success-message">';
            echo '<p>Error: Dish not found</p>';
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

