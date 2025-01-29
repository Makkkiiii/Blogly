<?php

// ! PATH TO CONNECTION AND SESSION START
require '/Xampp/htdocs/Blogly/Config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // ! SET IS_FEATURED TO 0 IF NOT CHECKED
    $is_featured = $is_featured == 1 ?: 0;

    // ! VALIDATE FORM
    if (!$title) {
        $_SESSION['add-post'] = "Enter a title";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Enter a body";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Select a category";
    } elseif (!$thumbnail) {
        $_SESSION['add-post'] = "Add a thumbnail";
    }
}
