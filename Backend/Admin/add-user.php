<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';


// ! GET BACK FORM DATA IF THERE WAS AN ERROR
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;


// ! UNSET SESSION DATA
unset($_SESSION['add-user-data']);


?>
<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Add User
        </h2>
        <form action="<?= LOGICS ?>add-user-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
            <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">
            <select name="userrole">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form_control">
                <label for="avatar">Profile Picture</label>
                <input type="file" name=" avatar" placeholder="Add Photo" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Add User</button>

        </form>
    </div>
</section>
<script src="/Blogly/JS/script.js"></script>
</body>


</html>