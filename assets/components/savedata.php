<?php

$stu_name = $_POST['name'];
$stu_address = $_POST['address'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['phone'];
$stu_new_img = $_FILES['new_img']['name'];

if ($stu_new_img != '') {
    $stu_img = $stu_new_img;
    $file_tmp_name = $_FILES['new_img']['tmp_name'];
    move_uploaded_file($file_tmp_name, '../upload_img/' . $stu_img);
} else {
    $stu_img = '';
}

include '../helper/config.php';
$sql = "INSERT INTO student(name, address, class, phone, img)
 VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}', '{$stu_img}')";
$result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
header('Location: http://localhost/LearnPHP/crud_php/index.php');
mysqli_close($conn);

?>