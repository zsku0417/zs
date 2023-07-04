<?PHP 
include('Header_Admin.php');
include('Footer.php');
include('conn.php');
$id= intval($_GET['id']);
$result=mysqli_query($conn,"SELECT * FROM patient WHERE p_id=$id");
while ($row=mysqli_fetch_array($result))
{
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

    <form action='update_patient_admin.php' method='POST'>

        <label for="id">Patient ID :</label>
        <input type="number" name="p_id" id="id" value="<?php echo $row['p_id'] ?>" readonly>
        
        <label for="name">Name :</label>
        <input type="text" name="p_full_name" id="name" value="<?php echo $row['p_full_name'] ?>" readonly>

        <label for="height">Height (cm): </label>
        <input type="number" name="p_height"  id="height" min="50" max="250" value="<?php echo $row['p_height'] ?>" required>

        <label for="weight">Weight (kg): </label>
        <input type="number" name="p_weight" id="weight" min="5" max="300" value="<?php echo $row['p_weight'] ?>" required>

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
        
        <button type="submit" name="action" value="Update">Update</button>
        <button type="reset">Reset</button>
    </form>
<script>
const today = new Date().toISOString().split('T')[0];
document.getElementById('dob').value = today;
</script>
<?php
}
mysqli_close($conn);
?>
</body>
</html>
