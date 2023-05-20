<?php
$stu_id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die('Connection Failed');
$sql = "DELETE FROM student WHERE student.id = $stu_id";
$result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
header('Location: http://localhost/LearnPHP/crud_php/index.php');
mysqli_close($conn);
?>