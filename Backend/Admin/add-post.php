<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

// ! FETCHING CATEGORIES

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
$categories = $result;


?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Add Post
        </h2>
        <div class="alert_message error">
            <p>This is an error message.</p>
        </div>
        <form action="<?= LOGICS ?>add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" placeholder="Title">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile; ?>
            </select>
            <textarea rows="10" placeholder="Share Your Story"></textarea>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <div class="form_control inline">
                    <input type="checkbox" id="is_featured" name=" featured" value="1" id="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div>
            <?php endif; ?>
            <div class="form_control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
            </div>
            <button type="submit" name="submit" class="btn">Add Posts</button>
        </form>
    </div>
</section>
<script src="/Blogly/JS/script.js"></script>

</body>


</html>