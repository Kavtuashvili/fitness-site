<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Management</title>
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body class="admin-body">
    <div class="menu-toggle" onclick="toggleSidebar()">
    ☰
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <h2>🏋️ FIT ADMIN</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="users.php">👥 Users</a>
    <a href="website.php">🌐 Website</a>
    <a href="../logout.php">🚪 Logout</a>

</div>

<!-- MAIN CONTENT -->
<div class="main">

    <div class="top-bar">
        <h1>🌐 Website Management</h1>
        <p>Manage your fitness website from one place.</p>
    </div>

    <!-- OVERVIEW CARDS -->
    <div class="cards">

        <div class="card stat">
            <h2>🟢 Website Status</h2>
            <p>Your website is online and running.</p>
        </div>

        <div class="card stat">
            <h2>👥 Users</h2>
            <p>Manage registered users.</p>

            <a href="users.php" class="card-btn">
                Manage Users
            </a>
        </div>

        <div class="card stat">
            <h2>📞 Messages</h2>
            <p>View contact requests.</p>

            <a href="messages.php" class="card-btn">
                View Messages
            </a>
        </div>

    </div>

    <!-- CONTENT MANAGEMENT -->
    <div class="website-panel">

        <h2>🛠 Content Management</h2>

        <div class="action-buttons">

            <a href="homepage.php" class="action-btn">🏠 Homepage
                
            </a>

              <a href="workouts.php" class="action-btn">💪 Workouts</a>

            <a href="images.php" class="action-btn">
                🖼 Images
            </a>

          

        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="website-panel">

        <h2>⚡ Quick Actions</h2>

        <div class="action-buttons">

            <a href="../index.php" class="action-btn">
                🌍 View Website
            </a>

            <a href="users.php" class="action-btn">
                👥 Users
            </a>

            <a href="messages.php" class="action-btn">
                📩 Messages
            </a>

            <a href="settings.php"  class="action-btn">
                ⚙ Settings
            </a>

         
        </div>

    </div>

    <!-- WEBSITE PREVIEW -->
    <div class="website-panel">

        <h2>🏋️ Fitness Website Preview</h2>

        <div class="preview-card">

            <h3>Build Your Dream Body</h3>

            <p>
                Train smarter, eat better and track your progress.
            </p>

            <a href="../index.php" class="card-btn">
                Open Website
            </a>

        </div>

    </div>

    <!-- RECENT ACTIVITY -->
    <div class="website-panel">

        <h2>📋 Recent Activity</h2>

        <ul class="activity-list">

            <li>👤 New user registered</li>
            <li>🌐 Website viewed</li>
            <li>🔐 Admin logged in</li>

        </ul>

    </div>

</div>
<script src="../js/script.js"></script>

</body>
</html>