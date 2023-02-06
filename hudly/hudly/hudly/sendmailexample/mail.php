<?php
require 'PHPMailer/PHPMailerAutoload.php';
require'constants.php';

//mail send sample code
$mail = new PHPMailer();
//$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->SMTPAuth =true;
$mail->SMTPSecure='tls';  //tls ssl
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;    // 587 465
$mail->IsHTML(true);
$mail->CharSet='UTF-8';
$mail->Username='myfx.save@gmail.com';
$mail->Password=PASSWORD;
$mail->SetFrom('your gmail', 'Your Company Name');
$mail->addAddress('Recipient','Recipiant name');
$mail->addReplyTo('no-reply@gmail.com', 'No-reply');
$mail->addCC('your gmail');
$mail->addBCC('your gmail');
//$mail->addAttachment('byby.png');   
$mail->Subject = 'Test Mail example';
$mail->Body="This is my sample mail";
$mail->SMTPOptions = array(
    'ssl' => [
        'verify_peer' => false,
        'verify_depth' => false,
        'allow_self_signed' => false,
        'verify_peer_name' => false
    ]
);

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

?>