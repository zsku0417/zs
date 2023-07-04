<?php

include("conn.php");


//$_GET[‘id’] — Get the integer value from id parameter in URL. 
$id = intval($_GET['id']);

$result = mysqli_query($conn,"DELETE FROM admin WHERE a_id=$id");

mysqli_close($conn); 
echo '<script>alert("Record deleted successfully!");
window.location.href="view_data_admin.php";
</script>';

?>