<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CheckedIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" >
		$('.message a').click(function(){
		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
	</script>
</head>
<body>
<!-- check login -->
<script type="text/javascript">
	function validation(){
		var username = document.myform.username.value;
		var password = document.myform.password.value;

		if (username == "" && password == "") {
     		alert("*Please enter your username and password!!");
     	return false;
 		} else if (username == "") {
			alert("*Please enter your username!!");
     	return false;
		} else if (password == "") {
			alert("*Please enter your password!!");
     	return false;
 		}

}
</script>

	<!-- Login form -->
		<div class="login-page">
			<div class="form">
				<h1>CheckedIn</h1>
				<form name="myform" class="login-form" action="checklogin.php" method="post" onsubmit="return validation();">
					<input type="text" name="username" id="username" placeholder="username" onsubmit="return showHint(this.value)"/>
					<input type="password" name="password" id="password" placeholder="password" onsubmit="return showHint(this.value)"/>
					<button>log in</button>
					<!-- <p id="errors" class="message"></p> -->
					<p><span id="txtCheck"></span></p>
				</form>
			</div>
		</div>
    <script src="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>