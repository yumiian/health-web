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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .diet {
            margin: 0px 10px;
            padding: 60px 0px;
            text-align: left;
            position: relative;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url(./image/diet.jpg);
            z-index: 1;
        }

        .diet:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(30, 30, 30, .7);
            z-index: -1;
        }

        .diet .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            justify-content: flex-start;
        }

        .diet h1 {
            font-size: 50px;
            position: relative;
            color: white;
            text-transform: uppercase;
            text-align: center;
        }

        .diet h3 {
            position: relative;
            color: rgb(255, 255, 255);
            text-align: center;
            font-size: 30px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            border-radius: 50px;
            color: white;
            padding: 10px 20px;
            background-color: transparent;
            border: 2px solid #FF0202;
            font-size: 30px;
            text-decoration: none;
            align-items: center;
            display: block;
            text-align: center;
        }

        .btn:hover {
            color: white;
            background-color: rgb(204, 0, 0);
        }

        .bal {
            margin: auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bal .bal-container {
            margin: 100px auto;
            width: 75%;
            border-radius: 10px;
            border: 1px solid transparent;
            background-color: rgb(162, 234, 254);
            padding: 40px;
            margin: 20px;
        }

        .bal .content {
            flex: 1;
            padding-right: 20px;
            padding: 5px;
        }

        .bal img {
            max-width: 200px;
            float: right;
            border-radius: 10px;
            border: 3px solid black;
            margin-left: 40px;
            margin-right: 40px;
        }

        .bal h2 {
            padding-left: 20px;
            font-size: 40px;
            font-weight: bold;
        }

        .bal h3 {
            padding-left: 20px;
            font-size: 35px;
        }

        .bal p {
            padding-left: 20px;
            text-align: justify;
            font-size: 30px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .importance {
            margin: auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        .importance .importance-container {
            width: 75%;
            max-width: 1200px;
            /* Adjust max-width as needed */
            border-radius: 10px;
            border: 1px solid transparent;
            background-color: rgb(164, 191, 255);
            /* Adjust background color */
            padding: 40px;
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .importance .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .importance .card {
            width: 325px;
            background-color: rgb(255, 255, 255);
            border-radius: 8px;
            overflow: hidden;
            margin: 15px;
        }

        .card img {
            width: 100%;
            height: 45%;
        }

        .card-content {
            padding: 16px;
        }

        .card-content h3 {
            font-size: 20px;
            margin-bottom: 8px;
            font-weight: bold;
            text-align: center;

        }

        .card-content p {
            color: rgb(0, 54, 102);
            font-size: 20px;
            line-height: 1.3;
            text-align: center;
            margin-bottom: 40px;

        }

        .pyramid {
            margin: auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pyramid .pyramid-container {
            width: 75%;
            max-width: 1200px;
            /* Adjust max-width as needed */
            border-radius: 10px;
            border: 1px solid transparent;
            background-color: rgb(255, 188, 232);
            /* Adjust background color */
            padding: 40px;
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
        }

        .pyramid .content {
            flex: 1;
            padding-right: 20px;
            padding: 5px;
        }

        .pyramid h2 {
            padding-left: 20px;
            font-size: 35px;
            text-decoration: underline;
            font-weight: bolder;
        }

        .fp {
            position: relative;
            height: 450px;
            clip-path: polygon(50% 0, 20% 100%, 80% 100%)
        }

        .fp div {
            width: 100%;
            height: 100px;
            margin: 0 auto 10px;
            color: rgb(0, 22, 121);
            line-height: 100px;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            border: 3px solid white;
        }

        .fp .top {
            position: relative;
            width: 100%;
            height: 100px;
            background-image: url(./image/fats.jpg);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .fp .mid1 {
            position: relative;
            width: 100%;
            height: 100px;
            background-image: url(./image/protein.jpg);
            background-size: 28% auto;
            clip-path: polygon(20% 0, 80% 0, 100% 100%, 0% 100%);
            background-repeat: no-repeat;
            background-position: center;
        }

        .fp .mid2 {
            position: relative;
            width: 100%;
            height: 100px;
            background-image: url(./image/fruit_veg.jpg);
            background-size: 45% auto;
            /* Increase the width and height adjusts automatically */
            background-repeat: no-repeat;
            background-position: center;
        }

        .fp .bottom {
            position: relative;
            width: 100%;
            height: 100px;
            background-image: url(./image/carbdiet.jpg);
            background-size: 60% auto;
            background-repeat: no-repeat;
            background-position: center;
        }

        .pyramid .fp-container {
            display: flex;
            flex-wrap: wrap;
            /* Wrap items onto multiple lines */
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .pyramid .level {
            width: calc(40% - 10px);
            /* Set width for two columns with gap */
            border: 1px solid black;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: rgb(251, 229, 215);
            padding: 30px;
            text-align: center;
        }

        .pyramid .level h2 {
            text-decoration: none;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .pyramid .level p {
            text-decoration: none;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 25px;
        }

        .healthier {
            margin: 0 auto;
            padding: 20px;
            max-width: 1200px;
            text-align: center;
        }

        .healthier .guide-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            justify-content: center;

        }

        .healthier .guide {
            text-align: center;
            padding: 3rem 2rem;
            background: #e4ffd9;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            cursor: pointer;
            border-radius: 10px;

        }

        .healthier .guide:hover {
            outline: .2rem solid #001556;
            outline-offset: 0;
        }

        .healthier .guide img {
            width: 100%;
            height: 20rem;
            object-fit: cover;
            border-image: 0;
            border-radius: 20px;

        }

        .healthier .guide:hover img {
            transform: scale(.9);
        }

        .healthier .guide h3 {
            padding: 10px;
            font-size: 2rem;
            color: #27ae60;
        }

        .guide li {
            margin-left: 40px;
            text-align: left;
            font-size: 25px;

        }

        .guide-des {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            font-size: 30px;
        }

        .guide-des .des {
            display: none;
            padding: 2rem;
            text-align: center;
            background: #ffffff;
            position: relative;
            width: 40rem;
            border-radius: 10px;
            align-items: center;
            margin-top: 40px;
            margin-left: 25%;
            max-height: 80vh;
            overflow-y: auto;
            /* Make the description scrollable */
        }

        .guide-des .des.active {
            display: block;
            /* Display when active */
        }

        .guide-des .des img {
            height: 20rem;
            border-radius: 10px;
            width: 100%;
            margin-top: 10px;
        }

        .des li {
            text-align: justify;
            font-size: 25px;
        }

        .des li p {
            text-align: justify;
            font-size: 25px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            border: none;
            /* Remove default border */
            background: none;
            /* Remove default background */
            cursor: pointer;
            /* Add cursor pointer for interaction */
        }

        .close-btn i {
            color: #333;
            font-size: 2.5rem;
        }


        @media (max-width: 768px) {
            .diet h1 {
                font-size: 30px;
                /* Decrease font size for the heading */
            }

            .diet h3 {
                font-size: 20px;
                /* Decrease font size for the paragraph */
            }

            .diet .btn {
                margin-left: 0;
                /* Center the button */
            }

            .pyramid .fp-container {
                flex-direction: column;
                /* Stack items vertically */
            }

            .pyramid .fp .top,
            .pyramid .fp .mid1,
            .pyramid .fp .mid2,
            .pyramid .fp .bottom {
                height: 100px;
                /* Adjust height for smaller screens */
            }

            .pyramid .level {
                width: calc(100% - 80px);
                /* Full width for levels on smaller screens */
                margin: 3%;
                /* Adjust margin for spacing between levels */
            }

            .healthier .guide-container {
                grid-template-columns: 1fr;
                /* Single column on smaller screens */
            }

            .healthier .guide {
                padding: 1.5rem;
                /* Adjust padding for smaller screens */
            }

            .healthier .guide img {
                height: 15rem;
                /* Adjust image height for smaller screens */
            }

            .guide-des .des {
                max-width: 80%;
                margin: 3%;
            }

            .guide-des .des img {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .diet h1 {
                font-size: 25px;
                /* Decrease font size for the heading */
            }

            .diet h3 {
                font-size: 18px;
                /* Decrease font size for the paragraph */
            }

            .diet .btn {
                margin-left: 0;
                /* Center the button */
            }

            .pyramid .level {
                width: calc(100% - 60px);
                /* Full width for levels on very small screens */
                margin: 10px;
                /* Adjust margin for spacing between levels */
            }

            .pyramid .fp .top,
            .pyramid .fp .mid1,
            .pyramid .fp .mid2,
            .pyramid .fp .bottom {
                height: 90px;
            }

            .healthier .guide {
                padding: 1rem;
                /* Further adjust padding for very small screens */
            }

            .healthier .guide img {
                height: 10rem;
                /* Adjust image height for very small screens */
            }

            .guide-des .des {
                max-width: 80%;
                margin: 3%;
            }

            .guide-des .des img {
                max-width: 110%;
                height: 10rem;
            }
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.guide').click(function() {
                const target = $(this).data('name');
                $('.des').removeClass('active'); // Hide all descriptions
                $('.des[data-target="' + target + '"]').addClass('active'); // Show the corresponding description
                $('.guide-des').fadeIn(); // Show the guide description container
            });

            $('.close-btn').click(function() {
                $('.guide-des').fadeOut(); // Hide the guide description container
                $('.des').removeClass('active'); // Hide all descriptions
            });
        });
    </script>

</head>

<body>
    <?php
    include("navbar2.php");
    ?>

    <section class="diet">
        <div class="container">
            <div>
                <h1>Diet</h1>
                <h3>A diet refers to the sum of food consumed by a person or other organism.
                    It encompasses the specific intake of nutrition for health or weight-management reasons.
                    Diets can be influenced by a variety of factors, including cultural, social, and personal preferences, as well as medical conditions.</h3>
                <a href="#healthier-section" class="btn">Guide to a Healthier Diet</a>
            </div>
        </div>
    </section>

    <section class="bal">
        <div class="bal-container">
            <div class="content">
                <h2>Balance Diet</h2>
                <hr>
                <h3>What is a balance diet?</h3>
                <hr>
            </div>
            <img src="./image/balance_diet.png" alt="Balance Diet Image">
            <div class="content">
                <h2>A balance diet</h2>
                <p>
                    provides the necessary nutrients and energy for maintaining health, growth, and overall well-being.
                    It consists of a variety of different foods in the right proportions to ensure the body receives an adequate supply of essential nutrients.
                </p>
            </div>
        </div>
    </section>

    <section class="importance">
        <div class="importance-container">
            <div class="content">
                <h2 style="text-decoration:underline;font-size:40px; font-weight:bold;">Importance and Benefits of Having A Balance Diet</h2>
            </div>
            <div class="card-container">
                <div class="card">
                    <img src="./image/essential.jpg">
                    <div class="card-content">
                        <h3>Provides Essential Nutrients</h3>
                        <p>Ensures the body receives all necessary vitamins, minerals, and nutrients for optimal function, helping maintain energy levels, support bodily functions, and prevent nutrient deficiencies.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./image/health_growth.png">
                    <div class="card-content">
                        <h3>Supports Healthy Growth and Development</h3>
                        <p>Crucial for children and adolescents to support their growing bodies, promoting proper physical and mental development, as well as supporting strong bones and muscles.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./image/Boosts Immune System.jpeg">
                    <div class="card-content">
                        <h3>Boosts Immune System</h3>
                        <p>A strong immune system is essential for fighting off illnesses and infections, reducing their frequency and severity, and promoting faster recovery.</p>
                    </div>
                </div><br>
                <div class="card">
                    <img src="./image/energy.jpg">
                    <div class="card-content">
                        <h3>Enhances Energy Levels</h3>
                        <p>Consistent energy levels are necessary for daily activities and productivity, with a balanced diet improving physical performance, reducing fatigue, and enhancing overall productivity.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./image/disease.jpg">
                    <div class="card-content">
                        <h3>Prevents Chronic Diseases</h3>
                        <p>Chronic diseases significantly impact quality of life and longevity, with a balanced diet lowering the risk of diseases such as heart disease, diabetes, and certain cancers, promoting long-term health.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="./image/digest.jpg">
                    <div class="card-content">
                        <h3>Promotes Healthy Digestion</h3>
                        <p>Good digestion is essential for nutrient absorption and overall health, preventing constipation, supporting a healthy gut microbiome, and improving nutrient absorption.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pyramid">
        <div class="pyramid-container">
            <div class="content">
                <h2 style="font-size:40px; font-weight:bold;">Food Pyramid For Balance Diet</h2>
                <div class="fp">
                    <div class="top">Level 1</div>
                    <div class="mid1">Level 2</div>
                    <div class="mid2">Level 3</div>
                    <div class="bottom">Level 4</div>
                </div>
                <div class="fp-container">
                    <div class="level">
                        <h2>Lvl 1: Fats, Oils, and Sweets</h2>
                        <p>This level includes fats, oils, and sweets, which should be consumed sparingly. These foods provide concentrated sources of energy but may lack essential nutrients.</p>
                    </div>
                    <div class="level">
                        <h2>Lvl 2: Protein and Dairy</h2>
                        <p>This level includes foods rich in protein (such as meat, fish, beans, and nuts) and dairy products (like milk, cheese, and yogurt). These foods are important for growth, repair of tissues, and overall body function.</p>
                    </div>
                    <div class="level">
                        <h2>Lvl 3: Fruits and Vegetables</h2>
                        <p>This level emphasizes fruits and vegetables, which are rich in vitamins, minerals, and fiber. They are essential for maintaining good health and preventing diseases.</p>
                    </div>
                    <div class="level">
                        <h2>Lvl 4: Grains and Carbohydrates</h2>
                        <p>This level includes foods made from grains (such as bread, rice, pasta) and other carbohydrates (like potatoes and cereals). These foods provide energy and should form the foundation of a balanced diet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="healthier-section" class="healthier">
        <h3 style="font-size:40px; font-weight:bold; text-decoration:underline;">Guide To Have A Healthier Diet</h3>
        <div class="guide-container">
            <div class="guide" data-name="g1">
                <img src="image/Plating.jpg" alt="">
                <h3>Plating & Pacing Your Meals</h3>
                <div class="point">
                    <ul>
                        <li>Eat from smaller plates</li>
                        <li>Eat your greens first</li>
                        <li>Keep dressing, dips, and condiments on the side</li>
                        <li>Slow down eating</li>
                    </ul>
                </div>
            </div>
            <div class="guide" data-name="g2">
                <img src="image/planing.jpg" alt="">
                <h3>Grocery Shopping & Meal Planning</h3>
                <div class="point">
                    <ul>
                        <li>Don't shop without a list</li>
                        <li>Stay away from "diet" foods</li>
                        <li>Cook at home more often</li>
                        <li>Try at least one new recipe per week</li>
                        <li>Bake or roast instead of grilling or frying</li>
                        <li>Opt for more nutritious foods when ordering out</li>
                    </ul>
                </div>
            </div>
            <div class="guide" data-name="g3">
                <img src="image/overall.jpg" alt="">
                <h3>Foods To Add To Your Overall Diet</h3>
                <div class="point">
                    <ul>
                        <li>Increase your protein intake</li>
                        <li>Add Greek yogurt to your diet</li>
                        <li>Eat eggs, preferably for breakfast</li>
                    </ul>
                </div>
            </div>
            <div class="guide" data-name="g4">
                <img src="image/swap.jpg" alt="">
                <h3>Swaps & Substitutions To Consider</h3>
                <div class="point">
                    <ul>
                        <li>Replace sugary drinks with sparkling water</li>
                        <li>Drink your coffee black from time to time</li>
                        <li>Eat your fruits instead of drinking them</li>
                        <li>Choose whole-grain bread instead of refined</li>
                        <li>Eat fresh berries instead of dried ones</li>
                        <li>Opt for heart-healthy oils</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="guide-des">
            <div class="des active" data-target="g1">
                <button class="close-btn"><i class="fas fa-times"></i></button>
                <h2>Plating & Pacing Your Meals</h3><br>
                    <ol>
                        <img src="image/smaller_plates.jpg" alt="">
                        <li>
                            <h3>Eat from smaller plates</h3>
                            <p><strong>Description: </strong>Using smaller plates can make portions appear larger, helping you feel more satisfied and reducing overeating.</p>
                            <p><strong>Example: </strong>Serve dinner on a salad plate instead of a dinner plate to control portion sizes and reduce calorie intake.</p>
                        </li>
                        <img src="image/green.jpg" alt="">
                        <li>
                            <h3>Eat your greens first</h3>
                            <p><strong>Description: </strong>Starting with vegetables can help ensure you eat them while you're most hungry, potentially reducing the intake of less nutritious foods and benefiting blood sugar levels.</p>
                            <p><strong>Example: </strong>Begin your meal with a salad or a side of steamed vegetables before moving on to other dishes.</p>
                        </li>
                        <img src="image/dip.jpg" alt="">
                        <li>
                            <h3>Keep dressing, dips, and condiments on the side</h3>
                            <p><strong>Description: </strong>Requesting dressings and condiments on the side allows you to control the amount you consume, reducing unnecessary calories.</p>
                            <p><strong>Example: </strong>Order a salad with the dressing on the side so you can add a small amount, preventing excess calorie intake.</p>
                        </li>
                        <img src="image/slow.png" alt="">
                        <li>
                            <h3>Slow down eating</h3>
                            <p><strong>Description: </strong>Eating slowly allows your brain time to signal fullness, reducing overall calorie intake and helping with weight control.</p>
                            <p><strong>Example: </strong>Chew each bite thoroughly and take small breaks between bites to pace your meal and prevent overeating.</p>
                        </li>
                    </ol>
            </div>
            <div class="des active" data-target="g2">
                <button class="close-btn"><i class="fas fa-times"></i></button>
                <h2>Grocery Shopping & Meal Planning</h3><br>
                    <ol>
                        <img src="image/list.jpg" alt="">
                        <li>
                            <h3>Don't shop without a list</h3>
                            <p><strong>Description: </strong>Planning your grocery list ahead and avoiding shopping while hungry can prevent impulse buys and promote healthier choices.</p>
                            <p><strong>Example: </strong>Write down healthy snacks like fruits and nuts and stick to that list, avoiding junk food aisles.</p>
                        </li>
                        <img src="image/stay_away.jpg" alt="">
                        <li>
                            <h3>Stay away from "diet" foods</h3>
                            <p><strong>Description: </strong>Diet foods often contain added sugars and calories to compensate for reduced fat, making them less healthy.</p>
                            <p><strong>Example: </strong>Choose whole foods like fresh vegetables and fruits instead of "fat-free" labeled snacks.</p>
                        </li>
                        <img src="image/cook.jpg" alt="">
                        <li>
                            <h3>Cook at home more often</h3>
                            <p><strong>Description: </strong>Home-cooked meals are budget-friendly and allow you to control ingredients, promoting better diet quality and reducing obesity risk.</p>
                            <p><strong>Example: </strong>Prepare a large pot of vegetable soup for dinner and save the leftovers for lunch the next day.</p>
                        </li>
                        <img src="image/recipe.jpg" alt="">
                        <li>
                            <h3>Try at least one new recipe per week</h3>
                            <p><strong>Description: </strong>Experimenting with new, healthy recipes can diversify your diet and make meals more enjoyable.</p>
                            <p><strong>Example: </strong>Try making a quinoa salad with fresh herbs and vegetables instead of your usual pasta dish.</p>
                        </li>
                        <img src="image/bake.jpg" alt="">
                        <li>
                            <h3>Bake or roast instead of grilling or frying</h3>
                            <p><strong>Description: </strong>Healthier cooking methods like baking and roasting reduce the formation of harmful compounds linked to diseases.</p>
                            <p><strong>Example: </strong>Roast chicken with vegetables in the oven instead of frying it.</p>
                        </li>
                        <img src="image/salad.jpg" alt="">
                        <li>
                            <h3>Opt for more nutritious foods when ordering out</h3>
                            <p><strong>Description: </strong>Choose restaurants with healthier menu options to maintain a nutritious diet even when eating out.</p>
                            <p><strong>Example: </strong>Select a grilled chicken salad at a fast-casual restaurant instead of a fried chicken sandwich.</p>
                        </li>
                    </ol>
            </div>
            <div class="des active" data-target="g3">
                <button class="close-btn"><i class="fas fa-times"></i></button>
                <h2>Foods To Add To Your Overall Diet</h3><br>
                    <ol>
                        <img src="image/increase_protein.jpg" alt="">
                        <li>
                            <h3>Increase your protein intakes</h3>
                            <p><strong>Description: </strong>Protein helps you feel full, retain muscle mass, and burn more calories. Adding protein to each meal can curb cravings and reduce overeating.</p>
                            <p><strong>Example: </strong>Incorporate dairy products, nuts, eggs, beans, and lean meats into your meals and snacks.</p>
                        </li>
                        <img src="image/yogurt.jpg" alt="">
                        <li>
                            <h3>Add Greek yogurt to your diet</h3>
                            <p><strong>Description: </strong>Greek yogurt is higher in protein and lower in carbs and lactose than regular yogurt, making it a filling and suitable option for low carb or lactose intolerant diets.</p>
                            <p><strong>Example: </strong>Enjoy plain, unflavored Greek yogurt with fresh fruit for breakfast or a snack.</p>
                        </li>
                        <img src="image/egg.jpg" alt="">
                        <li>
                            <h3>Eat eggs, preferably for breakfast</h3>
                            <p><strong>Description: </strong>Eggs are nutrient-dense and increase feelings of fullness, leading to reduced calorie intake throughout the day.</p>
                            <p><strong>Example: </strong>Have scrambled eggs or an omelet with vegetables for breakfast to stay full longer and reduce overall calorie consumption.</p>
                        </li>
                    </ol>
            </div>
            <div class="des active" data-target="g4">
                <button class="close-btn"><i class="fas fa-times"></i></button>
                <h2>Swaps & Substitutions To Consider</h3><br>
                    <ol>
                        <img src="image/soda.jpg" alt="">
                        <li>
                            <h3>Replace sugary drinks with sparkling water</h3>
                            <p><strong>Description: </strong>Sugary drinks are high in empty calories and linked to various diseases. Switching to sparkling water reduces excess sugar intake and non-beneficial calories.</p>
                            <p><strong>Example: </strong>Instead of a soda, opt for a glass of sparkling water with a slice of lemon or lime for added flavor.</p>
                        </li>
                        <img src="image/black_coffee.jpg" alt="">
                        <li>
                            <h3>Drink your coffee black from time to time</h3>
                            <p><strong>Description: </strong>Whole fruits provide fiber and nutrients, while fruit juices often lack fiber and can spike blood sugar levels.</p>
                            <p><strong>Example: </strong>Begin your meal with a salad or a side of steamed vegetables before moving on to other dishes.</p>
                        </li>
                        <img src="image/drink.jpg" alt="">
                        <li>
                            <h3>Eat your fruits instead of drinking them</h3>
                            <p><strong>Description: </strong>Requesting dressings and condiments on the side allows you to control the amount you consume, reducing unnecessary calories.</p>
                            <p><strong>Example: </strong>Eat an apple or an orange instead of drinking apple or orange juice.</p>
                        </li>
                        <img src="image/whole-grain.jpg" alt="">
                        <li>
                            <h3>Choose whole-grain bread instead of refined</h3>
                            <p><strong>Description: </strong>Whole grains are more nutritious and linked to health benefits, unlike refined grains which are associated with health issues.</p>
                            <p><strong>Example: </strong>Select 100% whole-grain bread for your sandwiches instead of white bread.</p>
                        </li>
                        <img src="image/berries.png" alt="">
                        <li>
                            <h3>Eat fresh berries instead of dried ones</h3>
                            <p><strong>Description: </strong>Fresh berries are lower in sugar and calories compared to dried berries, which often have added sugar.</p>
                            <p><strong>Example: </strong>Have a bowl of fresh strawberries or blueberries as a snack instead of dried cranberries.</p>
                        </li>
                        <img src="image/cooking-oil.jpg" alt="">
                        <li>
                            <h3>Opt for heart-healthy oils</h3>
                            <p><strong>Description: </strong>Less processed oils like extra virgin olive oil, avocado oil, and coconut oil are healthier alternatives to highly processed seed and vegetable oils.</p>
                            <p><strong>Example: </strong>Use extra virgin olive oil for cooking and salads instead of vegetable oil.</p>
                        </li>
                    </ol>
            </div>
        </div>

    </section>
</body>

</html>