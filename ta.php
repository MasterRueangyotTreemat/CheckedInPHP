<?php
session_start(); //open session
//Check login
if($_SESSION['ses_id'] == '']){
	//if not login
	//redirect to index
	echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
} else if($_SESSION['status'] != 2){
	//if login when status not equal 1 or ta 
	//redirect to logout
	echo "<meta http-wquiv='refresh' content='1;URL=logout.php'>";
} else {
		//if login when status is 1 or ta 
?>

<h1>TA Page</h1>
<a href="logout.php" class="btn btn-primary">Logout</a>

<?php
} // end else
?>