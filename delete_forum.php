<?php

include("conn.php");

// Get the app_id from the URL using $_GET
$id = intval($_GET['forum_id']);

$result = mysqli_query($conn, "DELETE FROM forum WHERE forum_id=$id");

mysqli_close($conn);

echo '<script>alert("Forum deleted successfully!");
window.location.href="Discussion_Wall_Admin.php";
</script>'; 

?>