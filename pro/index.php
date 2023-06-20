<?php
include "baglan.php";
session_start();
$b = $_SESSION['id'];
$c = kisisorgu($b);

if(isset($_GET['sil'])){

    sil($_GET['sil']);


 header('Location:index.php');
}
if(isset($_GET['ara'])){

   $veriler = ara($_GET['ara']);

}else {
    $veriler = getir();
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
     <p align="right">
     <a href="bilgigoster.php "  > <?php echo $_SESSION['kullaniciad']; ?> </a>
         <?php if ($_SESSION['kullaniciad']){
             {
                 echo "<a href='çikis.php'>Çıkış yap</a> ";
             }
         }?>
     </p>
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
        <a href="giriş.php" class="btn btn-outline-primary">Giriş yap</a>
        <a href="kayıtol.php" class="btn btn-outline-primary">Kayıt Ol</a>
    </div>
   </div>
  </div>
 </div>
</header>
<center>
    <form>
        <input type="search" value="<?php echo $_GET['ara'] ?> "name="ara">
        <input type="submit" value="Ara" >
    </form>
</center>
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
     <tbody>
       <?php foreach ($veriler as $sonuc)   {?>
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