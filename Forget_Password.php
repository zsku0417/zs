<?php
include("Header.php");
include("footer.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<link rel="stylesheet" href="Forget_Password.css">
</head>
<body>
    <form action="update_forget.php" method="POST">
        <h2>Reset Password</h2>
        <h3>Please enter a new password.</h3>

        <div class='divv'>
            <label><b>Email Address :</b></label>
            <input type="email" name="emailadd" placeholder = "Exp: JohnD_123@gmail.com" required>
        </div>

        <label><b>New Password :</b></label>
        <input type="password" placeholder="Please enter your new password." id="password" name="password" required>
        <input type="checkbox" onclick="togglePassword()"> Show Password


        <div class='divv'>
          <button class="rstbtn" type="reset">Reset</button>  
          <button class="signupbtn" type="submit">Reset Password</button>
        </div>
        </form>

        <div class='divv' style="background-color:#f1f1f1 width: 400px;">
              <button onclick="window.location.href ='Index.php';" class="sgnupbtn">Go Back</button>
              <button onclick="window.location.href ='Create_Acc.php';" class="sgnupbtn">Have you registered?</button>
        </div>


<script>
function togglePassword() {
var passwordField = document.getElementById("password");
if (passwordField.type === "password") {
  passwordField.type = "text";
} else {
  passwordField.type = "password";
}
}
</script>
  

</body>
</html>