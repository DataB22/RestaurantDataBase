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
</style>

<!-- Основний контент сторінки -->
<div class="container mx-auto mt-10">
    <h2 class="text-4xl font-bold mb-8">Chef List</h2>

    <?php
        // Запит до бази даних для отримання даних про шеф-поварів
        $sql = "SELECT * FROM chef";
        $result = mysqli_query($con, $sql);

        // Перевірка наявності результатів запиту
        if ($result) {
            // Виведення отриманих даних у вигляді таблиці з використанням стилів
            echo '<table class="w-full border border-gray-200">';
            echo '<thead class="bg-gray-200">';
            echo '<tr>';
            echo '<th class="px-4 py-2">ID</th>';
            echo '<th class="px-4 py-2">Name</th>';
            echo '<th class="px-4 py-2">Position</th>';
            echo '<th class="px-4 py-2">Salary</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td class="border px-4 py-2">' . $row['id'] . '</td>';
                echo '<td class="border px-4 py-2">' . $row['name'] . '</td>';
                echo '<td class="border px-4 py-2">' . $row['position'] . '</td>';
                echo '<td class="border px-4 py-2">' . $row['salary'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            // Виведення повідомлення про помилку, якщо є
            echo 'Error: ' . mysqli_error($con);
        }

        // Закриття підключення до бази даних
        mysqli_close($con);
    ?>
</div>

<?php
    // Підключення футера
    include('includes/footer.php');
?>

