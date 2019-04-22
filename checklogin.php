<?php

  session_start(); //open session
  include("connect.php"); // connect to database

  // variable
  $username = $_POST['username'];
  $password = $_POST['password']; //secure password with MD5

  // 2. กาหนดรูปแบบคาสั่ง SQL
  $stmt = $pdo -> prepare( "SELECT * from users WHERE username = ? AND password = ?");
  $stmt -> bindParam(1, $username);
  $stmt -> bindParam(2, $password);
  //process SQL
  $stmt->execute();
  $row = $stmt->fetch();
  // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
  /*
  * 1 = Teacher
  * 2 = TA
  * 3 = student
  */

        //can use switch case
        if($row['status'] == 1){
          //Teacher case
          //create session for collect data
          $_SESSION['ses_id'] = session_id();
          //email data from whiled
          $_SESSION['username'] = $row['first_name'];
          $_SESSION['status'] = 1;// or "Teacher";
          //send to Teacher page
          echo "<meta http-equiv='refresh' content='1;URL=home.php'>";
        } else if($row['status'] == 2){
          //TA case
          //create session for collect data
          $_SESSION['ses_id'] = session_id();
          //email data from whiled
          $_SESSION['username'] = $row['first_name'];
          $_SESSION['status'] = 2; // or "TA"
          //send to TA page
          echo "<meta http-equiv='refresh' content='1;URL=home.php'>";
        } else if($row['status'] == 3){
          //Student case
          //create session for collect data
          $_SESSION['ses_id'] = session_id();
          //email data from whiled
          $_SESSION['username'] = $row['first_name'];
          $_SESSION['status'] = 3; // or "Student"
          //send to Student page
          echo "<meta http-equiv='refresh' content='1;URL=home.php'>";
        } else {
          // echo "<script>alert('invalid username or password!! please try again.')</script>";
          // echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        }

        //check if username and password are not in database
        // if($row['username'] != $username && $row['password'] != $password){
        //   echo "alert('invalid username and password!! please try again.')";
        // }
  ?>

<?php

	$LimitTime = 3;

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "checkedin";

	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$strSQL = "SELECT * FROM users WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
      echo "<script>alert('Not Found User!')</script>";
      echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			exit();
	}
	else
	{
		if($objResult["FlagLock"] == "Yes")
		{
      echo "<script>alert('This user account is lock! please contact admin.')</script>";
      echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			exit();
		}

		if($objResult["password"] != $_POST["password"])
		{
      echo "<script>alert('invalid username or password!! please try again.')</script>";
      echo "<meta http-equiv='refresh' content='0;URL=index.php'>";

			// Update Login Failed
			$strSQL = "UPDATE users  SET LoginCount = LoginCount + 1 WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."' ";
      $objQuery = mysqli_query($objCon,$strSQL);

      // If more than limit time auto lock account
			if($objResult["LoginCount"] + 1 >= $LimitTime)
			{
				$strSQL = "UPDATE users  SET FlagLock = 'Yes' , BanExpire = DATE_ADD(NOW(),INTERVAL $BanTime MINUTE)  WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."' ";
				$objQuery = mysqli_query($objCon,$strSQL);
			}

			// If more than limit time auto lock account
			if($objResult["LoginCount"] + 1 >= $LimitTime)
			{
				$strSQL = "UPDATE users  SET FlagLock = 'Yes' WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."' ";
				$objQuery = mysqli_query($objCon,$strSQL);
			}

			exit();
		}
		else
		{
			// Login Success
			$_SESSION["UserID"] = $objResult["id"];

			session_write_close();

			// Reset LoginCount
			$strSQL = "UPDATE users  SET LoginCount = 0 WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."' ";
			$objQuery = mysqli_query($objCon,$strSQL);

			header("location:home.php");
		}
	}
	mysqli_close($objCon);
?>