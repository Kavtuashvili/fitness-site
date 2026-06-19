<?php
session_start();
include "../includes/db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM settings WHERE id=1");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $site_name = $_POST['site_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $instagram = $_POST['instagram'];

    mysqli_query($conn, "UPDATE settings SET 
        site_name='$site_name',
        email='$email',
        phone='$phone',
        address='$address',
        instagram='$instagram'
        WHERE id=1
    ");

    header("Location: settings.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="admin-body">
<div class="menu-toggle" onclick="toggleSidebar()">
    ☰
</div>
<div class="sidebar" id="sidebar">
    <h2>🏋️ FIT ADMIN</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="users.php">👥 Users</a>
    <a href="messages.php">📩 Messages</a>
    <a href="workouts.php">💪 Workouts</a>
    <a href="settings.php" class="active">⚙ Settings</a>
    <a href="../logout.php">🚪 Logout</a>
</div>

<div class="main">

    <div class="top-bar">
        <h1>⚙ Settings</h1>
        <p>Manage whole website configuration</p>
    </div>

    <div class="website-panel">

        <form method="POST" class="website-form">

            <label>Site Name</label>
            <input type="text" name="site_name" value="<?php echo $data['site_name']; ?>">

            <label>Email</label>
            <input type="text" name="email" value="<?php echo $data['email']; ?>">

            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $data['phone']; ?>">

            <label>Address</label>
            <input type="text" name="address" value="<?php echo $data['address']; ?>">

            <label>Instagram</label>
            <input type="text" name="instagram" value="<?php echo $data['instagram']; ?>">

            <button type="submit" name="update" class="card-btn">
                Save Changes
            </button>

        </form>

    </div>

</div>
<script src="../js/script.js"></script>
</body>
</html>