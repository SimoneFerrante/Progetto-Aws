<?php
require 'db_connection.php';

$nickname=$_POST['nickname'];
$password=$_POST['password'];

$sql="SELECT id, nickname FROM users WHERE nickname='$nickname'";
$result=$conn->query($sql);
if($result->num_rows==0){
    echo "Utente non presente";
}else{
    $sql="SELECT id, nickname FROM users WHERE nickname='$nickname' AND password = SHA2(CONCAT('$password', (SELECT salt FROM users WHERE nickname='$nickname')), 256);";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $_SESSION['id_user']=$result->fetch_assoc()['id'];
        header('location: home.php');
    }else{
        echo "Credenziali non corrette";
    }
}
$conn->close();
?>