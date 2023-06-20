<?php

include "baglan.php";
if(isset($_POST['guncelle'])) {
    guncelle($_POST['id'], ['adsoyad'], ['telefon']);
    header("Location:index.php");

}
$baglan=baglanti();
$sql ="SELECT * FROM telefon WHERE id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET['id']
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA Compatible" concent="IE=edge">
    <meta name="viweport" content="width=device-width,initial-sacle=1.0">
    <title>AŞK</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

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
<main>
    <div class="container">
        <form action="" method="post" class="row" mt-4 g-3">
        <input type="hidden" name="id" value="<?=$satir['id']?>">
        <div class="col-6">
            <label for="adsoyad" class="form-label">Adınız</label>
            <input type="text" class="form-control" name="adsoyad" value="<?=$satir['adsoyad']?>">
        </div>

        <div class="col-6">
            <label for="telefon" class="form-label">Telefon Numaranız</label>
            <input type="text" class="form-control" name="telefon" value="<?=$satir['telefon']?>">
        </div>
        <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
        </form>
    </div>

</main>
<footer></footer>
</body>
</html>
