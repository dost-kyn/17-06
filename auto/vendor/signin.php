<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if(mysqli_num_rows($check_user)>0){
    $user = mysqli_fetch_assoc($check_user); //создаем перем. в которую заносим данные пользователя
    $_SESSION['user'] = [
        "id" => $user['id'],
        "full_name" => $user['full_name'],
        "avatar" => $user['avatar'],
        "email" => $user['email'],
    ];
   // header('Location: /auto/profile.php');
    header('Location: /index.php');


}else{
    $_SESSION['message']= ' Неверный логин или пароль ';
    header('Location: auto/index.php');// переадрессация на страницу ...
}


