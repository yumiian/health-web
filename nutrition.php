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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Guide</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/nutrition/nutrition_hero.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 20px;
            transition: none;
        }

        .hero h1 {
            font-size: 3em;
            margin: 0 0 20px;
        }

        .hero p {
            font-size: 1.5em;
            margin: 30px 60px;
        }

        .hero:hover {
            transform: none;
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('images/nutrition/nutrition_hero.jpg');
        }

        main {
            padding: 2em 10%;
            display: flex;
            flex-direction: column;
            gap: 2em;
        }

        section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        section:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        section h2 {
            color: #ffffff;
            text-align: center;
            font-size: 30px;
            margin-top: 0;
            margin: 10px;
            background-color: #4CAF50;
            border-radius: 5px;
            padding: 10px 5px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 1em);
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h3 {
            color: #4CAF50;
            margin-top: 0;
            margin-bottom: 0px;
            font-size: 24px;
            text-align: center;
        }

        .card h3 {
            font-size: 22px;
        }

        p {
            font-size: 20px;
        }

        ul li {
            margin-left: -10px;
            font-size: 19px;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        #hydration {
            display: flex;
            flex-direction: row;
        }

        .hydration-content {
            margin-top: 0px;
            padding-top: 0;
            padding: 10px;
        }

        .hydration-content h2 {
            margin-top: 0;
        }

        .hydration-content p {
            margin-left: 10px;
        }

        .hydration-img {
            background-image: url('images/nutrition/water.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-width: 40%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    include("navbar2.php");
    ?>

    <section class="hero">
        <h1>Nutrition</h1>
        <p>
            Nutrition helps us to support bodily functions, health, and growth.
            It involves the intake of macronutrients (carbohydrates, proteins, fats) for energy and tissue maintenance, and
            micronutrients (vitamins, minerals) for various physiological processes.
            Water is also essential for hydration and bodily functions.
        </p>
    </section>
    <main>
        <section id="macronutrients">
            <h2>Macronutrients</h2>
            <img src="images/nutrition/macronutrients.jpg" alt="macronutrients sources">
            <div class="card-container">
                <div class="card">
                    <h3>Carbohydrates</h3>
                    <p>Carbohydrates are the body's primary source of energy.
                        <strong>Simple carbohydrates</strong> are found in sugars, while complex carbohydrates are found in foods like grains, fruits, and vegetables.
                        <strong>Complex carbohydrates</strong> are preferred because they provide sustained energy and are rich in fiber, which aids digestion.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Rice</li>
                        <li>Grains</li>
                        <li>Fruits</li>
                        <li>Vegetables</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Proteins</h3>
                    <p>Proteins are essential for building and repairing tissues, producing enzymes and hormones, and supporting immune function.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Meat</li>
                        <li>Dairy products</li>
                        <li>Legumes</li>
                        <li>Nuts</li>
                        <li>Seeds</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Fats</h3>
                    <p>Fats are a concentrated source of energy and are important for the absorption of fat-soluble vitamins (A, D, E, K). They also play a crucial role in cell structure and function. There are different types of fats: saturated, unsaturated, and trans fats.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Avocados</li>
                        <li>Nuts</li>
                        <li>Seeds</li>
                        <li>Olive oil</li>
                        <li>Fatty fish</li>
                    </ul>
                    </p>
                </div>
            </div>
        </section>
        <section id="micronutrients">
            <h2>Micronutrients</h2>
            <div class="micronutrients-sub">
                <h3>Vitamins</h3>
                <img src="images/nutrition/vitamin_source.jpg" alt="vitamin sources">
            </div>
            <div class="card-container">
                <div class="card">
                    <h3>Vitamin A</h3>
                    <p>Important for vision, immune function, and skin health.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Carrots</li>
                        <li>Sweet potatoes</li>
                        <li>Spinach</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Vitamin B</h3>
                    <p>Essential for energy production and brain function.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Whole grains</li>
                        <li>Meat</li>
                        <li>Dairy products</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Vitamin C</h3>
                    <p>Important for immune function and skin health.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Citrus fruits</li>
                        <li>Strawberries</li>
                        <li>Bell peppers</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Vitamin D</h3>
                    <p>Important for bone health.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Sunlight exposure</li>
                        <li>Fortified dairy products</li>
                        <li>Fatty fish</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Vitamin E</h3>
                    <p>Acts as an antioxidant.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Nuts</li>
                        <li>Seeds</li>
                        <li>Green leafy vegetables</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Vitamin K</h3>
                    <p>Important for blood clotting and bone health.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Green leafy vegetables</li>
                        <li>Broccoli</li>
                    </ul>
                    </p>
                </div>
            </div>
            <div class="micronutrients-sub">
                <h3>Minerals</h3>
                <img src="images/nutrition/minerals.jpg" alt="mineral sources">
            </div>
            <div class="card-container">
                <div class="card">
                    <h3>Calcium</h3>
                    <p>Important for bone health and muscle function.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Dairy products</li>
                        <li>Green leafy vegetables</li>
                        <li>Fortified foods</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Iron</h3>
                    <p>Essential for oxygen transport in the blood.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Red meat</li>
                        <li>Beans</li>
                        <li>Fortified cereals</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Magnesium</h3>
                    <p>Important for muscle and nerve function.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Nuts</li>
                        <li>Seeds</li>
                        <li>Whole grains</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Potassium</h3>
                    <p>Essential for muscle function and fluid balance.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Bananas</li>
                        <li>Potatoes</li>
                        <li>Oranges</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Zinc</h3>
                    <p>Important for immune function and wound healing.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Meat</li>
                        <li>Shellfish</li>
                        <li>Legumes</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Selenium</h3>
                    <p>Acts as an antioxidant and supports immune function.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Brazil nuts</li>
                        <li>Seafood</li>
                        <li>Eggs</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Iodine</h3>
                    <p>Essential for thyroid function.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Iodized salt</li>
                        <li>Seafood</li>
                        <li>Dairy products</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Fluorine</h3>
                    <p>Important for dental health.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Fluoridated water</li>
                        <li>Tea</li>
                        <li>Fish</li>
                    </ul>
                    </p>
                </div>
                <div class="card">
                    <h3>Silicon</h3>
                    <p>Supports bone health and connective tissue.<br><br>
                        <strong>Sources:</strong>
                    <ul>
                        <li>Whole grains</li>
                        <li>Vegetables</li>
                        <li>Beer</li>
                    </ul>
                    </p>
                </div>
            </div>
        </section>
        <section id="hydration">
            <div class="hydration-content">
                <h2>Hydration</h2>
                <p>Staying hydrated is essential for maintaining overall health. Water is crucial for various bodily functions,
                    including regulating body temperature, transporting nutrients, and removing waste products. </p>
                <p>It is recommended to drink at least 8 cups (2 liters) of water per day, although individual needs may vary based on factors such as age, activity level, and climate.</p>
                <p>Avoid excessive consumption of sugary drinks and caffeinated beverages, as they can lead to dehydration. </p>
            </div>
            <div class="hydration-img"></div>
        </section>
    </main>
</body>

</html>