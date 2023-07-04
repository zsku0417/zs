<?PHP 
include('Header_Admin.php');
include('Footer.php');
include('conn.php');
$result = mysqli_query($conn, "SELECT user.u_id, user.u_full_name 
                                FROM user 
                                LEFT JOIN patient ON user.u_id = patient.p_id 
                                WHERE patient.p_id IS NULL");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Health Condition Form</title>
    <link rel="stylesheet" href="update_health.css">
  </head>
  <body>
    <h1>Health Condition Form</h1>
    <p class="please">Please fill in the form below. </p>

    <form action='register_patient_admin.php' method='POST'>

    <label for="p_id">Choose Patient:</label>
        <select name='p_id' id="p_id"> 
            <option value="" selected disabled>By ID or Name</option> 
            <?php 
                while($dropdown = mysqli_fetch_assoc($result)) {
                    echo "<option value='$dropdown[u_id]' name='p_id'>$dropdown[u_id] $dropdown[u_full_name]</option>"; 
                }
            ?> 
        </select><br><br>

        <label for="height">Height (cm): </label>
        <input type="number" name="p_height"  id="height" min="50" max="250" required>

        <label for="weight">Weight (kg): </label>
        <input type="number" name="p_weight" id="weight" min="5" max="300" required>

        <label for="blood-pressure">Blood Pressure: </label>
        <input type="number" name="p_blood" id="blood-pressure" min="50" max="200" required>
        
        <label for="heart-rate">Heart Rate: </label>
        <input type="number" name="p_heart" id="heart-rate" min="50" max="200" required>
        
        <label for="temperature">Temperature (°C): </label>
        <input type="number" name="p_temp" id="temperature" step="0.1" min="36" max="43" required>

        <label for="temperature">Oxygen Saturation (%): </label>
        <input type="number" name="p_oxy" id="temperature" step="0.1" min="50" max="100" required>

        <label><b>Today's Date :</b></label>
        <input type="date" name="p_date" id="dob" value="{{today}}">
        
        <label for="symptoms">Symptoms:</label>
        <textarea id="symptoms" name="p_sysm" rows="5" required></textarea>
        
        <button type="submit" name="action" value="submit">Submit</button>
        <button type="reset">Reset</button>

    </form>

<script>
const today = new Date().toISOString().split('T')[0];
document.getElementById('dob').value = today;
</script>
</body>
</html>
