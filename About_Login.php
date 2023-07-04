<?PHP 

include('Header_Login.php');
include('Hoverable_Nav.php');
include('Footer.php');
include("conn.php");

$result = mysqli_query($conn,"SELECT * FROM admin");
?>

<!DOCTYPE html>
<html>
<head>
<title>About Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="About_Login.css">
</head>

<body>

<div class="about-section">
  <h1 class='aboutus'>About Us Page</h1>
  <p class='goal'>Our primary objective is to oversee and maintain the well-being of our users' health.</p>
</div>

<div class="title">
  <h2>Our Team</h2>
</div>

<div class="out">
<?php
$result = mysqli_query($conn, "SELECT * FROM admin");
while ($row = mysqli_fetch_array($result)) {
    echo '<div class="box">';
        if($row['a_gender'] == "Male"){
            echo'<img src="Images/male.png" width="70px">','<br>';
        }
        else {
            echo'<img src="Images/female.jpg" width="70px">','<br>';
        }

        echo '<div class= "full_name">';
        echo $row['a_full_name'],'<br>','<br>';
        echo '</div>';

        echo '<div class= "contact_num">';
        echo 'Contact Number: ','<br>', $row['a_cn_num'],'<br>','<br>';
        echo '</div>';

        echo '<div class= "email_add">';
        echo 'Email: ','<br>';
        echo " <a href=\"mailto:" , $row['a_email_add']. "\">". $row['a_email_add'] . "</a> ",'<br>','<br>';
        echo '</div>';
        
        echo '<div class= "staff_poss">';
        echo 'Staff Position: ','<br>',$row['a_staffposs'],'<br>','<br>';
        echo '</div>';
        
    echo "</div>";
}
?>
</div>

</body>

</html>
