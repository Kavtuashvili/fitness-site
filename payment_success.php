<?php

include "includes/auth.php";
include "includes/db.php";



$user_id = $_SESSION['user_id'];

/* MAKE PREMIUM */
mysqli_query($conn,"
    UPDATE users 
    SET role='premium'
    WHERE id='$user_id'
");

$_SESSION['role'] = 'premium';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Payment Success</title>

<link rel="stylesheet" href="css/success.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<div class="success-container">

    <div class="success-card">

        <div class="icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <h1>Payment Successful!</h1>

        <p>You are now a <b>Premium Member</b> 🎉</p>

        <a href="profile.php" class="btn">
            Go to Profile
        </a>

    </div>

</div>

</body>
</html>