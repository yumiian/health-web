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
    <title>Calorie Needs Calculator</title>
    <link rel="stylesheet" href="./css/calorie.css">
</head>
<body>
    <?php
    include("navbar.php");
    ?>

    <div class="container">
        <h1>Calorie Needs Calculator</h1>
        <p>This tool helps you determine your daily calorie needs. 
            It uses the Mifflin-St Jeor Equation to estimate your Basal Metabolic Rate (BMR) and Total Daily Energy Expenditure (TDEE). 
            Knowing your daily calorie needs can help you manage your weight effectively.
        </p>
        <form id="calorieForm">
            <label for="gender">Gender:</label>
            <select id="gender" required>
                <option value="male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>

            <label for="age">Age:</label>
            <input type="number" id="age" min="1" max="120" value="<?php echo htmlspecialchars($user['age']); ?>" required>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" min="1" max="500" step="0.1" value="<?php echo htmlspecialchars($user['weight']); ?>" required>

            <label for="height">Height (cm):</label>
            <input type="number" id="height" min="30" max="300" step="0.1" value="<?php echo htmlspecialchars($user['height']); ?>" required>

            <label for="activity">Activity Level:</label>
            <select id="activity" required>
                <option value="1.2">Sedentary (little or no exercise)</option>
                <option value="1.375">Lightly active (light exercise/sports 1-3 days/week)</option>
                <option value="1.55">Moderately active (moderate exercise/sports 3-5 days/week)</option>
                <option value="1.725">Very active (hard exercise/sports 6-7 days a week)</option>
                <option value="1.9">Super active (very hard exercise/sports & a physical job)</option>
            </select>
    
            <label for="goal">Goal:</label>
            <select id="goal" required>
                <option value="maintain">Maintain weight</option>
                <option value="lose">Lose weight</option>
                <option value="gain">Gain weight</option>
            </select>

            <button type="submit">Calculate</button>
        </form>
        <div class="result" id="result"></div>
    </div>

    <script>
        document.getElementById('calorieForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const gender = document.getElementById('gender').value;
            const age = parseFloat(document.getElementById('age').value);
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            const activity = parseFloat(document.getElementById('activity').value);
            const goal = document.getElementById('goal').value;

            // Validation
            if (age < 1 || age > 120) {
                alert("Please enter a valid age between 1 and 120.");
                return;
            }
            if (weight < 1 || weight > 500) {
                alert("Please enter a valid weight between 1 and 500 kg.");
                return;
            }
            if (height < 30 || height > 300) {
                alert("Please enter a valid height between 30 and 300 cm.");
                return;
            }

            let BMR;
            if (gender === 'male') {
                BMR = (10 * weight) + (6.25 * height) - (5 * age) + 5;
            } else {
                BMR = (10 * weight) + (6.25 * height) - (5 * age) - 161;
            }

            let TDEE = BMR * activity;

            if (goal === 'lose') {
                TDEE -= 500;
            } else if (goal === 'gain') {
                TDEE += 500;
            }

            document.getElementById('result').innerHTML = `Your daily calorie needs: <span style="color:hsl(121, 100%, 30%);">${TDEE.toFixed(2)}</span> calories`;
        });
    </script>
</body>
</html>
