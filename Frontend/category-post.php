<?php
include '/Xampp/htdocs/Blogly/Partials/header.php';

// ! FETCH CATEGORY TITLE AND POSTS FROM DATABASE
if (isset($_GET['category_id'])) {
    $category_id = filter_var($_GET['category_id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch category title
    $category_query = "SELECT title FROM categories WHERE id = $category_id";
    $category_result = mysqli_query($conn, $category_query);
    $category = mysqli_fetch_assoc($category_result);

    // Fetch posts for the category
    $posts_query = "SELECT * FROM posts WHERE category_id = $category_id ORDER BY id DESC";
    if (isset($_GET['query'])) {
        $search_query = filter_var($_GET['query'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $posts_query = "SELECT * FROM posts WHERE category_id = $category_id AND (title LIKE '%$search_query%' OR body LIKE '%$search_query%') ORDER BY id DESC";
    }
    $posts_result = mysqli_query($conn, $posts_query);
} else {
    header('Location: ' . Frontend . 'index.php');
    exit();
}
?>

<header class="category_title">
    <h2><?= htmlspecialchars($category['title']) ?></h2>
</header>

<section class="search_section">
    <form class="search_form" action="<?= Frontend ?>category-post.php" method="GET">
        <input type="hidden" name="category_id" value="<?= $category_id ?>">
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

<?php include '/Xampp/htdocs/Blogly/Partials/footer.php'; ?>