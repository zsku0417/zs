<?php
include('Header_Admin.php');
include("conn.php");
$result = mysqli_query($conn,"SELECT * FROM user");
?>
<!DOCTYPE html>
<html>
<head>
<title>Administrator of Health System</title>
<link rel="stylesheet" href="view_data_user.css">
</head>

<body>
        <h1>User Information</h1>
        <form action="" method="post">
        <select name='u_id'> 

            <option value="" selected disabled>Choose Patient By: ID&NAME</option> 
            <?php 
            while($dropdown = mysqli_fetch_assoc($result)) {
                $option_value = $dropdown['u_id'] . ' ' . $dropdown['u_full_name'];
                echo "<option value='$option_value'>$option_value</option>"; 
            }
            ?> 
        </select><br><br>

            
            <p><input type='submit' value='Search' type="button"></p>     
        
            <a class="add" href="Create_Acc_Login.php" style="margin-top: 20px;">Add new Patient</a>
        </form>


        <div class="ccc">
            <?php
            include("conn.php");

            
            if (!empty($_POST['u_id'])) {
                $option_value = $_POST['u_id'];
                $id = strtok($option_value, " ");
                $check = "AND user.u_id='$id'";
                $searchresult = mysqli_query($conn, "SELECT * FROM user WHERE u_id = '$id'");
                while ($row = mysqli_fetch_array($searchresult)) {

                echo '<div class="box">';
                    if($row['u_gender'] == "Male"){
                        echo'<img src="Images/male.png" width="70px">','<br>';
                    }
                    else {
                        echo'<img src="Images/female.jpg" width="70px">','<br>';
                    }

                    echo '<div class= "full_name">';
                    echo $row['u_full_name'],'<br>','<br>';
                    echo '</div>';

                    echo 'Patient ID: ','<br>', $row['u_id'],'<br>','<br>';

                    echo 'Username: ','<br>', $row['u_username'],'<br>','<br>';

                    echo 'Contact Number: ','<br>', $row['u_cn_num'],'<br>','<br>';

                    echo 'Email: ','<br>';
                    echo " <a href=\"mailto:" , $row['u_email_add']. "\">". $row['u_email_add'] . "</a> ",'<br>','<br>';
                    
                    echo 'Age: ','<br>',$row['u_age'],'<br>','<br>';
                    echo 'Home Address: ','<br>',$row['u_home_add'],'<br>','<br>';
                    echo 'Date of Birth: ','<br>',$row['u_dob'],'<br>','<br>';

                    echo 'Password: ','<br>', $row['u_password'],'<br>','<br>';

                    echo '<div>';
                    echo '<form  action="User_Profile_Admin.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['u_id'] . '">Edit</button></form>';
                    echo '</div>';

                    echo '<div>';
                    echo '<form action="delete_user.php" method="get" onsubmit="return confirm(\'Delete ' . $row['u_full_name'] . ' details?\');"><button class="delete-button" type="submit" name="id" value="' . $row['u_id'] . '">Delete</button></form>';
                    echo '</div>';

                echo "</div>";
                }} 

                else {
                    
                $result = mysqli_query($conn, "SELECT * FROM user");
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="box">';
                    if($row['u_gender'] == "Male"){
                        echo'<img src="Images/male.png" width="70px">','<br>';
                    }
                    else {
                        echo'<img src="Images/female.jpg" width="70px">','<br>';
                    }

                    echo '<div class= "full_name">';
                    echo $row['u_full_name'],'<br>','<br>';
                    echo '</div>';

                    echo 'Patient ID: ','<br>', $row['u_id'],'<br>','<br>';

                    echo 'Username: ','<br>', $row['u_username'],'<br>','<br>';

                    echo 'Contact Number: ','<br>', $row['u_cn_num'],'<br>','<br>';

                    echo 'Email: ','<br>';
                    echo " <a href=\"mailto:" , $row['u_email_add']. "\">". $row['u_email_add'] . "</a> ",'<br>','<br>';
                    
                    echo 'Age: ','<br>',$row['u_age'],'<br>','<br>';
                    echo 'Home Address: ','<br>',$row['u_home_add'],'<br>','<br>';
                    echo 'Date of Birth: ','<br>',$row['u_dob'],'<br>','<br>';

                    echo 'Password: ','<br>', $row['u_password'],'<br>','<br>';

                    echo '<div>';
                    echo '<form  action="User_Profile_Admin.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['u_id'] . '">Edit</button></form>';
                    echo '</div>';

                    echo '<div>';
                    echo '<form action="delete_user.php" method="get" onsubmit="return confirm(\'Delete ' . $row['u_full_name'] . ' details?\');"><button class="delete-button" type="submit" name="id" value="' . $row['u_id'] . '">Delete</button></form>';
                    echo '</div>';

                echo "</div>";
                }}
            ?>  
        </div>
<?php   
mysqli_close($conn);
?>
</body>
</html>
