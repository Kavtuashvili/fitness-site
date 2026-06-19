<?php
session_start();
include "../includes/db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

/* UPLOAD IMAGE */
if(isset($_POST['upload'])){

    $title = $_POST['title'];

    $imageName = time() . "_" . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $folder = "../uploads/" . $imageName;

    move_uploaded_file($tmp, $folder);

    mysqli_query($conn, "INSERT INTO images (title, image)
    VALUES ('$title', '$imageName')");

    header("Location: images.php");
    exit();
}

/* DELETE IMAGE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM images WHERE id=$id"));

    if($img){
        unlink("../uploads/" . $img['image']);
        mysqli_query($conn, "DELETE FROM images WHERE id=$id");
    }

    header("Location: images.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM images ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Images Manager</title>
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
    <a href="messages.php">📩 Messages</a>
    <a href="workouts.php">💪 Workouts</a>
    <a href="images.php" class="active">🖼 Images</a>
    <a href="settings.php">⚙ Settings</a>
    <a href="../logout.php">🚪 Logout</a>

</div>

<!-- MAIN -->
<div class="main">

    <div class="top-bar">
        <h1>🖼 Images Manager</h1>
        <p>Upload and manage your fitness gallery</p>
    </div>

    <!-- UPLOAD FORM -->
    <div class="website-panel">

        <h2>📤 Upload New Image</h2>

        <form method="POST" enctype="multipart/form-data" class="website-form">

            <label>Image Title</label>
            <input type="text" name="title" required>

            <label>Select Image</label>
            <input type="file" name="image" required>

            <button type="submit" name="upload" class="card-btn">
                Upload Image
            </button>

        </form>

    </div>

    <!-- GALLERY -->
    <div class="website-panel">

        <h2>🖼 Gallery</h2>

        <div class="image-grid">

            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <div class="image-card">

                    <img src="../uploads/<?php echo $row['image']; ?>">

                    <div class="image-info">
                        <h4><?php echo $row['title']; ?></h4>

                        <a href="images.php?delete=<?php echo $row['id']; ?>" class="delete-btn">
                            🗑 Delete
                        </a>
                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</div>
<script src="../js/script.js"></script>
</body>
</html>