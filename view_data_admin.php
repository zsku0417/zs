<?php
include('Header_Admin.php');
include("conn.php");
$result = mysqli_query($conn,"SELECT * FROM admin");
?>
<!DOCTYPE html>
<html>
<head>
<title>Administrator of Health System</title>
<link rel="stylesheet" href="view_data_admin.css">
</head>
<body>
        <h1>Administrator Information</h1>
        <form action="" method="post">
        <select name='a_id'> 

            <option value="" selected disabled>Choose Patient By: ID&NAME</option> 
            <?php 
            while($dropdown = mysqli_fetch_assoc($result)) {
                $option_value = $dropdown['a_id'] . ' ' . $dropdown['a_full_name'];
                echo "<option value='$option_value'>$option_value</option>"; 
            }
            ?> 
        </select><br><br>


            <p><input type='submit' value='Search' type="button"></p>     
        
            <a href="Create_Acc_admin.php" class="add">Add new Admin</a>
        </form>



        <div class="ccc">
            <?php
            include("conn.php");

            
            if (!empty($_POST['a_id'])) {
                $option_value = $_POST['a_id'];
                $id = strtok($option_value, " ");
                $check = "AND admin.a_id='$id'";
                $searchresult = mysqli_query($conn, "SELECT * FROM admin WHERE a_id = '$id'");
                while ($row = mysqli_fetch_array($searchresult)) {

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

                    echo 'Admin ID: ','<br>', $row['a_id'],'<br>','<br>';

                    echo 'Contact Number: ','<br>', $row['a_cn_num'],'<br>','<br>';

                    echo 'Email: ','<br>';
                    echo " <a href=\"mailto:" , $row['a_email_add']. "\">". $row['a_email_add'] . "</a> ",'<br>','<br>';
                    
                    echo 'Staff Position: ','<br>',$row['a_staffposs'],'<br>','<br>';
                    echo 'Home Address: ','<br>',$row['a_home_add'],'<br>','<br>';
                    echo 'Date of Birth: ','<br>',$row['a_dob'],'<br>','<br>';

                    echo '<div>';
                    echo '<form  action="edit_admin.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['a_id'] . '">Edit</button></form>';
                    echo '</div>';

                    echo '<div>';
                    echo '<form action="delete_admin.php" method="get" onsubmit="return confirm(\'Delete ' . $row['a_full_name'] . ' details?\');"><button class="delete-button" type="submit" name="id" value="' . $row['a_id'] . '">Delete</button></form>';
                    echo '</div>';

                echo "</div>";
                }} 

                else {
                    
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

                        echo 'Admin ID: ','<br>', $row['a_id'],'<br>','<br>';

                        echo 'Contact Number: ','<br>', $row['a_cn_num'],'<br>','<br>';
    
                        echo 'Email: ','<br>';
                        echo " <a href=\"mailto:" , $row['a_email_add']. "\">". $row['a_email_add'] . "</a> ",'<br>','<br>';
                        
                        echo 'Staff Position: ','<br>',$row['a_staffposs'],'<br>','<br>';
                        echo 'Home Address: ','<br>',$row['a_home_add'],'<br>','<br>';
                        echo 'Date of Birth: ','<br>',$row['a_dob'],'<br>','<br>';

                        echo 'Password: ','<br>', $row['a_password'],'<br>','<br>';
    
                        echo '<div>';
                        echo '<form  action="edit_admin.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['a_id'] . '">Edit</button></form>';
                        echo '</div>';
                        echo '<div>';
                        echo '<form action="delete_admin.php" method="get" onsubmit="return confirm(\'Delete ' . $row['a_full_name'] . ' details?\');"><button class="delete-button" type="submit" name="id" value="' . $row['a_id'] . '">Delete</button></form>';
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
