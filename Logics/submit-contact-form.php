<?php
require '/Xampp/htdocs/Blogly/Config/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // ! Validate required fields
    if (!$fullname || !$email || !$message) {
        $_SESSION['contact_error'] = "All fields are required!";
        header("Location: http://localhost/Blogly/Frontend/contact.php");
        exit();
    }

    // ! Insert into database
    $query = "INSERT INTO messages (fullname, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $message);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['contact_success'] = "Your message has been sent successfully!";
    } else {
        $_SESSION['contact_error'] = "Something went wrong. Please try again!";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("Location: http://localhost/Blogly/Frontend/contact.php");
    exit();
} else {
    header("Location: http://localhost/Blogly/Frontend/contact.php");
    exit();
}
