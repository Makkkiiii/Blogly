<?php
// filepath: /d:/Xampp/htdocs/Blogly/Backend/Admin/edit-post.php
require '/Xampp/htdocs/Blogly/Partials/header.php';

// ! FETCHING CATEGORIES FROM DATABASE
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($conn, $category_query);

// ! FETCHING FORM
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
    if (!$post) {
        header('Location: ' . Backend . 'dashboard.php');
        exit();
    }
} else {
    header('Location: ' . Backend . 'dashboard.php');
    exit();
}
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Post</h2>
        <?php if (isset($_SESSION['edit-post'])): ?>
            <div class="alert_message error">
                <p><?php echo $_SESSION['edit-post'];
                    unset($_SESSION['edit-post']); ?></p>
            </div>
        <?php elseif (isset($_SESSION['edit-post'])) : ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['edit-post'];
                    unset($_SESSION['edit-post']);
                    ?>
                </p>
            </div>
        <?php endif; ?>
        <form action="<?= REGUSER ?>edit-post-logic-user.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="previous_thumbnail" value="<?= $post['thumbnail'] ?>">
            <input type="text" name="title" placeholder="Title" value="<?= htmlspecialchars($post['title']) ?>">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $post['category_id'] ? 'selected' : '' ?>><?= $category['title'] ?></option>
                <?php endwhile; ?>
            </select>
            <textarea rows="10" name="body" placeholder="Share Your Story"><?= htmlspecialchars($post['body']) ?></textarea>

            <div class="form_control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>

<script src="/Blogly/JS/script.js"></script>

</body>

</html>