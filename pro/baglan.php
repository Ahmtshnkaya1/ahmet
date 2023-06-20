<?php
session_start();



function baglanti(){
    $dsn = 'mysql:dbname=telefon;host=127.0.0.1';
    $user = 'Ahmet';
    $password = 'Ahmetsahin43.';
    $baglanti =  new PDO($dsn,$user,$password);
    return $baglanti;
}
function calistir($sorgu) {
    $baglanti = baglanti();
    $sorgu = $baglanti->prepare($sorgu);
    $sorgu->execute();
}
function getir(){
    $baglan=baglanti();
    $sql ="SELECT * FROM telefon";
    $sorgu = $baglan->query($sql);
    $satir = $sorgu->fetchAll();

    return $satir;

}

function ekle(){
    $baglan=baglanti();
    $sql = $baglan->prepare("INSERT INTO `telefon` (`id`,`uye_id`, `adsoyad`, `telefon`, `email`, `birthday`, `reg_date`) VALUES (NULL,?, ?, ?, NULL, NULL, NULL)");
    $dizi =[
        $_SESSION['id'],
        $_POST["adsoyad"],
        $_POST["telefon"]
    ];

    $sonucgoster = $sql->execute($dizi);
}


function sil($id){
    $baglanti=baglanti();
    $sqlsil="DELETE FROM telefon WHERE `telefon`.`id` = ?";
    $sorgusil=$baglanti->prepare($sqlsil);
    $sorgusil->execute([
        $id
    ]);
}

function guncelle($id,$adsoyad,$telefon)
{
    $sql = "UPDATE `telefon` 
    SET `adsoyad` = ?,  
    `telefon` = ?, 
    `reg_date` = NULL WHERE `telefon`.`id` = ?";
    $dizi=[
        $id['adsoyad'],
        $adsoyad['telefon'],
        $telefon['id'],
    ];
    $baglan=baglanti();
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);


}
function ara($arama)
{
    $baglan=baglanti();
    $sorguara = $baglan->prepare("SELECT * FROM telefon WHERE adsoyad LIKE :arama OR telefon  LIKE :arama ");
    $sorguara->execute(array(':arama' => '%'.$arama.'%'));
    $sonuc = $sorguara->fetchAll();

    return $sonuc;

}
function detay($id)
{
    $baglan = baglanti();
    $sql = $baglan->prepare("select * from telefon where id = ?");
    $sql->execute([$id]);
    $sonuc = $sql->fetch();


   return $sonuc;
}
function kayit($ad,$soyad,$kullaniciad,$email,$password){
$baglan = baglanti();
$sorgu = $baglan->prepare("INSERT INTO `kullanici` ( id,ad,soyad,kullaniciad,email,sifre,kod) VALUES (NULL,:ad,:soyad,:kullaniciad,:email,:sifre,NULL)");


   $sorgu ->execute([

       ':ad' => $ad,
       ':soyad' =>$soyad,
       ':kullaniciad'=>$kullaniciad,
       ':email' => $email,
       ':sifre' =>sha1($password)
  ]);

}
function giris($kullaniciadi){
    $baglan = baglanti();
    $sql = $baglan->prepare("SELECT * FROM kullanici WHERE kullaniciad = :kullaniciadi ");
    $sql->execute([':kullaniciadi' => $kullaniciadi]);
    $kullanici = $sql->fetch(PDO::FETCH_ASSOC);


    return $kullanici;

}
function email($eposta){
    $baglan = baglanti();
    $varmi = $baglan->prepare("SELECT email FROM kullanici WHERE $eposta=:e");
    $varmi->execute([':e' => $eposta]);

}
function kullanicisorgu($kullanicisorgu){
    $baglan = baglanti();
    $sql= $baglan->prepare(" SELECT kullaniciad FROM kullanici where kullaniciad =:e");
    $sql->execute([':e' =>$kullanicisorgu]);

    return  $sql;
}
function kisisorgu($b){
    $baglan  = baglanti();
    $sql = $baglan->prepare("SELECT * FROM `telefon` WHERE uye_id = :e");
    $sql->execute([':e' =>$b ]);
     $sonuc =$sql->fetchAll();

    return $sonuc;
}
function unuttumsifir($kod){
    $baglan = baglanti();
    $sql = $baglan->prepare("SELECT * FROM kullanici where kod = :e " );
    $sql->execute ([':e' => $kod,]);
    $sonuc = $sql->fetch();
    var_dump($sonuc);

    return $sonuc;
}
function sifresifirla($sifre,$sifresifirlaid){
    $baglan = baglanti();
    $sql = $baglan->prepare("UPDATE kullanici SET sifre=:s,kod= :k WHERE id=:i");
    $sql->execute([':i' =>$sifresifirlaid,':s'=> $sifre,':k'=>'']);
}


?>
