<?php

// ! SESSION HAS BEEN ALREADY STARTED INSIDE THE CONSTANTS.PHP FILE SO ITS NOT NEEDED HERE

require '/Xampp/htdocs/Blogly/Config/constants.php';

// ! GET BACK FORM DATA IF THERE WAS A SIGN-IN ERROR

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

// ! DELETE SESSION DATA
unset($_SESSION['signin-data']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogly | Sign In</title>
    <link rel="icon" type="image/x-icon" href="/Blogly/assets/BloglyIcon.png">
    <link rel="stylesheet" href="/Blogly/CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign In</h2>
            <?php if (isset($_SESSION['signin'])): ?>
                <div class="alert_message success">
                    <p><?= $_SESSION['signin'];
                        unset($_SESSION['signin']); ?></p>
                </div>
            <?php endif; ?>
            <form action="<?= LOGICS ?>signin-logic.php" method="post">
                <input type="text" name="username_email" placeholder="Username or Email" value="<?= $username_email ?>" required>
                <input type="password" name="password" placeholder="Password" value="<?= $password ?>" required>
                <button type="submit" name="submit">Sign In</button>
                <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
            </form>
        </div>
    </section>
</body>

</html>