<?php
include("conn.php");

$check_username_sql = "SELECT a_username FROM admin WHERE a_username = '$_POST[updt_username]'";
$check_username_result = mysqli_query($conn, $check_username_sql); 

$sql = "UPDATE user SET 
u_username ='$_POST[updt_username]',
u_full_name='$_POST[updt_fullname]', 
u_cn_num='$_POST[updt_contactnum]',
u_email_add='$_POST[updt_emailadd]', 
u_age='$_POST[updt_age]', 
u_gender='$_POST[updt_gender]', 
u_home_add='$_POST[updt_homeadd]', 
u_dob='$_POST[updt_dob]',
u_password='$_POST[updt_password]'
WHERE u_id=$_POST[updt_id];";


if (mysqli_num_rows($check_username_result) > 0) {
  die('<script>alert("Username already taken. Please choose a different username."); window.location.href="User_Profile.php";</script>');
}

if (mysqli_query($conn, $sql)) {
mysqli_close($conn);

  // Redirect based on the referring page URL
  $referer = $_SERVER['HTTP_REFERER'];
  if (strpos($referer, 'User_Profile_Admin.php') !== false) {
    // If the referring page URL contains 'view_data_user.php'
    echo "<script>alert('Update successfully!'); window.location.href = 'view_data_user.php';</script>";
  } else {
    // If the referring page URL doesn't contain 'view_data_user.php'
    echo "<script>alert('Update successfully!'); window.location.href = 'User_Card.php';</script>";
  }

} else {
  // If the SQL query fails
  die('<script>alert("Error: ' . mysqli_error($conn) . '"); window.location.href="User_Profile.php";</script>');
  mysqli_close($conn);
}
?>





