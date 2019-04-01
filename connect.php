<?php
try {
$pdo = new PDO("mysql:host=localhost;dbname=checkedin;charset=utf8", "root", "");
} catch (PDOException $e) {
echo "Error occured : " . $e->getMessage();
}
?>