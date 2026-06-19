<?php
session_start();
include 'includes/db.php';

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    /* GET USER */
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){

        $user = mysqli_fetch_assoc($result);

        /* CHECK PASSWORD */
        if(password_verify($password, $user['password'])){

           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

       if(isset($_SESSION['redirect_after_login'])){
    $redirect = $_SESSION['redirect_after_login'];
    unset($_SESSION['redirect_after_login']);

    header("Location: $redirect");
    exit();
}

if($user['role'] === 'admin'){
    header("Location: admin/dashboard.php");
    exit();
}

header("Location: profile.php");
exit();

        } else {
            $message = "Incorrect password!";
        }

    } else {
        $message = "User not found!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="auth-body">

    <a href="index.php" class="home-return-btn">
    <i class="fas fa-arrow-left"></i>
</a>




<div class="container">
   <div class="auth-logo">
    🏋️ <span>Fitness Zone</span>
</div>

    <div class="auth-title">Welcome Back</div>
<div class="auth-sub">Login to continue your fitness journey</div>

  <div class="auth-card  login-page">

  <?php if($message != "") { ?>
    <div class="error-box">
        <?php echo $message; ?>
    </div>
<?php } ?>
   <form method="POST">

    <div class="input-group">
        <input type="email" name="email" placeholder=" " required>
        <label>Email</label>
    </div>

   <div class="input-group">
    <input type="password" name="password" id="password" placeholder=" " required>
    <label>Password</label>

    <span class="toggle-pass" onclick="togglePassword()">👁</span>
</div>

   <button class="auth-btn" id="loginBtn" name="login" type="submit">
    Login
</button>

 <p class="forgot-link">
    <a href="forgot_password.php">Forgot Password?</a>
</p>
</form>
<p class="auth-switch">
    Don't have an account?
    <a href="signup.php">Sign Up</a>
</p>
</div>

</div>
 <script src="js/script.js"></script>
</body>
</html>