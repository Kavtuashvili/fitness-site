<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fitness Site</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        🏋️ Fitness
    </div>

    <div class="nav-links">

        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>

        <?php if(isset($_SESSION['user_id'])): ?>

            <?php if($_SESSION['role'] == 'admin'): ?>
                <a href="admin/dashboard.php">Admin</a>
            <?php else: ?>
                <a href="user/dashboard.php">Dashboard</a>
            <?php endif; ?>

            <a href="logout.php">Logout</a>

        <?php else: ?>

            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>

        <?php endif; ?>

    </div>

</div>