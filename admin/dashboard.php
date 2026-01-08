<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | DocApp</title>
    <?php include "../client/commonfile.php"; ?>
    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            background-color: #f8fafc;
        }

        .container {
            display: flex;
            height: 90.5vh;
            width: 100%;
        }

        /* Sidebar */
        .leftdash {
            width: 14rem;
            display: flex;
            flex-direction: column;
            background-color: #1e293b;
            color: #ffffff;
            overflow-y: auto;
            padding: 1rem 0;
        }

        .leftdash::-webkit-scrollbar {
            display: none;
        }

        .leftbox {
            padding: 0.9rem 1rem;
            border-radius: 0.6rem;
            background-color: #273449;
            color: #ffffff;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.3s, transform 0.2s;
        }

        .leftbox:hover {
            background-color: #374b70;
            transform: translateX(4px);
        }

        /* Right panel */
        .rightdash {
            flex: 1;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            overflow-y: auto;
        }

        /* KPI Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .card {
            background-color: #ffffff;
            padding: 1rem;
            border-radius: 0.6rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 0.6rem;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
.leftbox.active {
    background-color: #4b5c7a; /* a lighter/darker shade for active */
}

        th, td {
            padding: 0.8rem 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background-color: #f3f4f6;
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

        <!-- Sidebar -->
        <div class="leftdash">
            <div class="leftbox"><i class="fa-solid fa-user-doctor"></i> Manage Doctors</div>
            <div class="leftbox"><i class="fa-solid fa-user"></i> Manage Patients</div>
            <div class="leftbox"><i class="fa-solid fa-calendar-check"></i> Appointments</div>
            <div class="leftbox"><i class="fa-solid fa-credit-card"></i> Payments</div>
            <div class="leftbox"><i class="fa-solid fa-chart-line"></i> Reports</div>
            <div class="leftbox"><i class="fa-solid fa-gear"></i> Settings</div>
            <div class="leftbox"><i class="fa-solid fa-right-from-bracket"></i> Logout</div>
        </div>

        <!-- Right Panel -->
        <div class="rightdash">
            <div class="cards">
                <div class="card">Total Doctors: 0</div>
                <div class="card">Total Patients: 0</div>
                <div class="card">Appointments Today: 0</div>
                <div class="card">Revenue: Rs <span> 0</span></div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>09:00 AM</td>
                            <td>John Doe</td>
                            <td>Dr. Smith</td>
                            <td style="color:green;">Confirmed</td>
                        </tr>
                        <tr>
                            <td>10:00 AM</td>
                            <td>Jane Roe</td>
                            <td>Dr. Adams</td>
                            <td style="color:orange;">Pending</td>
                        </tr>
                        <tr>
                            <td>11:30 AM</td>
                            <td>Mark Lee</td>
                            <td>Dr. Smith</td>
                            <td style="color:red;">Cancelled</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
