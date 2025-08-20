<?php
session_start();
include "database.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT username, email, age, weight, height, gender FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
} else {
    die("User not found!");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="./css/view-profile.css">
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                location.href = 'logout.php';
            }
        }
    </script>
</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <div class="container">
        <h1>Welcome back, <?php echo htmlspecialchars($user['username']); ?> </h1>
        <div class="profile-details">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($user['age']); ?></p>
            <p><strong>Weight:</strong> <?php echo htmlspecialchars($user['weight']); ?> kg</p>
            <p><strong>Height:</strong> <?php echo htmlspecialchars($user['height']); ?> cm</p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
        </div>

        <div class="button">
            <button class="button-edit" type="button" onclick="location.href='edit-profile.php'"> Edit Profile</button>
            <button class="button-logout" type="button" onclick="confirmLogout()"> Logout</button>
        </div>


    </div>
</body>

</html>