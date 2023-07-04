<?php

session_start();
#----------------- Login & Logout Session ------------
$namafail = basename($_SERVER['PHP_SELF']);

if(($namafail !='Index_Login.php' and $namafail !='Logout.php' and $namafail !='Create_Acc.php' and $namafail !='Header.php')  and empty($_SESSION['Username']))
{
    die("<script>alert('Please Log In...');window.location.href='Index.php';</script>");
}

include("conn.php");

# Get the logged-in user's full name from the database
if (isset($_SESSION['u_id'])) {
    $user_id = $_SESSION['u_id'];
    $sql = "SELECT u_full_name FROM user WHERE u_id = $user_id";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row["u_full_name"];
        $_SESSION['Username'] = $username;
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Header_Login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
      <a href="Index_Login.php" style="text-decoration: none;">
      <img src="Images/Logo2.png" alt="Elderly Home's Club Logo">
      <p class="name">Elderly Home's Club</p>
      </a>
      </div>


      <div class="history" >
      <a href="history_Login.php" style="text-decoration: none;">
      <img src="Images/history.png" alt="history Logo">
      <p class="name2">Our History</p>
      </div>
    </div>


    <div id="navbar"> 

      <a href='Index_Login.php'><i class="fa fa-fw fa-home"></i>Main Menu</a>
      <a href="Contact_Login.php"><i class="fa fa-fw fa-envelope"></i>Contact</a>
      <a href="About_Login.php"><i class="fa fa-fw fa-info"></i>About Us</a>
  
      <?php 
      if(!empty($_SESSION['Username'])) { 
      ?>
        <div class="welcome-message">Hello!<br> <?php echo $_SESSION['Username']; ?></div>
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
