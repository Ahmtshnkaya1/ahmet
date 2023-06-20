<?php
include "baglan.php";
session_start();
$hatamesaj = '';
if (isset($_POST['kullanıcıadı'])){

    $kullanici =  giris($_POST['kullanıcıadı']);
}


$kullaniciAdi = $_POST['kullanıcıadı'];
$sifre        =$_POST['sifree'];
if ($kullanici){
    if ($sifre === $kullanici['sifre']){
        $_SESSION['id'] = $kullanici['id'];
        $_SESSION['kullaniciad'] = $kullanici['kullaniciad'];
        $_SESSION['ad'] = $kullanici['ad'];
        $_SESSION['soyad'] = $kullanici['soyad'];
        $_SESSION['email'] = $kullanici['email'];


    }else{
        $hatamesaj = "Şifre hatalı";
    }
}else{
    $hatamesaj = "Böyle bir kullanıcı yok";
}
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<div class="container">
<div class="row">
    <div class="col">

        <div class="btn-group">
            <a href="index.php" class="btn btn-outline-primary">Tüm Üyeler</a>
            <a href="ekle.php" class="btn btn-outline-primary">Üye Ekle</a>
            <a href="giriş.php" class="btn btn-outline-primary">Giriş yap</a>
            <a href="kayıtol.php" class="btn btn-outline-primary">Kayıt Ol</a>
        </div>
    </div><center>
        <h1 class="h1 mb-2 fw-normal">Kullanıcı girişi</h1>
    </center>
</div>


<form class="form-signin" action="" method="post">



    <div class="inputad">
        <label for="inputad">Kullanıcı adınız</label>
        <input type="text" name="kullanıcıadı" class="form-control">

    </div>
    <div class="inputPassword">
        <label for="inputsifre">Password</label>
        <input type="text" name="sifree" class="form-control">

    </div>

    <div class="checkbox mb-3">
        <label>
            <a href="sifreunuttum.php">Şifremi unuttun</a>

        </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name = "kaydet" type="submit">Giriş yap</button>

    <?php if ($hatamesaj){
        echo "<p style='color: red'>$hatamesaj </p>";
    } ?><p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
</form>
</div>
