
<pre>
    <?php
    print_r($_FILES['avatar']['name']);
    ?>
</pre>

<?php
session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if($password == $password_confirm){
//    $password = md5($password);
//    echo $password;
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (move_uploaded_file($_FILES['avatar']['tmp_name'] , '../' . $path)){
        $_SESSION['message']= 'ошибка при загрузке изображения';
        header('Location: ../register.php');
    }
    $password = md5($password);
    $sql = "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL,'$full_name', '$login', '$email', '$password', '$path')";
    mysqli_query($connect, $sql);
    $_SESSION['message']= 'Регистрация выполнина ';
    header('Location: ../index.php');
}else{
    $_SESSION['message'] = 'Пароли не совпадают ';
    header('Location: ../register.php');
}
