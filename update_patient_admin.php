<?php
include("conn.php");

// Check if the patient exists in the database
$check_patient = mysqli_query($conn, "SELECT * FROM patient WHERE p_id = '".$_POST['p_id']."'");
if (mysqli_num_rows($check_patient) > 0) {
    // Code for updating patient record
    $p_height = mysqli_real_escape_string($conn, $_POST['p_height']);
    $p_weight = mysqli_real_escape_string($conn, $_POST['p_weight']);
    $p_blood = mysqli_real_escape_string($conn, $_POST['p_blood']);
    $p_heart = mysqli_real_escape_string($conn, $_POST['p_heart']);
    $p_temp = mysqli_real_escape_string($conn, $_POST['p_temp']);
    $p_oxy = mysqli_real_escape_string($conn, $_POST['p_oxy']);
    $p_date = mysqli_real_escape_string($conn, $_POST['p_date']);
    $p_sysm = mysqli_real_escape_string($conn, $_POST['p_sysm']);
    $user_id = mysqli_real_escape_string($conn, $_POST['p_id']);
    $p_full_name = mysqli_real_escape_string($conn, $_POST['p_full_name']);

    $sql = "UPDATE patient SET p_height='$p_height', p_weight='$p_weight', p_blood='$p_blood', p_heart='$p_heart',
    p_temp='$p_temp', p_oxy='$p_oxy', p_date='$p_date', p_sysm='$p_sysm', p_full_name='$p_full_name'
    WHERE p_id= '$user_id'";

    if ($conn->query($sql) === TRUE) {
         echo "<script>alert('Patient record updated successfully!'); window.location.href='health_status.php';</script>";
    } else {
        echo "<script>alert('Error updating patient record. Please try again!'); window.location.href='health_status.php';</script>";
    }
} else {
    echo "<script>alert('Patient not found in the database. Please try again.'); window.location.href='health_status.php';</script>";
}

mysqli_close($conn);
?>