<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'] ?? null;
$role = $_SESSION['role'] ?? null;
?>

<nav class="main-navbar">

    <div class="nav-logo">
        🏋️ Fitness Zone
    </div>

    <div class="nav-links">

        <a href="index.php">Home</a>
        <a href="workouts.php">Workouts</a>
        <a href="contact.php">Contact</a>

        <?php if($user_id): ?>
            <a href="profile.php" class="profile-btn">Profile</a>
            <a href="upgrade.php" class="premium-btn">Premium</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php else: ?>
            <a href="login.php" class="login-btn">Login</a>
        <?php endif; ?>

    </div>

</nav>