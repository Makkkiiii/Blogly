<!-- ALL THE LINKS OR PATH TO THE FILES -->
<?php
session_start();

// ! Check if each constant is already defined before defining it
if (!defined('ROOT_URL')) {
    define('ROOT_URL', 'http://localhost/Blogly/');
}

if (!defined('Frontend')) {
    define('Frontend', 'http://localhost/Blogly/Frontend/');
}

if (!defined('Backend')) {
    define('Backend', 'http://localhost/Blogly/Backend/Admin/');
}

if (!defined('SIGNIN')) {
    define('SIGNIN', 'http://localhost/Blogly/Backend/Logins/signin.php');
}

if (!defined('SIGNUP')) {
    define('SIGNUP', 'http://localhost/Blogly/Backend/Logins/signup.php');
}

if (!defined('Contact')) {
    define('Contact', 'http://localhost/Blogly/Frontend/contact.php');
}

if (!defined('Category')) {
    define('Category', 'http://localhost/Blogly/Frontend/category-post.php');
}

if (!defined('LOGICS')) {
    define('LOGICS', 'http://localhost/Blogly/Logics/');
}

if (!defined('DASHBOARD')) {
    define('DASHBOARD', 'http://localhost/Blogly/Backend/Admin/dashboard.php');
}

if (!defined('USERDASH')) {
    define('USERDASH', 'http://localhost/Blogly/Backend/Admin/userdash.php');
}

if (!defined('HOMEPAGE')) {
    define('HOMEPAGE', 'http://localhost/Blogly/Frontend/index.php');
}


if (!defined('POST')) {
    define('POST', 'http://localhost/Blogly/Frontend/post.php');
}

if (!defined('AVATAR')) {
    define('AVATAR', 'http://localhost/Blogly/UserItems/Avatars/');
}
