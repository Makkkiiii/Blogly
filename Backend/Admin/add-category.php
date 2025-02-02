<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

// ! GET BACK FORM DATA IF INVALID

$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);

?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Add Category
        </h2>
        <?php if (isset($_SESSION['add-category'])): ?>

            <div class="alert_message error ">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                    ?>
                </p>
            </div>
        <?php endif; ?>
        <form action="<?= LOGICS ?>add-category-logic.php" method="POST">
            <input type="text" value="<?= $title ?>" name="title" placeholder="Category Title">
            <textarea rows="9" value="<?= $description ?>" name="description" placeholder="Description"></textarea>
            <button type="submit" name="submit" class="btn">Add Category</button>

        </form>
    </div>
</section>

<?php

require '/Xampp/htdocs/Blogly/Partials/footer.php'


?>