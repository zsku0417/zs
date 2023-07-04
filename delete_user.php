<?php
include("conn.php");

$id = $_GET['id'];

$sql_forum = "DELETE FROM forum WHERE p_id = $id";
if(mysqli_query($conn, $sql_forum)){
    $sql_doc = "DELETE FROM doc_app WHERE p_id = $id";
    if(mysqli_query($conn, $sql_doc)){
        $sql_patient = "DELETE FROM patient WHERE p_id = $id";
        if(mysqli_query($conn, $sql_patient)){
            $sql_user = "DELETE FROM user WHERE u_id = $id";
            if(mysqli_query($conn, $sql_user)){
                echo '<script>alert("Record deleted successfully."); window.location.href = "view_data_user.php";</script>';
            } else{
                echo '<script>alert("Error deleting record: ' . mysqli_error($conn) . '"); window.location.href = "view_data_user.php";</script>';
            }
        } else{
            echo '<script>alert("Error deleting record: ' . mysqli_error($conn) . '"); window.location.href = "view_data_user.php";</script>';
        }
    } else{
        echo '<script>alert("Error deleting record: ' . mysqli_error($conn) . '"); window.location.href = "view_data_user.php";</script>';
    }
} else{
    echo '<script>alert("Error deleting record: ' . mysqli_error($conn) . '"); window.location.href = "view_data_user.php";</script>';
}


mysqli_close($conn);
?>