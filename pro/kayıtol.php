<?php
include "baglan.php";
$kullanicisor =  kullanicisorgu($_POST['kullaniciad']);
if ($kullanicisor->rowCount() > 0){
    echo " Aynı kullanıcı adı daha önce kullanılmış";
}else {
    echo "Üyelik eklenecek";

    $hatamesaj = '';
    if (isset($_POST["kaydet"])) {
        $a = kayit($_POST['ad'], $_POST['soyad'], $_POST['kullaniciad'], $_POST['email'], $_POST['password']);


    }


    if ($_POST["password"]) {
        $password = $_POST["password"];
        $kontrol = "/\S*((?=\S{6,})(?=\S*[A-Z]))\S*/";
        if (preg_match($kontrol, $password)) {
            $hatamesaj = "Şifreniz uygun formatta.";
            exit();
        } else {
            $hatamesaj = "<b> Hata : </b>Şifreniz uygun formatta değil.";
        }


    }
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
            </div></div><center>
            <h1 class="h1 mb-2 fw-normal">Kullanıcı Kayıt Ol</h1>
        </center
    </div>
</div>
<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Ad</label>
        <input type="text" name="ad" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adınız">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Soyad</label>
        <input type="text" name="soyad" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Soyadınız">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="exampleInputkad1">Kullanıcı Ad</label>
        <input type="text" name="kullaniciad" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kullanıcı adınız">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Şifreniz">
    </div>
    <?php echo "$hatamesaj" ?>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="Kayıt ol">

    </div>
    <button type="submit" name="kaydet" class="btn btn-primary">kayıt Ol</button>
</form>


