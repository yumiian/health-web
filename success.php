<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Success</title>
    <style>
        /* Google Font */
        @import url("https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap");

        /* @import "css/variable.css"; */

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Rubik", sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: hsl(216, 18%, 16%);
            /* font-size: var(--font-size); */
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            width: 40%;
            padding: 50px;
            border-radius: 10px;
            background-color: hsl(39, 37%, 76%);
            box-shadow: 0 0 40px hsla(39, 37%, 76%, 0.1);
        }

        img {
            width: 100px;
        }

        p {
            font-size: 1.2rem;
        }

        button {
            background-color: hsl(201, 70%, 71%);
            padding: 1rem 2rem;
            font-size: 1.3rem;
            border-radius: 1rem;
            width: 200px;
            border: none;
            outline: none;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: hsl(201, 70%, 65%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="check-mark">
            <img src="images/check-mark.png" alt="Check Mark" />
        </div>
        <h1>Success!</h1>
        <p>We will get back to you soon!</p>
        <button type="button" onclick="location.href='index.php'">Back to Home</button>
    </div>
</body>

</html>