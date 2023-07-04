<?php
include('conn.php');

// Check if the app_id is set and not empty
if (isset($_GET['app_id']) && !empty($_GET['app_id'])) {
    $app_id = $_GET['app_id'];

    // Update the 'action' column in the 'doc_app' table
    $sql = "UPDATE doc_app SET action = 'Accepted' WHERE app_id = $app_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Accepted successfully!'); window.location.href = 'app_list.php';</script>";
    } else {
        echo'<script>alert("Error updating record");
        window.location.href = "index_Admin.php";
        </script>';
    }
    
    mysqli_close($conn);
} else {
    echo'<script>alert("Invalid appoitmend ID");
    window.location.href = "index_Admin.php";
    </script>';
}
?>