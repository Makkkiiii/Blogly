<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
} else {
    header('location: ' . Backend . 'manage-users.php');
    die();
}

?>
<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Edit User
        </h2>
        <form action="<?= LOGICS ?>edit-user-logic.php" method="POST">
            <input type="hidden" value="<?= $user['id'] ?>" name="id">
            <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last Name">
            <p>User Role</p>
            <select name="userrole">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User</button>

        </form>
    </div>
</section>
<script src="/Blogly/JS/script.js"></script>
</body>


</html>