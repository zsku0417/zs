<?PHP 
include('Header_Login.php');
include('Hoverable_Nav.php');
include('Footer.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Appointment</title>
<link rel="stylesheet" href="Doc_Appointment_Form.css">
</head>
<body>

  <form action="insert_app.php" id="ft-form" method="POST">

    <fieldset>
      <legend>Appointment request</legend>

      <div class="two-cols">
        <label>Date :
          <input type="date" name="appdate" required>
        </label>
        <label>Time :
          <input type="time" name="apptime" required>
        </label>
      </div>

      <div>
        <label>Reasons of Appointment :</label>
          <input type="text" placeholder="Leave your reason here..." name="appreason" required>
      </div>
    </fieldset>

    <div class="btns">
      <input type="submit" value="Submit Request">
      <input type="reset" value="Reset">
    </div>

  </form>


  <div class="appointment-history">
    <h2>Appointment history</h2>
    <p>Please Attend on time at appointment room on level 2 </p>
    <p>Only attend when the result become 'Accepeted' </p>

    <?php
      include("conn.php");
      $result = mysqli_query($conn, "SELECT * FROM doc_app WHERE p_id=$user_id");
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<div class='content'>";
          echo "<p class='appointment-id'><strong>Appointment ID:</strong> " . $row['app_id'] . "</p>";
          echo "<p class='date'><strong>Date:</strong> " . $row['appdate'] . "</p>";
          echo "<p class='time'><strong>Time:</strong> " . $row['apptime'] . "</p>";
          echo "<p class='reason'><strong>Reason:</strong> " . $row['appreason'] . "</p>";
          if ($row['action'] == 'Accepted') {
            echo "<p class='action' style='color:green;'><strong>Result:</strong> " . $row['action'] . "</p>";
          } elseif ($row['action'] == 'Pending') {
            echo "<p class='action' style='color:red;'><strong>Result:</strong> " . $row['action'] . "</p>";
          } else {
            echo "<p class='action'><strong>Result:</strong> " . $row['action'] . "</p>";
          }
          echo "</div>";
        }
      } else {
        echo "<p class='no-record'>No appointment record found.</p>";
      }
    ?>
  </div>
</body>
</html>
