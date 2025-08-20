<?php
session_start();
include "database.php";

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];
    $age = (int)$_POST["age"];
    $weight = (float)$_POST["weight"];
    $height = (float)$_POST["height"];
    $gender = $_POST["gender"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Check for duplicate username
    $sql_username = "SELECT * FROM users WHERE username = '$username'";
    $result_username = mysqli_query($conn, $sql_username);
    $rowCountUsername = mysqli_num_rows($result_username);

    // Check for duplicate email
    $sql_email = "SELECT * FROM users WHERE email = '$email'";
    $result_email = mysqli_query($conn, $sql_email);
    $rowCountEmail = mysqli_num_rows($result_email);

    $errorMsg = "";
    $successMsg = "";

    if ($rowCountUsername > 0) {
        $errorMsg = "This username already exists!";
    } elseif ($rowCountEmail > 0) {
        $errorMsg = "This email already exists!";
    } elseif (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($age) || empty($weight) || empty($height) || empty($gender)) {
        $errorMsg = "All fields are required!";
    } elseif ($password !== $passwordRepeat) {
        $errorMsg = "Password does not match!";
    } else {
        $sql = "INSERT INTO users (username, email, password, age, weight, height, gender) 
        VALUES ('$username', '$email', '$passwordHash', '$age', '$weight', '$height', '$gender')";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            die("Could not execute query!");
        } else {
            $successMsg = "You are registered successfully!";
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
    <title>Register</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <form action="register.php" method="post">
            <div class="input-container">
                <h1>Register</h1>
                <input type="text" id="username" name="username" placeholder="Username" class="contact-input" required />
                <input type="email" id="email" name="email" placeholder="Email address" class="contact-input" required />
                <div class="input-container-sub">
                    <input type="number" id="age" name="age" placeholder="Age" min="2" max="120" step="1" class="contact-input" required />
                    <input type="number" id="weight" name="weight" placeholder="Weight (kg)" min="0" step="0.1" class="contact-input" required />
                    <input type="number" id="height" name="height" placeholder="Height (cm)" min="0" step="0.1" class="contact-input" required />
                </div>
                <div class="gender">
                    <label for="gender">Gender:</label>

                    <div class="gender-item">
                        <div class="male">
                            <input type="radio" id="male" name="gender" value="Male" checked />
                            <label for="male">Male</label>
                        </div>

                        <div class="female">
                            <input type="radio" id="female" name="gender" value="Female" />
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <input type="password" id="password" name="password" placeholder="Password" class="contact-input" required />
                <input type="password" id="repeat_password" name="repeat_password" placeholder="Repeat Password" class="contact-input" required />
                <button type="submit">Register</button>
                <p class="text">Already have an account? <a href="login.php">Login</a></p>

                <?php if (!empty($errorMsg)) : ?>
                    <p class="errorMsg"><?php echo $errorMsg; ?></p>
                <?php endif; ?>
                <?php if (!empty($successMsg)) : ?>
                    <p class="successMsg"><?php echo $successMsg; ?> Click <a href="login.php">here</a> to login.</p>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>

</html>