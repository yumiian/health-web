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
    errorMsg.textContent = "";
}

function onFormSubmit(e) {
    e.preventDefault();

    if (calculateBMI()) {
        let bmiResult = calculateBMI().toLocaleString("en-US"); // eg. 1,000 instead of 1000

        bmiH.textContent = "BMR";
        bmiValue.textContent = bmiResult;
        unit.innerHTML = "Calories/day";
    } else {
        // dont display anything if error happens
        bmiH.textContent = "";
        bmiValue.textContent = "";
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

    errorMsg.innerHTML = ""; // reset error message

    if (male.checked) {
        return 10 * weight + 6.25 * height - 5 * age + 5;
    } else if (female.checked) {
        return 10 * weight + 6.25 * height - 5 * age - 161;
    }
}
