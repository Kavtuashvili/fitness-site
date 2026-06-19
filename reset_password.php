<?php
include "includes/db.php";

$token = $_GET['token'];
$message = "";

$result = mysqli_query($conn, "SELECT * FROM users WHERE reset_token='$token'");
$user = mysqli_fetch_assoc($result);

if(!$user){
    die("Invalid token");
}

if(isset($_POST['submit'])){

    $newpass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "UPDATE users SET password='$newpass', reset_token=NULL WHERE reset_token='$token'");

    $message = "Password changed successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-body">

<div class="auth-card">

    <h2>Reset Password</h2>

    <form method="POST">

        <div class="input-group">
            <input type="password" name="password" placeholder=" " required>
            <label>New Password</label>
        </div>

        <button type="submit" name="submit" class="auth-btn">
            Update Password
        </button>

    </form>

    <p style="color:#22c55e; margin-top:15px;">
        <?php echo $message; ?>
    </p>

</div>

</body>
</html>