<?PHP 
include('Header_Admin.php'); 
include('Footer.php');
include("conn.php");
?> 

<!DOCTYPE html> 
<html> 
<head>
<title>Administrator of Health System</title> 
<link rel="stylesheet" href="health_status.css">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<style>

</style>
</head>
<body> 
    <h1>Patient Health Status</h1>
    <form action='' method='POST'> 
        <select name='u_id'> 
            <option value="" selected disabled>Search Patient BY: ID&NAME</option> 
            <?php 
                $search_patient = mysqli_query($conn, "SELECT u_id, u_full_name FROM user");
                while($dropdown = mysqli_fetch_assoc($search_patient)) {
                    $option_value = $dropdown['u_id'] . ' ' . $dropdown['u_full_name'];
                    echo "<option value='$option_value'>$option_value</option>"; 
                }
            ?> 
        </select><br><br>

        <p><input type='submit' value='Search'></p> 
        <a href="add_health.php" class="add">Add New Patient Health Status</a>
    </form> 
    
    <div style="clear:both;"></div>
    <div style="margin-left: 115px; margin-right: 115px;" id='report'>
        <div class="ccc">
            <?php
            include("conn.php");

            if (!empty($_POST['u_id'])) {
                $option_value = $_POST['u_id'];
                $id = strtok($option_value, " ");
                $check="AND patient.p_id='".$_POST['u_id']."'";
                $search = "SELECT * FROM patient, user
                WHERE patient.p_id = user.u_id $check";
                $execute = mysqli_query($conn, $search); 
                while ($row = mysqli_fetch_array($execute)) {
                        if($row['p_temp'] >= 38.5 || $row['p_oxy'] <= 90){
                            echo '<div class="box" style="background: #f0bbb8">';
                            
                            if($row['u_gender'] == "Male"){
                                echo'<img src="Images/male.png" width="70px">','<br>';
                            }
                            else {
                                echo'<img src="Images/female.jpg" width="70px">','<br>';
                            }

                            echo '<div class= "full_name">';
                            echo $row['u_full_name'],'<br>','<br>';
                            echo '</div>';

                            echo 'Height: ','<br>',$row['p_height'],'<br>','<br>';
                            echo 'Weight: ','<br>',$row['p_weight'],'<br>','<br>';
                            echo 'Heart Rate: ','<br>',$row['p_heart'],'<br>','<br>';
                            echo 'Blood Pressure: ','<br>',$row['p_blood'],'<br>','<br>';
                            echo 'Oxygen Level: ','<br>',$row['p_oxy'],'<br>','<br>';
                            echo 'Temperature: ','<br>',$row['p_temp'],'<br>','<br>';
                            echo 'Symptoms: ','<br>',$row['p_sysm'],'<br>','<br>';
                            echo 'Date: ','<br>',$row['p_date'],'<br>','<br>';

                            echo '<div style="text-align: center;">';
                            echo '<button type="button" onClick="printdiv(\'report\');">Print</button>';
                            echo '<form  action="update_health.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['p_id'] . '">Update</button></form>';
                            echo '</div>';
                            
        
                            echo "</div>";
                        }
                        else if(($row['p_temp'] >= 37.5 && $row['p_temp'] < 38.5) || ($row['p_oxy'] <= 94 && $row['p_oxy'] > 90)){
                            echo '<div class="box" style="background: #fefebe">';

                            if($row['u_gender'] == "Male"){
                                echo'<img src="Images/male.png" width="70px">','<br>';
                            }
                            else {
                                echo'<img src="Images/female.jpg" width="70px">','<br>';
                            }
    
                            echo '<div class= "full_name">';
                            echo $row['u_full_name'],'<br>','<br>';
                            echo '</div>';
                            
                            echo 'Height: ','<br>',$row['p_height'],'<br>','<br>';
                            echo 'Weight: ','<br>',$row['p_weight'],'<br>','<br>';
                            echo 'Heart Rate: ','<br>',$row['p_heart'],'<br>','<br>';
                            echo 'Blood Pressure: ','<br>',$row['p_blood'],'<br>','<br>';
                            echo 'Oxygen Level: ','<br>',$row['p_oxy'],'<br>','<br>';
                            echo 'Temperature: ','<br>',$row['p_temp'],'<br>','<br>';
                            echo 'Symptoms: ','<br>',$row['p_sysm'],'<br>','<br>';
                            echo 'Date: ','<br>',$row['p_date'],'<br>','<br>';
    
                            echo '<div style="text-align: center;">';
                            echo '<button type="button" onClick="printdiv(\'report\');">Print</button>';
                            echo '<form  action="update_health.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['p_id'] . '">Update</button></form>';
                            echo '</div>';                     
        
                        echo "</div>";
                        }
                        else{
                            echo '<div class="box" style="background: #bfeeb7">';

                            if($row['u_gender'] == "Male"){
                                echo'<img src="Images/male.png" width="70px">','<br>';
                            }
                            else {
                                echo'<img src="Images/female.jpg" width="70px">','<br>';
                            }

                            echo '<div class= "full_name">';
                            echo $row['u_full_name'],'<br>','<br>';
                            echo '</div>';
                            

                            echo 'Height: ','<br>',$row['p_height'],'<br>','<br>';
                            echo 'Weight: ','<br>',$row['p_weight'],'<br>','<br>';
                            echo 'Heart Rate: ','<br>',$row['p_heart'],'<br>','<br>';
                            echo 'Blood Pressure: ','<br>',$row['p_blood'],'<br>','<br>';
                            echo 'Oxygen Level: ','<br>',$row['p_oxy'],'<br>','<br>';
                            echo 'Temperature: ','<br>',$row['p_temp'],'<br>','<br>';
                            echo 'Symptoms: ','<br>',$row['p_sysm'],'<br>','<br>';
                            echo 'Date: ','<br>',$row['p_date'],'<br>','<br>';

                            echo '<div style="text-align: center;">';
                            echo '<button type="button" onClick="printdiv(\'report\');">Print</button>';
                            echo '<form  action="update_health.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['p_id'] . '">Update</button></form>';
                            echo '</div>';
        
                            echo "</div>";
                        }
                }
            }

            else {
                $check = "";
                $search = "SELECT * FROM patient, user
                WHERE patient.p_id = user.u_id $check";
                $execute = mysqli_query($conn, $search); 
                while ($row = mysqli_fetch_array($execute)) {
                    if($row['p_temp'] >= 38.5 || $row['p_oxy'] <= 90){
                        echo '<div class="box" style="background: #f0bbb8">';

                        if($row['u_gender'] == "Male"){
                            echo'<img src="Images/male.png" width="70px">','<br>';
                        }
                        else {
                            echo'<img src="Images/female.jpg" width="70px">','<br>';
                        }

                        echo '<div class= "full_name">';
                        echo $row['u_full_name'],'<br>','<br>';
                        echo '</div>';
                        
                        echo 'Height: ','<br>',$row['p_height'],'<br>','<br>';
                        echo 'Weight: ','<br>',$row['p_weight'],'<br>','<br>';
                        echo 'Heart Rate: ','<br>',$row['p_heart'],'<br>','<br>';
                        echo 'Blood Pressure: ','<br>',$row['p_blood'],'<br>','<br>';
                        echo 'Oxygen Level: ','<br>',$row['p_oxy'],'<br>','<br>';
                        echo 'Temperature: ','<br>',$row['p_temp'],'<br>','<br>';
                        echo 'Symptoms: ','<br>',$row['p_sysm'],'<br>','<br>';
                        echo 'Date: ','<br>',$row['p_date'],'<br>','<br>';

                        echo '<div style="text-align: center;">';
                        echo '<button type="button" onClick="printdiv(\'report\');">Print</button>';
                        echo '<form  action="update_health.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['p_id'] . '">Update</button></form>';
                        echo '</div>';
                        
    
                    echo "</div>";
                    }
                    else if(($row['p_temp'] >= 37.5 && $row['p_temp'] < 38.5) || ($row['p_oxy'] <= 94 && $row['p_oxy'] > 90)){
                        echo '<div class="box" style="background: #fefebe">';

                        if($row['u_gender'] == "Male"){
                            echo'<img src="Images/male.png" width="70px">','<br>';
                        }
                        else {
                            echo'<img src="Images/female.jpg" width="70px">','<br>';
                        }

                        echo '<div class= "full_name">';
                        echo $row['u_full_name'],'<br>','<br>';
                        echo '</div>';
                        
                        echo 'Height: ','<br>',$row['p_height'],'<br>','<br>';
                        echo 'Weight: ','<br>',$row['p_weight'],'<br>','<br>';
                        echo 'Heart Rate: ','<br>',$row['p_heart'],'<br>','<br>';
                        echo 'Blood Pressure: ','<br>',$row['p_blood'],'<br>','<br>';
                        echo 'Oxygen Level: ','<br>',$row['p_oxy'],'<br>','<br>';
                        echo 'Temperature: ','<br>',$row['p_temp'],'<br>','<br>';
                        echo 'Symptoms: ','<br>',$row['p_sysm'],'<br>','<br>';
                        echo 'Date: ','<br>',$row['p_date'],'<br>','<br>';

                        echo '<div style="text-align: center;">';
                        echo '<button type="button" onClick="printdiv(\'report\');">Print</button>';
                        echo '<form  action="update_health.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['p_id'] . '">Update</button></form>';
                        echo '</div>';                     
    
                    echo "</div>";
                    }
                    else{
                        echo '<div class="box" style="background: #bfeeb7">';

                        if($row['u_gender'] == "Male"){
                            echo'<img src="Images/male.png" width="70px">','<br>';
                        }
                        else {
                            echo'<img src="Images/female.jpg" width="70px">','<br>';
                        }

                        echo '<div class= "full_name">';
                        echo $row['u_full_name'],'<br>','<br>';
                        echo '</div>';
                        
                        echo 'Height: ','<br>',$row['p_height'],'<br>','<br>';
                        echo 'Weight: ','<br>',$row['p_weight'],'<br>','<br>';
                        echo 'Heart Rate: ','<br>',$row['p_heart'],'<br>','<br>';
                        echo 'Blood Pressure: ','<br>',$row['p_blood'],'<br>','<br>';
                        echo 'Oxygen Level: ','<br>',$row['p_oxy'],'<br>','<br>';
                        echo 'Temperature: ','<br>',$row['p_temp'],'<br>','<br>';
                        echo 'Symptoms: ','<br>',$row['p_sysm'],'<br>','<br>';
                        echo 'Date: ','<br>',$row['p_date'],'<br>','<br>';

                        echo '<div style="text-align: center;">';
                        echo '<button type="button" onClick="printdiv(\'report\');">Print</button>';
                        echo '<form  action="update_health.php" method="get"><button class="edit-button" type="submit" name="id" value="' . $row['p_id'] . '">Update</button></form>';
                        echo '</div>';
                        
                    echo "</div>";
                    }
                }
            }
            ?>
        </div>

<?php   
mysqli_close($conn);
?>

<!-- Print Report -->
<script>
function printdiv(printpage){
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>

</body>
</html>