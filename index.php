
<?php
include "includes/db.php";
include "includes/navbar.php";

$result = mysqli_query($conn, "SELECT * FROM workouts ORDER BY id DESC LIMIT 4");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fitness Zone</title>

    <link rel="stylesheet" href="css/stylee.css">
</head>

<body class="page-index">




<section class="hero">

    <div class="hero-badge">NEW FITNESS PLATFORM</div>

    <h1>Train smarter, not harder</h1>

    <p>
        Simple workout plans designed to help you stay consistent
        and actually see progress without overthinking everything.
    </p>

    <div class="hero-buttons">
        <a href="signup.php" class="hero-btn">Start Free</a>
        <a href="workouts.php" class="hero-btn secondary">View Programs</a>
    </div>

</section>


<section class="intro">

    <h2 class="section-title">Why people choose us</h2>

    <div class="features">

        <div class="feature-box">
            <h3>Simple Plans</h3>
            <p>No confusion. Just clear workouts.</p>
        </div>

        <div class="feature-box">
            <h3>Track Progress</h3>
            <p>See how your body improves over time.</p>
        </div>

        <div class="feature-box">
            <h3>Anytime Training</h3>
            <p>No gym pressure, train at your pace.</p>
        </div>

    </div>

</section>


<section class="preview">

    <h2 class="section-title">Latest Programs</h2>

    <div class="workouts-grid">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <a href="workout_detail.php?id=<?php echo $row['id']; ?>" class="workout-card">

            <img src="uploads/<?php echo $row['image']; ?>">

            <div class="workout-info">

                <h3><?php echo $row['title']; ?></h3>

                <p>
                    <?php echo substr($row['description'], 0, 70); ?>...
                </p>

            </div>

        </a>

        <?php } ?>

    </div>

</section>

<section class="pricing">

    <h2 class="section-title">Membership Plans</h2>

    <div class="pricing-grid">

        <!-- FREE -->
        <div class="price-card">
            <h3>Basic</h3>
            <p class="price">Free</p>

            <ul>
                <li>Limited workout access</li>
                <li>Basic fitness plans</li>
                <li>Community support</li>
            </ul>

            <a href="signup.php" class="price-btn">
                Get Started
            </a>
        </div>

        <!-- PRO -->
        <div class="price-card featured">
            <h3>Pro</h3>
            <p class="price">$9.99 / month</p>

            <ul>
                <li>Full workout library</li>
                <li>Progress tracking</li>
                <li>Advanced training plans</li>
                <li>Premium-only workouts</li>
            </ul>

            <a href="upgrade.php" class="price-btn">
                Go Pro 🚀
            </a>
        </div>

        <!-- ELITE -->
        <div class="price-card">
            <h3>Elite</h3>
            <p class="price">$19 / month</p>

            <ul>
                <li>Everything in Pro</li>
                <li>Personalized plans</li>
                <li>Priority updates</li>
                <li>Exclusive coaching content</li>
            </ul>

            <a href="upgrade.php" class="price-btn">
                Join Elite 💪
            </a>
        </div>

    </div>

</section>

<!-- CTA -->
<section class="cta">

    <h2>Ready to start your journey?</h2>

    <p>Join now and start building consistency.</p>

    <a href="signup.php" class="cta-btn">Create Account</a>

</section>

<div class="footer-container">

        <div class="footer-box">
            <h3>🏋️ Fitness Platform</h3>
            <p>Build your dream body with us</p>
        </div>

        <div class="footer-box">
            <h3>📞 Contact</h3>
            <p>+995 555 123 456</p>
            <p>fitness@support.com</p>
        </div>

        <div class="footer-box">
            <h3>🌍 Follow Us</h3>
            <p>Instagram | TikTok | YouTube</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© 2026 Fitness Platform. All rights reserved.</p>
    </div>

</footer>

</body>
</html>