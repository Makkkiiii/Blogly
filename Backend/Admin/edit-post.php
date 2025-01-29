<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

// ! FETCHING CATGEGORIES FROM DATABASE

$category_query = "SELECT * FROM categories";
$categories = mysqli_query($conn, $category_query);

// ! FETCHING FORM

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('Location: ' . Backend . 'dashboard.php');
    die();
}


?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Edit Post
        </h2>

        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="Title" value="<?php $post['title'] ?>">
            <select>
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile; ?>
            </select>
            <textarea rows="10" placeholder="Share Your Story"><?= $post['body'] ?></textarea>
            <div class="form_control inline">
                <input type="checkbox" id="is_featured" value="1" checked>
                <label for="is_featured">Featured</label>
            </div>
            <div class="form_control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" id="thumbnail" accept="image/*">
            </div>
            <button type="submit" class="btn">Update Posts</button>
        </form>
    </div>
</section>
<script src="/Blogly/JS/script.js"></script>

</body>


</html>