<?PHP 
include('Header_Login.php');
include('Hoverable_Nav.php');
include('Footer.php');

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

$sql = "SELECT * FROM user WHERE u_full_name = '$username' ";
$result = $conn->query($sql);
while ($row=mysqli_fetch_array($result))
{
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Profile</title>
  <link rel="stylesheet" href="User_Profile.css">
</head>
<body>

  <h3>Update User Profile</h3>



  <div class="container">
    <form action="update_user.php" method="POST">
    <input type="hidden" name="updt_id" value="<?php echo $row['u_id'] ?>">
      <div>
        <label for="Username"><b>Username :</b></label>
        <input type='text' maxlength = "10" name='updt_username' value="<?php echo $row['u_username'] ?>" required>
      </div>
  
      <div>
        <label for="Name"><b>Name :</b></label>
        <input type="text" maxlength = "50" name="updt_fullname" value="<?php echo $row['u_full_name']?>" required>
      </div>
  
      <div>
        <label for="Contact Number"><b>Contact Number :</b></label>
        <input type="tel" name="updt_contactnum" pattern="[0][0-9]{9,10}" title="Please enter a 10 or 11-digit number starting with '0'" value="<?php echo $row['u_cn_num']?>" required>
      </div>
      
      <div>
        <label><b>Email Address :</b></label>
        <input id="email" type="email" name="updt_emailadd" value="<?php echo $row['u_email_add']?>" required>
      </div>

      <div>
        <label><b>Age :</b></label>
        <input id="age" type="number" name="updt_age" value="<?php echo $row['u_age']?>" required>
      </div>
  
      <div style="margin: 5px 0 22px 0">
        <label><b>Gender :</b></label>
        <input type="radio" name="updt_gender" value="Male" required
        <?php
            if ($row['u_gender']=="Male"){
                echo 'checked="checked"';
            }?> 
        > Male 
        <input type="radio" name="updt_gender" value="Female" required
        <?php
            if ($row['u_gender']=="Female"){
                echo'checked="checked"';
            }
            ?>
        > Female 
      </div>
  
      <div>
        <label><b>Home Address :</b></label>
        <textarea style="height:200px" name="updt_homeadd" required><?php echo $row['u_home_add'] ?></textarea>
      </div>
  
      <div>
        <label><b>Date of Birth :</b></label>
        <input style=" padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;" type="date" name="updt_dob" value="<?php echo $row['u_dob']?>" required>
      </div>
  
      <div>
        <label for="Password"><b>Password :</b></label>
        <input type="password" placeholder="Please enter your password." name="updt_password" value="<?php echo $row['u_password']?>" required>
        <br>
        <input type="checkbox" onclick="showPassword()"> Show Password
      </div>

      <button class="upbtn" onclick="history.back()">Go Back</button>
      <button class="upbtn" type="submit">Update Profile</button>
    </form>
  </div>

<script>
function showPassword() {
var passwordInput = document.getElementsByName("updt_password")[0];
if (passwordInput.type === "password") {
passwordInput.type = "text";
} else {
passwordInput.type = "password";
}
}
</script>

<?php
}
mysqli_close($conn);
?>

</body>
</html>
