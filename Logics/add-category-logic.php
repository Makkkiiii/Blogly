<?php

require '/Xampp/htdocs/Blogly/Config/database.php';

if (isset($_POST['submit'])) {
    // ! Sanitize and validate input
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // ! Check if inputs are valid
    if (!$title) {
        $_SESSION['add-category'] = "Enter a title";
    } elseif (!$description) {
        $_SESSION['add-category'] = "Enter a description";
    }

    // ! Redirect back to add category form if there are errors
    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header("Location: " . Backend . "add-category.php");
        exit();
    } else {
        // ! Insert category into database
        $query = "INSERT INTO categories (title, description) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $title, $description);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['add-category-success'] = "Category added successfully";
            header("Location: " . Backend . "manage-categories.php");
            exit();
        } else {
            $_SESSION['add-category'] = "Failed to add category";
            header("Location: " . Backend . "add-category.php");
            exit();
        }
    }
} else {
    // ! Redirect to add category form if the form was not submitted
    header("Location: " . Backend . "add-category.php");
    exit();
}
