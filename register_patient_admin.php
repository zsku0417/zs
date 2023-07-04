<?php

include("conn.php");

$p_id = $_POST['p_id'];
$p_height = $_POST['p_height'];
$p_weight = $_POST['p_weight'];
$p_blood = $_POST['p_blood'];
$p_heart = $_POST['p_heart'];
$p_temp = $_POST['p_temp'];
$p_oxy = $_POST['p_oxy'];
$p_date = $_POST['p_date'];
$p_sysm = $_POST['p_sysm'];

// Retrieve the patient's full name from the user table
$name_query = mysqli_query($conn, "SELECT u_full_name FROM user WHERE u_id = '".$p_id."'");
$name_result = mysqli_fetch_array($name_query);
$p_full_name = mysqli_real_escape_string($conn, $name_result['u_full_name']);

// Check if patient ID already exists in the patient table
$check_id_sql = "SELECT p_id FROM patient WHERE p_id = '$p_id'";
$check_id_result = mysqli_query($conn, $check_id_sql);

if(mysqli_num_rows($check_id_result) > 0) {
    // Patient ID already exists, display error message
    echo "<script>alert('Patient ID is already existed'); window.location.href='add_health.php'; </script>";
} else {
    // Patient ID does not exist, insert new patient record
    $sql = "INSERT INTO patient (p_height, p_weight, p_blood, p_heart, p_temp, p_oxy, p_date, p_sysm, p_full_name, p_id) 
        VALUES ('$p_height', '$p_weight', '$p_blood', '$p_heart', '$p_temp', '$p_oxy', '$p_date', '$p_sysm', '$p_full_name', '$p_id')";
      
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New patient record added successfully'); window.location.href='add_health.php'; </script>";
    } else {
        echo "<script>alert('Patient ID not Found! Please Insert an existing Patient ID'); window.location.href='add_health.php'; </script>";
    }
}

mysqli_close($conn);
?>