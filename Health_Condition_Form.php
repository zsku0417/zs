<?PHP 
include('Header_Login.php');
include('Hoverable_Nav.php');
include('Footer.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Health Condition Form</title>
<link rel="stylesheet" href="Health_Condition_Form.css">
</head>
<body>
  
    <h1>Health Condition Form</h1>
    <p class="please">Please fill in the form below. </p>

    <form action='register_patient.php' method='POST'>

        <label for="height">Height (cm): </label>
        <input type="number" name="p_height"  id="height" min="50" max="250" required>

        <label for="weight">Weight (kg): </label>
        <input type="number" name="p_weight" id="weight" min="5" max="300" required>

        <label for="blood-pressure">Blood Pressure: </label>
        <input type="text" name="p_blood" id="blood-pressure" min="50" max="200" required>
        
        <label for="heart-rate">Heart Rate: </label>
        <input type="number" name="p_heart" id="heart-rate" min="50" max="200" required>
        
        <label for="temperature">Temperature (°C): </label>
        <input type="number" name="p_temp" id="temperature" step="0.1" min="36" max="43" required>

        <label for="oxygen">Oxygen Saturation (%): </label>
        <input type="number" name="p_oxy" id="oxygen" step="0.1" min="50" max="100" required>

        <label><b>Today's Date :</b></label>
        <input type="date" name="p_date" id="dob" value="{{today}}">
        
        <label for="symptoms">Symptoms:</label>
        <textarea id="symptoms" name="p_sysm" rows="5" required></textarea>
        
        <input type="hidden" name="action" value="submit">
        <button type="submit" name="action" value="update">Update</button>
        <button type="reset">Reset</button>

    </form>

<script>
const today = new Date().toISOString().split('T')[0];
document.getElementById('dob').value = today;
</script>

</body>
</html>
