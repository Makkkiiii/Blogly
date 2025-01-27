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
            <a href="/Blogly/Frontend/index.html" class="nav_logo">
                <img src="/Blogly/assets/BloglyIcon.png" alt="logo_icon">Blogly</a>
    </nav>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>
                Sign Up
            </h2>
            <div class="alert_message error">
                <p>This is an error message.</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
                <input type="text" placeholder="Username">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Create Password">
                <input type="password" placeholder="Confirm Password">
                <div class="form_control">
                    <label for="avatar">Profile Picture</label>
                    <input type="file" placeholder="Add Photo" id="avatar">
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>


</body>


</html>