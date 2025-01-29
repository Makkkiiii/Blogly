<?php
// ! PATH TO CONNECTION AND SESSION START
require '/Xampp/htdocs/Blogly/Config/database.php';
if (isset($_POST['submit'])) {

    // ! GET UPDATED FORM DATA

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    // ! CHECK FOR VALID INPUT

    if (empty($firstname) || empty($lastname)) {
        $_SESSION['edit-user'] = 'INVALID FORM INPUT ON EDIT PAGE';
        header('location: ' . Backend . 'edit-user.php?id=' . $id);
        die();
    } else {
        // ! UPDATE USER IN DATABASE

        $sql = "UPDATE users SET firstname = ?, lastname = ?, is_admin = ? WHERE id = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssii', $firstname, $lastname, $is_admin, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            $_SESSION['edit-user'] = "USER $firstname $lastname UPDATED SUCCESSFULLY";
        } else {
            $_SESSION['edit-user-failed'] = 'USER UPDATE FAILED';
        }
    }
}

header('location: ' . Backend . 'manage-users.php');
die();
