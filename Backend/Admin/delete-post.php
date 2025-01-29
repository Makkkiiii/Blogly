<?php
// filepath: /d:/Xampp/htdocs/Blogly/Backend/Admin/delete-post.php
require '/Xampp/htdocs/Blogly/Config/database.php';

if (isset($_GET['id'])) {
    // ! FETCHING DATA
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // ! FETCH POST
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    // ! MAKING SURE ONLY ONE POST IS RETURNED
    if ($result->num_rows == 1) {
        $image_name = $post['thumbnail'];
        $image_path = '/Xampp/htdocs/Blogly/UserItems/Thumbnails/' . $image_name;

        // ! DELETING IMAGE
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // ! DELETE POST FROM DATABASE
        $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $delete_post_result = $stmt->execute();

        if ($delete_post_result) {
            $_SESSION['delete-post-success'] = "Deleted post '{$post['title']}' successfully.";
        } else {
            $_SESSION['delete-post-error'] = "Couldn't delete post '{$post['title']}'.";
        }
    } else {
        $_SESSION['delete-post-error'] = "Post not found.";
    }
}

header('Location: ' . Backend . 'dashboard.php');
exit();
