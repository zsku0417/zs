<?PHP include('Header_Login.php');
    include('Hoverable_Nav.php');
    include('Footer.php');
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
<title>User Card</title>
<link rel="stylesheet" href="User_Card.css">
</head>
<body>

<?php
  // Retrieve the current user's data from the database
  $sql = "SELECT u_id, u_full_name, u_gender, u_dob, u_email_add, u_cn_num, u_home_add FROM user WHERE u_full_name = '$username' ";
  $result = $conn->query($sql);

  if ($result === false) {
    echo "Error: " . $conn->error;
  } else {
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div class='user-card'>";
      
      if($row['u_gender'] == "Male"){
        echo'<img src="Images/male.png" width="70px">','<br>';
      }
      else {
        echo'<img src="Images/female.jpg" width="70px">','<br>';
      }
      echo "<h2>" . $row["u_full_name"] . "</h2>";
      echo "<p>ID: " . $row["u_id"] . "</p>";
      echo "<p>Date of Birth: " . $row["u_dob"] . "</p>";
      echo "<p>Email: " . $row["u_email_add"] . "</p>";
      echo "<p>Contact Number: " . $row["u_cn_num"] . "</p>";
      echo "<p>Home Address: " . $row["u_home_add"] . "</p>";
      echo "<p><button onclick=\"window.location.href='User_Profile.php';\">Edit User Profile</button></p>";

      echo "</div>";
    }
  } else {
    echo "0 results";
  }
  }

  $conn->close();
?>

</body>
</html>