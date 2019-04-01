<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CheckedIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>
<body>
	<!-- Login form -->
    <div class="container">
        <div class="row">
        		<div class="col-md-3"></div>
        		<div class="col-md-6">
        			<h1 class="">CheckedIn Login</h1>
        			<!-- send data in form to checklogin.php by by post -->
        			<form action="checklogin.php" method="post">
        				<div class="form-group">
        					<label for="email">Email</label>
        					<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        				</div>
        				<div class="form-group">
        					<label for="password">Password</label>
        					<input type="password" class="form-control" name="password" id="password" placeholder="password" required>
        				</div>
        				<input type="submit" value="log in" class="btn btn-primary">
        			</form>
        		</div>
        		<div class="col-md-3"></div>
        </div>
    <div>
    <script src="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>