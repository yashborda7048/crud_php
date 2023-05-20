<?php
$stu_id = $_POST['id'];
$stu_name = $_POST['name'];
$stu_address = $_POST['address'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['phone'];
$stu_old_img = $_POST['img'];
$stu_new_img = $_FILES['new_img']['name'];

if ($stu_new_img != '') {
    $stu_img = $stu_new_img;
    $file_tmp_name = $_FILES['new_img']['tmp_name'];
    move_uploaded_file($file_tmp_name, '../upload_img/' . $stu_img);
} else {
    $stu_img = $stu_old_img;
}

include '../helper/config.php';
$sql = "UPDATE student SET name = '{$stu_name}', address = '{$stu_address}', class = '{$stu_class}', phone = '{$stu_phone}', img = '{$stu_img}'  WHERE student.id = $stu_id";
$result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
header('Location: http://localhost/LearnPHP/crud_php/index.php');
mysqli_close($conn);
?>