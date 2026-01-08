<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard | DocApp</title>
    <?php include "../client/commonfile.php"; ?>
    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .leftbox.active {
            background-color: var(--primary-dark);
            /* a lighter/darker shade for active */
        }

        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
        }

        .container {
            display: flex;
            height: 90.5vh;
            width: 100%;
        }

        .leftdash {
            height: 91.5vh;
            width: 26rem;
            display: flex;
            flex-direction: column;
            background: var(--primary-color);
            color: #fff;
            overflow-y: auto;
            padding: 1rem 0;
        }

        .leftdash::-webkit-scrollbar {
            display: none;
        }

        .leftbox {
            padding: .9rem 1rem;
            border-radius: .6rem;
            background: var(--primary-color);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: .5rem;
            transition: background .3s, transform .2s;
        }

        .leftbox:hover {
            background: var(--btn-hover-bg);
            transform: translateX(4px);
        }

        .rightdash {
            flex: 1;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            overflow-y: auto;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .card {
            background: var(--primary-color);
            padding: 1rem;
            border-radius: .6rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .leftbox:hover {
            background-color: var(--primary-dark);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: .6rem;
            overflow: hidden;
        }

        th,
        td {
            padding: .8rem 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f3f4f6;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .table-container {
            overflow-x: auto;
        }

        .leftbox {
            text-decoration: none;
        }
    .patient-dashboard {
    padding: 1.5rem;
    background: #f8fafc;
    height: 100%;
    overflow-y: auto; /* controlled scroll if needed */
}

.dashboard-title {
    width: 100%;
    text-align: center;
    font-size: 1.8rem;
    font-weight: 600;
    color: #0b5ed7;
    margin-bottom: 1.5rem;
}

.dashboard-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
}


.dash-card {
    width: 280px; /* fixed width prevents vertical stacking */
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
}

.dash-card:hover {
    transform: translateY(-6px);
}

.card-header {
    padding: 1.2rem;
    color: #fff;
}

.card-header h3 {
    margin: 0;
    font-size: 1.1rem;
}

.card-header p {
    margin-top: 0.3rem;
    font-size: 0.85rem;
    opacity: 0.9;
}

.card-body {
    padding: 1.2rem;
    font-size: 0.9rem;
    color: #374151;
}

.card-body h4 {
    font-size: 1.6rem;
    margin: 0;
    color: #0b5ed7;
}

.card-body a {
    display: inline-block;
    margin-top: 0.8rem;
    font-weight: 600;
    color: #0b5ed7;
    text-decoration: none;
}

/* Card colors (MATCH IMAGE) */
.profile .card-header {
    background: linear-gradient(135deg, #0d6efd, #0bbcd6);
}

.feedback .card-header {
    background: linear-gradient(135deg, #ff4b4b, #ff7a7a);
}

.appointments .card-header {
    background: linear-gradient(135deg, #28c76f, #20c997);
}

.book .card-header {
    background: linear-gradient(135deg, #ff9f43, #ffa94d);
}

.invoice .card-header {
    background: linear-gradient(135deg, #9b59b6, #b07cc6);
}

.reports .card-header {
    background: linear-gradient(135deg, #17c3b2, #20dfc7);
}

    </style>
</head>

<body>
    <?php include "../client/header.php"; ?>
    <div class="container">

        <div class="leftdash">

            <a href="dashboard.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <a href="book.php" class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'book.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-calendar-plus"></i> Book Appointment
            </a>

            <a href="profile.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-calendar-check"></i> View Profile
            </a>

            <a href="history.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'history.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-file-lines"></i> Booking History
            </a>

            <a href="payments.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'payments.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-credit-card"></i> Payments
            </a>

            <a href="complaints.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'complaints.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-id-badge"></i> My Complaints
            </a>

            <a href="logout.php" class="leftbox">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>

        </div>


        <!-- right panel -->
      
<div class="patient-dashboard">

    <h2 class="dashboard-title">Patient Dashboard</h2>

    <div class="dashboard-cards">

        <div class="dash-card profile">
            <div class="card-header">
                <h3>My Profile</h3>
                <p>Manage your personal data & settings</p>
            </div>
            <div class="card-body">
                <p>Update your contact details, health information, and preferences</p>
                <a href="profile.php">Access Profile →</a>
            </div>
        </div>

        <div class="dash-card book">
            <div class="card-header">
                <h3>Make Appointment</h3>
                <p>Schedule a new appointment</p>
            </div>
            <div class="card-body">
                <p>Book with specialists and manage your schedule</p>
                <a href="book.php">Schedule Now →</a>
            </div>
        </div>

        <div class="dash-card appointments">
            <div class="card-header">
                <h3>Previous Appointments</h3>
                <p>Review your appointment history</p>
            </div>
            <div class="card-body">
                <h4>5</h4>
                <p>Total Appointments</p>
                <a href="history.php">View History →</a>
            </div>
        </div>

  <div class="dash-card feedback">
            <div class="card-header">
                <h3>Complain / Feedback</h3>
                <p>Report issues or provide feedback</p>
            </div>
            <div class="card-body">
                <p>We value your feedback to improve our services</p>
                <a href="complaints.php">Submit Feedback →</a>
            </div>
        </div>

    

        <div class="dash-card invoice">
            <div class="card-header">
                <h3>My Invoices</h3>
                <p>View and manage your billing</p>
            </div>
            <div class="card-body">
                <h4>12</h4>
                <p>Billing Statements</p>
                                <a href="#">View Invoices →</a>

            </div>
        </div>

        <div class="dash-card reports">
            <div class="card-header">
                <h3>Medical Reports</h3>
                <p>Access your test results and reports</p>
            </div>
            <div class="card-body">
                <h4>2</h4>
                <p>Reports Available</p>
                                <a href="#">View Reports →</a>

            </div>
        </div>

    </div>
</div>


    </div>
    <script>

    </script>

</body>

</html>