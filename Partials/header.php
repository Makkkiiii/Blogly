<?php
//  ! SESSION START IS INSIDE THIS FILE
require '/Xampp/htdocs/Blogly/Config/database.php';

// ! CHECKING FOR USER ID
if (!isset($_SESSION['user-id'])) {
    header('location: http://localhost/Blogly/Backend/Logins/signin.php');
    exit();
}

// ! FETCH CURRENT USER FROM DATABASE
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT avatar FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogly</title>
    <link rel="icon" type="image/x-icon" href="/Blogly/assets/BloglyIcon.png">
    <link rel="stylesheet" href="/Blogly/CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
    <nav>
        <div class="container nav_container">
            <a href="<?= Frontend ?>" class="nav_logo">
                <img src="/Blogly/assets/BloglyIcon.png" alt="logo_icon">Blogly</a>
            <ul class="nav_items">
                <li><a href="<?= Frontend ?>blog.php">Blog</a></li>
                <li><a href="<?= Frontend ?>about.php">About</a></li>
                <li><a href="<?= Frontend ?>services.php">Services</a></li>
                <li><a href="<?= Frontend ?>contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user-id'])): ?>
                    <li class="nav_profile">
                        <div class="avatar">
                            <img src="<?= AVATAR . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li>
                                <?php if (isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin']): ?>
                                    <a href="/Blogly/Backend/Admin/dashboard.php">Admin Dashboard</a>
                                <?php else: ?>
                                    <a href="<?= REGUSER ?>userdash.php">Dashboard</a>
                                <?php endif; ?>
                            </li>
                            <li><a href="/Blogly/Logics/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="<?= SIGNIN ?>">Sign In</a></li>
                <?php endif; ?>
            </ul>
            <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close_nav-btn"><i class="uil uil-times"></i></button>
        </div>
    </nav>
    <!-- END OF NAV -->
    <script src="/Blogly/JS/script.js"></script>