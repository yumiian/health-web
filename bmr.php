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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BMR</title>
    <link rel="stylesheet" href="./css/bmi.css" />
</head>

<body>

    <?php
    include("navbar.php");
    ?>
    <div class="container bmr">
        <div class="title">BMR Calculator</div>
        <form class="calculator">
            <div class="input">
                <label for="age">Age</label>
                <input type="number" id="age" min="2" max="120" step="1" value="<?php echo htmlspecialchars($user['age']); ?>" />
            </div>

            <div class="input">
                <label for="weight">Weight (kg)</label>
                <input type="number" id="weight" min="0" step="0.1" value="<?php echo htmlspecialchars($user['weight']); ?>" />
            </div>

            <div class="input">
                <label for="height">Height (cm)</label>
                <input type="number" id="height" min="0" step="0.1" value="<?php echo htmlspecialchars($user['height']); ?>" />
            </div>

            <div class="gender">
                <label for="gender">Gender</label>

                <div class="gender-item">
                    <div class="male">
                        <input type="radio" id="male" name="gender" value="Male" <?php echo ($user['gender'] == 'Male') ? 'checked' : ''; ?> />
                        <label for="male">Male</label>
                    </div>

                    <div class="female">
                        <input type="radio" id="female" name="gender" value="Female" <?php echo ($user['gender'] == 'Female') ? 'checked' : ''; ?> />
                        <label for="female">Female</label>
                    </div>
                </div>
            </div>

            <div class="button">
                <button type="reset">Reset</button>
                <button type="submit">Calculate</button>
            </div>
        </form>

        <div class="output">
            <h3 id="bmi-h"></h3>
            <span id="bmi-value"></span>
            <span id="unit"></span>
        </div>

        <div class="error">
            <p id="error-msg"></p>
        </div>
    </div>

    <script src="./js/bmr.js"></script>
</body>

</html>