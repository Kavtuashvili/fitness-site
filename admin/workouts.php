<?php
session_start();
include "../includes/db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

/* ADD WORKOUT */
if(isset($_POST['add'])){

    $title = $_POST['title'];
    $is_premium = $_POST['is_premium'];
    $desc = $_POST['description'];

    $imageName = time() . "_" . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $folder = "../uploads/" . $imageName;

    move_uploaded_file($tmp, $folder);

  $is_premium = $_POST['is_premium'];

mysqli_query($conn, "INSERT INTO workouts (title, description, image, is_premium)
VALUES ('$title', '$desc', '$imageName', '$is_premium')");

    header("Location: workouts.php");
    exit();
}

/* DELETE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $w = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM workouts WHERE id=$id"));

    if($w){
        unlink("../uploads/" . $w['image']);
        mysqli_query($conn, "DELETE FROM workouts WHERE id=$id");
    }

    header("Location: workouts.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM workouts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Workouts</title>
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
    <a href="images.php">🖼 Images</a>
    <a href="workouts.php" class="active">💪 Workouts</a>
    <a href="settings.php">⚙ Settings</a>
    <a href="../logout.php">🚪 Logout</a>

</div>

<!-- MAIN -->
<div class="main">

    <div class="top-bar">
        <h1>💪 Workouts</h1>
        <p>Add and manage training programs</p>
    </div>

    <!-- ADD FORM -->
    <div class="website-panel">

        <h2>➕ Add New Workout</h2>

        <form method="POST" enctype="multipart/form-data" class="website-form">

            <label>Title</label>
            <input type="text" name="title" required>

            <label>Description</label>
            <textarea name="description" required></textarea>

            <label>Image</label>
            <input type="file" name="image" required>

            <label>Type</label>
            <select name="is_premium">
            <option value="0">Free Workout</option>
            <option value="1">Premium Workout</option>
            </select>

            <button type="submit" name="add" class="card-btn">
                Add Workout
            </button>

        </form>

    </div>

    <!-- LIST -->
    <div class="website-panel">

        <h2>🏋️ All Workouts</h2>

        <div style="display:flex; flex-wrap:wrap; gap:20px;">

            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <div class="image-card">

                    <img src="../uploads/<?php echo $row['image']; ?>">

                    <div class="image-info">

                        <h4><?php echo $row['title']; ?></h4>

                        <p style="color:#cbd5e1; font-size:13px;">
                            <?php echo $row['description']; ?>

                        </p>

                        <a href="edit_workout.php?id=<?php echo $row['id']; ?>" class="action-btn">
                        ✏️ Edit
                        </a>

                        <a href="workouts.php?delete=<?php echo $row['id']; ?>" class="delete-btn">
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