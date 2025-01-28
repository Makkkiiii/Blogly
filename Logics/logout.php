<?php
require '/Xampp/htdocs/Blogly/Config/constants.php';

session_destroy();
header('location: ' . HOMEPAGE);
die();
