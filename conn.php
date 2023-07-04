<?php
$conn = mysqli_connect("localhost","root","","health_monitoring");
if (mysqli_connect_errno()) 
{
    echo "Failed to connect to MySQL".mysqli_connect_error();
}
?>