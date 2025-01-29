<?php
// ! PATH 

include '/Xampp/htdocs/Blogly/Partials/header.php';


?>
<!-- ============= MAIN PART TILL NAV IS INSIDE THE HEADER.PHP FILE  SINCE IT IS REPEATING FOR THE MOST PART=============-->

<section class="featured">
    <div class="container featured_container">
        <div class="post_thumbnail">
            <img src="/Blogly/assets/blog1.jpg">
        </div>
        <div class="post_info">
            <a href="<?= Frontend ?>category-post.php" class="category_button">Wildlife</a>
            <h2 class="post_title">
                <a href="<?= Frontend ?>post.php">The beauty of the wildlife</a>
            </h2>
            <p class="post_body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Quisquam,
                quos.
            </p>
            <div class="post_author">
                <div class="post_author-avatar">
                    <img src="/Blogly/assets/avatar2.jpg">
                </div>
                <div class="post_author-info">
                    <h5>By: Jane Doe</h5>
                    <small>June 10, 2025 - 07:23</small>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF FEATURED -->
<section class="posts">
    <div class="container posts_container">
        <article class="post">
            <div class="post_thumbnail">
                <img src="/Blogly/assets/blog3.jpg">
            </div>
            <div class="post_info">
                <a href="<?= Frontend ?>category-post.php" class="category_button">Wild life</a>
                <h3 class="post_title">
                    <a href="post.php">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt
                        perspiciatis aspernatur tempora labore natus in, maiores quae ad officiis provident optio
                        aliquam. Quo alias cum sed, nam a libero eaque?</a>
                </h3>
                <p class="post_body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Quisquam, quos.
                </p>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="/Blogly/assets/avatar3.jpg">
                    </div>
                    <div class="post_author-info">
                        <h5>By: Arthur Morgan</h5>
                        <small>June 13, 2025 - 07:13</small>
                    </div>
                </div>
            </div>
        </article>

        <article class="post">
            <div class="post_thumbnail">
                <img src="/Blogly/assets/blog7.jpg">
            </div>
            <div class="post_info">
                <a href="<?= Frontend ?>category-post.php" class="category_button">Wild life</a>
                <h3 class="post_title">
                    <a href="post.php">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt
                        perspiciatis aspernatur tempora labore natus in, maiores quae ad officiis provident optio
                        aliquam. Quo alias cum sed, nam a libero eaque?</a>
                </h3>
                <p class="post_body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Quisquam, quos.
                </p>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="/Blogly/assets/avatar4.jpg">
                    </div>
                    <div class="post_author-info">
                        <h5>By: Arthur Morgan</h5>
                        <small>June 13, 2025 - 07:13</small>
                    </div>
                </div>
            </div>
        </article>

        <article class="post">
            <div class="post_thumbnail">
                <img src="/Blogly/assets/blog5.jpg">
            </div>
            <div class="post_info">
                <a href="<?= Frontend ?>category-post.php" class="category_button">Wild life</a>
                <h3 class="post_title">
                    <a href="post.php">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt
                        perspiciatis aspernatur tempora labore natus in, maiores quae ad officiis provident optio
                        aliquam. Quo alias cum sed, nam a libero eaque?</a>
                </h3>
                <p class="post_body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Quisquam, quos.
                </p>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="/Blogly/assets/avatar5.jpg">
                    </div>
                    <div class="post_author-info">
                        <h5>By: Arthur Morgan</h5>
                        <small>June 13, 2025 - 07:13</small>
                    </div>
                </div>
            </div>
        </article>
        <article class="post">
            <div class="post_thumbnail">
                <img src="/Blogly/assets/blog8.jpg">
            </div>
            <div class="post_info">
                <a href="<?= Frontend ?>category-post.php" class="category_button">Wild life</a>
                <h3 class="post_title">
                    <a href="post.php">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt
                        perspiciatis aspernatur tempora labore natus in, maiores quae ad officiis provident optio
                        aliquam. Quo alias cum sed, nam a libero eaque?</a>
                </h3>
                <p class="post_body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Quisquam, quos.
                </p>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="/Blogly/assets/avatar8.jpg">
                    </div>
                    <div class="post_author-info">
                        <h5>By: Arthur Morgan</h5>
                        <small>June 13, 2025 - 07:13</small>
                    </div>
                </div>
            </div>
        </article>
    </div>

</section>
<!-- END OF POSTS -->
<section class="category_buttons">
    <div class="container category_buttons-container">
        <a href="<?= Frontend ?>category-post.php" class="category_button">Wildlife</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Travel</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Photography</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Lifestyle</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Fashion</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Food</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Technology</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Business</a>
        <a href="<?= Frontend ?>category-post.php" class="category_button">Sports</a>
    </div>
</section>
<!-- END OF CATEGORY -->

<?php

include '/Xampp/htdocs/Blogly/Partials/footer.php';

?>