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
    <title>Contact Page</title>
    <link rel="stylesheet" href="./css/contact.css">
</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <div class="contact-container">
        <form action="process-sql.php" method="post">
            <div class="input-container">
                <h1 class="contact-title">Contact Us</h1>
                <input type="text" id="name" name="name" placeholder="Name" class="contact-input" value="<?php echo htmlspecialchars($user['username']); ?>" required />
                <input type="email" id="email" name="email" placeholder="Email address" class="contact-input" value="<?php echo htmlspecialchars($user['email']); ?>" required />
                <input type="tel" id="phone" name="phone" placeholder="Phone number (eg. 012XXXXXXX)" class="contact-input" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" required />
                <input type="text" id="subject" name="subject" placeholder="Subject" class="contact-input" required />
                <textarea id="message" name="message" placeholder="Write your messages..." class="contact-input" cols="30" rows="10" required></textarea>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>