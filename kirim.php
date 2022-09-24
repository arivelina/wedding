<?php

$nama= $_POST['nama'];
$usermail= $_POST['email'];
$ucapan= $_POST['ucapan'];
$body= "
Nama : $nama <br/>
Email : $email <br/>
Ucapan: $ucapan <br/>
Kehadiran : $kehadiran <br/>
";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';

 

$usermail= $_POST['usermail'];
$mail = new PHPMailer();
$mail->IsMail(true); // SMTP
$mail->SMTPAuth = true; // SMTP authentication
$mail->Host= "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->SetFrom("email@gmail.com","email sender");
$mail->Username = "patriciaplebs@gmail.com"; // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "guagatau,"; // Password email
$mail->SetFrom($usermail, 'user');
$mail->AddReplyTo($usermail,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($usermail);
if(!$mail->Send())
return false;
else
return true;

}

$to = "arivelina191122@gmail.com"; //email tujuan
$subject = "New email"; // subject email
echo"<br/><br/><center><h3>email telah terkirim</h3></center>";
Send_Mail($to,$subject,$body);
?>
