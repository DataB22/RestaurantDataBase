<?php
    session_start();

    // Перевірка чи користувач авторизований
    if (!isset($_SESSION['user_id'])) {
        // Перенаправлення на сторінку входу, якщо користувач не авторизований
        header('Location: login_form.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Мета-теги та інші необхідні теги -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish List</title>
    <!-- Підключення стилів та інших ресурсів -->
    <!-- ... -->
</head>
<body>

<!-- Весь зміст сторінки -->

</body>
</html>

<?php
    // Підключення до бази даних та інших необхідних файлів
    require('includes/connection.php');
    include('includes/header.php');
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 18px;
        border-bottom: 1px solid #e0e0e0;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .container {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    .add-dish-btn, .edit-dish-btn, .delete-btn {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin-right: 10px;
    }

    .add-dish-btn a, .edit-dish-btn a, .delete-btn a {
        color: #fff;
        text-decoration: none;
    }

    .add-dish-btn a:hover, .edit-dish-btn:hover, .delete-btn:hover {
        background-color: #2980b9;
    }

    /* Стилі для кнопки видалення та редагування */
    .delete-btn {
        background-color: #e74c3c;
    }

    .edit-dish-btn {
        background-color: #e74c3c;
    }
</style>

<!-- Основний контент сторінки -->
<div class="container mx-auto mt-10">
    <h2 class="text-4xl font-bold mb-8">Dish List</h2>

    <?php
        $sql = "SELECT * FROM dish";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo '<table class="w-full border border-gray-200">';
            echo '<thead class="bg-gray-200">';
            echo '<tr>';
            echo '<th class="px-4 py-2">ID</th>';
            echo '<th class="px-4 py-2">Name</th>';
            echo '<th class="px-4 py-2">Description</th>';
            echo '<th class="px-4 py-2">Price</th>';
            echo '<th class="px-4 py-2">Actions</th>'; // Додано новий заголовок
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td class="border px-4 py-2">' . $row['id'] . '</td>';
                echo '<td class="border px-4 py-2">' . $row['name'] . '</td>';
                echo '<td class="border px-4 py-2">' . $row['description'] . '</td>';
                echo '<td class="border px-4 py-2">$' . $row['price'] . '</td>';
                echo '<td class="border px-4 py-2">';
                
                // Додано кнопку для редагування
                echo '<a class="edit-dish-btn" href="update_dish.php?id=' . $row['id'] . '">Edit</a>';
                
                // Додано кнопку для видалення
                echo '<a class="delete-btn" href="delete_dish.php?id=' . $row['id'] . '">Delete</a>';
                
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'Error: ' . mysqli_error($con);
        }

        mysqli_close($con);
    ?>

    <!-- Кнопка для додавання нової страви -->
    <div class="add-dish-btn">
        <a href="add_dish.php">Add Dish</a>
    </div>
</div>

<?php
    include('includes/footer.php');
?>
