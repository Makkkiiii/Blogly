<?php
include '/Xampp/htdocs/Blogly/Partials/header.php';

?>
<section class="contact_page">
    <h1>
        Contact Us
    </h1>
    <div class="contact_form">
        <form action="submit_contact_form.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Full Name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Valid Email" required>

            <label for="message">Message:</label>
            <div class="textarea-container">
                <textarea id="message" name="message" placeholder="Your Message" required
                    maxlength="100"></textarea>
                <div id="wordCount" class="wordCount">0/100</div>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>
</section>
<?php

include '/Xampp/htdocs/Blogly/Partials/footer.php';

?>