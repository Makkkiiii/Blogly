<?php
require "/Xampp/htdocs/Blogly/Config/database.php";

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // ! VALIDATE INPUT
    if (!$title || !$description) {
        $_SESSION['edit-category-error'] = "Invalid form input on edit category page. ";
    } else {
        $query = "UPDATE categories SET title = '$title', description = '$description' WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['edit-category-success'] = "Category <strong>$title</strong> updated successfully";
        } else {
            $_SESSION['edit-category'] = "Category update failed";
        }
    }
}
header('location:' . Backend . 'manage-categories.php');
die();
