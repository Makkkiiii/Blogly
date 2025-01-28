<?php

// ! SESSION HAS BEEN ALREADY STARTED INSIDE THE CONSTANTS.PHP FILE SO ITS NOT NEEDED HERE

require '/Xampp/htdocs/Blogly/Config/database.php';

//  ! GET FORM DATA IF SUBMIT BUTTON WAS CLICKED

if (isset($_POST['submit'])) {
    // ! NO SQL INJECTION
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // ! VALIDATE INPUT VALUES

    if (!$firstname) {
        $_SESSION['add-user'] = "Please enter your First Name.";
    } elseif (!$lastname) {
        $_SESSION['add-user'] = "Please enter your Last Name.";
        header('location: ' . ADDUSER);
        die();
    } elseif (!$username) {
        $_SESSION['add-user'] = "Please enter your User Name.";
        header('location: ' . ADDUSER);
        die();
    } elseif (!$email) {
        $_SESSION['add-user'] = "Please enter your Email.";
        header('location: ' . ADDUSER);
        die();
    } elseif ($is_admin === null || $is_admin === '') {
        $_SESSION['add-user'] = "Please select user role.";
        header('location: ' . ADDUSER);
        die();
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = "Password should be more than 8 characters.";
        header('location: ' . ADDUSER);
        die();
    } elseif (!$avatar['name']) {
        $_SESSION['add-user'] = "Please add Avatar.";
        header('location: ' . ADDUSER);
        die();
    } else {
        // ! CHECK PASSWORD 
        if ($createpassword !== $confirmpassword) {
            $_SESSION['add-user'] = "Passwords do not match.";
            header('location: ' . ADDUSER);
            die();
        } else {
            // ! HASHING PASSWORD
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // ! CHECK IF USERNAME OR EMAIL ALREADY EXISTS IN DATABASE
            $user_check_query = "SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1";
            $stmt = mysqli_prepare($conn, $user_check_query);
            mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
            mysqli_stmt_execute($stmt);
            $user_check_result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['add-user'] = "Username or Email already exists.";
                header('location: ' . ADDUSER);
            } else {
                // ! WORKING WITH AVATAR
                // ! Rename avatar
                $time = time(); // ? MAKE EACH IMAGE NAME UNIQUE USING CURRENT TIMESTAMP
                $avatar_name = $time . '_' . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '/Xampp/htdocs/Blogly/UserItems/Avatars/' . $avatar_name;

                // ! VALIDATE FILE AS AN IMAGE

                $allowed_files = ['jpg', 'jpeg', 'png'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    // ! MAKE SURE IMAGE IS NOT MORE THAN 2MB. 
                    if ($avatar['size'] < 2000000) {
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = "Image size is too large. Should be less than 2MB";
                    }
                } else {
                    $_SESSION['add-user'] = "File should be an image.";
                }
            }
        }
    }

    // ! REDIRECT BACK TO ADDUSER PAGE IF ANY ISSUES OCCUR
    if (isset($_SESSION['add-user'])) {
        $_SESSION['add-user-data'] = $_POST;
        header('location: ' . ADDUSER);
        die();
    } else {
        // ! INSERT USER INTO DATABASE
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_user_query);
        mysqli_stmt_bind_param($stmt, 'ssssssi', $firstname, $lastname, $username, $email, $hashed_password, $avatar_name, $is_admin);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            $_SESSION['add-user'] = "Registration successful! You can now log in.";
            $_SESSION['add-user-type'] = "success";
        } else {
            $_SESSION['add-user'] = "Something went wrong. Please try again.";
            $_SESSION['add-user-type'] = "error";
        }

        header('location: http://localhost/Blogly/Backend/Admin/manage-users.php');
        exit();
    }
} else {
    // ! IF THE USER DID NOT CLICK THE ADDUSER UP BUTTON
    header('location: ' . ADDUSER);
    die();
}
