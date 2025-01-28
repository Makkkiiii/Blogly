<?php

// ! SESSION HAS BEEN ALREADY STARTED INSIDE THE CONSTANTS.PHP FILE SO ITS NOT NEEDED HERE

require '/Xampp/htdocs/Blogly/Config/database.php';

//  ! LOGIC FOR SIGN IN BUTTON

if (isset($_POST['submit'])) {
    // ! NO SQL INJECTION AND GET FORM DATA
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // ! VALIDATE INPUT VALUES

    if (!$username_email) {

        $_SESSION['signin'] = "Please enter your Username or Email.";
        header('location: ' . SIGNIN);
        die();
    } elseif (!$password) {
        $_SESSION['signin'] = "Please enter your Password.";
        header('location: ' . SIGNIN);
        die();
    } else {
        // ! FETCH USER FROM DATABASE
        $user_check_query = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email' LIMIT 1";
        $user_check_result = mysqli_query($conn, $user_check_query);

        if (mysqli_num_rows($user_check_result) == 1) {
            // ! CONVERTING THE RECORD INTO ASSOCIATIVE ARRAY
            $user_record = mysqli_fetch_assoc($user_check_result);
            $db_password = $user_record['password'];

            // ? COMBARING PASSWORD WITH HASHED PASSWORD

            if (password_verify($password, $db_password)) {
                // ! SETTING SESSION VARIABLES FOR ACCESS CONTROL
                $_SESSION['user-id'] = $user_record['id'];
                // ! CHECKING IF ADMIN OR NOT
                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;
                    header('location: ' . DASHBOARD);
                    die();
                } else {
                    $_SESSION['user_is_admin'] = false;
                    header('location: ' . USERDASH);
                    die();
                }
            } else {
                $_SESSION['signin'] = "Wrong Credentials.";
            }
        } else {
            $_SESSION['signin'] = "User does not exist.";
        }
    }
    // ! IF PROBLEM OCCURS REDIRECT TO SIGN IN PAGE
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . SIGNIN);
        die();
    }
} else {
    // ! CHECK IF USER EXISTS IN DATABASE
    header('location: ' . SIGNIN);
    die();
}
