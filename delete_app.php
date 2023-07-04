<?php

include("conn.php");

// Get the app_id from the URL using $_GET
$id = intval($_GET['app_id']);

$result = mysqli_query($conn, "DELETE FROM doc_app WHERE app_id=$id");

mysqli_close($conn);

echo '<script>alert("Request deleted successfully!");
window.location.href="app_list.php";
</script>'; 

?>