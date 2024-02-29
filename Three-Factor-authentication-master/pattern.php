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
<!DOCTYPE html>
<html>
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
.btn {
    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
}

.Green {background-color: #4CAF50;} /* Green */
.Green:hover {background-color: #46a049;}

.Orange {background-color: #ff9800;} /* Orange */
.Orange:hover {background: #e68a00;}

.Pink {background-color: #FF1493;} /* Pink */
.Pink:hover {background: #0b7dda;}

.Red {background-color: #f44336;} /* Red */ 
.Red:hover {background: #da190b;}

.Purple {background-color: #800080;} /* Purple */
.Purple:hover {background: #0b7dda;}
body {
background:url("images/bgm6.jpg");
background-repeat:repeat-n;
background-size:1400px 900px;
}

</style>
</head>

<body>
<br><br>
<?php
    $value1 = 'green';
	$value2 = 'orange';
	$value3 = 'pink';
	$value4 = 'red';
	$value5 = 'purple';
?>
<center><p><font size="5"><h1>THREE LEVEL PASSWORD AUTHENTICATION SYSTEM</h1></font></p></center><br><br>
<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="signup.html">Sign up</a></li>
  <li><a href="login.html">Login</a></li>
  <li><a href="contact.html">Contact</a></li>
</ul>
<center>
<center>
<br><br>

<h1>Pattern</h1>
<br><br><br>
<form action="patternback.php" method = "POST">
		<input type="hidden" id="value1" value="<?php echo $value1; ?>" name="value1">
		<input type="hidden" id="value2" value="<?php echo $value2; ?>" name="value2">
		<input type="hidden" id="value3" value="<?php echo $value3; ?>" name="value3">
		<input type="hidden" id="value4" value="<?php echo $value4; ?>" name="value4">
		<input type="hidden" id="value5" value="<?php echo $value5; ?>" name="value5">
Enter your pattern: <input type="text" id = "input1" name = "input1" value="" required placeholder = "just enter the colors shown" ><br><br><br>
		<input class = "btn Green" type="button" value="green" name="button" onclick="populateTextareaone()">
		<input class = "btn Orange" type="button" value="Orange" name="button" onclick="populateTextareatwo()"> 
		<input class = "btn Pink" type="button" value="Pink" name="button" onclick="populateTextareathree()">
		<input class = "btn Red" type="button" value="Red" name="button" onclick="populateTextareafour()">
		<input class = "btn Purple" type="button" value="Purple" name="button" onclick="populateTextareafive()">
		<br>
		<br>
		<input class = "btn Purple" type="button" value="clear" name="button" onclick="clearit()">
		<input class = "btn Purple" type="submit" value="submit" name="button" required >
		

</form>
</center>

  <script type="text/javascript">
  function clearit(){
	  
  document.getElementById("input1").value = '';
  txt = '';
  
  }
	txt = ''
    function populateTextareaone() {
        txt = txt.concat(document.getElementById('value1').value);
		document.getElementById('input1').value = txt;

    }
	function populateTextareatwo() {
        txt = txt.concat(document.getElementById('value2').value);
		document.getElementById('input1').value = txt;

    }
	function populateTextareathree() {
        txt = txt.concat(document.getElementById('value3').value);
		document.getElementById('input1').value = txt;

    }
	function populateTextareafour() {
        txt = txt.concat(document.getElementById('value4').value);
		document.getElementById('input1').value = txt;

    }
	function populateTextareafive() {
        txt = txt.concat(document.getElementById('value5').value);
		document.getElementById('input1').value = txt;

    }
  </script>


</body>
</html>
