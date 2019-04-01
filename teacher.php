<?php
session_start(); //open session
//Check login
if($_SESSION['ses_id'] == ''){
	//if not login
	//redirect to index
	echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
} else if($_SESSION['status'] != 1){
	//if login when status not equal 1 or teacher
	//redirect to logout
	echo "<meta http-wquiv='refresh' content='1;URL=logout.php'>";
} else {
		//if login when status is 1 or teacher
?>
<html>
<head>
    <meta charset="utf-8">
    <title>CheckedIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>
<body>
<h1>Teacher Page</h1>
<a href="logout.php" class="btn btn-primary">Logout</a>
</body>
</html>
<?php
} // end else
?>