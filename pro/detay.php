<?php
include "baglan.php";
if(isset($_GET['sil'])){

    sil($_GET['sil']);


    header('Location:index.php');
}
if(isset($_GET['id'])) {

   $detay = detay($_GET['id']);

}else{

}

?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<header>
    <div class="container">
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
                </div>
            </div>
        </div>
    </div>

</header>

<body>



    <div class="container">
        <div class="card">
            <div class="card-body">
                AdSoyad:<?=$detay['adsoyad']?><br>
                Telefon:<?=$detay['telefon']?>
                <a href="?sil=<?=$detay['id']?>" onclick="return confirm('Emin misiniz?')" class="btn btn-danger">Kaldır</a>
            </div>
        </div>




</body>
</html>