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
          echo "<meta http-equiv='refresh' content='1;URL=teacher.php'>";
        } else if($row['status'] == 2){
          //TA case
          //create session for collect data
          $_SESSION['ses_id'] = session_id();
          //email data from whiled
          $_SESSION['username'] = $row['first_name'];
          $_SESSION['status'] = 2; // or "TA"
          //send to TA page
          echo "<meta http-equiv='refresh' content='1;URL=ta.php'>";
        } else if($row['status'] == 3){
          //Student case
          //create session for collect data
          $_SESSION['ses_id'] = session_id();
          //email data from whiled
          $_SESSION['username'] = $row['first_name'];
          $_SESSION['status'] = 3; // or "Student"
          //send to Student page
          echo "<meta http-equiv='refresh' content='1;URL=student.php'>";
        } else {
          echo "<script>alert('invalid username and password!! please try again.')</script>";
          echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        }

        //check if username and password are not in database
        // if($row['username'] != $username && $row['password'] != $password){
        //   echo "alert('invalid username and password!! please try again.')";
        // }
  ?>
