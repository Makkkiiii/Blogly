<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

?>

<section class="dashboard">
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
                    <a href="<?= Backend ?>dashboard.php" class="active">
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
            <h2>Manage Posts</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Wildlife</td>
                        <td><a href="<?= Backend ?>edit-post.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Food</td>
                        <td><a href="<?= Backend ?>edit-post.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Photography</td>
                        <td><a href="<?= Backend ?>edit-post.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>

                </tbody>
            </table>

        </main>
    </div>

</section>

<?php

require '/Xampp/htdocs/Blogly/Partials/footer.php'


?>