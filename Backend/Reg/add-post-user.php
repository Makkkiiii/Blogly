<?php
require '/Xampp/htdocs/Blogly/Partials/header.php';

// ! FETCHING CATEGORIES

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
$categories = $result;

// ! GET BACK FORM DATA IF FORM WAS INVALID
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

// ! UNSET SESSION DATA
unset($_SESSION['add-post-data']);

?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Add Post
        </h2>
        <?php if (isset($_SESSION['add-post'])): ?>
            <div class="alert_message error">
                <p><?php echo $_SESSION['add-post'];
                    unset($_SESSION['add-post']); ?></p>
            </div>
        <?php endif; ?>
        <form action="<?= REGUSER ?>add-post-logic-user.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" placeholder="Title" value="<?= $title ?>">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile; ?>
            </select>
            <textarea rows="10" name="body" placeholder="Share Your Story" value="<?= $body ?>"></textarea>
            <div class=" form_control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Add Posts</button>
        </form>
    </div>
</section>
<script src="/Blogly/JS/script.js"></script>

</body>


</html>