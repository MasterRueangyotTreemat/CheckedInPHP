<?php
// 1. ติดต่อฐานข้อมูล
$pdo = new PDO("mysql:host=localhost;dbname=checkedin;charset=utf8", "root", "");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 2. กาหนดรูปแบบคาสั่ง SQL
$stmt = $pdo -> prepare( "SELECT * from users WHERE email = ? AND password = ?");
$stmt -> bindParam(1, $_GET["email"]);
$stmt -> bindParam(2, $_GET["password"]);
//process SQL
$stmt -> execute();
// check row
//count result data
// 4. วนลูปดึงผลลัพธ์
while($row = $stmt -> fetch()) {// ดึงข้อมูลทีละแถวเก็บไว้ใน $row$row$row
echo "<pre>";
print_r($row); // คาสั่งแสดงค่าในอาร์เรย์
echo "</pre>";
}
?>