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
    <title>Food Nutrition Info</title>
    <link rel="stylesheet" href="./css/food-nutrition.css">
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <div class="container">
        <h1 class="title">Food Nutrition Info</h1>
        <p>This tool allows you to search for nutritional information of food items. 
            Simply enter the food you have eaten and select the food items from the results.
            The information provided includes calories, protein, fat, carbohydrates, and fiber.</p>
        <form id="foodForm">
            <label for="food"><strong>Search Food Item:</strong></label>
            <input type="text" id="food" name="food" required placeholder="Eg. Rice, Bread, Coffee">
            <button type="submit">Search</button>
        </form>
        <form id="foodSelectForm" style="display:none;">
            <label for="foodChoice"><strong>Select Food Item:</strong></label>
            <br>
            <select id="foodChoice" name="foodChoice" required></select>
            <button class="getinfo" type="submit">Get Nutrition Info</button>
        </form>
        <div class="result" id="result"></div>
        <p class="disclaimer">* This information is sourced from Edamam and is for reference purposes only.
            Some information might be incorrect.
        </p>
    </div>
    <script>
        const foodForm = document.getElementById('foodForm');
        const foodSelectForm = document.getElementById('foodSelectForm');
        const resultDiv = document.getElementById('result');

        foodForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const food = document.getElementById('food').value;
            searchFoodChoices(food);
        });

        foodSelectForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const foodChoice = document.getElementById('foodChoice').value;
            getNutritionInfo(foodChoice);
        });

        async function searchFoodChoices(food) {
            const appId = '72d8d6d0';
            const appKey = 'a29ca0f685873203514550f66ac0387b';
            const url = `https://api.edamam.com/api/food-database/v2/parser?app_id=${appId}&app_key=${appKey}&ingr=${encodeURIComponent(food)}`;

            try {
                const response = await fetch(url);
                const data = await response.json();
                populateFoodChoices(data);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        function populateFoodChoices(data) {
            const foodChoiceSelect = document.getElementById('foodChoice');
            foodChoiceSelect.innerHTML = '';
            if (data.hints.length > 0) {
                data.hints.forEach((hint, index) => {
                    const option = document.createElement('option');
                    option.value = index;
                    option.text = hint.food.label;
                    foodChoiceSelect.add(option);
                });
                foodSelectForm.style.display = 'block';
            } else {
                foodSelectForm.style.display = 'none';
                resultDiv.innerHTML = '<p>No food choices found.</p>';
            }
        }

        async function getNutritionInfo(choiceIndex) {
            const appId = '72d8d6d0';
            const appKey = 'a29ca0f685873203514550f66ac0387b';
            const food = document.getElementById('food').value;
            const url = `https://api.edamam.com/api/food-database/v2/parser?app_id=${appId}&app_key=${appKey}&ingr=${encodeURIComponent(food)}`;

            try {
                const response = await fetch(url);
                const data = await response.json();
                displayResult(data.hints[choiceIndex]);
            } catch (error) {
                console.error('Error fetching data:', error);
                displayResult(null);
            }
        }

        function displayResult(hint) {
            if(hint){
                const foodItem = hint.food;
                resultDiv.innerHTML = `
                    <h2>Nutrition Information</h2>
                    <div class="nutrition-info">
                        <p><strong>Food:</strong> ${foodItem.label}</p>
                        <p><strong>Calories:</strong> ${foodItem.nutrients.ENERC_KCAL.toFixed(2)} kcal</p>
                        <p><strong>Protein:</strong> ${foodItem.nutrients.PROCNT.toFixed(2)} g</p>
                        <p><strong>Fat:</strong> ${foodItem.nutrients.FAT.toFixed(2)} g</p>
                        <p><strong>Carbohydrates:</strong> ${foodItem.nutrients.CHOCDF.toFixed(2)} g</p>
                        <p><strong>Fiber:</strong> ${foodItem.nutrients.FIBTG.toFixed(2)} g</p>
                    </div>
                `;
            }else 
                resultDiv.innerHTML = `<h2 style='color: #8B0000'>Nutrition information is not available for this food item</h2>`;
        }

    </script>
</body>
</html>
