<?php include 'assets/components/header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="id" />
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
                <form class="post-form" action="assets/components/updatedata.php" method="post">
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
                    <input class="submit" type="submit" value="Update" />
                </form>
            <?php }
        }
    } ?>
</div>
</div>
</body>

</html>