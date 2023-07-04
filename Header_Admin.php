<?php
session_start();
#----------------- Login & Logout Session ------------
$namafail = basename($_SERVER['PHP_SELF']);

if(($namafail !='Index_Admin.php' and $namafail !='Logout.php' and $namafail !='Create_Acc_admin.php' and $namafail !='Header_Admin.php')  and empty($_SESSION['Username']))
{
    die("<script>alert('Please Log In...');window.location.href='Index.php';</script>");
}

include("conn.php");

# Get the logged-in admin's full name from the database
if (isset($_SESSION['a_id'])) {
  $admin_id = $_SESSION['a_id'];
  $sql = "SELECT a_full_name FROM admin WHERE a_id = $admin_id";
  $result = $conn->query($sql);

  if ($result !== false && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $username = $row["a_full_name"];
      $_SESSION['Username'] = $username;
  }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Header_Admin.css">
</head>
<body>
  
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" >


    <div class="top">
      <div class="slogan">
      <p>Experience the joy of aging gracefully with us.</p>
      </div>

      <div class="logo">
      <a href="Index_Admin.php" style="text-decoration: none;">
      <img src="Images/Logo2.png" alt="Elderly Home's Club Logo">
      <p class="name">Elderly Home's Club</p>
      </a>
      </div>


      <div class="history" >
      <a href="history_Admin.php" style="text-decoration: none;">
      <img src="Images/history.png" alt="history Logo">
      <p class="name2">Our History</p>
      </div>
      
    </div>


    <div id="navbar"> 
      <a href="Discussion_Wall_Admin.php"><i class="fa fa-plus-square"></i> Forum</a>
      <a href="app_list.php"><i class="fa fa-plus-square"></i> Doctor Appointment</a>
      <a href="health_status.php"><i class="fa fa-plus-square"></i> Patient Health Status</a>
      <a href="view_data_user.php"><i class="fa fa-fw fa-info"></i>Patient's Information</a>
      <a href="view_data_admin.php"><i class="fa fa-fw fa-info"></i>Admin's Information</a>
  
      <?php 
      if(!empty($_SESSION['Username'])) { 
      ?>
        <div class="welcome-message">Admin:<br> <?php echo $_SESSION['Username']; ?></div>
        <a href="Logout.php" class="logout-button" >Log Out</a>
      <?php } ?>
    </div>


<script>
window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html>
