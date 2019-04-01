<?php
session_start(); //open session
include("connect.php"); // connect to database

/*
* 1 = Teacher
* 2 = TA
* 3 = student
*/

// variable
$email = $_POST['email'];
$password = md5($_POST['password']); //secure password with MD5

// check email in database that has or not
if($email == ''){
	echo "Check Email";
} else if ($password == ''){
	echo "Check Password";
} else {
	//query users
	$sql = mysql_query("SELECT * from users 
						WHERE email = '$email'
						AND password = '$password'");
	// check row
	//count result data
	$num = mysql_num_rows($sql);
	if($num <= 0 ){
		//can't find user
		echo "<meta http-wquiv='refresh' content='1;URL=index.php'>";
	} else {
		//when find user
		//separate user status 
		while ( $user = mysql_fetch_array($sql)) {
			
			//can use switch case

			
			if($user['status'] == 1){
				//Teacher case
				//create session for collect data 
				$_SESSION['ses_id'] = session_id();
				//email data from whiled
				$_SESSION['email'] = $user['email'];
				$_SESSION['status'] = 1;// or "Teacher"; 
				//send to Teacher page
				echo "<meta http-equiv='refresh' content='1;URL=teacher.php'>";

			} else if($user['status'] == 2){
				//TA case
				//create session for collect data 
				$_SESSION['ses_id'] = session_id();
				//email data from whiled
				$_SESSION['email'] = $user['email'];
				$_SESSION['status'] = 2; // or "TA"
				//send to TA page
				echo "<meta http-equiv='refresh' content='1;URL=ta.php'>";
			} else {
				//Student case
				//create session for collect data 
				$_SESSION['ses_id'] = session_id();
				//email data from whiled
				$_SESSION['email'] = $user['email'];
				$_SESSION['status'] = 3; // or "Student"
				//send to Student page
				echo "<meta http-equiv='refresh' content='1;URL=student.php'>";
			}
		}//end while
	}//end else
}
	
?>