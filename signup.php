<?php
include 'includes/db.php';

$message = "";

if(isset($_POST['register'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(fullname, email, password)
            VALUES('$fullname','$email','$password')";

    if(mysqli_query($conn, $sql)){
        $message = "Registration Successful!";
    }else{
        $message = "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    
</head>
<body class="auth-body">
    <a href="index.php" class="home-return-btn">
    <i class="fas fa-arrow-left"></i>
</a>

<div class="container">
<div class="auth-title">Join FitLife</div>
<div class="auth-sub">Create your account and start training today</div>
    <p class="message"><?php echo $message; ?></p>
    <div class="auth-card signup-page">
    <form method="POST">

        <div class="input-group">
        <input type="text" name="fullname"  placeholder=" "  required>
        <label>Full Name</label>
     </div>
       

     <div class="input-group">
    <input type="email" name="email"   placeholder=" " required>
    <label>Email</label>
</div>

       <div class="input-group">
       <input type="password" name="password"  placeholder=" "  required>
       <label>Password</label>
</div>

        <button type="submit" name="register" class="auth-btn">Sign Up</button>

    </form>
<p class="auth-switch">
    Already have an account?
    <a href="login.php">Login</a>
</p>

</div>
</div>
<script src="js/script.js"></script>
</body>
</html>