<?php

// ! SESSION HAS BEEN ALREADY STARTED INSIDE THE CONSTANTS.PHP FILE SO ITS NOT NEEDED HERE

require '/Xampp/htdocs/Blogly/Config/constants.php';

// ! GET BACK FORM DATA IF THERE WAS A REGISTRATION ERROR

$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;


// ! DELETE SESSION DATA
unset($_SESSION['signup-data']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogly | Sign Up</title>
    <link rel="icon" type="image/x-icon" href="/Blogly/assets/BloglyIcon.png">
    <link rel="stylesheet" href="/Blogly/CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
    <nav>
        <div class="container nav_container">
            <a href="/Blogly/Frontend/index.php" class="nav_logo">
                <img src="/Blogly/assets/BloglyIcon.png" alt="logo_icon">Blogly</a>
    </nav>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>
                Sign Up
            </h2>
            <?php
            // ! DISPLAY SIGN UP ERROR MESSAGE
            if (isset($_SESSION['signup'])) :
                $message = $_SESSION['signup'];
                $messageType = $_SESSION['signup-type'] ?? 'error';
                unset($_SESSION['signup']);
                unset($_SESSION['signup-type']);
            ?>
                <div class="alert_message <?= $messageType ?>">
                    <p><?= $message; ?></p>
                </div>
            <?php endif; ?>

            <form action="<?= LOGICS ?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">

                <div class="form_control">
                    <label for="avatar">Profile Picture</label>
                    <input type="file" placeholder="Add Photo" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>


</body>


</html>