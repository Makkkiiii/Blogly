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
<footer>
    <div class="footer_map">
        <h2>Our Location</h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.8387332920493!2d85.32740427457644!3d27.706138376183297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190a74aa1f23%3A0x74ebef82ad0e5c15!2sSoftwarica%20College%20of%20IT%20and%20E-Commerce!5e1!3m2!1sen!2snp!4v1737907845228!5m2!1sen!2snp"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="footer_contact">
        <h2>Contact Information</h2>
        <p><i class="uil uil-headphones"></i> support@blogly.com</p>
        <p><i class="uil uil-phone"></i> 01-4537385</p>
        <p><i class="uil uil-envelope"></i> supportblogly@gmail.com</p>
    </div>
    <div class="footer_socials">
        <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
        <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
    </div>
    <div class="footer_copyright">
        <small>Copyright &copy; 2025 Denish Maharjan </small>
    </div>
</footer>
<script src="/Blogly/JS/script.js"></script>
</body>

</html>