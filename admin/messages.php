<?php
include("../includes/db.php");

$result = mysqli_query($conn, "SELECT * FROM messages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="menu-toggle" onclick="toggleSidebar()">
    ☰
</div>

<div class="sidebar" id="sidebar">

    <div class="logo">
        🏋️ Fitness Admin
    </div>

    <ul>
        <li><a href="dashboard.php">🏠 Dashboard</a></li>

        <li><a href="website.php">🌐 Website</a></li>

        <li class="active">
            <a href="messages.php">📩 Messages</a>
        </li>

        <li><a href="users.php">👥 Users</a></li>

        <li><a href="../logout.php">🚪 Logout</a></li>
    </ul>

</div>

<div class="main">


    <div class="top-bar">
        <h1>📩 Messages</h1>
        <p>View contact form submissions</p>
    </div>

    <div class="table-card">

        <table class="messages-table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo htmlspecialchars($row['name']); ?></td>

                    <td><?php echo htmlspecialchars($row['email']); ?></td>

                    <td>
                        <?php echo htmlspecialchars($row['message']); ?>
                    </td>

                    <td>
                        <?php echo $row['created_at']; ?>
                    </td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>
<script src="../js/script.js"></script>
</body>
</html>