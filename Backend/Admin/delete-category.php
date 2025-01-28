<?php

require '/Xampp/htdocs/Blogly/Config/database.php';

if (isset($_GET['id'])) {
    // ! FETCHING DATA
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // ! FETCH CATEGORY
    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    // ! MAKING SURE ONLY ONE CATEGORY IS RETURNED
    if ($result->num_rows == 1) {
        // ! DELETE CATEGORY FROM DATABASE
        $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->bind_param("i", $id);
        $delete_category_result = $stmt->execute();

        if ($delete_category_result) {
            $_SESSION['delete-category-success'] = "Deleted category successfully.";
        } else {
            $_SESSION['delete-category'] = "Couldn't delete category.";
        }
    } else {
        $_SESSION['delete-category'] = "Category not found.";
    }
}

header('location: ' . Backend . 'manage-categories.php');
exit();
