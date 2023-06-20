<?php
include "baglan.php";
$baglan = baglanti();
session_start();
$a= $_SESSION['id'];

if(isset($_POST["kaydet"]))
{

ekle($_POST["adsoyad"],["telefon"]);


header("Location:index.php");
}

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
        <div class="col-6">
            <label for="adsoyad" class="form-label">Ad-Soyad</label>
            <input type="text" class="form-control" name="adsoyad">
        </div>

        <div class="col-6">
            <label for="telefon" class="form-label">Telefon Numaranız</label>
            <input type="text" class="form-control" name="telefon">

        </div>
        <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>