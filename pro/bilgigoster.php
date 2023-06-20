<?php
include "baglan.php";
session_start();
$b = $_SESSION['id'];
$c = kisisorgu($b);
if(empty(!$_SESSION['kullaniciad'])){
}else{
    header('location:index.php');
}
?>
<head>

        <style>
        body{background-color:#333;padding:80px;color:#fff}
        .kapsul{margin-left:150px;margin-right:150px}
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<header>
    <div class="row">
    <div class="col">
        <h1 class="display-1 text-center">AŞK</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="btn-group">
            <a href="index.php" class="btn btn-outline-primary">Tüm Üyeler</a>
            <a href="ekle.php" class="btn btn-outline-primary">Üye Ekle</a>
            <a href="giriş.php" class="btn btn-outline-primary">Giriş yap</a>
            <a href="kayıtol.php" class="btn btn-outline-primary">Kayıt Ol</a>
        </div>
    </div>
</div>
</div>
</header>
<body>
<p class="kapsul">
<ol class="list-group list-group-numbered">
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Adınız</div>
           <?php echo $_SESSION['ad']; ?>
        </div>

    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Soyadınız</div>
            <?php echo $_SESSION['soyad']; ?>
        </div>

    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Kullanıcı adı</div>
            <?php echo $_SESSION['kullaciciad']; ?>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Email</div>
            <?php echo $_SESSION['email']; ?>
        </div>
</ol>
</p>
<main>
    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <table class="table table-hover table-dark table-striped">

<thead>
<tr>
    <th>id</th>
    <th>adsoyad</th>
    <th>telefon</th>
    <th></th>
</tr>
</thead>
</body>
<tbody>
<?php foreach ($c as $sonuc)   {?>
<tr>
    <td><?=$sonuc['id']?></td>
    <td><?=$sonuc['adsoyad']?></td>
    <td><?=$sonuc['telefon']?></td>

    <td>
        <div class="btn-group">
            <a href="detay.php?id=<?=$sonuc['id']?>" class="btn btn-success">Detay</a>
            <a href="guncelle.php?id=<?=$sonuc['id']?>"  class="btn btn-secondary">Güncelle</a>
            <a href="?sil=<?=$sonuc['id']?>" onclick="return confirm('Emin misiniz?')" class="btn btn-danger">Kaldır</a>

        </div>
    </td>
    <?php } ?>

</tbody>
</table>
</div>
</div>
</div>

</main>
<footer></footer>
</body>
</html>
