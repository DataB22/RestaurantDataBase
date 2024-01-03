<?php
    // Підключення до бази даних та інших необхідних файлів
    require('includes/connection.php');
    include('includes/header.php');
?>

<!-- Підключення стилів з попереднього коду -->
<style>
    .container {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 1rem;
    }

    .form-input,
    .form-textarea,
    .form-select {
        width: calc(100% - 20px); /* Змінено ширину полів вводу */
        padding: 0.75rem;
        font-size: 1rem;
        border: 1px solid #e0e0e0;
        border-radius: 0.25rem;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }

    .form-textarea {
        resize: vertical;
    }

    .form-submit {
        background-color: #3498db;
        color: #fff;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .form-submit:hover {
        background-color: #2980b9;
    }
</style>


<div class="container mx-auto mt-10">
    <h2 class="text-4xl font-bold mb-8">Add New Dish</h2>

    <!-- Форма для додавання блюда -->
    <form action="process_add_dish.php" method="post">
        <label>
            <span class="text-gray-700">Name:</span>
            <input type="text" name="name" class="form-input mt-1" required>
        </label>

        <label>
            <span class="text-gray-700">Description:</span>
            <textarea name="description" class="form-textarea mt-1" required></textarea>
        </label>

        <label>
            <span class="text-gray-700">Price:</span>
            <input type="number" name="price" step="0.01" class="form-input mt-1" required>
        </label>

        <button type="submit" class="form-submit">Add Dish</button>
    </form>
</div>

<?php
    // Підключення футера
    include('includes/footer.php');
?>
