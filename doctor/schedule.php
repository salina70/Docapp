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
        .leftdash .a .active {
            background-color: #4b5c7a;
            /* a lighter/darker shade for active */
        }

        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            background: #f8fafc;
        }

        .container {
            display: flex;
            height: 90.5vh;
            width: 100%;
        }

        .leftdash {
            width: 14rem;
            display: flex;
            flex-direction: column;
            background: #1e293b;
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
            background: #273449;
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: .5rem;
            transition: background .3s, transform .2s;
        }

        .leftbox:hover {
            background: #374b70;
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
    </style>
</head>

<body>
    <?php include "../client/header.php"; ?>
    <div class="container">

        <div class="leftdash">
            <div class="leftbox" onclick="location.href='today-appointment.php';"><i class="fa-solid fa-calendar-day"></i> Today Appointments</div>
            <div class="leftbox" onclick="location.href='total-appointments.php';"><i class="fa-solid fa-calendar-check"></i> All Appointments</div>
            <div class="leftbox" onclick="location.href='patients.php';"><i class="fa-solid fa-user"></i> Patients</div>
            <div class="leftbox" onclick="location.href='schedule.php';"><i class="fa-solid fa-clock"></i> Schedule</div>
           <div class="leftbox" onclick="location.href='profile.php';"><i class="fa-solid fa-id-badge"></i> My Profile</div>
            <div class="leftbox" onclick="location.href='logout.php';"><i class="fa-solid fa-right-from-bracket"></i> Logout</div>
        </div>

        <div class="rightdash">
            <div class="cards">
                <div class="card">Appointments Today: 0</div>
                <div class="card">Total Patients: 0</div>
                <div class="card">Pending Requests: 0</div>
            </div>

           <!-- right panel -->
            
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const leftboxes = document.querySelectorAll('.leftbox');

            leftboxes.forEach(box => {
                box.addEventListener('click', () => {
                    // Remove active class from all boxes
                    leftboxes.forEach(b => b.classList.remove('active'));
                    // Add active class to the clicked box
                    box.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>