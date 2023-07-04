<?php
include("conn.php");

$check_username_sql = "SELECT u_username FROM user WHERE u_username = '$_POST[updt_username]'";
$check_username_result = mysqli_query($conn, $check_username_sql); 

$sql = "UPDATE admin SET 
a_username ='$_POST[updt_username]',
a_full_name='$_POST[updt_fullname]', 
a_cn_num='$_POST[updt_contactnum]',
a_email_add='$_POST[updt_emailadd]', 
a_staffposs='$_POST[updt_staffposs]', 
a_gender='$_POST[updt_gender]', 
a_home_add='$_POST[updt_homeadd]', 
a_dob='$_POST[updt_dob]',
a_password='$_POST[updt_password]'
WHERE a_id=$_POST[updt_id];";


if (mysqli_num_rows($check_username_result) > 0) {
  die('<script>alert("Username already taken. Please choose a different username."); window.location.href="view_data_admin.php";</script>');
}

if (mysqli_query($conn, $sql)) {
mysqli_close($conn);

    echo "<script>alert('Update successfully!'); window.location.href = 'view_data_admin.php';</script>";

} else {
  // If the SQL query fails
  die('<script>alert("Error: ' . mysqli_error($conn) . '"); window.location.href="view_data_admin.php";</script>');
  mysqli_close($conn);
}
?>




