<?php
include("conn.php");
include("Header_Login.php");

$appdate = $_POST['appdate'];
$apptime = $_POST['apptime'];
$appreason = $_POST['appreason'];
$p_id = $user_id;
$p_full_name = $username;
$action = 'Pending';

$sql = "INSERT INTO doc_app (appdate, apptime, appreason, p_id, p_full_name, action) VALUES ('$appdate', '$apptime', '$appreason', '$p_id', '$p_full_name', '$action')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('New appointment request added successfully'); window.location.href='Doc_Appointment_Form.php'; </script>";
} else {
  echo'<script>alert("Error!");
  window.location.href = "Doc_Appointment_Form.php";
  </script>';
}

$conn->close();

?>
