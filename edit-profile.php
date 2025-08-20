<?php
session_start();
include "database.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT age, weight, height, gender FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_account']) && $_POST['delete_account'] == '1') {
        // Delete user account
        $sql_delete = "DELETE FROM users WHERE username = '$username'";
        if (mysqli_query($conn, $sql_delete)) {
            session_destroy();
            header("Location: login.php");
            exit();
        } else {
            $errorMsg = "Error deleting account!";
        }
    } else {
        $age = (int)$_POST['age'];
        $weight = (float)$_POST['weight'];
        $height = (float)$_POST['height'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];

        // Verify the user's current password
        $sql_password = "SELECT password FROM users WHERE username = '$username'";
        $result_password = mysqli_query($conn, $sql_password);
        $user_password = mysqli_fetch_assoc($result_password);

        if (password_verify($password, $user_password['password'])) {
            // Update user information
            $sql_update = "UPDATE users SET age = '$age', weight = '$weight', height = '$height', gender = '$gender' WHERE username = '$username'";
            if (mysqli_query($conn, $sql_update)) {
                $successMsg = "Profile updated successfully!";
            } else {
                $errorMsg = "Error updating profile!";
            }
        } else {
            $errorMsg = "Incorrect password! Please try again.";
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./css/edit-profile.css">
    <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                document.getElementById('delete_account_form').submit();
            }
        }
    </script>
</head>

<body>
    <?php include("navbar.php"); ?>

    <div class="container">
        <form action="edit-profile.php" method="post">
            <div class="input-container">
                <h1>Edit Profile</h1>

                <input type="number" id="age" name="age" placeholder="Age (Current: <?php echo htmlspecialchars($user['age']); ?>)" min="2" max="120" step="1" class="contact-input" required />
                <input type="number" id="weight" name="weight" placeholder="Weight (Current: <?php echo htmlspecialchars($user['weight']); ?>kg)" min="0" step="0.1" class="contact-input" required />
                <input type="number" id="height" name="height" placeholder="Height (Current: <?php echo htmlspecialchars($user['height']); ?>cm)" min="0" step="0.1" class="contact-input" required />

                <div class="gender">
                    <label for="gender">Gender:</label>
                    <div class="gender-item">
                        <div class="male">
                            <input type="radio" id="male" name="gender" value="male" <?php echo ($user['gender'] == 'Male') ? 'checked' : ''; ?> />
                            <label for="male">Male</label>
                        </div>
                        <div class="female">
                            <input type="radio" id="female" name="gender" value="female" <?php echo ($user['gender'] == 'Female') ? 'checked' : ''; ?> />
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>

                <input type="password" id="password" name="password" placeholder="Current Password" class="contact-input" required />

                <div class="button">
                    <button class="button-view" type="button" onclick="location.href='view-profile.php'">View Profile</button>
                    <button type="submit">Save Changes</button>
                </div>
            </div>
        </form>

        <form id="delete_account_form" action="edit-profile.php" method="post" style="display:none;">
            <input type="hidden" name="delete_account" value="1">
        </form>

        <button class="button-delete" type="button" onclick="confirmDelete()">Delete Account</button>

        <?php if (!empty($errorMsg)) : ?>
            <p class="errorMsg"><?php echo $errorMsg; ?></p>
        <?php endif; ?>
        <?php if (!empty($successMsg)) : ?>
            <p class="successMsg"><?php echo $successMsg; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>