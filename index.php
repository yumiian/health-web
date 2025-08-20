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
    <title>Health, Nutrition, and Diet Guide System</title>
    <link rel="stylesheet" href="./css/index.css" />
</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <section class="home" id="home">
        <div class="content">
            <h1 class="title">Health, Nutrition and <br />Diet Guide System</h1>
            <p class="desc">Let's have a healthy lifestyle with balanced nutrition and diet!</p>
            <button class="button" type="button" onclick="location.href='#health'">
                Get Started <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </section>

    <section class="health" id="health">
        <div class="content">
            <h1 class="title">Health</h1>
            <p class="desc">
                Health is a state of physical, mental and social well-being, not just the
                absence of disease or infirmity. Good health helps people live a full life!
            </p>
            <button class="button" type="button" onclick="location.href='health.php'">
                Learn More <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </section>

    <section class="nutrition" id="nutrition">
        <div class="content">
            <h1 class="title">Nutrition</h1>
            <p class="desc">
                Nutrition is a critical part of health and development. Better nutrition is
                related to improved infant, child and maternal health, stronger immune systems,
                safer pregnancy and childbirth, lower risk of non-communicable diseases (such as
                diabetes and cardiovascular disease), and longevity.
            </p>
            <button class="button" type="button" onclick="location.href='nutrition.php'">
                Learn More <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </section>

    <section class="diet" id="diet">
        <div class="content">
            <h1 class="title">Diet</h1>
            <p class="desc">
                A healthy diet helps to protect against malnutrition in all its forms, as well
                as noncommunicable diseases (NCDs), including diabetes, heart disease, stroke
                and cancer.
            </p>
            <button class="button" type="button" onclick="location.href='diet.php'">
                Learn More <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </section>

    <section class="tools" id="tools">
        <h1 class="title">Tools</h1>
        <div class="card-container">
            <div class="card">
                <h2>BMI Calculator</h2>
                <p>
                    The Body Mass Index (BMI) Calculator can be used to calculate your BMI value
                    and corresponding weight status while taking age into consideration
                </p>
                <button class="button" type="button" onclick="location.href='bmi.php'">
                    Start <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="card">
                <h2>BMR Calculator</h2>
                <p>
                    The Basal Metabolic Rate (BMR) Calculator estimates your basal metabolic
                    rate in calories per day
                </p>
                <button class="button" type="button" onclick="location.href='bmr.php'">
                    Start <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="card">
                <h2>Calorie Calculator</h2>
                <p>
                    This tool helps you determine your daily calorie needs by using the
                    Mifflin-St Jeor Equation to estimate your Basal Metabolic Rate (BMR) and Total Daily Energy Expenditure (TDEE)
                </p>
                <button class="button" type="button" onclick="location.href='calorie.php'">
                    Start <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="card">
                <h2>Food Nutrition Info</h2>
                <p>
                    This tool allows you to search for nutritional information of food items.
                </p>
                <button class="button" type="button" onclick="location.href='food-nutrition.php'">
                    Start <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="content">
            <h1 class="title">Contact Us</h1>
            <p class="desc">Have any questions? Feel free to get in touch with us!</p>
            <button class="button" type="button" onclick="location.href='contact.php'">
                Contact <i class="fa-solid fa-phone"></i>
            </button>
        </div>
    </section>

    <script src="./js/index.js"></script>
</body>

</html>