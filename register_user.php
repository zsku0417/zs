<?php
include("conn.php");

// Check if the username is already taken
$check_username_sql = "SELECT a_username FROM admin WHERE a_username = '$_POST[u_username]'";
$check_username_result = mysqli_query($conn, $check_username_sql);

if (mysqli_num_rows($check_username_result) > 0) {
    die('<script>alert("Username already taken. Please choose a different username."); window.location.href="index.php";</script>');
}


$sql = "INSERT INTO user (u_username, u_full_name, u_cn_num, u_email_add, u_age, u_gender, u_home_add, u_dob, u_password)
VALUES
('$_POST[u_username]','$_POST[u_full_name]','$_POST[u_cn_num]','$_POST[u_email_add]','$_POST[u_age]','$_POST[u_gender]','$_POST[u_home_add]','$_POST[u_dob]','$_POST[u_password]')";

if (!mysqli_query($conn,$sql)) {
    die('<script>alert("Error: ' . mysqli_error($conn) . '"); window.location.href="index.php";</script>');
}

else {
    echo'<script>alert("Congratulations! You have successfully registered!"); window.location.href = "index.php";</script>';
}

mysqli_close($conn);

?>