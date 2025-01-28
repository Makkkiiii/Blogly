<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

// ! FETCH CATEGORIES FROM DATABASE
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($conn, $query);
?>


<section class="dashboard">
    <!-- ? SHOWS ADD CATEGORY WAS SUCCESSFUL -->
    <?php if (isset($_SESSION['add-category'])) : ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>
        </div>
        <!-- ? SHOWS EDIT category WAS SUCCESSFUL -->
    <?php elseif (isset($_SESSION['add-category-success'])) : ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
        </div>
        <!-- ? SHOWS EDIT category FAILED -->
    <?php elseif (isset($_SESSION['add-category-error'])) : ?>
        <div class="alert_message error container">
            <p>
                <?= $_SESSION['add-category-error'];
                unset($_SESSION['add-category-error']);
                ?>
            </p>
        </div>
        <!-- ? SHOWS DELETE CATEGORY WAS SUCCESSFUL -->
    <?php elseif (isset($_SESSION['delete-category-success'])) : ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </p>
        </div>
        <!-- ? SHOWS DELETE CATEGORY FAILED -->
    <?php elseif (isset($_SESSION['delete-category-error'])) : ?>
        <div class="alert_message error container">
            <p>
                <?= $_SESSION['delete-category-error'];
                unset($_SESSION['delete-category-error']);
                ?>
            </p>
        </div>
    <?php endif; ?>
    <!-- ? SHOWS EDIT CATEGORY WAS SUCCESSFUL -->
    <?php if (isset($_SESSION['edit-category-success'])) : ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
        </div>
        <!-- ? SHOWS EDIT CATEGORY FAILED -->
    <?php elseif (isset($_SESSION['edit-category-error'])) : ?>
        <div class="alert_message error container">
            <p>
                <?= $_SESSION['edit-category-error'];
                unset($_SESSION['edit-category-error']);
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
                    <a href="<?= Backend ?>manage-users.php">
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
                    <a href="<?= Backend ?>manage-categories.php" class="active">
                        <i class="uil uil-sliders-v-alt"></i>
                        <h5>Manage Category</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Categories</h2>
            <?php if (mysqli_num_rows($categories) > 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                            <tr>
                                <td><?= $category['title'] ?></td>
                                <td><a href="<?= Backend ?>edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= Backend ?>delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Delete</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert_message error"><?= "No categories found" ?> </div>
            <?php endif; ?>

        </main>
    </div>

</section>

<?php

require '/Xampp/htdocs/Blogly/Partials/footer.php'


?>