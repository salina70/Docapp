<?php
if (isset($_GET['login']) && $_GET['login'] == 'success') {
    echo "
    <script> 
    alert('you are logged in');
    window.history.replaceState({}, document.title, 'index.php');
    </script>
    ";
}

?>
<style>
    #chatBox {
        position: fixed;
        right: 20px;
        bottom: 90px;
        width: 320px;
        height: 420px;
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        display: none;
        flex-direction: column;
        z-index: 9999;
    }

    #chatBox.active {
        display: flex;
        transform: translateY(0);
    }

    /* Header */
    .chat-header {
        background: #0c6efc;
        color: #fff;
        padding: 12px;
        border-radius: 14px 14px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
    }

    /* Body */
    .chat-body {
        flex: 1;
        padding: 12px;
        overflow-y: auto;
        background: #f8fafc;
    }

    /* Messages */
    .chat-msg {
        padding: 8px 12px;
        margin-bottom: 8px;
        border-radius: 10px;
        max-width: 80%;
        font-size: 14px;
    }

    .chat-msg.bot {
        background: #e5e7eb;
        align-self: flex-start;
    }

    .chat-msg.user {
        background: #0c6efc;
        color: white;
        align-self: flex-end;
    }

    /* Footer */
    .chat-footer {
        display: flex;
        padding: 10px;
        border-top: 1px solid #e5e7eb;
    }

    .chat-footer input {
        flex: 1;
        padding: 8px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    #closeChat:hover {
        cursor: pointer;
    }

    .chat-footer button {
        margin-left: 6px;
        padding: 8px 12px;
        background: #0c6efc;
        border: none;
        color: white;
        border-radius: 6px;
        cursor: pointer;
    }

    /* Chatbot floating button */
    #mess {
        position: fixed;
        right: 20px;
        bottom: 20px;
        width: 60px;
        height: 60px;
        background: #2b518aff;
        color: #fff;
        border-radius: 50% 50% 10% 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        transition: transform 0.2s ease, background 0.2s ease;
    }

    #mess:hover {
        background: #084cdf;
        transform: scale(1.08);
    }

    #role {
        gap: 1rem;
        background-color: #282727ff;
        width: 68rem;
        height: 30rem;
    }

    .rolebox {
        height: 100vh;
        width: 100%;
        display: none;
        justify-content: center;
        align-items: center;
    }

    .box {
        width: 26rem;
        height: 14rem;
        padding: 3rem 1rem;
        background-color: gray;
        font-size: 2.5rem;
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 10000;
    }
/* Close icon */
#doctorModal .modal-close {
    position: absolute;
    top: 14px;
    right: 16px;
    font-size: 22px;
    color: #6b7280;
    cursor: pointer;
    transition: 0.2s;
}

#doctorModal .modal-close:hover {
    color: #dc2626;
    transform: scale(1.15);
}

    .modal-overlay.active {
        display: flex;
    }

    .modal-box {
        background: #fff;
        width: 420px;
        padding: 25px;
        border-radius: 12px;
        position: relative;
    }

    .modal-box h2 {
        margin-bottom: 15px;
    }

    .modal-box label {
        display: block;
        margin-top: 10px;
        font-weight: 600;
    }

    .modal-box input,
    .modal-box select,
    .modal-box textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
    }

    .modal-box button {
        margin-top: 15px;
        width: 40%;
        padding: 10px;
        background: #0c6efc;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .modal-close {
        position: absolute;
        top: 10px;
        right: 14px;
        font-size: 22px;
        cursor: pointer;
    }
    /* Doctor Modal Overlay */
#doctorModal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.55);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 10000;
}

/* Modal Box */
#doctorModal .modal-box {
    width: 820px;               /* wider */
    max-width: 95%;
    height: 80vh;               /* FIXED HEIGHT */
    background: #fff;
    padding: 1.8rem;
    border-radius: 14px;
    box-shadow: 0 15px 40px rgba(0,0,0,.3);
    overflow-y: auto;           /* SCROLL INSIDE */
}

/* Title */
#doctorModal h2 {
    font-size: 2rem;
    text-align: center;
    color: #0b5ed7;
    margin-bottom: .3rem;
}

#doctorModal .sub-text {
    text-align: center;
    font-size: .9rem;
    color: #6b7280;
    margin-bottom: 1.2rem;
}

/* Form layout */
#doctorModal .form-row {
    display: flex;
    gap: 1rem;
}

#doctorModal .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: .9rem;
    flex: 1;
}

#doctorModal label {
    font-weight: 600;
    margin-bottom: .35rem;
}

