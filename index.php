<?php
session_start();
include_once './Login.php';
$Login = new Login();
echo 'MikroBlog sayfasina hosgeldiniz';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mikroblog Anasayfa</title>
</head>
<body>


<?php
if ( $Login->isLogined() == false ){
?>
    <div id="giris_yap">

        <h2>Üye Girişi</h2>
        <div>
            <a href="giris_yap.php">Üye girişi yapmak için tıklayınız</a>
        </div>
    </div>
    <div id="uye_ol">
        <h2>Uye Ol</h2>
        <div>
            <a href="uyeOl.php">Üye olmak için tıklayınız.</a>
        </div>
    </div>

<?php
}else{
?>
<div id="uyeler">
    <h2>Üye Listesi</h2>
    <div>
        <a href="uyeler.php">Üye listesini görmek için tıklayınız.</a>
    </div>
</div>
<div id="logout">
    <h2>Çıkış yap</h2>
    <div>
        <a href="logout.php">Çıkış yapmak için tıklayınız.</a>
    </div>
</div>
<?php
}
?>



</body>
</html>