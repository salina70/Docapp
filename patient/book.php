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

        .leftdash {  height: 91.5vh;
            width: 14rem;
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
.leftbox:hover{
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
.appointment-wrapper {

    padding: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #f8fafc;
}
.appointment-wrapper::-webkit-scrollbar{
    display: initial;
}
.appointment-title {
    font-size: 1.6rem;
    font-weight: 600;
    color: #0b5ed7;
    margin-bottom: 1.5rem;
    position: relative;
}

.appointment-title::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    background: #0bbcd6;
    margin: 6px auto 0;
    border-radius: 2px;
}

.appointment-card {
    width: 99%;
    max-width: 900px;
    background: #fff;
    padding: 1.8rem;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.form-group {
    width: 22rem;
    margin-bottom: 1.2rem;
}

.form-group label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.4rem;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.75rem 0.9rem;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    outline: none;
    font-size: 0.9rem;
    transition: border 0.2s ease, box-shadow 0.2s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #0bbcd6;
    box-shadow: 0 0 0 3px rgba(11, 188, 214, 0.15);
}

.confirm-btn {
    width: 100%;
    padding: 0.85rem;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #0b5ed7, #0bbcd6);
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.confirm-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(11, 94, 215, 0.35);
}
form {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* two columns */
    gap: 1.5rem; /* spacing between fields */
}

.form-group {
    width: 100%; /* let grid handle sizing */
    margin-bottom: 0; /* remove extra spacing */
}

textarea {
    grid-column: span 2; /* make textarea full width */
}

.confirm-btn {
    grid-column: span 2; /* button full width */
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

    <a href="book.php"
       class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'book.php' ? 'active' : '' ?>">
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
<div class="appointment-wrapper">

    <h2 class="appointment-title">
        <i class="fa-solid fa-calendar-plus"></i>
        Schedule New Appointment
    </h2>

    <div class="appointment-card">

      <form>

    <div class="form-group">
        <label>
            <i class="fa-solid fa-user"></i> Email
        </label>
        <input required type="text" placeholder="Enter Your Email">
    </div>

    <div class="form-group">
        <label>
            <i class="fa-solid fa-phone"></i> Phone Number
        </label>
        <input required type="text" placeholder="Enter Your Phone Number">
    </div>

    <div class="form-group">
        <label>
            <i class="fa-solid fa-calendar-days"></i> Appointment Date
        </label>
        <input type="date" required>
    </div>

    <div class="form-group">
        <label>
            <i class="fa-solid fa-clock"></i> Appointment Time
        </label>
        <input type="time" required>
    </div>

    <div class="form-group">
        <label>
            <i class="fa-solid fa-hospital"></i> Department
        </label>
        <select>
            <option>Select Department</option>
            <option>Cardiology</option>
            <option>Neurology</option>
            <option>Orthopedics</option>
        </select>
    </div>

    <div class="form-group">
        <label>
            <i class="fa-solid fa-notes-medical"></i> Symptoms
        </label>
        <textarea rows="3" placeholder="Describe your symptoms..."></textarea>
    </div>

    <button type="submit" class="confirm-btn">
        <i class="fa-solid fa-calendar-check"></i>
        Confirm Appointment
    </button>

</form>


    </div>

</div>

    </div>
    <script>
  
    </script>
    
</body>

</html>