<?php
include '/Xampp/htdocs/Blogly/Partials/header.php';

// ! FETCH ALL POSTS FROM DATABASE
$posts_query = "SELECT * FROM posts ORDER BY id DESC";
if (isset($_GET['query'])) {
    $search_query = filter_var($_GET['query'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $posts_query = "SELECT * FROM posts WHERE LOWER(title) LIKE LOWER('%$search_query%') OR LOWER(body) LIKE LOWER('%$search_query%') ORDER BY id DESC";
}
$posts_result = mysqli_query($conn, $posts_query);

// ! FETCH ALL CATEGORIES FROM DATABASE
$categories_query = "SELECT * FROM categories";
$categories_result = mysqli_query($conn, $categories_query);
?>

<section class="search_section">
    <form class="search_form" action="<?= Frontend ?>blog.php" method="GET">
        <div class="search_input-container">
            <i class="uil uil-search search_icon"></i>
            <input type="text" class="search_input" name="query" placeholder="Search for blogs..." value="<?= isset($search_query) ? htmlspecialchars($search_query) : '' ?>">
        </div>
        <button type="submit" class="search_button">Search</button>
    </form>
</section>

<!-- ============= DISPLAY ALL POSTS =============-->
<section class="posts">
    <div class="container posts_container">
        <?php while ($post = mysqli_fetch_assoc($posts_result)) : ?>
            <article class="post">
                <div class="post_thumbnail">
                    <img src="/Blogly/UserItems/Thumbnails/<?= $post['thumbnail'] ?>" alt="Post Thumbnail">
                </div>
                <div class="post_info">
                    <?php
                    // Fetch category details
                    $category_id = $post['category_id'];
                    $category_query = "SELECT title FROM categories WHERE id = $category_id";
                    $category_result = mysqli_query($conn, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="<?= Frontend ?>category-post.php?category_id=<?= $post['category_id'] ?>" class="category_button"><?= htmlspecialchars($category['title']) ?></a>
                    <h3 class="post_title">
                        <a href="<?= Frontend ?>post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
                    </h3>
                    <p class="post_body">
                        <?= htmlspecialchars(substr($post['body'], 0, 150)) ?>...
                    </p>
                    <div class="post_author">
                        <?php
                        // Fetch author details
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id = $author_id";
                        $author_result = mysqli_query($conn, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                        ?>
                        <div class="post_author-avatar">
                            <img src="/Blogly/UserItems/Avatars/<?= $author['avatar'] ?>" alt="Author Avatar">
                        </div>
                        <div class="post_author-info">
                            <h5>By: <?= htmlspecialchars($author['firstname']) . ' ' . htmlspecialchars($author['lastname']) ?></h5>
                            <small><?= date('M d, Y', strtotime($post['date_time'])) ?></small>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<!-- ============= DISPLAY CATEGORY BUTTONS =============-->
<section class="category_buttons">
    <div class="container category_buttons-container">
        <?php while ($category = mysqli_fetch_assoc($categories_result)) : ?>
            <a href="<?= Frontend ?>category-post.php?category_id=<?= $category['id'] ?>" class="category_button"><?= htmlspecialchars($category['title']) ?></a>
        <?php endwhile; ?>
    </div>
</section>

<?php include '/Xampp/htdocs/Blogly/Partials/footer.php'; ?>