<?php
session_start();
include "database.php";

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($query, MYSQLI_ASSOC);

    $errorMsg = "";

    if (empty($username) || empty($password)) {
        $errorMsg = "All fields are required!";
    } elseif ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            die();
        } else {
            $errorMsg = "Invalid password!";
        }
    } else {
        $errorMsg = "User not found!";
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <form action="login.php" method="post">
            <div class="input-container">
                <h1>Login</h1>
                <input type="text" id="username" name="username" placeholder="Username" class="contact-input" required />
                <input type="password" id="password" name="password" placeholder="Password" class="contact-input" required />
                <button type="submit">Log In</button>
                <p class="text">Not registered? <a href="register.php">Create an account</a></p>

                <?php if (!empty($errorMsg)) : ?>
                    <p class="errorMsg"><?php echo $errorMsg; ?></p>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>

</html>