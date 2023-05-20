<?php
include 'assets/components/header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <table cellpadding="7px">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            include 'assets/helper/config.php';
            // SQL Query Enter for Table Data
            $sql = "SELECT
                    student.id,
                    student.name,
                    student.address,
                    class_details.class_name,
                    student.phone
                    FROM student JOIN class_details WHERE student.class = class_details.class_id";
            $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id'] ?>
                        </td>
                        <td>
                            <?php echo $row['name'] ?>
                        </td>
                        <td>
                            <?php echo $row['address'] ?>
                        </td>
                        <td>
                            <?php echo $row['class_name'] ?>
                        </td>
                        <td>
                            <?php echo $row['phone'] ?>
                        </td>
                        <td>
                            <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                            <a href="assets/components/delete-inline.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr>
                 <td colspan='6' class='text-center'>
                 <h3>Add Data</h3>
                 </td> 
                 </tr>"; ?>
            </tbody>
        </table>
    <?php } ?>
</div>
</div>
</body>

</html>