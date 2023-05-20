<?php include 'assets/components/header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="assets/components/savedata.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" required/>
        </div>
        <div class="form-group">
            <label>Address <span class="text-danger">*</span></label>
            <input type="text" name="address" required/>
        </div>
        <div class="form-group">
            <label>Class <span class="text-danger">*</span></label>
            <select name="class" required>
                <option value="" selected disabled>Select Class</option>
                <?php
                include 'assets/helper/config.php';
                $sql = "SELECT * FROM class_details";
                $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
                    <?php }
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" />
        </div>
        <div class="form-group">
            <label>Upload Img</label>
            <input type="file" name="new_img" />
        </div>
        <input class="submit" type="submit" value="Save" />
    </form>
</div>
</div>
</body>
<script>
    // function upload_img() {
    //     if (isset($_FILES['new_img'])) {
    //         $file_name = $_FILES['new_img']['name'];
    //         $file_tmp_name = $_FILES['new_img']['tmp_name'];
    //         move_uploaded_file($file_tmp_name, '../upload_img/'.$file_name);
    //     }
    // }
</script>

</html>