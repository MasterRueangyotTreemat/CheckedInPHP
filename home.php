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
} else if($_SESSION['status'] == 1) {
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
	<!-- Teacher Page -->
    <div class="container">
        <div class="row">
        		<div class="col-md-3"></div>
        		<div class="col-md-6">

					<h1 class="text-center">Teacher Page</h1>
					<h3>username : <?=$_SESSION['username'];?></h3>
					<a href="logout.php" class="btn btn-primary">Logout</a>

        		</div>
        		<div class="col-md-3"></div>
        </div>
    <div>

</body>
</html>
<?php
}
?>
<?php
if($_SESSION['status'] == 2) {
		//if login when status is 1 or ta
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
	<!-- TA Page -->
    <div class="container">
        <div class="row">
        		<div class="col-md-3"></div>
        		<div class="col-md-6">

					<h1 class="text-center">TA Page</h1>
					<h3>username : <?=$_SESSION['username'];?></h3>
					<a href="logout.php" class="btn btn-primary">Logout</a>

        		</div>
        		<div class="col-md-3"></div>
        </div>
    <div>
</body>
</html>
<?php
}
?>
<?php
if($_SESSION['status'] == 3) {
		//if login when status is 1 or student
?>
<html>
<head>
    <meta charset="utf-8">
    <title>CheckedIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

</head>
<body>
	<!-- Student Page -->
    <div class="container">
        <div class="row">
        		<div class="col-md-3"></div>
        		<div class="col-md-6">

					<h1 class="text-center">Student Page</h1>
					<h3>username : <?=$_SESSION['username'];?></h3>
					<a href="logout.php" class="btn btn-primary">Logout</a>

        		</div>
        		<div class="col-md-3"></div>
        </div>
    <div>


</body>
</html>
<?php
} // end else
?>