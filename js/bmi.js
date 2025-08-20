const form = document.querySelector("form");
const bmiH = document.getElementById("bmi-h");
const bmiValue = document.getElementById("bmi-value");
const unit = document.getElementById("unit");
const bmiCategory = document.getElementById("bmi-category");
const errorMsg = document.getElementById("error-msg");

form.addEventListener("submit", onFormSubmit);
form.addEventListener("reset", onFormReset);

function onFormReset() {
    bmiH.textContent = "";
    bmiValue.textContent = "";
    bmiValue.className = "";
    unit.innerHTML = "";
    bmiCategory.textContent = "";
    errorMsg.textContent = "";
}

function onFormSubmit(e) {
    e.preventDefault();

    if (calculateBMI()) {
        let bmiResult = calculateBMI().toFixed(1);

        bmiH.textContent = "BMI";
        bmiValue.textContent = bmiResult;
        bmiValue.className = interpretBMI(bmiResult);
        unit.innerHTML = "kg/m<sup>2</sup>";
        bmiCategory.textContent = displayBMICategory(interpretBMI(bmiResult));
    } else {
        // dont display anything if error happens
        bmiH.textContent = "";
        bmiValue.textContent = "";
        bmiCategory.textContent = "";
    }
}

function calculateBMI() {
    const age = parseInt(form.age.value);
    const weight = parseFloat(form.weight.value);
    const height = parseFloat(form.height.value);
    const male = form.male;
    const female = form.female;

    if (isNaN(age) || age < 2 || age > 120) {
        errorMsg.innerHTML = "Age must be in the range of 2-120";
        return;
    }

    if (isNaN(weight) || weight <= 0) {
        errorMsg.innerHTML = "Weight must be in positive numbers only";
        return;
    }

    if (isNaN(height) || height <= 0) {
        errorMsg.innerHTML = "Height must be in positive numbers only";
        return;
    }

    if (male.checked == false && female.checked == false) {
        errorMsg.innerHTML = "Please select a gender";
        return;
    }

    let bmi = [age, height, weight];

    if (male.checked) {
        bmi.push("male");
    } else if (female.checked) {
        bmi.push("female");
    }

    let result = Number(bmi[2]) / (((Number(bmi[1]) / 100) * Number(bmi[1])) / 100);
    errorMsg.innerHTML = ""; // reset error message

    return result;
}

function interpretBMI(bmi) {
    if (bmi < 18.5) {
        return "underweight";
    } else if (bmi < 25) {
        return "normal";
    } else if (bmi < 30) {
        return "overweight";
    } else if (bmi < 35) {
        return "obese";
    } else {
        return "very-obese";
    }
}

function displayBMICategory(bmiStr) {
    if (bmiStr == "underweight") {
        return "Underweight";
    } else if (bmiStr == "normal") {
        return "Normal";
    } else if (bmiStr == "overweight") {
        return "Overweight";
    } else if (bmiStr == "obese") {
        return "Obese";
    } else if (bmiStr == "very-obese") {
        return "Very Obese";
    }
}
