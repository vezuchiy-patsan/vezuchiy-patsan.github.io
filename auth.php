<?php

header("Content-Type: text/html; charset=UTF-8");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);

session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) {
     $login = $_POST['login']; 
     if ($login == '') { 
        unset($login);
    } 
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
        if ($password =='') { 
            unset($password);
        }
    }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
// подключаемся к базе
require("connect.php");

$sqlLogin = "SELECT * FROM log_Account WHERE login='$login'";

$result = mysqli_query($conn, $sqlLogin); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);
if (empty($myrow['pass']))
{
    echo $myrow['pass'];
//если пользователя с введенным логином не существует
exit ("Извините, введённый вами login или пароль неверный.");
}
else {
$id = $myrow['id'];
$sqlID = "SELECT type FROM account WHERE login='$id'";
//если существует, то сверяем пароли
if ($myrow['pass']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    if ($sqlID != 1){
        echo "Вы успешно вошли на сайт! <a href='validateExcursion.html'>Главная страница</a>";
    }else{
        echo "Вы успешно вошли на сайт! <a href='validateMain.html'>Главная страница</a>";
    };
    

}
else {
//если пароли не сошлись

    exit ("Извините, введённый вами login или пароль неверный.");
    }
}
?>