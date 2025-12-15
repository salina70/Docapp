<footer class="footer">
    <div class="footer-container">
        <!-- About / Logo -->
        <div class="footer-about">
            <h2>DocApp</h2>
            <p>Your health, our priority. Connect with top doctors and hospitals easily.</p>
        </div>

        <!-- Quick Links -->
        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="all-doctors.php">Doctors</a></li>
                <li><a href="all-hospitals.php">Hospitals</a></li>
                <li><a href="premium.html">Premium</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal</p>
            <p><i class="fa-solid fa-phone"></i> +977 XXXXXXXX</p>
            <p><i class="fa-solid fa-envelope"></i> support@docapp.com</p>
        </div>

        <!-- Social Media -->
        <div class="footer-social">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 DocApp. All rights reserved.</p>
    </div>
</footer>

<style>
    /* FOOTER STYLING */
.footer {
    background: #343A48;   /* matches primary color */
    color: #f5faff;        /* light text */
    padding: 60px 20px 20px;
    font-family: var(--font-main);
}

.footer-container {
    max-width: 1200px;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: space-between;
}

.footer h2, .footer h3 {
    color: #f5faff;
    margin-bottom: 15px;
}

.footer p, .footer li, .footer a {
    color: #f5faff;
    font-size: 14px;
    text-decoration: none;
    margin-bottom: 10px;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links ul li:hover a {
    color: var(--hover-light); /* subtle hover effect */
}

.footer-contact i {
    margin-right: 8px;
}

.footer-social .social-icons a {
    display: inline-block;
    margin-right: 10px;
    color: #f5faff;
    font-size: 16px;
    transition: 0.3s;
}

.footer-social .social-icons a:hover {
    color: var(--hover-light);
}

.footer-bottom {
    text-align: center;
    padding: 15px 0 0 0;
    font-size: 13px;
    opacity: 0.8;
    border-top: 1px solid rgba(255,255,255,0.2);
    margin-top: 40px;
}

/* RESPONSIVE FOOTER */
@media (max-width: 1024px) {
    .footer-container {
        gap: 30px;
    }
}

@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 25px;
    }

    .footer-links ul li, .footer-contact p, .footer-social .social-icons a {
        font-size: 14px;
    }
}

</style>