<?php
session_start();

/* after verifying email & password */
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

header("Location: ../dashboard/doctor.php");
exit;
?>
<?php session_start(); ?>

<?php
if (!isset($_SESSION['user_id'])) {
    // NOT LOGGED IN → Show first navbar
?>
<nav class="navbar">
    <div class="logo">
        <a href="./"><i class="fa-solid fa-notes-medical"></i> DocApp</a>
    </div>

    <div class="menu-toggle" id="menuToggle">
        <i class="fa-solid fa-bars"></i>
    </div>

    <ul class="nav-links" id="navLinks">
        <li><a href="./client/all-doctors.php">Doctors</a></li>
        <li><a href="#">Book Appointment</a></li>
        <li><a href="./client/premium-plans.php" class="premium-btn">Go Premium</a></li>
        <li><a href="./client/contact.php">Contact</a></li>
        <li><a href="#" class="join-btn" id="joinBtn">
            <i class="fa-solid fa-user-plus"></i> Join
        </a></li>
    </ul>
</nav>

<?php
} else {
    // LOGGED IN → Show second navbar
?>
<nav class="navbar">
    <div class="logo">
        <a href="./"><i class="fa-solid fa-notes-medical"></i> DocApp</a>
    </div>

    <div class="menu-toggle" id="menuToggle">
        <i class="fa-solid fa-bars"></i>
    </div>

    <ul class="nav-links" id="navLinks">
        <li><a href="./client/all-doctors.php">Doctors</a></li>
        <li><a href="#" id="book-app-nav">Book Appointment</a></li>
        <li><a href="./client/premium-plans.php" class="premium-btn">Go Premium</a></li>
        <li><a href="./client/contact.php">Contact</a></li>
        <li>
            <a href="./client/dashboard.php" class="menu-item dashboard">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="./server/logout.php">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </li>
    </ul>
</nav>
<?php } ?>
