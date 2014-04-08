<?php
session_start();
include_once './Login.php';
$Login = new Login;


if(isset($_POST['btnGonder'])){

    if(!empty($_POST['firstname']) && ($_POST['lastname']) && ($_POST['email']) && ($_POST['password']) ){
        echo 'ok';
        $result = $Login->insert( $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
        //eğer kayıt edilmişse gerçekleşmemiş işe,
        if ($result == true){
            header("Location: index.php");
            exit;
        }
    }else{
        echo 'bütün alanların doldurulması zorunludur.';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form name="frmSign" method="POST">
    Firstname
    <br>
    <input type="text" name="firstname" value="" />
    <br>
    Lastname
    <br>
    <input type="text" name="lastname" value="" />
    <br>
    Email
    <br>
    <input type="text" name="email" value="" />
    <br>
    Password
    <br>
    <input type="password" name="password" value="" />
    <br>
    <input type="submit" value="Gönder" name="btnGonder" />

</form>
</body>
</html>