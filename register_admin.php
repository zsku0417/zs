<?php
include("conn.php");

// Check if the username is already taken
$check_username_sql = "SELECT u_username FROM user WHERE u_username = '$_POST[a_username]'";
$check_username_result = mysqli_query($conn, $check_username_sql);

if (mysqli_num_rows($check_username_result) > 0) {
    die('<script>alert("Username already taken. Please choose a different username."); window.location.href="index_Admin.php";</script>');
}

$sql="INSERT INTO admin (a_username, a_full_name, a_cn_num, a_email_add, a_gender, a_staffposs, a_home_add, a_dob, a_password)
VALUES 
('$_POST[a_username]','$_POST[a_full_name]','$_POST[a_cn_num]','$_POST[a_email_add]','$_POST[a_gender]','$_POST[a_staffposs]','$_POST[a_home_add]','$_POST[a_dob]','$_POST[a_password]')";

if (!mysqli_query($conn,$sql)) {
    die('<script>alert("Error: ' . mysqli_error($conn) . '"); window.location.href="index_Admin.php";</script>');
}

else {
echo '<script>alert("Admin\'s Details Have Been Successfuly Added!");
window.location.href="view_data_admin.php";
</script>';
}

mysqli_close($conn);
?>