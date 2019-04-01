<?php

  session_start(); //open session
  include("connect.php"); // connect to database

  // variable
  $email = $_POST['email'];
  $password = md5($_POST['password']); //secure password with MD5

  // 2. กาหนดรูปแบบคาสั่ง SQL
  $stmt = $pdo -> prepare( "SELECT * from users WHERE email = ? AND password = ?");
  $stmt -> bindParam(1, $email);
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
          $_SESSION['email'] = $row['email'];
          $_SESSION['status'] = 1;// or "Teacher";
          //send to Teacher page
          echo "<meta http-equiv='refresh' content='1;URL=teacher.php'>";
        } else if($row['status'] == 2){
          //TA case
          //create session for collect data
          $_SESSION['ses_id'] = session_id();
          //email data from whiled
          $_SESSION['email'] = $row['email'];
          $_SESSION['status'] = 2; // or "TA"
          //send to TA page
          echo "<meta http-equiv='refresh' content='1;URL=ta.php'>";
        } else if($row['status'] == 3){
          //Student case
          //create session for collect data
          $_SESSION['ses_id'] = session_id();
          //email data from whiled
          $_SESSION['email'] = $row['email'];
          $_SESSION['status'] = 3; // or "Student"
          //send to Student page
          echo "<meta http-equiv='refresh' content='1;URL=student.php'>";
        } else {
          echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
        }

    if (!empty($row)) {
      // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
      $_SESSION["fullname"] = $row["first_name"];
      $_SESSION["username"] = $row["email"];

      // แสดง link เพื่อไปยังหน้าต่อไปหลังจากตรวจสอบสำเร็จแล้ว
      echo "เข้าสู่ระบบสำเร็จ<br>";
      echo "<a href='ta.php'>ไปยังหน้าหลักของผู้ใช้</a>";

    // กรณี username และ password ไม่ตรงกัน
    } else {
      echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
      echo "<a href='index.php'>เข้าสู่ระบบอีกครัง</a>";
    }

  ?>
