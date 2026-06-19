<?php

include "includes/auth.php";
include "includes/db.php";
include "includes/navbar.php";

/* USER ID */
$user_id = $_SESSION['user_id'];

/* USER */
$user = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT * FROM users WHERE id='$user_id'
"));

/* TOTAL WORKOUTS */
$totalWorkouts = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT COUNT(*) as total 
    FROM user_workouts 
    WHERE user_id='$user_id'
"))['total'];

/* COMPLETED */
$completed = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT COUNT(*) as total 
    FROM user_progress 
    WHERE user_id='$user_id' AND completed=1
"))['total'];

/* LEVEL (FIXED LOGIC) */
$level = floor($completed / 5) + 1;

/* PROGRESS % */
$progress = $totalWorkouts > 0 
    ? ($completed / $totalWorkouts) * 100 
    : 0;

/* WORKOUT LIST */
$myWorkouts = mysqli_query($conn,"
    SELECT w.*
    FROM workouts w
    JOIN user_workouts uw ON w.id = uw.workout_id
    WHERE uw.user_id='$user_id'
");

/* REMOVE WORKOUT */
if(isset($_POST['remove'])){
    $wid = $_POST['workout_id'];

    mysqli_query($conn,"
        DELETE FROM user_workouts 
        WHERE user_id='$user_id' AND workout_id='$wid'
    ");

    mysqli_query($conn,"
        DELETE FROM user_progress 
        WHERE user_id='$user_id' AND workout_id='$wid'
    ");

    header("Location: profile.php");
    exit();
}

if(isset($_POST['complete'])){
    $wid = $_POST['workout_id'];

    $sql = "
        INSERT INTO user_progress (user_id, workout_id, completed)
        VALUES ('$user_id','$wid',1)
        ON DUPLICATE KEY UPDATE completed=1
    ";

    mysqli_query($conn, $sql);

    header("Location: profile.php");
    exit();
}

/* BADGES */
$badges = [];

if($totalWorkouts >= 1) $badges[] = "🥇 Starter";
if($totalWorkouts >= 5) $badges[] = "🔥 Active";
if($totalWorkouts >= 10) $badges[] = "💪 Consistent";
if($completed >= 5) $badges[] = "🏆 Finisher";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>profile</title>

<link rel="stylesheet" href="css/user.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="page-profile">
    





<div class="dashboard">

    <!-- HEADER -->
    <div class="header">

        <div class="user">
            <div class="avatar">
                <i class="fa-solid fa-dumbbell"></i>
            </div>

            <div>
                <h2><?php echo $user['fullname']; ?></h2>
                <p>Train. Track. Transform.</p>

                <span class="badge">LEVEL <?php echo $level; ?></span>
            </div>
        </div>

        <a href="logout.php" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>

    </div>

    <!-- ACHIEVEMENTS -->
    <div class="achievements">
        <?php foreach($badges as $b){ ?>
            <div class="ach"><?php echo $b; ?></div>
        <?php } ?>
    </div>

    <!-- STATS -->
    <div class="stats">

        <div class="card">
            <h3 class="count" data-value="<?php echo $totalWorkouts; ?>">0</h3>
            <p>Workouts</p>
        </div>

        <div class="card">
            <h3 class="count" data-value="<?php echo $level; ?>">0</h3>
            <p>Level</p>
        </div>

        <div class="card">
            <h3 class="count" data-value="<?php echo $completed; ?>">0</h3>
            <p>Completed</p>
        </div>

    </div>
<div class="calendar">
    <h3>🔥 Activity</h3>

    <div class="days">
        <div class="day active"></div>
        <div class="day active"></div>
        <div class="day"></div>
        <div class="day active"></div>
        <div class="day"></div>
        <div class="day active"></div>
        <div class="day"></div>
    </div>
</div>
    <!-- PROGRESS -->
    <div class="progress">
        <div class="progress-top">
            <h3>Progress</h3>
            <span><?php echo min($totalWorkouts*10,100); ?>%</span>
        </div>

        <div class="bar">
            <div class="fill" style="width:<?php echo min($totalWorkouts*10,100); ?>%"></div>
        </div>
    </div>

    <!-- WORKOUTS -->
    <h2 class="title">Your Workouts</h2>

    <div class="grid">

        <?php if(mysqli_num_rows($myWorkouts) > 0){ ?>

            <?php while($row = mysqli_fetch_assoc($myWorkouts)) { ?>

                <div class="card workout">

                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['description']; ?></p>

                 <form method="POST" action="profile.php">

    <input type="hidden" name="workout_id" value="<?php echo $row['id']; ?>">

    <button type="submit" class="remove" name="remove">
        <i class="fa-solid fa-trash"></i> Remove
    </button>

    <button type="submit" class="complete" name="complete">
        <i class="fa-solid fa-check"></i> Done
    </button>

</form>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="empty">
                Start your fitness journey 💪
            </div>

        <?php } ?>

    </div>

</div>

<script src="../js/script.js"></script>
</body>
</html>