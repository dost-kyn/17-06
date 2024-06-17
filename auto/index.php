
<?php
session_start();
//if(isset($_SESSION['user'])){//если переменная юзер существует, нас перекинет на стр profile
//    header('Location: ../index.php');
//}
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form action="../auto/vendor/signin.php" method="post">
        <p>Тут будет форма авторизации:</p>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit" >Войти</button>
        <p>
            У вас нет аккаунта? - <a href="../auto/register.php">зарегистрируйтесь</a>
        </p>
        <?php
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
         }

        unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>


