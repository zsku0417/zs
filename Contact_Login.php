<?PHP include('Header_Login.php');
include('Hoverable_Nav.php');
include('Footer.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel="stylesheet" href="ContactLogin.css">
    </head>
<body>

    <div class="container">
    
        <div class="content">

            <div class="left-side">

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <div class="address details">
                    <i class="fa fa-fw fa-map-marker"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur,</div>
                    <div class="text-two">Wilayah Persekutuan Kuala Lumpur</div>
                </div>

                <div class="phone details">
                    <i class="fa fa-fw fa-phone"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+0172626273</div>
                    <div class="text-two">+0176253332</div>
                </div>

                <div class="email details">
                    <i class="fa fa-fw fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">elderlyhomesclub@gmail.com</div>
                    <div class="text-two">elderly_customer@gmail.com</div>
                </div>

            </div>

            
            <div class="right-side">
                <div class="topic-text">Send us a message</div>

                    <p class="contact-text">Kindly Contact Us If You Have Any Queries.</p>

                    
                    <form onsubmit="submitForm()" action="https://formsubmit.co/elderlyhomesclub@gmail.com" method="POST">
                        <input type="hidden" name="_subject" value="New Email from registered user">

                        <div class="input-box">
                            <input type="text" name="name"  placeholder="Enter your name" required>
                        </div>

                        <div class="input-box">
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="input-box message-box">
                            <input type="text" name="message"  placeholder="Enter your message" required>
                        </div>

                        <input type="submit" class="button_submit" value="Send Now">
                        <input type="reset"  class="button_reset" value="Reset">
                        <input type="hidden" name="_next" value="http://localhost/Web%20Development/Assignment/health_monitoring/Index_Login.php">
                    </form>

                </div>
            </div>

        </div>

    </div>

<script>
function submitForm() {
alert("Your message will be sent. Please Proceed to next step. We will get back to you shortly.");
}
</script>
</body>
</html>
