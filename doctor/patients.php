<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard | DocApp</title>
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
            width: 16rem;
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

        .admin-dashboard {
            padding: 1.5rem;
            background: #f8fafc;
            height: 100%;
            overflow-y: auto;
            /* controlled scroll if needed */
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
            width: 280px;
            /* fixed width prevents vertical stacking */
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
        .doctor .card-header {
            background: linear-gradient(135deg, #0d6efd, #0bbcd6);
        }

        .feedback .card-header {
            background: linear-gradient(135deg, #ff4b4b, #ff7a7a);
        }

        .appointments .card-header {
            background: linear-gradient(135deg, #28c76f, #20c997);
        }

        .patient .card-header {
            background: linear-gradient(135deg, #6c757d, #495057);
        }

        .staff .card-header {
            background: linear-gradient(135deg, #9b59b6, #b07cc6);
        }

        .reports .card-header {
            background: linear-gradient(135deg, #ff5f9e, #ff2d78);
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
            background: #fff;
            padding: 1rem;
            border-radius: .6rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: .6rem;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
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

        body {
            background: #f4f6fb;
            font-family: "Segoe UI", sans-serif;
        }

        .dashboard-wrapper {
            padding: 30px;
        }

        .dashboard-title {
            text-align: center;
            color: #0b5ed7;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .dashboard-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
        }

        /* Card */
        .dash-card {
            width: 270px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: 0.3s;
        }

        .dash-card:hover {
            transform: translateY(-6px);
        }

        /* Header */
        .card-header {
            padding: 18px;
            color: #fff;
        }

        .card-header h3 {
            margin: 0;
            font-size: 16px;
        }

        /* Body */
        .card-body {
            padding: 20px;
            color: #444;
        }

        .card-body i {
            font-size: 26px;
            color: #0b5ed7;
            margin-bottom: 10px;
            display: block;
        }

        .card-body h1 {
            margin: 0;
            font-size: 36px;
            color: #0b5ed7;
        }

        /* Footer */
        .card-footer {
            padding: 15px 20px;
            border-top: 1px solid #eee;
        }

        .card-footer a {
            color: #0b5ed7;
            text-decoration: none;
            font-weight: 600;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            /* 🔥 stops full page scroll */
        }

        .rightdash,
        .dashboard-wrapper {
            height: 100%;
            overflow-y: auto;
            /* 🔥 only right panel scrolls */
        }

        .blue .card-header {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
        }

        .red .card-header {
            background: linear-gradient(135deg, #dc3545, #c82333);
        }

        .green .card-header {
            background: linear-gradient(135deg, #28a745, #218838);
        }

        .orange .card-header {
            background: linear-gradient(135deg, #fd7e14, #e8590c);
        }

        .purple .card-header {
            background: linear-gradient(135deg, #6f42c1, #59339d);
        }

        .teal .card-header {
            background: linear-gradient(135deg, #6c757d, #495057);
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

            <a href="appointments.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'manage-doctors.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-user-doctor"></i> Appointments
            </a>

            <a href="profile.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'manage-patients.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-calendar-check"></i> View Profile
            </a>

            <a href="feedback.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'feedback.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-id-badge"></i> View Feedback
            </a>
            <a href="payments.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'payments.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-credit-card"></i> Payments
            </a>

            <a href="logout.php" class="leftbox">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>

        </div>


        <!-- right panel -->


    </div>
    <script>

    </script>

</body>

</html>