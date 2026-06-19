<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'] ?? null;
$role = $_SESSION['role'] ?? null;
?>

<nav class="navbar">

    <!-- LOGO -->
    <div class="logo">
        💪 Fitness
    </div>

    <!-- LINKS -->
    <ul class="nav-links">

        <li><a href="index.php">Home</a></li>
        <li><a href="workouts.php">Workouts</a></li>

        <?php if($user_id): ?>
            <li><a href="profile.php">Profile</a></li>
        <?php endif; ?>

        <?php if($user_id): ?>
            <li><a href="upgrade.php">Premium</a></li>
        <?php endif; ?>

        <?php if($role === 'admin'): ?>
            <li><a href="admin/dashboard.php">Admin</a></li>
        <?php endif; ?>

        <!-- RIGHT SIDE AUTH -->
        <div class="auth-links">

            <?php if($user_id): ?>
                <a href="logout.php" class="logout-btn">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
            <?php endif; ?>

        </div>

    </ul>

</nav>