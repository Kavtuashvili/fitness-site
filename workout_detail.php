
<?php
session_start();
include "includes/db.php";

$workout_id = $_GET['id'] ?? null;

if(!$workout_id){
    die("Invalid request");
}

$workout_id = (int)$workout_id;

/* GET WORKOUT */
$result = mysqli_query($conn, "SELECT * FROM workouts WHERE id=$workout_id");
$workout = mysqli_fetch_assoc($result);

if(!$workout){
    die("Workout not found");
}

/* USER CHECK */
$user_id = $_SESSION['user_id'] ?? null;

if(!$user_id){
    header("Location: login.php");
    exit();
}

/* GET USER */
$user = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT * FROM users WHERE id='$user_id'
"));

$user_role = $user['role'] ?? 'user';

/* PREMIUM CHECK */
$isLocked = false;

if($workout['is_premium'] == 1 && $user_role != 'premium'){
    header("Location: pricing.php");
    exit();
}

/* CHECK ALREADY ADDED */
$alreadyAdded = false;

$check = mysqli_query($conn, "
    SELECT * FROM user_workouts 
    WHERE user_id='$user_id' AND workout_id='$workout_id'
");

if(mysqli_num_rows($check) > 0){
    $alreadyAdded = true;
}

/* ADD WORKOUT */
if(isset($_POST['add_workout'])){

    if(!$alreadyAdded){

        mysqli_query($conn, "
            INSERT INTO user_workouts (user_id, workout_id)
            VALUES ('$user_id', '$workout_id')
        ");

        $alreadyAdded = true;

        echo "<script>alert('Workout added successfully!');</script>";
    } else {
        echo "<script>alert('Already added!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $workout['title']; ?></title>
    <link rel="stylesheet" href="css/stylee.css">
</head>

<body>

<div class="detail-page">

    <!-- IMAGE -->
    <div class="detail-image-box">
        <img src="uploads/<?php echo $workout['image']; ?>">
    </div>

    <!-- INFO -->
    <div class="detail-info">

        <h1><?php echo $workout['title']; ?></h1>

        <p><?php echo $workout['description']; ?></p>

        <!-- 🔒 PREMIUM BLOCK -->
        <?php if($isLocked){ ?>

            <div class="premium-box">
                🔒 This is a Premium Workout
                <br><br>
                <a href="pricing.php" class="auth-btn">Upgrade to Unlock</a>
            </div>

        <?php } ?>

        <!-- 🟢 BUTTONS -->
        <?php if(!$isLocked){ ?>

            <?php if($user_id){ ?>

                <?php if($alreadyAdded){ ?>

                    <button class="auth-btn" disabled style="background:#16a34a;">
                        ✔ Already Added
                    </button>

                <?php } else { ?>

                    <form method="POST">
                        <button type="submit" name="add_workout" class="auth-btn">
                            Add to My Workouts
                        </button>
                    </form>

                <?php } ?>

            <?php } else { ?>

                <a href="login.php?redirect=workout_detail.php?id=<?php echo $workout_id; ?>" class="auth-btn">
                    Login to Add Workout
                </a>

            <?php } ?>

        <?php } else { ?>

            <button class="auth-btn" disabled style="background:#64748b;">
                🔒 Locked
            </button>

        <?php } ?>

        <a href="workouts.php" class="back-btn">
            ← Back
        </a>

    </div>

</div>

</body>
</html>