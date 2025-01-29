<?php
// filepath: /d:/Xampp/htdocs/Blogly/Logics/edit-post-logic.php
require '/Xampp/htdocs/Blogly/Config/database.php';

// ! MAKING SURE EDIT POST BUTTON WAS CLICKED
if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail = filter_var($_POST['previous_thumbnail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // ! SET is_featured to 0 if not checked
    $is_featured = $is_featured == 1 ? 1 : 0;

    // ! CHECK and validate INPUTS
    if (!$title) {
        $_SESSION['edit-post'] = "Couldn't update post. Title is required";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "Couldn't update post. Category is required";
    } elseif (!$body) {
        $_SESSION['edit-post'] = "Couldn't update post. Body is required";
    } else {
        // ! WORK ON THUMBNAIL
        if ($thumbnail['name']) {
            // ? DELETE PREVIOUS THUMBNAIL
            $previous_thumbnail_path = '/Xampp/htdocs/Blogly/UserItems/Thumbnails/' . $previous_thumbnail;
            if (file_exists($previous_thumbnail_path)) {
                unlink($previous_thumbnail_path);
            }

            // ? RENAME AND MOVE NEW THUMBNAIL
            $time = time();
            $thumbnail_name = $time . '_' . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '/Xampp/htdocs/Blogly/UserItems/Thumbnails/' . $thumbnail_name;

            $allowed_files = ['jpg', 'jpeg', 'png'];
            $extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);
            if (in_array($extension, $allowed_files)) {
                if ($thumbnail['size'] < 2000000) {
                    if (move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path)) {
                        $thumbnail_to_save = $thumbnail_name;
                    } else {
                        $_SESSION['edit-post'] = "Failed to upload new thumbnail";
                    }
                } else {
                    $_SESSION['edit-post'] = "Image size is too large. Should be less than 2MB";
                }
            } else {
                $_SESSION['edit-post'] = "File should be an image";
            }
        } else {
            $thumbnail_to_save = $previous_thumbnail;
        }

        // ! REDIRECT BACK TO EDIT POST IF THERE IS AN ERROR
        if (isset($_SESSION['edit-post'])) {
            $_SESSION['edit-post-data'] = $_POST;
            header('Location: ' . Backend . 'edit-post.php?id=' . $id);
            exit();
        } else {
            // ! SET is_featured OF ALL POSTS TO 0 IF is_featured FOR THIS POST IS 1
            if ($is_featured == 1) {
                $zero_all_is_featured_query = "UPDATE posts SET is_featured = 0";
                mysqli_query($conn, $zero_all_is_featured_query);
            }

            // ! UPDATE POST IN DATABASE
            $query = "UPDATE posts SET title = ?, body = ?, thumbnail = ?, category_id = ?, is_featured = ? WHERE id = ? LIMIT 1";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'sssiii', $title, $body, $thumbnail_to_save, $category_id, $is_featured, $id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['edit-post-success'] = "Post updated successfully";
                header("Location: " . Backend . "dashboard.php");
                exit();
            } else {
                $_SESSION['edit-post'] = "An error occurred";
                header('Location: ' . Backend . 'edit-post.php?id=' . $id);
                exit();
            }
        }
    }
} else {
    // Redirect to edit post form if the form was not submitted
    header("Location: " . Backend . "edit-post.php");
    exit();
}
