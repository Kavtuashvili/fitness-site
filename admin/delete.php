<?php
include "../includes/db.php";
session_start();

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
}

header("Location: users.php");
exit();
?>