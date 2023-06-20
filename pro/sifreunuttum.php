
<?php

use PHPMailer\PHPMailer;
use PHPMailer\Exception;

include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/SMTP.php";

include "baglan.php";
$email = trim($_POST['email']);
if(!$email) {
    echo "Boş Alana Bırakmayınız";
}else{

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Mail Formatı Yanlış Girildi";
}else{

$baglan = baglanti();
$varmi = $baglan->prepare("SELECT email FROM kullanici WHERE email=:mail");
$varmi->execute ([':mail' => $email]);
if($varmi->rowCount()) {

$row = $varmi->fetch(PDO::FETCH_ASSOC);

$sifirlamakodu = rand(10000,200000);


$sifirlamakodunuekle = $baglan->prepare("UPDATE kullanici SET kod=:k WHERE email=:m");
$sifirlamakodunuekle->execute([':k'=>$sifirlamakodu, ':m' => $email]);

$mail = new PHPMailer\PHPMailer();

    $mail->SMTPDebug= 1;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'alikemal4420@gmail.com';                // SMTP sunucuda tanimli email adresi
    $mail->Password = 'skqmzibxruloxckg';
    $mail->SMTPSecure ='tls';
    $mail->Port=587;

     $mail->SMTPOptions = array(
            'ssl' => array(
                     'verify_peer' => false,
                 'verify_peer_name' => false,
                 'allow_self_signed' => true
             )
     );


    //$mail->SMTPKeepAlive = true;

    // SMTP kullanici dogrulama kullan
                              // SMTP email sifresi
    // SSL icin `PHPMailer::ENCRYPTION_SMTPS` kullanin. SSL olmadan 587 portundan gönderim icin `PHPMailer::ENCRYPTION_STARTTLS` kullanin
    //$mail->Port = 587;// Eger yukaridaki deger `PHPMailer::ENCRYPTION_SMTPS` ise portu 465 olarak guncelleyin. Yoksa 587 olarak birakin

    $mail->setFrom("alikemal4420@gmail.com", "ahmet Sahinkaya");
    $mail->addAddress("$email");
    $mail->FromName = "Şifremi unuttum";

    $mail->CharSet = 'utf-8';
    $mail->Subject = 'Şifremi sıfırla';
    $mail->Body    ='sifre sıfırla';
    $mail->MsgHTML('true  ');
    $mail->send();

$mailicerik ="<div style='font-size:20px'>Sayın :  Sıfırlama Linkiniz : $sifirlamakodu";

                $mail->MsgHTML($mailicerik);
                if($mail->Send()) {

                    echo "Sıfırlama Kodunuz  mail adresinize gönderilmiştir.";
                    echo '<script type="text/javascript">window.location = "sifirla.php"</script>';

                }else{
                    echo "Hata oluştu!";
                }



            }else{
                echo "Girilen Mail Adresi Sistemde Mevcut Değil";
            }
        }

}


?>

<html>
<body>
<head>
    <style>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
</div><center>
    <h1 class="h1 mb-2 fw-normal">Kullanıcı girişi</h1>
</center>
<form action="" method="post">
    <div>
        <div class="inputad">
            <label for="inputad">Email giriniz</label>
            <input type="text" name="email" class="form-control" placeholder="Email Giriniz">
    </div>
        <button type="submit" name="Gönder" class="btn btn-primary">Gönder </button>
</form>
</body>
</html>
