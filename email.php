<?php
require_once("phpmailer/src/PHPMailer.php");
require_once("phpmailer/src/SMTP.php");

session_start();

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION["success"] = true;
  $_SESSION["nama"] = $_POST['nama'];

  if ( !isset($_POST['nama']) || !isset($_POST['kehadiran']) || !isset($_POST['email']) || !isset($_POST['pesan']) ) {
      $_SESSION["success"] = false;
      $_SESSION["message"] = 'nama, kehadiran, email, atau pesan wajib di isi';
  } else {
    $nama = $_POST['nama'];
    $kehadiran = $_POST['kehadiran'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    kirimEmail($nama, $kehadiran, $email, $pesan);
  }
}

function kirimEmail($nama, $kehadiran, $email, $pesan){

  $kirimPesan = "ada pesan dari: ".$nama;
  $kirimPesan .= " | kehadiran: ".$kehadiran;
  $kirimPesan .= " | email: ".$email;
  $kirimPesan .= " | pesan: ".$pesan;

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->SMTPDebug = 3;
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "arivelina191122@gmail.com";
  $mail->Password = "Arivelina191122,";
  $mail->SMTPSecure = "ssl";
  $mail->Port = 465;
  $mail->From = "arivelina191122@gmail.com";
  $mail->FromName = "Contact Form Undangan Pernikahan";

  $mail->addAddress("contact-form-arivelina191122@gmail.com", "Contact Form");
  $mail->isHTML(true);
  $mail->Subject = "PHP Mailer testing";
  $mail->Body = $kirimPesan;
  // $mail->AltBody = $kirimPesan;

  if(!$mail->send()) {
    $_SESSION["success"] = false;
    $_SESSION["message"] = 'ada masalah di server kami';
  } else {
    $_SESSION["success"] = true;
    $_SESSION["message"] = 'Berhasil menyambungkan ke Email';
  }

  return header('Location: '. $_SERVER['HTTP_REFERER']);
}