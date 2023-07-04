<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Hoverable_Nav.css">
</head>
<body>

<div id="mySidenav">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <a href='Health_Condition_Form.php' id="update">
  <span>Update Health Status</span>
  <i class="fa fa-h-square"></i>
  </a>

  <a href='Health_Data.php' id="rec">
  <span>Health Record</span>
  <i class="fa fa-heartbeat"></i>
  </a> 

  <a href='Doc_Appointment_Form.php' id="doc">
  <span>Doctor's Appointment</span>
  <i class="fa fa-user-md"></i>
  </a>

  <a href='BMI_Calculator.php' id="calc">
  <span>BMI Calculator</span>
  <i class="fa fa-fw fa-calculator"></i>
  </a>

  <a href='User_Card.php' id="up">
  <span>User Profile</span>
  <i class="fa fa-fw fa-user"></i>
  </a>


  <a href='Discussion_Wall.php' id="forum">
  <span>Forum</span>
  <i class="fas fa-comments"></i>
  </a>

</div>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
if (window.pageYOffset >= sticky) {
  navbar.classList.add("sticky")
} else {
  navbar.classList.remove("sticky");
}
}
</script>

</body>
</html> 
