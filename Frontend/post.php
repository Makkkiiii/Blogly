<?php
include '/Xampp/htdocs/Blogly/Partials/header.php';

// ! FETCH POST DETAILS FROM DATABASE
if (isset($_GET['id'])) {
    $post_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch post details
    $post_query = "SELECT * FROM posts WHERE id = $post_id";
    $post_result = mysqli_query($conn, $post_query);
    $post = mysqli_fetch_assoc($post_result);

    // Fetch author details
    $author_id = $post['author_id'];
    $author_query = "SELECT * FROM users WHERE id = $author_id";
    $author_result = mysqli_query($conn, $author_query);
    $author = mysqli_fetch_assoc($author_result);

    // Fetch category details
    $category_id = $post['category_id'];
    $category_query = "SELECT title FROM categories WHERE id = $category_id";
    $category_result = mysqli_query($conn, $category_query);
    $category = mysqli_fetch_assoc($category_result);
} else {
    header('Location: ' . Frontend . 'index.php');
    exit();
}
?>

<section class="singlepost">
    <div class="container singlepost_container">
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <div class="post_author">
            <div class="post_author-avatar">
                <img src="/Blogly/UserItems/Avatars/<?= $author['avatar'] ?>" alt="Author Avatar">
            </div>
            <div class="post_author-info">
                <h5>By: <?= htmlspecialchars($author['firstname']) . ' ' . htmlspecialchars($author['lastname']) ?></h5>
                <small><?= date('M d, Y - H:i', strtotime($post['date_time'])) ?></small>
            </div>
        </div>
        <div class="singlepost_thumbnail">
            <img src="/Blogly/UserItems/Thumbnails/<?= $post['thumbnail'] ?>" alt="Post Thumbnail">
        </div>
        <p><?= nl2br(htmlspecialchars($post['body'])) ?></p>
    </div>
</section>

<?php include '/Xampp/htdocs/Blogly/Partials/footer.php'; ?>