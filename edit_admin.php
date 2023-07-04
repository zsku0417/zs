<?php
include("conn.php");
include("Header_Admin.php");

$id= intval($_GET['id']);
$result=mysqli_query($conn,"SELECT * FROM admin WHERE a_id=$id");
while ($row=mysqli_fetch_array($result))
{

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Profile</title>
  <link rel="stylesheet" href="edit_admin.css">
  <style>

</style>
</head>
<body>

  <h3>Update Admin Profile</h3>


  <div class="container">
    <form action="update_admin.php" method="POST">
    <input type="hidden" name="updt_id" value="<?php echo $row['a_id'] ?>">
      <div>
        <label for="Username"><b>Username :</b></label>
        <input type='text' maxlength = "10" name='updt_username' value="<?php echo $row['a_username'] ?>" required>
      </div>
  
      <div>
        <label for="Name"><b>Name :</b></label>
        <input type="text" maxlength = "50" name="updt_fullname" value="<?php echo $row['a_full_name']?>" required>
      </div>
  
      <div>
        <label for="Contact Number"><b>Contact Number :</b></label>
        <input type="tel" name="updt_contactnum" pattern="[0][0-9]{9,10}" title="Please enter a 10 or 11-digit number starting with '0'" value="<?php echo $row['a_cn_num']?>" required>
      </div>
      
      <div>
        <label><b>Email Address :</b></label>
        <input id="email" type="email" name="updt_emailadd" value="<?php echo $row['a_email_add']?>" required>
      </div>

  
      <div style="margin: 5px 0 22px 0">
        <label><b>Gender :</b></label>
        <input type="radio" name="updt_gender" value="Male" required
        <?php
            if ($row['a_gender']=="Male"){
                echo 'checked="checked"';
            }?> 
        > Male 
        <input type="radio" name="updt_gender" value="Female" required
        <?php
            if ($row['a_gender']=="Female"){
                echo'checked="checked"';
            }
            ?>
        > Female 
      </div>


      <div>
      <label> Staff Position:</label>
      <select name="updt_staffposs" required value="<?php
                echo $row['a_staffposs']?>">
                    <option value="">Please select</option>
            
                    <option value="Director/Administrator"<?php
                if ($row['a_staffposs']=="Director/Administrator"){
                    echo'selected="selected"';
                }
                ?>>Director/Administrator</option>

                    <option value="Manager"<?php
                if ($row['a_staffposs']=="Manager"){
                    echo'selected="selected"';
                }
                ?>>Manager</option>

                    <option value="Staff"<?php
                if ($row['a_staffposs']=="Staff"){
                    echo'selected="selected"';
                }
                ?>>Staff</option>

                    <option value="Intern"<?php
                if ($row['a_staffposs']=="Intern"){
                    echo'selected="selected"';
                }
                ?>>Intern</option>

            </select>
      </div>

  
      <div>
        <label><b>Home Address :</b></label>
        <textarea style="height:200px" name="updt_homeadd" required><?php echo $row['a_home_add'] ?></textarea>
      </div>
  
      <div>
        <label><b>Date of Birth :</b></label>
        <input style=" padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;" type="date" name="updt_dob" value="<?php echo $row['a_dob']?>" required>
      </div>
  
      <div>
        <label for="Password"><b>Password :</b></label>
        <input type="password" placeholder="Please enter your password." name="updt_password" value="<?php echo $row['a_password']?>" required>
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
