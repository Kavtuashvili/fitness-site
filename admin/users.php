<?php
session_start();
include "../includes/db.php";

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

if($search != ""){
    $users = mysqli_query($conn, "SELECT * FROM users 
        WHERE fullname LIKE '%$search%' 
        OR email LIKE '%$search%' 
        ORDER BY id DESC
    ");
} else {
    $users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="admin-body">
<div class="menu-toggle" onclick="toggleSidebar()">
    ☰
</div>
<div class="sidebar" id="sidebar">
    <h2>🏋️ FIT ADMIN</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="users.php">👤 Users</a>
    <a href="website.php">🌐 Website</a>
    <a href="../logout.php">🚪 Logout</a>
</div>

<div class="main">

    <h1>Users List</h1>
    <form method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search user..." value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
    <button type="submit">Search</button>
</form>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($users)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>
<script src="../js/script.js"></script>
</body>
</html>