<?php
include("conn.php");

session_start();
if(isset($_POST["login"])) {

	$usql = "SELECT * FROM user WHERE u_username = '" . $_POST["username"] . "' AND u_password = '" . $_POST["password"] . "'";
  $asql = "SELECT * FROM admin WHERE a_username = '" . $_POST["username"] . "' AND a_password = '" . $_POST["password"] . "'";
    
	$uresult = mysqli_query($conn,$usql);
	$urow = mysqli_fetch_array($uresult);
  
  $aresult = mysqli_query($conn,$asql);
	$arow = mysqli_fetch_array($aresult);

	if($urow) {
      // User login
			$_SESSION["u_id"] = $urow["u_id"];
			echo "<script>window.location.href='Index_Login.php';</script>";	
	} 
  else if ($arow) {
    // Admin login
    $_SESSION["a_id"] = $arow["a_id"];
    echo "<script>window.location.href='Index_Admin.php';</script>";	
  }

  else {
    echo "<script>alert('Wrong Username or Password! Please Try Again!'); window.location.href='Index.php';</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Header.css">
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
      <a href="Index.php" style="text-decoration: none;">
      <img src="Images/Logo2.png" alt="Elderly Home's Club Logo">
      <p class="name">Elderly Home's Club</p>
      </a>
      </div>


      <div class="history" >
      <a href="history.php" style="text-decoration: none;">
      <img src="Images/history.png" alt="history Logo">
      <p class="name2">Our History</p>
      </div>
    </div>

    <div id ="navbar">
      
      <div class="navbar_left">
        <a href='Index.php'><i class="fa fa-fw fa-home"></i>Main Menu</a>
        <a href="Contact.php"><i class="fa fa-fw fa-envelope"></i>Contact</a>
        <a href="About.php"><i class="fa fa-fw fa-info"></i>About Us</a>
      </div>

      <div class="navbar_right">
        <div id="dropdown" style = "font-family: 'calibri'">

          <button id="dropbtn">User
            <i class="fa fa-caret-down; fa fa-fw fa-user"></i>
          </button>
          <div id="dropdown-content">
            <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>
            <div id="id01" class="modal">
    
            <form class="modal-content animate" action="" method="POST">
              <div class="container">
                <h2 class="headerlogin">Login to Health Monitoring System</h2>
                <p class="headerfill">Please fill up the form below.</p>
                <label for="Username"><b>Username :</b></label>
                <input type="text" placeholder="Exp: John_D123" name="username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" required>

                <label for="Password"><b>Password :</b></label>
                <input type="password" placeholder="Please enter your password." name="password" id="password-field" required>
                
                <label>
                  <input type="checkbox" onclick="togglePassword()"> Show Password
                </label>

                <button class="lgnbtn" type="submit" name="login" value="Login">Login</button>
                <button class="lgnbtn" onclick="window.location.href ='Forget_Password.php';">Forget Password</button>
              </div>

              <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="button" onclick="window.location.href ='Create_Acc.php';" class="sgnupbtn">Have you registered?</button>
              </div>

            </form>
          </div>

          <script>
            var modal = document.getElementById('id01');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
          </script>

            <a href="Create_Acc.php">Create New Account</a>
          </div>

        </div>
      </div>

      <!-- Logout Session -->
      <?PHP if(!empty($_SESSION['u_full_name'])) { ?>
      <div style='align-context: right'>Hello ! <?PHP echo $_SESSION["u_full_name"]; ?></div>
      <a href="Logout.php" style = "align-context: right" >Log Out</a>
      <?PHP } ?>
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

function togglePassword() {
  var passwordField = document.getElementById("password-field");
  if (passwordField.type === "password") {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
}
</script>
</body>
</html>
