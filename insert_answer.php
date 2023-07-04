
<?php
include("conn.php");
include('Header_Admin.php');

$forum_id = $_POST['forum_id'];
$answer = $_POST['answer'];


$sql = "UPDATE forum SET 
answer = '$answer', 
a_name = '$username'
WHERE forum_id ='$forum_id';";
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo'<script>alert("Thank You! You have successfully Answer!");
    window.location.href = "Discussion_Wall_Admin.php";
    </script>';
} else {
    echo "Something Went Wrong! Please Try again";
    header('Location: view_data_admin.php');
}
?>