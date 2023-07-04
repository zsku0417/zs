<?PHP
include('Header_Login.php');
include('Hoverable_Nav.php'); 
include('Footer.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Health Monitoring System</title>
	<link rel="stylesheet" href="Index_Login.css">
</head>

<body>
	
<div class="slider">
	<div class="slides">
		<input type="radio" name="radio-btn" id="radio1">
		<input type="radio" name="radio-btn" id="radio2">
		<input type="radio" name="radio-btn" id="radio3">
		<input type="radio" name="radio-btn" id="radio4">

		<div class="slide first">
		<img src="Images/logo.png" alt="">
		</div>
		<div class="slide">
		<img src="Images/Health.jpg" alt="">
		</div>
		<div class="slide">
		<img src="Images/Health_Pillars.png" alt="">
		</div>
		<div class="slide">
		<img src="Images/Food_Pyramid.jpg" alt="">
		</div>

		<div class="navigation-auto">
		<div class="auto-btn1"></div>
		<div class="auto-btn2"></div>
		<div class="auto-btn3"></div>
		<div class="auto-btn4"></div>
		</div>

	</div>

    <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
    </div>
</div>

<script type="text/javascript">
var counter = 1;
setInterval(function(){
document.getElementById('radio' + counter).checked = true;
counter++;
if(counter > 4){
counter = 1;
}
}, 5000);
</script>

	<div class="buttom">
		<div class="title">
			<h1>Healthy Lifesytle FAQ</h1>
		</div>

		<div class="subtitle">
			<h1>Frequently Asked Questions</h1>
		</div>

		<div class="containerqna">
		<div class="left">
			<div class="question">
			<h2>What is a healthy lifestyle?</h2>
			</div>
			<div class="answer">
			<p>A healthy lifestyle involves making choices that promote physical, mental, and emotional 
				well-being. This can include eating a balanced diet, exercising regularly, getting enough 
				sleep, managing stress, and avoiding harmful habits like smoking and excessive drinking.</p>
			</div>
		</div>

		<div class="right">
			<div class="question">
			<h2>What are some benefits of living a healthy lifestyle?</h2>
			</div>
			<div class="answer">
			<p>Living a healthy lifestyle can help reduce the risk of many chronic diseases, including heart 
				disease, diabetes, and certain types of cancer. It can also improve mental health, increase 
				energy levels, and enhance overall quality of life.</p>
			</div>
		</div>

		<div class="left">
			<div class="question">
			<h2>How can I start living a healthier lifestyle?</h2>
			</div>
			<div class="answer">
			<p>Start by making small, manageable changes to your daily habits. For example, try incorporating 
				more fruits and vegetables into your diet, taking a daily walk, or practicing relaxation 
				techniques like deep breathing or yoga. It's also important to get regular check-ups with 
				your healthcare provider and to seek support from friends and family when making changes.</p>
			</div>
		</div>

		<div class="right">
			<div class="question">
			<h2>What are some common barriers to living a healthy lifestyle?</h2>
			</div>
			<div class="answer">
			<p>Some common barriers include lack of time, motivation, and resources, as well as social and 
				cultural factors that may promote unhealthy behaviors. It's important to identify these 
				barriers and develop strategies to overcome them, such as scheduling time for exercise or 
				seeking out healthy social support networks.</p>
			</div>
		</div>

		<div class="last">
			<div class="question">
			<h2>Is it ever too late to start living a healthy lifestyle?</h2>
			</div>
			<div class="answer">
			<p>No, it's never too late to start making positive changes to your lifestyle. Even small changes 
				can have a big impact on your health and well-being.</p>
			</div>
		</div>
	</div>

	<button class="open-button" onclick="openForm()">Chat</button>
		<div class="chat-popup" id="chatbot">
			<div class="glass" class="form-container">
			<h1>Where are Those?</h1>
			<p>1 - Health Condition Form</p>
			<p>2 - BMI Calculator</p>
			<p>3 - Doctor Appoinment</p>
			<p>4 - Health Record</p>
			<p>5 - User Profile</p>
			<p>6 - Forum</p>
			<p>7 - Contact</p>
			<p>8 - About Us</p>
				<div class="input">
				<input
				type="text"
				id="userBox"
				onkeydown="if(event.keyCode == 13){ talk()}"
				placeholder="Type your Question"></input>
				</div>
			<p id="chatLog">Answer Appering Here</p>
			<button class="btncancel" onclick="closeForm()">Close</button>
		</div>

<script>
function openForm() {
document.getElementById("chatbot").style.display = "block";
}

function closeForm() {
document.getElementById("chatbot").style.display = "none";
}
function talk(){
	var know = {
	"1": "Please hover to the 1st Side Bar (<a href='Health_Condition_Form.php'>Update Health Status</a>)...",
	"2" : "Please hover to the 2nd Side Bar (<a href='BMI_Calculator.php'>BMI Calculator</a>)...",
	"3" : "Please hover to the 3rd Side Bar (<a href='Doc_Appointment_Form.php'>Doctor Appointment</a>)...",
	"4" : "Please hover to the 4th Side Bar (<a href='Health_Data.php'>Health Record</a>)...",
	"5" : "Please hover to the 5th Side Bar (<a href='User_Card.php'>User Profile</a>)...",
	"6" : "Please hover to the 6th Side Bar (<a href='Discussion_Wall.php'>Forum</a>)...",
	"7" : "Please hover to the Top Navigation Bar (<a href='Contact_Login.php'>Contact</a>)...",
	"8" : "Please hover to the Top Navigation Bar (<a href='About_Login.php'>About Us</a>)...",
	"bye": "Thank You So Much ",
	"thank" : "Okay! Will meet soon.."
	};
	var user = document.getElementById('userBox').value;
	document.getElementById('chatLog').innerHTML = user + "<br>";
	if (user in know) {
	document.getElementById('chatLog').innerHTML = know[user] + "<br>";
	}else{
	document.getElementById('chatLog').innerHTML = "Sorry,I Didn't Understand. <br> Please Contact Us for Any Query. <br>";
	}
	}
</script>
</body>
</html> 
