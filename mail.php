<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if (isset($_POST['submit'])) {

        $email = $_POST['email']; //Mendapatkan inputan email dari form
        $nama = $_POST['nama']; //Mendapatkan inputan nama dari form
        $ucapan = $_POST['ucapan'];
        $kehadiran = $_POST['kehadiran'];
        
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'patriciaplebs@gmail.com';
            $mail->Password   = 'cjnlipjershvmxkw';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('patriciaplebs@gmail.com', 'Pesan dari Form');
            $mail->addAddress("$email");
            $mail->addReplyTo('no-reply@gmail.com', 'NO Reply');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Input dari Form';
            $mail->Body    = "<h1>Kamu telah mengisi formulir</h1> Nama kamu adalah $nama ,Ucapan = $ucapan , Kehadiran = $kehadiran";
                <";
            $mail->AltBody = 'Data formulir';

            $mail->send();
            echo "Data dari Formulir HTML";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    else {
        echo "Silakan submit terlebih dahulu";
    }
?>