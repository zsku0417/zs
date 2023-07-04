<?php 
include("conn.php");

$emailadd = $_POST['emailadd'];
$password = $_POST['password'];

// Check if email exists in user table
$user_query = mysqli_query($conn,"SELECT * FROM user WHERE u_email_add = '$emailadd'");
if ($user_query === false) {
    echo "Error: " . mysqli_error($conn);
} elseif (mysqli_num_rows($user_query) > 0) {
    $usql = "UPDATE user SET u_password = '$password' WHERE u_email_add = '$emailadd'";
    if (mysqli_query($conn, $usql)) {
        echo'<script>alert("Password updated successfully. Please proceed to the login page.");
        window.location.href = "index.php";
        </script>';
    } else {
        echo'<script>alert("Error! Please Try Again");
        window.location.href = "index.php";
        </script>';
    }
} else {
    // Check if email exists in admin table
    $admin_query = mysqli_query($conn,"SELECT * FROM admin WHERE a_email_add = '$emailadd'");
    if ($admin_query === false) {
        echo'<script>alert("Error! Please Try Again");
        window.location.href = "index.php";
        </script>';
    } elseif (mysqli_num_rows($admin_query) > 0) {
        $asql = "UPDATE admin SET a_password = '$password' WHERE a_email_add = '$emailadd'";
        if (mysqli_query($conn, $asql)) {
            echo'<script>alert("Password updated successfully. Please proceed to the login page.");
            window.location.href = "index.php";
            </script>';
        } else {
            echo'<script>alert("Error! Please Try Again");
            window.location.href = "index.php";
            </script>';
        }
    } else {
        echo'<script>alert("The email address is not registered yet.");
        window.location.href = "index.php";
        </script>';
    }
}
mysqli_close($conn);
?>
