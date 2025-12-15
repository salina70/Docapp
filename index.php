<?php  
if(isset($_GET['login']) && $_GET['login']=='success'){
    echo "
    <script> 
    alert('you are logged in');
    window.history.replaceState({}, document.title, 'index.php');
    </script>
    ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocApp - Book Appointment</title>
    <?php include ("./client/commonfile.php"); ?>
</head>
<body>
   
    <nav class="navbar">
        <div class="logo">
            <a href="./"><i class="fa-solid fa-notes-medical"></i> DocApp</a>
        </div>

        <div class="menu-toggle" id="menuToggle">
            <i class="fa-solid fa-bars"></i>
        </div>

        <ul class="nav-links" id="navLinks">
            <li><a href="#">Doctors</a></li>
            <li><a href="#">Book Appointment</a></li>
            <li><a href="./client/premium-plans.php" class="premium-btn">Go Premium</a></li>
            <li><a href="./client/contact.php">Contact</a></li>
            <li><a href="#" class="join-btn" id="joinBtn"><i class="fa-solid fa-user-plus"></i> Join</a></li>
        </ul>
    </nav>

<!-- hero section -->
<section class="hero">
    <div class="hero-content">
        <h1>Find the Best Doctors in Nepal</h1>
        <p>Your health, our priority — book appointments with trusted specialists instantly.</p>

        <div class="search-box">
            <div class="search-field">
                <i class="fa-solid fa-user-doctor"></i>
                <input type="text" placeholder="Search specialist, clinic or doctor">
            </div>

            <div class="search-field">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" placeholder="Enter location">
            </div>

            <button class="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i> Search
            </button>
        </div>
    </div>
</section>

<!-- Doctor Section -->
<section class="doctor-section">
   <div class="doctor-header">
        <h2 class="doctor-title">Top Doctors</h2>
        <a href="all-doctors.php" class="view-all-btn">View All</a>
    </div>
    <div class="doctor-slider-container">
        <button class="slide-btn left" id="slideLeft">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <div class="doctor-slider" id="doctorSlider">
            <!-- Cards will be injected here from JS -->
        </div>
        <button class="slide-btn right" id="slideRight">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</section>

<!-- HOSPITAL SECTION -->
<section class="hospital-section">
    <div class="hospital-header">
        <h2>Top Hospitals</h2>
        <a href="all-hospitals.php" class="view-all-btn">View All</a>
    </div>
    <div class="hospital-carousel">
        <button class="prev">&#10094;</button>
        <div class="hospital-cards" id="hospitalCards"></div>
        <button class="next">&#10095;</button>
    </div>
</section>

<!-- WHY DOCAPP SECTION -->
<section class="why-docapp">
    <div class="container">
        <h2>Why Choose DocApp?</h2>
        <div class="features">
            <div class="feature-card">
                <i class="fa-solid fa-user-doctor"></i>
                <h3>Expert Doctors</h3>
                <p>Access a wide range of verified specialists for all your health needs.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-calendar-check"></i>
                <h3>Easy Booking</h3>
                <p>Book appointments online in just a few clicks without any hassle.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-hospital"></i>
                <h3>Trusted Hospitals</h3>
                <p>Partnered with top hospitals ensuring quality care and services.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-headset"></i>
                <h3>24/7 Support</h3>
                <p>Our team is available around the clock to assist you whenever needed.</p>
            </div>
        </div>
    </div>
</section>

<!-- PREMIUM CTA SECTION -->
<section class="premium-cta">
    <div class="premium-container">
      
        <div class="premium-left">
            <h2>Unlock <span id="prem">Premium</span> Benefits</h2>
<p>Get priority booking, access to exclusive top-rated doctors, detailed health insights, personalized recommendations, and enhanced features to manage your appointments efficiently by upgrading to Premium.</p>
            <a href="./client/premium-plans.php" class="premium-btn">
                <i class="fa-solid fa-crown"></i> Go Premium
            </a>
        </div>
        <div class="premium-right">
            <video autoplay loop muted playsinline>
                <source src="public/videos/dr1.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</section>

<?php include("./client/footer.php"); ?>

<!-- LOGIN / SIGNUP POPUP -->
<div id="authModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Welcome to DocApp</h2>
        <div class="auth-buttons">
            <button id="loginBtn">Login</button>
            <button id="registerBtn">Register</button>
        </div>

        <!-- Login Form -->
        <form id="loginForm" class="auth-form" method="POST" action="server/login.php">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <!-- Register Form -->
        <form id="registerForm" class="auth-form" style="display: none;" method="POST" action="server/register.php">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</div>

<!-- BOOK APPOINTMENT MODAL -->
<div id="bookModal" class="modal">
  <div class="modal-content">
    <span class="close-book">&times;</span>
    <h2 id="bookDoctorName">Doctor Name</h2>
    <p id="bookDoctorSpecialty">Specialty</p>
    <form id="bookForm" method="POST" action="server/book_appointment.php">
        <input type="text" name="patient_name" placeholder="Your Name" required>
       <input type="email" name="patient_email" placeholder="Your Email" required>
        <input type="date" name="appointment_date" id="appointment_date" required min="">
        <button class="confirmBooking" type="submit">Confirm Booking</button>
    </form>
  </div>
</div>
</body>
</html>