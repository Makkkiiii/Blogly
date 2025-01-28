<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

// ! FETCH USER FROM DATABASE EXCEPT FOR THE CURRENT USER

$current_admin_id = $_SESSION['user-id'];
$query = "SELECT * FROM users WHERE id != $current_admin_id";
$users = mysqli_query($conn, $query);

?>
<section class="dashboard">
    <!-- ? SHOWS ADD USER WAS SUCCESSFUL -->
    <?php if (isset($_SESSION['add-user'])) : ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['add-user'];
                unset($_SESSION['add-user']);
                ?>
            </p>
        </div>
        <!-- ? SHOWS EDIT USER WAS SUCCESSFUL -->
    <?php elseif (isset($_SESSION['edit-user'])) : ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </p>
        </div>
        <!-- ? SHOWS EDIT USER FAILED -->
    <?php elseif (isset($_SESSION['edit-user'])) : ?>
        <div class="alert_message error container">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="<?= Backend ?>add-post.php">
                        <i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= Backend ?>add-user.php">
                        <i class="uil uil-user-plus"></i>
                        <h5>Add user</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= Backend ?>add-category.php">
                        <i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= Backend ?>manage-users.php" class="active">
                        <i class="uil uil-users-alt"></i>
                        <h5>Manage Users</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= Backend ?>dashboard.php">
                        <i class="uil uil-setting"></i>
                        <h5>Manage Posts</h5>
                    </a>
                </li>
                <li>
                    <a href="<?= Backend ?>manage-categories.php">
                        <i class="uil uil-sliders-v-alt"></i>
                        <h5>Manage Category</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Users</h2>
            <?php if (mysqli_num_rows($users) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Admin</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php while ($user = mysqli_fetch_assoc($users)): ?>
                            <tr>
                                <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                                <td><?= "{$user['username']} " ?></td>
                                <td><a href="<?= Backend ?>edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= Backend ?>delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                                <td><?= $user['is_admin'] ? 'Yes' : 'No'  ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert_message error">
                    <?= "No users found" ?>
                </div>
            <?php endif; ?>

        </main>
    </div>

</section>

<?php

require '/Xampp/htdocs/Blogly/Partials/footer.php'


?>