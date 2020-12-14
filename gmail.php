<?php
include('./layouts/header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if (isset($_POST["send"])) {
    # code...
    $name = $_POST["name"];
    $email = $_POST["email"];
    $fullName =  $_POST["fullName"];
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query); 
    $checkname = mysqli_num_rows($query);

    if ($checkname == 1) {
        if ($email == $data["email"]) {
            # code...
            //Import PHPMailer classes into the global namespace

            require 'vendor/autoload.php';

            //Create a new PHPMailer instance
            $mail = new PHPMailer();

            //Tell PHPMailer to use SMTP
            $mail->isSMTP();

            //Enable SMTP debugging
            // SMTP::DEBUG_OFF = off (for production use)
            // SMTP::DEBUG_CLIENT = client messages
            // SMTP::DEBUG_SERVER = client and server messages

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6
            $mail->CharSet = 'UTF-8';
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;

            //Set the encryption mechanism to use - STARTTLS or SMTPS
            // $mailer->SMTPSecure = 'ssl';
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = 'tuananhpv0210@gmail.com';

            //Password to use for SMTP authentication
            $mail->Password = '0354004123.';

            //Set who the message is to be sent from
            $mail->setFrom('from@example.com', 'Admin');

            //Set an alternative reply-to address
            $mail->addReplyTo('replyto@example.com', 'admin');

            //Set who the message is to be sent to

            $mail->addAddress($email,$fullName);

            //Set the subject line

            $mail->Subject = 'Đây Là Mật Khẩu Mới Của Bạn' ;

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body

            // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
            $codeReset = md5($email . time());
            $userId = $data["id"];
            $command = "INSERT INTO passwords_resets(userId ,codeReset) VALUES ('$userId','$codeReset')";
            $query = mysqli_query($conn, $command);
            
            $url ="http://localhost:8080/demophp/check.php?email=$email&hash=".$codeReset;

            $mail->Body = $url ;
            //Replace the plain text body with one created manually

            // $mail->AltBody = 'This is a plain-text message body';

            //Attach an image file
            // $mail->addAttachment('images/phpmailer_mini.png');



            //send the message, check for errors
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Success!!!!!!!!!!';
            }
        } else{
            echo 'Please enter your account email correctly';
        }
    } else {
        echo "Please re-enter your account name";
    }
}
?>
<style type="text/css">
    .login{
        background: #B0C4DE ;
        margin-top: 100px; 
    }
</style>
<form action="" method="post">
    <div class="col-md-5 container login" style="padding-top: 50px; padding-bottom: 30px;">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center; color: #fff;">Password Retrieval</h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="">Account name</label>
                        <input type="text" class="form-control" id="" placeholder="Enter your account name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email Name</label>
                        <input type="text" class="form-control" id="" placeholder="Enter your account name email you want to send" name="fullName">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="" placeholder="Enter email" name="email">

                    </div>


                    <button type="submit" class="btn btn-primary" name="send">Send</button>
                    <button type="submit" class="btn btn-primary" name=""><a href="login.php" style="border: none;color: #fff;">Exit</a></button>
                </form>
            </div>
        </div>
    </div>
</form>


<?php include('../layouts/footer.php') ?>