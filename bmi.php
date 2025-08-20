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
    <title>BMI</title>
    <link rel="stylesheet" href="./css/bmi.css" />
</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <div class="container bmi">
        <div class="title">BMI Calculator</div>
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
            <p id="bmi-category"></p>
        </div>

        <div class="error">
            <p id="error-msg"></p>
        </div>

        <div class="bmi-scale">
            <div style="--color: var(--underweight)">
                <h4 class="bmi-scale-h">Underweight</h4>
                <p>&lt; 18.5</p>
            </div>

            <div style="--color: var(--normal)">
                <h4 class="bmi-scale-h">Normal</h4>
                <p>18.5 – 25</p>
            </div>

            <div style="--color: var(--overweight)">
                <h4 class="bmi-scale-h">Overweight</h4>
                <p>25 – 30</p>
            </div>

            <div style="--color: var(--obese)">
                <h4 class="bmi-scale-h">Obese</h4>
                <p>30 - 35</p>
            </div>

            <div style="--color: var(--very-obese)">
                <h4 class="bmi-scale-h">Very Obese</h4>
                <p>≥ 35</p>
            </div>
        </div>
    </div>

    <script src="./js/bmi.js"></script>
</body>

</html>