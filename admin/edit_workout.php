<?php
include "../includes/db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM workouts WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $desc = $_POST['description'];

    $imageName = $row['image'];

    if(!empty($_FILES['image']['name'])){
        $imageName = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $imageName);
    }

    mysqli_query($conn, "UPDATE workouts SET 
        title='$title',
        description='$desc',
        image='$imageName'
        WHERE id=$id
    ");

    header("Location: workouts.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Workout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="admin-body">

<div class="main">

    <div class="website-panel">

        <h2>✏️ Edit Workout</h2>

        <form method="POST" enctype="multipart/form-data" class="website-form">

            <label>Title</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>">

            <label>Description</label>
            <textarea name="description"><?php echo $row['description']; ?></textarea>

            <label>Image (optional)</label>
            <input type="file" name="image">

            <button type="submit" name="update" class="card-btn">
                Update
            </button>

        </form>

    </div>

</div>

</body>
</html>