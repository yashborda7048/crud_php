<?php
$stu_id = $_GET['id'];
include '../helper/config.php';
$sql = "DELETE FROM student WHERE student.id = $stu_id";
$result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
header('Location: http://localhost/LearnPHP/crud_php/index.php');
mysqli_close($conn);
?>