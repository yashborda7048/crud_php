<?php include 'assets/components/header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="form-group">
            <label>Id <span class="text-danger">*</span></label>
            <input type="number" name="id" required />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
    if (isset($_POST['showbtn'])) {
        $stu_id = $_POST['id'];
        include 'assets/helper/config.php';
        $sql = "SELECT * FROM student WHERE student.id = {$stu_id}";
        $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <form class="post-form" style="margin-top: 20px;" action="assets/components/updatedata.php" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                        <input type="text" name="name" value="<?php echo $row['name'] ?>" required />
                    </div>
                    <div class="form-group">
                        <label>Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" value="<?php echo $row['address'] ?>" required />
                    </div>
                    <div class="form-group">
                        <label>Class <span class="text-danger">*</span></label>
                        <select name="class" required>
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
        } else {
            echo 'Not Match Found.';
        }
    } ?>
</div>
</div>
</body>

</html>