#doctorModal input {
    padding: .6rem;
    border-radius: 7px;
    border: 1px solid #d1d5db;
}

/* Buttons */
#doctorModal .modal-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 1.2rem;
}

#doctorModal .btn-cancel {
    background: #6c757d;
    color: #fff;
    border: none;
    padding: .6rem 1.4rem;
    border-radius: 7px;
}

#doctorModal .btn-submit {
    background: #0b5ed7;
    color: #fff;
    border: none;
    padding: .6rem 1.4rem;
    border-radius: 7px;
}
@media (max-width: 768px) {

    /* Modal box */
    #doctorModal .modal-box {
        width: 95%;
        height: 90vh;
        padding: 1.2rem;
        border-radius: 12px;
    }

    /* Stack fields vertically */
    #doctorModal .form-row {
        flex-direction: column;
        gap: 0;
    }

    /* Inputs */
    #doctorModal input {
        font-size: 14px;
        padding: .55rem;
    }

    /* Buttons full width */
    #doctorModal .modal-actions {
        flex-direction: column;
        gap: .7rem;
    }

    #doctorModal .btn-cancel,
    #doctorModal .btn-submit {
        width: 100%;
        padding: .7rem;
        font-size: 15px;
    }

    /* Close icon larger & touch friendly */
    #doctorModal .modal-close {
        font-size: 26px;
        top: 12px;
        right: 14px;
    }
}
@media (max-width: 768px) {
    #doctorModal label {
        font-size: 14px;
    }
}
body.modal-open {
    overflow: hidden;
}

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocApp - Book Appointment</title>
    <?php include "./client/commonfile.php"; ?>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <div class="modal-overlay" id="doctorModal">
    <div class="modal-box">
          <span class="modal-close" onclick="closeDoctorModal()">
            <i class="fa-solid fa-xmark"></i>
        </span>
        <h2>Doctor Registration</h2>
        <p class="sub-text">Submit details for admin verification</p>

        <form action="" method="POST" enctype="multipart/form-data">

            <!-- Name -->
            <div class="form-row">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" >
                </div>

                <div class="form-group">
                    <label>Your Age</label>
                    <input type="number" name="age" >
                </div>
            </div>

            <!-- Email & Phone -->
            <div class="form-row">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" >
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" >
                </div>
            </div>

            <!-- License -->
            <div class="form-group">
                <label>Medical License Number</label>
                <input type="text" name="license_number" >
            </div>

            <!-- Years -->
            <div class="form-row">
                <div class="form-group">
                    <label>Registration Year</label>
                    <input type="number" name="registration_year" >
                </div>

                <div class="form-group">
                    <label>First Practice Year</label>
                    <input type="number" name="first_practice_year" >
                </div>
            </div>

            <!-- Specialization -->
            <div class="form-group">
                <label>Specialization</label>
                <input type="text" name="specialization" >
            </div>

            <!-- Hospital -->
            <div class="form-group">
                <label>Current Hospital / Clinic</label>
                <input type="text" name="current_hospital">
            </div>

            <!-- Documents -->
            <div class="form-group">
                <label>Medical License / Certificate (Required)</label>
                <input type="file" name="medical_document"
                       accept=".pdf,.jpg,.jpeg,.png" >
            </div>

            <div class="form-group">
                <label>Experience Letter (Optional)</label>
                <input type="file" name="experience_letter"
                       accept=".pdf,.jpg,.jpeg,.png">
            </div>

            <!-- Actions -->
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeDoctorModal()">Cancel</button>
                <button type="submit" class="btn-submit" onclick="submitVerification()">Submit for Verification</button>
            </div>

        </form>
    </div>
