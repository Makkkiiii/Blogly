<?php

session_start();

require '/Xampp/htdocs/Blogly/Config/database.php';

//  ! LOGIC FOR SIGN UP BUTTON

if (isset($_POST['submit'])) {
    // ! NO SQL INJECTION
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // ! VALIDATE INPUT VALUES

    if (!$firstname) {
        $_SESSION['signup'] = "Please enter your First Name.";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Please enter your Last Name.";
        header('location: ' . SIGNUP);
        die();
    } elseif (!$username) {
        $_SESSION['signup'] = "Please enter your User Name.";
        header('location: ' . SIGNUP);
        die();
    } elseif (!$email) {
        $_SESSION['signup'] = "Please enter your Email.";
        header('location: ' . SIGNUP);
        die();
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Password should be more than 8 characters.";
        header('location: ' . SIGNUP);
        die();
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Please add Avatar.";
        header('location: ' . SIGNUP);
        die();
    } else {
        // ! CHECK PASSWORD 
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Passwords do not match.";
            header('location: ' . SIGNUP);
            die();
        } else {
            // ! HASHING PASSWORD
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // ! CHECK IF USERNAME OR EMAIL ALREADY EXISTS IN DATABASE
            $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
            $user_check_result = mysqli_query($conn, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "Username or Email already exists.";
                header('location: ' . SIGNUP);
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
                        $_SESSION['signup'] = "Image size is too large. Should be less than 2MB";
                    }
                } else {
                    $_SESSION['signup'] = "File should be an image.";
                }
            }
        }
    }

    // ! REDIRECT BACK TO SIGNUP PAGE IF ANY ISSUES OCCUR
    if (isset($_SESSION['signup'])) {
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . SIGNUP);
        die();
    } else {
        // ! INSERT USER INTO DATABASE
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES (?, ?, ?, ?, ?, ?, 0)";
        $stmt = mysqli_prepare($conn, $insert_user_query);
        mysqli_stmt_bind_param($stmt, 'ssssss', $firstname, $lastname, $username, $email, $hashed_password, $avatar_name);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            $_SESSION['signup'] = "Registration successful! You can now log in.";
            $_SESSION['signup-type'] = "success";
        } else {
            $_SESSION['signup'] = "Something went wrong. Please try again.";
            $_SESSION['signup-type'] = "error";
        }

        header('location: ' . SIGNUP);
        exit();
    }
} else {
    // ! IF THE USER DID NOT CLICK THE SIGN UP BUTTON
    header('location: ' . SIGNUP);
    die();
}
