<?php
include 'assets/components/header.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                          //Enable verbose debug output
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'yashborda123@gmail.com';                     //SMTP username
    $mail->Password   = 'njmpyyrpxfmpwmwo';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;        

    //Recipients
    $mail->setFrom('yashborda123@gmail.com', 'Mailer');
    $mail->addAddress('webdevloper531@gmail.com', 'Joe User'); //Add a recipient

    //Attachments
    // $mail->addAttachment('assets/upload_img/post_1.jpg', 'new.jpg'); //Add attachments

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'company name';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

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