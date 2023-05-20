<?php include 'assets/components/header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    $stu_id = $_GET['id'];
    include 'assets/helper/config.php';
    $sql = "SELECT * FROM student WHERE student.id = {$stu_id}";
    $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form class="post-form" action="assets/components/updatedata.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                    <input type="text" name="name" value="<?php echo $row['name'] ?>" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['address'] ?>" />
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <select name="class">
                        <option value="" selected disabled>Select Class</option>
                        <?php
                        $sql_1 = "SELECT * FROM class_details";
                        $result_1 = mysqli_query($conn, $sql_1) or die('Query Unsuccessful.');
                        if (mysqli_num_rows($result) > 0) {
                            while ($row_1 = mysqli_fetch_assoc($result_1)) {
                                if ($row['class'] == $row_1['class_id']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                } ?>
                                <option <?php echo $selected ?> value="<?php echo $row_1['class_id'] ?>">
                                    <?php echo $row_1['class_name'] ?>
                                </option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo $row['phone'] ?>" />
                </div>
                <div class="form-group">
                    <label>Upload Img</label>
                    <input type="hidden" name="img" value="<?php echo $row['img'] ?>" />
                    <input type="file" name="new_img" onchange='upload_img()' />
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <img width="250px" height="250px" src="assets/upload_img/<?php echo $row['img'] ?>"
                        alt="<?php echo $row['img'] ?>">
                </div>
                <input class="submit" type="submit" value="Update" />
            </form>
        <?php }
    } ?>
</div>
<script>
    function upload_img() {
        if (isset($_FILES['new_img'])) {
            $file_name = $_FILES['new_img']['name'];
            $file_tmp_name = $_FILES['new_img']['tmp_name'];
            move_uploaded_file($file_tmp_name, '../upload_img/'.$file_name);
        }
    }
</script>
</body>

</html>