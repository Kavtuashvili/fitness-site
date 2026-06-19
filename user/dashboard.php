<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo $_SESSION['fullname']; ?></h1>

<p>Role: <?php echo $_SESSION['role']; ?></p>

<a href="../logout.php">Logout</a>

</body>
</html>