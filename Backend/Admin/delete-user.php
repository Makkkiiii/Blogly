<?php

require '/Xampp/htdocs/Blogly/Config/database.php';

if (isset($_GET['id'])) {
    // ! FETCHING DATA
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // ! FETCH USER
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ! MAKING SURE ONLY ONE USER IS RETURNED
    if ($result->num_rows == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = AVATAR . $avatar_name;

        // ! DELETING IMAGE
        if (file_exists($avatar_path)) {
            unlink($avatar_path);
        }

        $thumbnails_query = "SELECT * FROM posts WHERE user_id = $id";
        $thumbnails_result = mysqli_query($conn, $thumbnails_query);
        if (mysqli_num_rows($thumbnails_result) > 0) {
            while ($thumbnail = mysqli_fetch_assoc($thumbnails_result)) {
                $thumbnail_name = $thumbnail['thumbnail'];
                $thumbnail_path = THUMBNAIL . $thumbnail_name;
                $useritems_path = '/Xampp/htdocs/Blogly/UserItems/' . $thumbnail_name;

                // ! DELETING IMAGE FROM THUMBNAIL PATH
                if (file_exists($thumbnail_path)) {
                    unlink($thumbnail_path);
                }

                // ! DELETING IMAGE FROM USERITEMS PATH
                if (file_exists($useritems_path)) {
                    unlink($useritems_path);
                }

                // ! DELETING IMAGE
                if (file_exists($thumbnail_path)) {
                    unlink($thumbnail_path);
                }
            }
        }


        // ! DELETE USER FROM DATABASE
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $delete_user_result = $stmt->execute();

        if ($delete_user_result) {
            $_SESSION['delete-user-success'] = "Deleted user '{$user['firstname']}' '{$user['lastname']}' successfully.";
        } else {
            $_SESSION['delete-user'] = "Couldn't delete user '{$user['firstname']}' '{$user['lastname']}'.";
        }
    } else {
        $_SESSION['delete-user'] = "User not found.";
    }
}

header('location: ' . Backend . 'manage-users.php');
exit();
