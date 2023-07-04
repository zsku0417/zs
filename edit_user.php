<?php
include("conn.php");
include("Header_Admin.php");
include('Footer.php');
$id= intval($_GET['id']);
$result=mysqli_query($conn,"SELECT * FROM user WHERE u_id=$id");
while ($row=mysqli_fetch_array($result))
{

?>
<!DOCTYPE html>
<html>
<head>
<title>Add New Profile</title>
<link rel="stylesheet" href="edit_user.css">    
</head>
<body>

    <form action="update_user.php" method="post">
        <h2>User Profile</h2>
        <h3>Please update the following details:</h3>

        <input type="hidden" name="updt_id" value="<?php echo $row['u_id'] ?>">
        
        <p>
            <label> Name </label>:
            <input type="text" maxlength="50" name="updt_fullname" value="<?php echo $row['u_full_name']?>" required>
        </p>

        <p>
            <label> Contact Number </label>:
            <input type="tel" maxlength="50" name="updt_contactnum" value="<?php echo $row['u_cn_num']?>" required>
        </p>

        <p>
            <label> Email Address</label>:
            <input type="email" name="updt_emailadd" value="<?php echo $row['u_email_add']?>" required>
        </p>

        <p>
        <label>Gender</label>:
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
        </p>

        <p>
            <label> Home Address</label>:
            <textarea style = "resize: none" name="updt_homeadd"required><?php echo $row['u_home_add'] ?></textarea>
        </p>

        </div>

        <label><b>Date of Birth :</b></label>
        <input style="width: 10%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;" type="date" name="updt_dob" value="<?php echo $row['u_dob']?>">

        <div>
        <button class="signupbtn" type="submit">Submit</button>
          <button class="rstbtn" type="reset">Reset</button>  
        </div>
    </form>

<?php
}
mysqli_close($conn);
?>
</body>
</html>

