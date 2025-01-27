<?php
require '/Xampp/htdocs/Blogly/Backend/Admin/Partials/header.php';

?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>
            Edit Post
        </h2>

        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="Title">
            <select>
                <option value="1">Travel</option>
                <option value="2">Photography</option>
                <option value="3">Lifestyle</option>
                <option value="4">Fashion</option>
                <option value="5">Food</option>
                <option value="6">Technology</option>
                <option value="7">Business</option>
                <option value="8">Sports</option>
            </select>
            <textarea rows="10" placeholder="Share Your Story"></textarea>
            <div class="form_control inline">
                <input type="checkbox" id="is_featured" checked>
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