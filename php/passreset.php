<?php 
$to_email = $_POST["email"];

$con=mysqli_connect("localhost","root","","demo");
if(!$con)
{
	die("Can not connect to database");
}
else
{
	$query = mysqli_query($con,"select username,password,email from users where email = '$to_email'");
	$row = mysqli_fetch_row($query);
	if(!$row)
	{
		$msg = "<h2 style='margin-top:10%; font-size: 30px; margin-left:15px;'>This email id not registered : ".$to_email."</h2>";
		
	}else{
		$username =$row[0];
		$password =$row[1];
		$subject = "PASSWORD RESET SUCCESSFULLY";
		$body = "<h1><b>passowrd :".$password." For username :".$username."</h1></b>
		<footer>© all rights reserved by EXPIRY TRACKER</footer>";
		$headers = "From: Notify.expirytracker@gmail.com";
		mail($to_email, $subject, $body, $headers);
		$msg = "<h2 style='margin-top:10%; font-size: 30px; margin-left:15px;'>Your password has been sent to ".$to_email."</h2>";
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password reset</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="navbar">
<p style="margin-top:0;"><a href="../index.html">Expiry tracker</a></p>
<a href="../singup.html">Singup</a>
<a href="../login.php">Login</a>
</div>
<?php
echo $msg;
?>
		<svg version="1.1" id="L2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="width: 100px;
  height: 100px;
  margin: 20px;
  display:inline-block;
  align-items:center;

	margin-left:46.5%;
	background-color: #000000;
	border:groove #000000;
	border-radius: 50%;">
<circle fill="none" stroke="#fff" stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="48"/>
<line fill="none" stroke-linecap="round" stroke="#fff" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="85" y2="50.5">
  <animateTransform 
       attributeName="transform" 
       dur="2s"
       type="rotate"
       from="0 50 50"
       to="360 50 50"
       repeatCount="indefinite" />
</line>
<line fill="none" stroke-linecap="round" stroke="#fff" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="49.5" y2="74">
  <animateTransform 
       attributeName="transform" 
       dur="15s"
       type="rotate"
       from="0 50 50"
       to="360 50 50"
       repeatCount="indefinite" />
</line>
</svg>

<div class="navbar2" >
<p style="text-align: center; margin-bottom: 0pt;"> We hope all your requirements will fullfil with expiry tracker, you can contact us by using below link.</p> 

<a href="#" class="fa fa-facebook"></a> 
<a href="#" class="fa fa-twitter"></a> 
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-pinterest"></a>
<p style="clear: left; margin-top: 0pt;"></p> <hr>
<a href="../contact%20us.html" >Contact Us OR Feedback</a><br>
<p style="text-align: center;"> © all rights reserved by EXPIRY TRACKER</p><br>

</div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php?>