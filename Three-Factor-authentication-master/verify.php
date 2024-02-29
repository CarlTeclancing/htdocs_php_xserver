<?php
if (!isset($_SERVER['HTTP_REFERER'])){ 
?>
<script>
alert('no cheating dude');
document.location = "signup.html"
</script>
<?php 
}
?>
<!doctype html>
<head>
<title>Three Level Password Authentication</title>
<link rel="icon" href="images/fav1.jpg" type="image/gif" sizes="16x16">
<style>
 
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #FF0000;
}
body {
background:url("images/bgm6.jpg");
background-repeat:repeat-n;
background-size:1400px 900px;
}
</style>

</head>
<body background="otp.jpg">
<?php 
session_start();
?>
<br><br>
<center><p><font size="5"><h1><font color="black">THREE LEVEL PASSWORD AUTHENTICATION SYSTEM</font></h1></font></p></center><br><br>
<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="signup.html">Sign up</a></li>
  <li><a href="login.html">Login</a></li>
  <li><a href="contact.html">Contact</a></li>
</ul>
<center>
<center>
<br><br><br><br>
<form action="verifyotp.php" method="post">
<h1><font size=5 color="black">Enter OTP:<input type="Text" name="otpverify" required></h1></font><br><br>
<input type = "submit" value = "submit">
</form



</center>

</body>
</html>