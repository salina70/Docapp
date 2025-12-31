 <style>
    .nav-links li a.menu-item.dashboard {
    color: var(--btn-text);
    background: var(--btn-bg);
    padding: 6px 12px;
    border-radius: var(--round);
    display: flex;
    align-items: center;
    gap: 6px;
    transition: var(--transition);
}

.nav-links li a.menu-item.dashboard:hover {
    background-color: var(--btn-hover-bg); 
}

 </style>
 <?php include("commonfile.php"); ?>
 <nav class="navbar">
        <div class="logo">
            <a href="../"><i class="fa-solid fa-notes-medical"></i> DocApp</a>
        </div>

        <div class="menu-toggle" id="menuToggle">
            <i class="fa-solid fa-bars"></i>
        </div>

        <ul class="nav-links" id="navLinks">
            <li><a href="../client/all-doctors.php">Doctors</a></li>
            <li><a href="" id="book-app-nav">Book Appointment</a></li>
            <li><a href="../client/premium-plans.php" class="premium-btn">Go Premium</a></li>
            <li><a href="../client/contact.php">Contact</a></li>
            <li><a href=".." class="menu-item dashboard" onclick="goDashboard()"></i><i class="fa-solid fa-gauge"></i>
         Dashboard</a></li>
        
        </ul>
    </nav>
   <style>
    :root {
    /* Brand Colors */
    --primary-color: #1285d1;
    --primary-dark: #1a6698;
    --text-light: #f5faff;
    --text-dark: #222;
    --hover-light: #c8f3ff;   /* best hover color */
    --card-bg: #ffffff;

    /* Gradients */
    --primary-gradient: linear-gradient(90deg, var(--primary-color), var(--primary-dark));

    /* Buttons */
    --btn-bg: #ffffff;
    --btn-text: var(--primary-color);
    --btn-hover-bg: #eaf7ff;
    --btn-hover-text: var(--primary-dark);

     /* New variable for "View All" button */
    --viewall-bg: #28a745;       /* green */
    --viewall-hover-bg: #218838; /* dark green */
    --viewall-text: #ffffff;

    /* Shadows */
    --shadow-soft: 0 2px 10px rgba(0,0,0,0.08);
    --shadow-medium: 0 3px 15px rgba(0,0,0,0.12);

    /* Spacing */
    --nav-padding: 12px 25px;
    --radius: 8px;
    --round: 20px;

    /* Font */
    --font-main: "Poppins", sans-serif;

    /* Transition */
    --transition: 0.3s ease;
}

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: var(--font-main);
}

body {
    background: #f5f7fa;
}

/* Navbar Container */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--nav-padding);
    background: var(--primary-gradient);
    box-shadow: var(--shadow-soft);
    position: sticky;
    top: 0;
    z-index: 100;
}

/* Logo */
.logo {
    font-size: 22px;
    font-weight: 600;
    color: var(--text-light);
    display: flex;
    align-items: center;
    gap: 8px;
}
.logo a{
text-decoration: none;
color: var(--text-light);
}
/* Nav Links */
.nav-links {
    list-style: none;
    display: flex;
    gap: 25px;
   align-items: center;

}

.nav-links li a {
    text-decoration: none;
    color: var(--text-light);
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: var(--transition);
}

.nav-links li a:hover {
    color: var(--hover-light);
}

/* Hamburger Icon */
.menu-toggle {
    display: none;
    font-size: 22px;
    cursor: pointer;
    color: var(--text-light);
}
.join-btn {
    background: var(--btn-bg);
    color: var(--btn-text) !important;
    padding: 8px 18px;
    border-radius: var(--round);
    font-weight: 600;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 6px;
}

.join-btn:hover {
    background: var(--btn-hover-bg);
    color: var(--btn-hover-text) !important;
}

/* Responsive Styles */
@media (max-width: 768px) {

    .menu-toggle {
        display: block;
    }
  
    .nav-links {
        display: none;
        position: absolute;
        top: 70px;
        right: -100%;
        width: 200px;
        align-items: flex-start;
        background: var(--card-bg);
        flex-direction: column;
        gap: 0;
        transition: var(--transition);
        box-shadow: var(--shadow-medium);
    }

    .nav-links li {
        border-bottom: 1px solid #eee;
    }

    .nav-links li:last-child {
        border-bottom: none;
    }

    .nav-links li a {
        padding: 15px;
        color: var(--text-dark);
    }

    .nav-links li a:hover {
        color: var(--primary-color);
    }

    .nav-links.active {
        right: 0;
    }
}

   </style>
<script src="../public/app.js"></script>

<script>
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
const body = document.querySelector("body");
menuToggle.addEventListener('click', () => {
    // Toggle the "active" class
    navLinks.classList.toggle('active');

    // Show/hide for small screens
    if(navLinks.classList.contains('active')){
        navLinks.style.display = "flex";
    } else {
        navLinks.style.display = "none";
    }
    
});
document.addEventListener('click', (e) => {
    if(!navLinks.contains(e.target) && !menuToggle.contains(e.target)){
        navLinks.classList.remove('active');
    }
});
</script>