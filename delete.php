<?php include 'assets/components/header.php';
if (isset($_POST['deletebtn'])) {
    $stu_id = $_POST['id'];
    include 'assets/helper/config.php';
    $sql = "DELETE FROM student WHERE student.id = $stu_id";
    $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
    header('Location: http://localhost/LearnPHP/crud_php/index.php');
    mysqli_close($conn);
} else {
    echo `Something went worng.`;
}
?>

<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>

</html>