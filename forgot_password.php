<?php
include "includes/db.php";

$message = "";

if(isset($_POST['submit'])){

    $email = $_POST['email'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if($user){

        $token = bin2hex(random_bytes(16));

        mysqli_query($conn, "UPDATE users SET reset_token='$token' WHERE email='$email'");

        $message = "Check your email for reset instructions.";
    } else {
        $message = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="auth-body">
   <a href="index.php" class="home-return-btn">
    <i class="fas fa-arrow-left"></i>
</a>

<div class="auth-card">

    <h2>Forgot Password</h2>

    <p style="color:#cbd5e1; text-align:center;">
        Enter your email to reset password
    </p>

    <form method="POST">

        <div class="input-group">
            <input type="email" name="email" placeholder=" " required>
            <label>Email</label>
        </div>

        <button type="submit" name="submit" class="auth-btn">
            Send Reset Link
        </button>

    </form>

    <p style="margin-top:20px; color:#22c55e;">
        <?php echo $message; ?>
    </p>

</div>

</body>
</html>