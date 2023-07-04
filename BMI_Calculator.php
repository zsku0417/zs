<?PHP 
  include('Header_Login.php');
  include('Hoverable_Nav.php');
  include('Footer.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>BMI Calculator</title>
  <link rel="stylesheet" href="BMI_Calculator.css">

</head>
<body>

  <h3>Body Mass Index Calculator</h3>

  <form class="form" id="form">

    <div class="row-one">
      <input type="number" class="text-input" id="age" autocomplete="off" required/><p class="text">Age</p>
      <label class="container">
        <input type="radio" name="radio" id="f"><p class="text">Female</p>
        <span class="checkmark"></span>
      </label>
      <label class="container">
        <input type="radio" name="radio" id="m"><p class="text">Male</p>
        <span class="checkmark"></span>
      </label>
    </div>

    <div class="row-two">
      <input type="number" class="text-input" id="height" autocomplete="off" min='50' max='250' required><p class="text">Height (cm)</p>
      <input type="number" class="text-input" id="weight" autocomplete="off" min='10' max='300' required><p class="text">Weight (kg)</p>
    </div>

    <button type="button" id="submit">Submit</button>

  </form>

  <div>
      <img class="bmi-image" src = "Images/BMI.png">
  </div>


<script>
function validateForm() {

var age = document.getElementById("age").value;
var height = document.getElementById("height").value;
var weight = document.getElementById("weight").value;
var gender = document.querySelector('input[name="radio"]:checked');


if (isNaN(age) || isNaN(height) || isNaN(weight) || !gender) {
  alert("Please fill in all fields and select a gender");
  return false;
}

// add validation for weight and height
if (weight > 300 || height > 200) {
  alert("Please input weight less than 300 kg and height less than 200 cm");
  return false;
}

var height_m = height / 100;

var bmi = weight / (height_m * height_m);

var result;
if (bmi < 18.5) {
  result = "Underweight";
} else if (bmi < 25) {
  result = "Normal";
} else if (bmi < 30) {
  result = "Overweight";
} else {
  result = "Obese";
}

var h1 = document.createElement("h1");
var h2 = document.createElement("h2");
var t = document.createTextNode(result);
var b = document.createTextNode("BMI: ");
var r = document.createTextNode(bmi.toFixed(2));
h1.appendChild(t);
h2.appendChild(b);
h2.appendChild(r);
document.body.appendChild(h1);
document.body.appendChild(h2);


document.getElementById("submit").removeEventListener("click", countBmi);
document.getElementById("submit").removeEventListener("click", validateForm);
}

document.getElementById("submit").addEventListener("click", validateForm);

</script>
</body>
</html>