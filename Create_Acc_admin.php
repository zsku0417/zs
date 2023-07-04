<?PHP 
include('Header_Admin.php');
include('Footer.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Create New Account</title>
    <link rel="stylesheet" href="Create_Acc_admin.css">
  </head>
  <body>

    <form action='register_admin.php' method='POST'>
      <div class="container">
        <h2>New Admin Registration</h2>
        <p>Please fill up the form below.</p>
        <hr>
        <label for="Username"><b>Username :</b></label>
        <input type='text' maxlength = "10" name='a_username' placeholder = "Exp: John_D123" required>
        
        <label for="Name"><b>Name :</b></label>
        <input type="text" maxlength = "50" placeholder="Name as IC EXP: John Doe" name="a_full_name" required>
        
        <label for="Contact Number"><b>Contact Number :</b></label>
        <input type="tel" name="u_cn_num" placeholder="01XXXXXXXXX" pattern="[0][0-9]{9,10}" title="Please enter a 10 or 11-digit number starting with '0'" required>
        
        <div>
          <label><b>Email Address :</b></label>
          <input  type="email" name="a_email_add" placeholder = "Exp: JohnD_123@gmail.com" required>
        </div>

        <div style="margin: 5px 0 22px 0">
          <label><b>Gender :</b></label>
          <input type="radio" name="a_gender" value="Male" required> Male 
          <input type="radio" name="a_gender" value="Female" required> Female 
        </div>

        <div style="margin: 5px 0 22px 0">
          <label><b>Staff Position :</b></label>
            <select name="a_staffposs" required>
                <option value="Director/Administrator">Director/Administrator</option>
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
                <option value="Intern">Intern</option>
            </select>
        </div>

        <div>
          <label><b>Home Address :</b></label>
          <textarea name="a_home_add" required></textarea>
        </div>

        <label><b>Date of Birth :</b></label>
        <input  type="date" name="a_dob">

        <div>
          <label for="Password"><b>Password :</b></label>
          <input type="password" placeholder="Please enter your password." name="a_password" id="password-field" required>
          <label>
           <input type="checkbox" onclick="togglePassword()"> Show Password
          </label>
        </div>

        <div>
          <button class="signupbtn" type="submit">Register Now!</button>
          <button class="rstbtn" type="reset">Reset!</button>  
        </div>
        
      </div>
    </form>

<script>
function togglePassword() {
var passwordField = document.getElementById("password-field");
if (passwordField.type === "password") {
passwordField.type = "text";
} else {
passwordField.type = "password";
}
}
</script>
</body>
</html>