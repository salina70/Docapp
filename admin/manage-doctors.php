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
            width: 12rem;
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

   .status {
    padding: 0.3rem 0.6rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
}

.status.pending {
    background: #fff3cd;
    color: #856404;
}

.status.approved {
    background: #d1fae5;
    color: #065f46;
}

.status.rejected {
    background: #fee2e2;
    color: #991b1b;
}

.btn {
    border: none;
    padding: 0.4rem 0.7rem;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.8rem;
}

.btn.approve {
    background: #28a745;
    color: #fff;
}

.btn.reject {
    background: #dc3545;
    color: #fff;
}

.btn:hover {
    opacity: 0.9;
}
.admin-dashboard{
    margin: 1rem 0 0 1rem;
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

            <a href="manage-doctors.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'manage-doctors.php' ? 'active' : '' ?>">
               <i class="fa-solid fa-user-doctor"></i> Manage Doctors
            </a>

            <a href="manage-patients.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'manage-patients.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-calendar-check"></i> Manage Patients
            </a>

            <a href="appointments.php"
                class="leftbox <?= basename($_SERVER['PHP_SELF']) == 'appointments.php' ? 'active' : '' ?>">
                <i class="fa-solid fa-file-lines"></i> Appointemnts
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
<div class="admin-dashboard">
    <h2 class="dashboard-title">Doctor Verification Requests</h2>

    <div class="table-container">
        <table border="2">
            <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>License No</th>
                    <th>Specialization</th>
                    <th>Registration Year</th>
                    <th>Hospital</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "../server/db.php";

                $query = "SELECT * FROM doctors WHERE verification_status = 'pending'";
                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['license_number']) ?></td>
                    <td><?= htmlspecialchars($row['specialization']) ?></td>
                    <td><?= $row['registration_year'] ?></td>
                    <td><?= $row['current_hospital'] ?? '—' ?></td>

                    <td>
                        <span class="status pending">Pending</span>
                    </td>

                    <td>
                        <form action="verify-doctor.php" method="POST" style="display:flex; gap:.4rem;">
                            <input type="hidden" name="doctor_id" value="<?= $row['id'] ?>">

                            <button name="action" value="approve" class="btn approve">
                                Approve
                            </button>

                            <button name="action" value="reject" class="btn reject">
                                Reject
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

    

    </div>
    <script>

    </script>

</body>

</html>