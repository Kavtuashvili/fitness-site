<?php
session_start();
include "../includes/db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// GET DATA
$result = mysqli_query($conn, "SELECT * FROM homepage_content LIMIT 1");
$data = mysqli_fetch_assoc($result);

// UPDATE DATA
if(isset($_POST['update'])){

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $button = $_POST['button'];

    mysqli_query($conn, "UPDATE homepage_content SET 
        hero_title='$title',
        hero_subtitle='$subtitle',
        button_text='$button'
        WHERE id=1
    ");

    header("Location: homepage.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage Editor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="admin-body">
 <div class="menu-toggle" onclick="toggleSidebar()">
    ☰
</div>
<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <h2>🏋️ FIT ADMIN</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="users.php">👥 Users</a>
    <a href="website.php">🌐 Website</a>
    <a href="homepage.php">🏠 Homepage</a>
    <a href="../logout.php">🚪 Logout</a>

</div>

<!-- MAIN -->
<div class="main">

    <div class="top-bar">
        <h1>🏠 Homepage Editor</h1>
        <p>Edit your fitness landing page content</p>
    </div>

    <div class="website-panel">
<div class="homepage-grid">

    <!-- EDITOR -->
    <div class="website-panel">

        <h2>🏠 Homepage Editor</h2>

        <form method="POST" class="website-form">

            <label>Hero Title</label>
            <input type="text" name="title" value="<?php echo $data['hero_title']; ?>">

            <label>Hero Subtitle</label>
            <input type="text" name="subtitle" value="<?php echo $data['hero_subtitle']; ?>">

            <label>Button Text</label>
            <input type="text" name="button" value="<?php echo $data['button_text']; ?>">

            <button type="submit" name="update" class="card-btn">
                Save Changes
            </button>

        </form>

    </div>

    <!-- PREVIEW -->
    <div class="preview-card">

        <h3><?php echo $data['hero_title']; ?></h3>

        <p><?php echo $data['hero_subtitle']; ?></p>

        <a class="card-btn">
            <?php echo $data['button_text']; ?>
        </a>

        <hr style="margin:20px 0; opacity:0.2;">

        <p style="color:#cbd5e1;">
            🔥 This is how your homepage will look
        </p>

    </div>

</div>

    </div>

</div>
<script src="../js/script.js"></script>
</body>
</html>