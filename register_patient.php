<?php

include("conn.php");
include('Header_Login.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {

    $p_height = mysqli_real_escape_string($conn, $_POST['p_height']);
    $p_weight = mysqli_real_escape_string($conn, $_POST['p_weight']);
    $p_blood = mysqli_real_escape_string($conn, $_POST['p_blood']);
    $p_heart = mysqli_real_escape_string($conn, $_POST['p_heart']);
    $p_temp = mysqli_real_escape_string($conn, $_POST['p_temp']);
    $p_oxy = mysqli_real_escape_string($conn, $_POST['p_oxy']);
    $p_date = mysqli_real_escape_string($conn, $_POST['p_date']);
    $p_sysm = mysqli_real_escape_string($conn, $_POST['p_sysm']);
    $p_full_name = mysqli_real_escape_string($conn, $username);
  
    $sql = "UPDATE patient SET p_height='$p_height', p_weight='$p_weight', p_blood='$p_blood', p_heart='$p_heart', p_temp='$p_temp', p_oxy='$p_oxy', p_date='$p_date', p_sysm='$p_sysm', p_full_name='$username' WHERE p_id= '$user_id'";
  
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Record updated successfully'); window.location.href='Health_Condition_Form.php'; </script>";
    } else {
      echo'<script>alert("Error! Please Try Again");
      window.location.href = "Discussion_Wall.php";
      </script>';
    }
  }

mysqli_close($conn);
?>