<?php


include "includes/db.php";
include "includes/navbar.php";




/* GET WORKOUTS */
$result = mysqli_query($conn, "SELECT * FROM workouts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Workouts</title>

    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="page-workouts">

<!--
<nav class="navbar">

    <div class="logo">
        🏋️ Fitness Zone
    </div>

    <ul class="nav-links">

        <li><a href="index.php">Home</a></li>

        <li><a href="workouts.php">Workouts</a></li>

        <li><a href="contact.php">Contact</a></li>

        <li><a href="login.php">Login</a></li>

    </ul>

</nav>-->
<!-- HERO -->
<section class="hero">
    <h1>💪 Transform Your Body</h1>
    <p>Choose the perfect workout plan and start your fitness journey today.</p>

    <a href="#workouts" class="hero-btn">
        Explore Workouts
    </a>
</section>
<!-- STATS -->
<section class="stats">

    <div class="stat-box">
        <h2>500+</h2>
        <p>Members</p>
    </div>

    <div class="stat-box">
        <h2>50+</h2>
        <p>Programs</p>
    </div>

    <div class="stat-box">
        <h2>10+</h2>
        <p>Trainers</p>
    </div>

    <div class="stat-box">
        <h2>95%</h2>
        <p>Success Rate</p>
    </div>

</section>

<!-- CATEGORIES -->
<section class="categories">

    <div class="category-card">🔥 Fat Loss</div>
    <div class="category-card">💪 Muscle Gain</div>
    <div class="category-card">🏃 Cardio</div>
    <div class="category-card">⚡ HIIT</div>

</section>

<!-- WORKOUTS -->
<section id="workouts">

    <h2 class="section-title">Our Programs</h2>

    <div class="workouts-grid">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <a href="workout_detail.php?id=<?php echo $row['id']; ?>" class="workout-card">

            <div class="image-wrapper">
                <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                  <?php if($row['is_premium'] == 1){ ?>
        <span class="lock-badge">🔒 Premium</span>
    <?php } ?>
            </div>

            <div class="workout-info">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['description']; ?></p>
            </div>

        </a>

        <?php } ?>

    </div>

</section>

<!-- CTA -->
<section class="cta">

    <h2>Ready To Change Your Life?</h2>

    <p>
        Build strength, burn fat and become the best version of yourself.
    </p>

    <a href="contact.php" class="cta-btn">
        Start Today 🚀
    </a>

</section>

<!-- TESTIMONIALS -->
<section class="testimonials">

    <h2 class="section-title">Success Stories</h2>

    <div class="testimonial-grid">

        <div class="testimonial-card">
            ⭐⭐⭐⭐⭐
            <p>"Lost 12kg in 4 months!"</p>
            <h4>- Anna</h4>
        </div>

        <div class="testimonial-card">
            ⭐⭐⭐⭐⭐
            <p>"Best workout plans I've ever used."</p>
            <h4>- David</h4>
        </div>

        <div class="testimonial-card">
            ⭐⭐⭐⭐⭐
            <p>"Helped me gain muscle fast."</p>
            <h4>- Michael</h4>
        </div>

    </div>

</section>

<footer class="site-footer">

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