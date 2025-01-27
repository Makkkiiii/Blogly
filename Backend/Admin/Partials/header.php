<?php
require 'Config/database.php';

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
                <li><a href="<?= SIGNIN ?>">Sign In</a></li>
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="/Blogly/assets/avatar1.jpg">
                    </div>
                    <ul>
                        <li><a href="<?= Backend ?>dashboard.php">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close_nav-btn"><i class="uil uil-times"></i></button>
        </div>
    </nav>
    <!-- END OF NAV -->
    <script src="/Blogly/JS/script.js"></script>