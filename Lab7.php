<?php
session_start();
require('external/Exception.php');
require('external/PHPMailer.php');
require('external/SMTP.php');
if (isset($_POST['destination'], $_POST['topic'], $_POST['messg'], $_POST['captch'])) {
    $dest = $_POST['destination'];
    $topic = $_POST['topic'];
    $message = $_POST['messg'];
    $cptchr = $_POST['captch'];
    if ($dest !== '' and $message !== '' and $cptchr !== '') {
        if (filter_var($dest, FILTER_VALIDATE_EMAIL)) {
            if ($cptchr === $_SESSION['capchr']) {
                try {
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->isSMTP();
                    $mail->CharSet = "UTF-8";
                    $mail->SMTPAuth = true;
                    $mail->Host = "smtp.gmail.com";
                    $mail->Username = "login";
                    $mail->Password = "password";
                    $mail->SMTPSecure = "ssl";
                    $mail->Port = 465;
                    $mail->setFrom("example@gmail.com", "name");
                    $mail->addAddress($dest);
                    $mail->isHTML(true);
                    $mail->Subject = trim(strip_tags($topic));
                    $mail->Body = trim(strip_tags($message));
                    if (!$mail->send()) {
                        echo 'Message not delivered<br>';
                        echo $mail->ErrorInfo;
                    } else {
                        echo 'Message sent';
                    }
                } catch (Exception $e) {
                    echo 'Message not sent<br>';
                    echo $mail->ErrorInfo;
                }
            } else {
                echo 'Wrong capcha';
            }
        } else {
            echo 'Incorrect address';
        }
    } else {
        echo 'You have to fill in the form first';
    }
} else {
    echo 'You have to fill in the form first';
}
?>