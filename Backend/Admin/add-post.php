<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogly | Add Post</title>
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
            <ul class="nav_items">
                <li><a href="/Blogly/Frontend/blog.html">Blog</a></li>
                <li><a href="/Blogly/Frontend/about.html">About</a></li>
                <li><a href="/Blogly/Frontend/services.html">Services</a></li>
                <li><a href="/Blogly/Frontend/contact.html">Contact</a></li>
                <!-- <li><a href="signin.html">Sign In</a></li> -->
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="/Blogly/assets/avatar1.jpg">
                    </div>
                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close_nav-btn"><i class="uil uil-times"></i></button>
        </div>
    </nav>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>
                Add Post
            </h2>
            <div class="alert_message error">
                <p>This is an error message.</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="Title">
                <select>
                    <option value="1">Travel</option>
                    <option value="2">Photography</option>
                    <option value="3">Lifestyle</option>
                    <option value="4">Fashion</option>
                    <option value="5">Food</option>
                    <option value="6">Technology</option>
                    <option value="7">Business</option>
                    <option value="8">Sports</option>
                </select>
                <textarea rows="10" placeholder="Share Your Story"></textarea>
                <div class="form_control inline">
                    <input type="checkbox" id="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div>
                <div class="form_control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" id="thumbnail" accept="image/*">
                </div>
                <button type="submit" class="btn">Add Posts</button>
            </form>
        </div>
    </section>
    <script src="/Blogly/JS/script.js"></script>

</body>


</html>