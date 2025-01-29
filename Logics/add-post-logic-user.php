<?php

require '/Xampp/htdocs/Blogly/Config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = 0;
    if (isset($_POST['is_featured']) && $_SESSION['user-role'] === 'admin') {
        $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    }
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
        $thumbnail_destination_path = '/Xampp/htdocs/Blogly/UserItems/Thumbnails' . $thumbnail_name;

        // ! Make sure the file is an image
        $allowed_files = ['jpg', 'jpeg', 'png'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_files)) {
            // ! MAKE SURE IMAGE IS NOT TOO BIG (2MB)
            if ($thumbnail['size'] < 2_000_000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-post'] = 'File is too big';
            }
        } else {
            $_SESSION['add-post'] = 'File must be an image';
        }
    }

    // ! REDIRECT BACK WITH FORM DATA TO ADD POST PAGE IF THERE IS ANY PROBLEM
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('Location: ' . Backend . 'add-post.php');
        die();
    } else {
        // ! SET  IS_FEATURED TO 0 IF USER IS NOT ADMIN

        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured = 0";
            $zero_all_is_featured_result = mysqli_query($conn, $zero_all_is_featured_query);
        }

        // ! INSERT QUERY

        $query = "INSERT INTO posts (title, body,thumbnail, category_id, author_id, is_featured) VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['add-post'] = 'Post added successfully';
            header('Location: ' . Backend . 'dashboard.php');
            die();
        }
    }
}

header('Location: ' . Backend . 'add-post.php');
die();
