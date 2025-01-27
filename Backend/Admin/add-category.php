<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Add Category
        </h2>
        <div class="alert_message error">
            <p>This is an error message.</p>
        </div>
        <form action="">
            <input type="text" placeholder="Title">
            <textarea rows="9" placeholder="Description"></textarea>
            <button type="submit" class="btn">Add Category</button>

        </form>
    </div>
</section>

<?php

require '/Xampp/htdocs/Blogly/Partials/footer.php'


?>