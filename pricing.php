<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pricing</title>
    <link rel="stylesheet" href="css/user.css">
</head>

<body class="page-pricing">

<div class="pricing-container">

    <a href="workouts.php" class="back-link">← Back</a>

    <h1 class="pricing-title">Choose Your Plan</h1>
    <p class="pricing-sub">Unlock workouts and achieve your fitness goals faster</p>

    <div class="pricing-grid">

        <!-- FREE PLAN -->
        <div class="plan-card">

            <h3>Free</h3>

            <div class="price">$0</div>

            <ul>
                <li>✔ Basic Workouts</li>
                <li>✔ Limited Access</li>
                <li>✔ Community Support</li>
            </ul>

            <a href="workouts.php" class="plan-btn free-btn">
                Continue Free
            </a>

        </div>

        <!-- PREMIUM PLAN -->
        <div class="plan-card premium-card">

            <span class="badge">MOST POPULAR</span>

            <h3>Premium</h3>

            <div class="price">$9.99</div>

            <ul>
                <li>✔ All Workout Programs</li>
                <li>✔ Full Access</li>
                <li>✔ No Limits</li>
                <li>✔ Future Updates</li>
            </ul>

            <a href="upgrade.php" class="plan-btn premium-btn">Go Premium</a>

        </div>

    </div>

</div>

</body>
</html>