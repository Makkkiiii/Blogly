<?php

// filepath: /d:/Xampp/htdocs/Blogly/Logics/add-post-logic.php
require '/Xampp/htdocs/Blogly/Config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // ! set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ? 1 : 0;

    // ! VARIABLE FORM DATA

    if (!$title) {
        $_SESSION['add-post'] = 'Enter post title';
    } elseif (!$body) {
        $_SESSION['add-post'] = 'Enter post body';
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Choose post thumbnail";
    } else {
        // ! WORK ON THUMBNAIL
        // ! RENAME THE IMAGE

        $time = time();
        $thumbnail_name = $time . '_' . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '/Xampp/htdocs/Blogly/UserItems/Thumbnails/' . $thumbnail_name;

        // ! Make sure the file is an image
        $allowed_files = ['jpg', 'jpeg', 'png'];
        $extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);
        if (in_array($extension, $allowed_files)) {
            // ! MAKE SURE IMAGE IS NOT TOO BIG (2MB)
            if ($thumbnail['size'] < 2000000) {
                if (move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path)) {
                    // ! INSERT POST INTO DATABASE
                    $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured, date_time) VALUES (?, ?, ?, ?, ?, ?, NOW())";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, 'sssiis', $title, $body, $thumbnail_name, $category_id, $author_id, $is_featured);
                    $result = mysqli_stmt_execute($stmt);

                    if ($result) {
                        $_SESSION['add-post-success'] = "Post added successfully";
                        header("Location: " . REGUSER . "userdash.php");
                        exit();
                    } else {
                        $_SESSION['add-post'] = "An error occurred";
                    }
                } else {
                    $_SESSION['add-post'] = "Failed to upload thumbnail";
                }
            } else {
                $_SESSION['add-post'] = "Image size is too large. Should be less than 2MB";
            }
        } else {
            $_SESSION['add-post'] = "File should be an image";
        }
    }

    // ! REDIRECT BACK TO ADD POST IF THERE IS AN ERROR
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('Location: ' . REGUSER . 'add-post-user.php');
        exit();
    }
} else {
    // Redirect to add post form if the form was not submitted
    header("Location: " . REGUSER . "add-post-user.php");
    exit();
}
