<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

class Login {
public $con;

    public function __construct(){
        $this->con = mysqli_connect("localhost","root","","mikroblog");
    }

    public function insert($firstname, $lastname, $email, $password){


            mysqli_query($this->con, 'SET NAMES utf8');
            mysqli_query($this->con, 'SET CHARACTER SET utf8');
            mysqli_query($this->con, "SET COLLATION_CONNECTION = 'utf8_general_ci'");



        $sql = 'INSERT INTO user(firstname,lastname,email,password)'
            ."VALUES('$firstname', '$lastname', '$email', '$password')";



        //veritabanına kayıt ekle,
        return mysqli_query($this->con, $sql);
    }
    public function isLogined(){
        if ( isset($_SESSION['girisYap']) && $_SESSION['girisYap'] == 1 ){
            return true;
        }else{
            return false;
        }
    }

    public function girisYap($email,$password) {

        $sql = 'SELECT * '
            . "FROM user "
            . "WHERE email='$email'";

        //veritabanında $sql değişkeni içindeki sorgu çalıştırıldı
        $queryResult = mysqli_query($this->con, $sql);
        if ( is_null($queryResult) ){
            return array(false, 'Email is wrong!');
        }

        $sql = ' SELECT * FROM user'
            . " WHERE email='$email' AND password='$password'";
        $queryResult = mysqli_query($this->con, $sql);
        if ( is_null($queryResult) ){
            return array(false, 'Password is wrong!');
        }

        $loginResult = true;
        $_SESSION['girisYap'] = 1;
        return array(true);
    }
    public function logout() {
        unset($_SESSION['girisYap']);
        return true;
    }

    public function getUye($number=NULL) {

        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";

        $sql = 'SELECT * FROM user';
        $sql .= ' ORDER BY id DESC';
        $sql .= is_null($limit) ? '' : $limit;

        $result = mysqli_query($this->con, $sql);
        return $result;
    }

}
