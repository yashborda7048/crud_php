<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "crud";
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $database) or die('Connection Failed');
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
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
