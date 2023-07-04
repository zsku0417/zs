<?PHP 
include('Header_Login.php');
include('Hoverable_Nav.php');
include('Footer.php');
include("conn.php");

# Get the logged-in user's full name from the database
if (isset($_SESSION['p_id'])) {
    $user_id = $_SESSION['p_id'];
    $sql = "SELECT p_full_name FROM patient WHERE p_id = $user_id";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row["p_full_name"];
        $_SESSION['Username'] = $username;
    }
}

?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Health Monitoring System</title>
  <link rel="stylesheet" href="Health_Data.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<header>
		<h1>Health Monitoring System</h1>
	</header>
	
	<main>
		<section>
			<h2>Latest Health Data</h2>

			<table>
			<?php
          $sql = "SELECT p_height, p_weight, p_heart, p_blood, p_temp, p_oxy FROM patient WHERE p_full_name = '$username' ";
          $result = $conn->query($sql);

          if ($result === false) {
            echo "Error: " . $conn->error;
          } else {
            if ($result->num_rows > 0) {
              echo "<table>";
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th>Parameter</th><th>Value</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Height</td><td>" . $row["p_height"] . "</td>";
                echo "</tr>";

            echo "<tr>";
                echo "<th>Weight</th><th>" . $row["p_weight"] . "</th>";
                echo "</tr>";

            echo "<tr>";
                echo "<td>Heart rate</td><td>" . $row["p_heart"] . "</td>";
                echo "</tr>";

            echo "<tr>";
                echo "<th>Blood pressure</th><th>" . $row["p_blood"] . "</th>";
                echo "</tr>";

            echo "<tr>";
                echo "<td>Temperature</td><td>" . $row["p_temp"] . "</td>";
                echo "</tr>";

            echo "<tr>";
                echo "<th>Oxygen saturation</th><th>" . $row["p_oxy"] . "</th>";
                echo "</tr>";

                $data = [
                  $row["p_height"],
                  $row["p_weight"],
                  $row["p_heart"],
                  $row["p_blood"],
                  $row["p_temp"],
                  $row["p_oxy"]
                ];

              }
              echo "</table>";
            } 
          }
      ?>
			</table>
		</section>
		
		<section>
			<h2>Historical Data</h2>
      <?php
          $labels = ["Height", "Weight", "Heart rate", "Blood pressure", "Temperature", "Oxygen saturation"];

          echo "<canvas id='myChart'></canvas>";
          echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
          echo "<script>";
          echo "var ctx = document.getElementById('myChart').getContext('2d');";
          echo "var myChart = new Chart(ctx, {";
          echo "  type: 'line',";
          echo "  data: {";
          echo "    labels: " . json_encode($labels) . ",";
          echo "    datasets: [{";
          echo "      label: 'Patient Data',";
          echo "      data: " . json_encode($data) . ",";
          echo "      backgroundColor: 'rgba(255, 99, 132, 0.2)',";
          echo "      borderColor: 'rgba(255, 99, 132, 1)',";
          echo "      borderWidth: 1";
          echo "    }]";
          echo "  },";
          echo "  options: {";
          echo "    scales: {";
          echo "      yAxes: [{";
          echo "        ticks: {";
          echo "          beginAtZero: true";
          echo "        }";
          echo "      }]";
          echo "    },";
          echo "    title: {";
          echo "      display: true,";
          echo "      text: 'Patient Data'";
          echo "    }";
          echo "  }";
          echo "});";
          echo "</script>";
          $conn->close();

      ?>
		</section>
		
		<section>
			<h2>Reminders</h2>
			<ul>
				<li>Fill up the Health Condition Form (Located at the 1st Side Bar)</li>
				<li>Take medication at 9:00 AM and 7:00 PM</li>
				<li>Drink at least 8 glasses of water per day</li>
				<li>Get at least 30 minutes of exercise daily</li>
			</ul>
		</section>

</main>
</body>
</html>