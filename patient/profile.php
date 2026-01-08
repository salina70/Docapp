<?php
session_start();
include ("../server/db.php");

?>

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
            justify-content: center;
            align-items: center;
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

.profile-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.profile-card {
    width: 100%;
    max-width: 520px;
}


.profile-photo {
  text-align: center;
  margin-bottom: 1.5rem;
}

.profile-photo img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #0bbcd6;
}

.photo-actions {
  margin-top: 1rem;
  display: flex;
  justify-content: center;
  gap: 1rem;
}

.upload-btn, .update-btn {
  background: #0b5ed7;
  color: #fff;
  border: none;
  padding: 0.6rem 1rem;
  border-radius: 8px;
  cursor: pointer;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  gap: 0.4rem;
}

.upload-btn:hover, .update-btn:hover {
  background: #0bbcd6;
}

.info-title {
  font-size: 1.2rem;
  font-weight: 600;
  margin-bottom: 1rem;
  color: #374151;
}

.info-table {
  width: 100%;
  border-collapse: collapse;
}

.info-table th {
  text-align: left;
  padding: 0.6rem;
  color: #0b5ed7;
  width: 280px;
}

.info-table td {
  padding: 0.6rem;
  color: #374151;
  width: 280px;
}
.info{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
#edit{
    padding: .3rem .8rem;
    margin-right: 2rem;
    font-size: 1rem;
    cursor: pointer;
    background-color: var(--primary-dark);
    color: #fff;
    border: none;
    border-radius: 5px;
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
     <div class="rightdash">
<div class="profile-wrapper">

  <div class="profile-card">

    <!-- Profile Photo -->
    <div class="profile-photo">
      <img src="../public/images/default-avatar.png" alt="Patient Photo">
      <div class="photo-actions">
        <input type="file" id="upload-photo" hidden>
        <label for="upload-photo" class="upload-btn">
          <i class="fa-solid fa-upload"></i> Browse...
        </label>
        <button class="update-btn">
          <i class="fa-solid fa-image"></i> Update Photo
        </button>
      </div>
    </div>

    <!-- Patient Information -->
     <div class="info">
    <h3 class="info-title">Patient Information</h3>
    <button id="edit">Edit</button>
    </div>
    <table class="info-table">
      <tr>
        <th><i class="fa-solid fa-user"></i> Name</th>
        <td>Alex Sunny Alex</td>
      </tr>
      <tr>
        <th><i class="fa-solid fa-venus-mars"></i> Gender</th>
        <td>Male</td>
      </tr>
      <tr>
        <th><i class="fa-solid fa-envelope"></i> Email</th>
        <td>alexsunny@gmail.com</td>
      </tr>
      <tr>
        <th><i class="fa-solid fa-ring"></i> Marital Status</th>
        <td>Married</td>
      </tr>
      <tr>
        <th><i class="fa-solid fa-location-dot"></i> Address</th>
        <td>Dhaka</td>
      </tr>
      <tr>
        <th><i class="fa-solid fa-cake-candles"></i> Date of Birth</th>
        <td>12-11-1994</td>
      </tr>
      <tr>
        <th><i class="fa-solid fa-id-badge"></i> Username</th>
        <td>patient3</td>
      </tr>
    </table>

  </div>
</div>
</div>
    </div>
   
    <script>
  let edit = document.getElementById("edit");
  edit.addEventListener("click", function(){
    
  })
    </script>
    
</body>
</html>