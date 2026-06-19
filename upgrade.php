<?php

include "includes/auth.php"; 
include "includes/db.php";
include "includes/navbar.php";




$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upgrade to Premium</title>

    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="page-upgrade">



<!-- PAGE WRAPPER -->
<div class="upgrade-wrapper">

    <!-- LEFT INFO -->
    <div class="upgrade-info">

        <h1>💪 Unlock Your Full Potential</h1>

        <p>
            Get unlimited access to all workout programs, premium plans,
            and advanced training systems designed for real results.
        </p>

        <ul>
            <li>✔ All workout programs unlocked</li>
            <li>✔ Premium training plans</li>
            <li>✔ Progress tracking system</li>
            <li>✔ No restrictions</li>
        </ul>

        <div class="price">
            9.99$ <span>/ lifetime</span>
        </div>

    </div>

    <!-- RIGHT CARD -->
    <div class="upgrade-card">

        <div class="icon">
            <i class="fa-solid fa-crown"></i>
        </div>

        <h2>Premium Plan</h2>

        <p class="note">Secure instant payment with Stripe</p>

        <!-- PAYMENT BUTTON -->
        <a href="checkout.php" class="pay-btn">
            <i class="fa-solid fa-credit-card"></i>
            Pay with Card
        </a>

        
    </div>

</div>

</body>
</html>