</div>


    <!-- CHATBOT AI -->
    <div>
        <div id="mess">
            <i class="fa-solid fa-message"></i>
        </div>
        <div id="chatBox">
            <div class="chat-header">
                <span>DocApp Assistant</span>
                <i class="fa-solid fa-xmark" id="closeChat"></i>
            </div>

            <div class="chat-body" id="chatBody">
                <div class="chat-msg bot">
                    👋 Hi! I'm DocApp Assistant. How can I help you today?
                </div>
            </div>

            <div class="chat-footer">
                <input type="text" id="chatInput" placeholder="Type your message...">
                <button id="sendBtn" onclick="sendMessage()">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- BOOK APPOINTMENT POPUP -->
    <div id="bookAppointmentModal" class="modal-overlay">
        <div class="modal-box">

            <span class="modal-close" onclick="closeBookModal()">&times;</span>

            <h2>Book Appointment</h2>

            <form method="POST" action="server/book_appointment.php">

                <!-- appointment_code -->
                <input type="hidden" name="appointment_code" value="<?php echo 'APT-' . date('Ymd-His'); ?>">

                <!-- doctor_id -->
                <label>Select Doctor</label>
                <select name="doctor_id" required>
                    <option value="">-- Select Department --</option>
                    <!-- later load dynamically from DB -->
                    <option value="1"></option>
                </select>

                <!-- appointment_date -->
                <label>Appointment Date & Time</label>
                <input type="datetime-local" name="appointment_date" required>

                <!-- remarks -->
                <label>Remarks</label>
                <textarea name="remarks" placeholder="Describe your problem..."></textarea>

                <!-- hidden patient_user_id (from session later) -->
                <input type="hidden" name="patient_user_id" value="1">

                <button type="submit">Confirm Appointment</button>
            </form>
        </div>
    </div>


    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">
            <a href="./"><i class="fa-solid fa-notes-medical"></i> DocApp</a>
        </div>

        <div class="menu-toggle" id="menuToggle">
            <i class="fa-solid fa-bars"></i>
        </div>

        <ul class="nav-links" id="navLinks">
            <li><a href="./client/all-doctors.php">Find Doctors</a></li>
            <li>
                <a href="javascript:void(0)" onclick="openBookModal()">Book Appointment</a>
            </li>
             <li>
                <a href="javascript:void(0)"  class="become-doctor-btn" onclick="openDoctorModal()">Become a Doctor</a>
            </li>
            <li><a href="./client/premium-plans.php" class="premium-btn">Go Premium</a></li>
            <li><a href="./client/contact.php">Contact</a></li>
            <li><a href="#" class="join-btn" id="joinBtn"><i class="fa-solid fa-user-plus"></i> Login</a></li>
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
            <a href="client/all-doctors.php" class="view-all-btn">View All</a>
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
            <a href="client/all-hospitals.php" class="view-all-btn">View All</a>
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
                <p>Get priority booking, access to exclusive top-rated doctors, detailed health insights, personalized
                    recommendations, and enhanced features to manage your appointments efficiently by upgrading to
                    Premium.</p>
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

    <?php include "./client/footer.php"; ?>

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

    <script>
        const messIcon = document.getElementById("mess");
        const chatBox = document.getElementById("chatBox");
        const closeChat = document.getElementById("closeChat");
        const sendBtn = document.getElementById("sendBtn");
        const chatInput = document.getElementById("chatInput");
        const chatBody = document.getElementById("chatBody");

        /* Open chat */
        messIcon.onclick = () => {
            chatBox.classList.toggle("active");
        };

        /* Close chat */
        closeChat.onclick = () => {
            chatBox.classList.remove("active");
        };

        /* Send message button */
        sendBtn.addEventListener("click", sendMessage);

        /* Enter key */
        chatInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                sendMessage();
            }
        });

        function sendMessage() {
            const message = chatInput.value.trim();
            if (message === "") return;

            /* User message */
            const userMsg = document.createElement("div");
            userMsg.className = "chat-msg user";
            userMsg.textContent = message;
            chatBody.appendChild(userMsg);

            chatInput.value = "";
            chatBody.scrollTop = chatBody.scrollHeight;

            /* Call backend */
            fetch("server/chatbot.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ message: message })
            })
                .then(res => res.json())
                .then(data => {
                    const botMsg = document.createElement("div");
                    botMsg.className = "chat-msg bot";
                    botMsg.textContent = data.reply;
                    chatBody.appendChild(botMsg);
                    chatBody.scrollTop = chatBody.scrollHeight;
                })
                .catch(() => {
                    const errorMsg = document.createElement("div");
                    errorMsg.className = "chat-msg bot";
                    errorMsg.textContent = "⚠️ Unable to reach assistant.";
                    chatBody.appendChild(errorMsg);
                });

        }
        function openBookModal() {
            document.getElementById("bookAppointmentModal").classList.add("active");
        }

        function closeBookModal() {
            document.getElementById("bookAppointmentModal").classList.remove("active");
        }

        function openDoctorModal() {
    document.getElementById("doctorModal").style.display = "flex";
}

function closeDoctorModal() {
    document.getElementById("doctorModal").style.display = "none";
}
document.getElementById("doctorModal").addEventListener("click", function(e) {
    if (e.target === this) {
        closeDoctorModal();
    }

});



    </script>


    <script src="public/app.js"></script>

</body>

</html>