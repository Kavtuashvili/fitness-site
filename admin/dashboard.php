<?php
session_start();
include "../includes/db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
$userCount = mysqli_num_rows($users);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="admin-body">

<!-- SIDEBAR -->
<div class="menu-toggle" onclick="toggleSidebar()">
    ☰
</div>
    <div class="sidebar" id="sidebar">
    <h2>🏋️ FIT ADMIN</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="users.php">👤 Users</a>
    <a href="website.php">🌐 Website</a>
    <a href="../logout.php">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <div class="top-bar">
        <h1>Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['fullname']; ?></p>
    </div>

    <!-- STATS -->
    <div class="cards">

        <div class="card stat">
            <h2><?php echo $userCount; ?></h2>
            <p>Total Users</p>
        </div>

        <div class="card stat">
            <h2>0</h2>
            <p>Messages</p>
        </div>

        <div class="card stat">
            <h2>0</h2>
            <p>Bookings</p>
        </div>

    </div>

    <!-- RECENT USERS -->
    <div class="section">

        <h2>Recent Users</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($users)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <?php } ?>

        </table>

    </div>

</div>

<script src="../js/script.js"></script>
</body>
</html>