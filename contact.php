<?php
include "includes/db.php";
include "includes/navbar.php";

$message_sent = "";

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];

    mysqli_query($conn, "INSERT INTO messages (name,email,message)
    VALUES ('$name','$email','$msg')");

    $message_sent = "Message sent successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="css/stylee.css">
</head>

<h1>🏋️ Start Your Transformation</h1>
<p>Send us your details and start your fitness journey today</p>


<!-- SUCCESS MESSAGE -->
<?php if($message_sent != "") { ?>
    <div class="success-box">
        <?php echo $message_sent; ?>
    </div>
<?php } ?>

<!-- FORM -->
<form method="POST" class="contact-form">

            <input type="text" name="name" placeholder="👤 Full Name" required>

            <input type="email" name="email" placeholder="📧 Email Address" required>

            <textarea name="message" placeholder="💪 Tell us your goal (lose weight, gain muscle...)" required></textarea>

            <button type="submit" name="send" class="card-btn">
                Join Now 🚀
            </button>

        </form>

    </div>

</div>

<!-- FOOTER (OUTSIDE FORM, OUTSIDE WRAPPER) -->
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