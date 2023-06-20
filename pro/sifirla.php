<?php
include "baglan.php";
$baglan = baglanti();

$kod = ($_POST['kod']);
$email = ($_POST['email']);
$sifre = ($_POST['sifre']);

$sonuc = unuttumsifir($kod);
$sifirlaid = $sonuc['id'];
    if (($sonuc)) {
        $sonuc = unuttumsifir($kod);
        if ($email === $sonuc['email']){
            if ($sifre) {
                $sifresifirla = sifresifirla($sifre, $sifirlaid);
                echo '<script type="text/javascript">window.location = "giriş.php."</script>';
            }else{
                echo "hata oluştu";
            }
        }else{
            echo "Girdiğiniz email doğru değil ";
        }
    }else{
        echo "Girdiğiniz kod yanlış";
    }





?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">kod</label>
        <input type="text" name="kod" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kod">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">email</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">sifre</label>
        <input type="text" name="sifre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="şifre">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name = "kaydet" type="submit">Giriş yap</button>
</form>
</body>

</html>

