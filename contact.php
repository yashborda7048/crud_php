<?php include 'assets/components/header.php';
if (isset($_POST['submitbtn'])) {
    include 'assets/helper/config.php';
    $to_email = 'yashborda123@gmail.com';
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $form = $_POST['form_email'];
    $headers = "From:$form ";

    // ini_set("SMTP","localhost");
    // ini_set("smtp_port","587");
    // ini_set("sendmail_from",$to_email);
    // ini_set("sendmail_path", "C:\xampp\sendmail\sendmail.exe -t");
    // mail($to_email, $subject, $message, $headers);
    if (mail($to_email, $subject, $message, $headers)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }

} else {
    echo `Something went worng.`;
}
?>

<div id="main-content">
    <h2>Send Email</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Email<span class="text-danger">*</span></label>
            <input type="email" name="form_email" required />
        </div>
        <div class="form-group">
            <label>Subject<span class="text-danger">*</span></label>
            <input type="text" name="subject" required />
        </div>
        <div class="form-group">
            <label>Message<span class="text-danger">*</span></label>
            <textarea name="message" id="message" cols="41" rows="3" required></textarea>
        </div>
        <input class="submit" type="submit" name="submitbtn" value="Send" />
    </form>
</div>
</div>
</body>

</html>