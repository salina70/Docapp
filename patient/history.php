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
    
</div>
    </div>
    <script>
  
    </script>
    
</body>

</html>