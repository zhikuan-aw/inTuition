
<html>
<head>
<title>Intuition RESET</title>
<link rel="shortcut icon" type="image/x-icon" href="lightbulb.ico">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;  padding: 12px 20px;  margin: 8px 0;
  display: inline-block;  border: 1px solid #ccc;  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;  padding: 14px 20px;  margin: 8px 0;
  border: none;  cursor: pointer;  width: 100%;
}

button:hover { opacity: 0.8;}
.cancelbtn { width: auto; padding: 10px 18px; background-color: #f44336; }
.imgcontainer { text-align: center; margin: 24px 0 12px 0;}
img.avatar { width: 40%;  border-radius: 50%;}
.container { padding: 16px;}
span.psw { float: right; padding-top: 16px;}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {  display: block;   float: none; }
  .cancelbtn {  width: 100%;  }
}
</style>

</head>




<div class="container">


  <div class="imgcontainer">
    <img src="intuition_logo.png" alt="Avatar" class="avatar">




<form method="POST" action="./sendmail/resetPasswordProcess.php">

<input type="text" placeholder="Enter Username" autofocus
name="username" id="username" required>
<br/><br/>




<script>
window.onload = function() {
var $recaptcha = document.querySelector('#g-recaptcha-response');
if($recaptcha) { $recaptcha.setAttribute("required", "required"); }
};
</script>

<style>	#g-recaptcha-response { display: block !important; position: absolute;
margin: -78px 0 0 0 !important; width: 302px !important; height: 76px !important; z-index: -999999;  opacity: 0;}
</style>

<div align="center">
<div class="g-recaptcha" id="grecaptcha" data-sitekey="6LcpDroUAAAAAO-YS3f1FxTZic1lU7sykZop1PAj"></div>
</div>

<span id="captcha" style="color:red" /></span>
<!-- this will show captcha errors -->


<br/><br/>








<button type="submit" value="RESET" name="RESET">RESET</button>
 </div>


<div class="container" align="center">
<a href="login.php"> Back To Login</a>
</div>

</form>






</div>





































<!--
<h2>RESET PASSWORD</h2>
<br><br>
<form method="POST" action="resetPasswordProccess.php"">
<p><b>USERNAME</b><input type="text" size="10" maxlength="50" name="username" required></p>
<p><b>EMAIL</b><input type="email" size="10" maxlength="50" name="email" required></p>
<p><img src="captcha.php" width="300" height="100" border="2" alt="CAPTCHA"></p>
<p><small>CAPTCHA</small><input type="text" size="10" maxlength="5" name="captcha" required></p>
<br><p><input type="submit"  name="submit" >
</p>
</form>
<br> <br> <a href='login.html'> CANCEL </a>
-->
