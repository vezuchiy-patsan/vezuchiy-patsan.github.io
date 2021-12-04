<?php
header("Content-Type: text/html; charset=UTF-8");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);

//заносим введенный пользователем имя в переменную $FirstName, если он пустой, то уничтожаем 
if (isset($_POST['FirstName'])) 
{ $FirstName = $_POST['FirstName']; 
    
    if ($FirstName == '') { 
        
        unset($FirstName);
    } else{
        
    }
} 

//заносим введенный пользователем фамилию в переменную $SurName, если он пустой, то уничтожаем 
if (isset($_POST['FirstName1'])) 
{ 
    $Surname = $_POST['FirstName1']; 
    
    if ($Surname == '') { 
        
        unset($Surname);
    } else{
        
    }
} else{echo "пусто";};

//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем 
if (isset($_POST['login'])) 
{ $login = $_POST['login']; 
    
    if ($login == '') { 
        
        unset($login);
    } else{
        
    }
} 

//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем 
if (isset($_POST['password'])) { 
    $password=$_POST['password'];
    if ($password =='') { 
    
        unset($password);
    } 
}
if (isset($_POST['inlineRadioOptions'])) {
    $Radio = $_POST['inlineRadioOptions'];
}

echo "<h2>$Radio</h2>";



if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем
{
    /* ob_start();
    $new_url = 'http://akhiyan.ml.ml/index.html';
    header('Location: '.$new_url);
    ob_end_flush(); */
    exit ('не ввел логин или пароль');
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$FirstName = stripslashes($FirstName);
$FirstName =htmlspecialchars($FirstName);

$SurName = stripslashes($Surname);
$SurName = htmlspecialchars($Surname);

$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы

$login = trim($login);
$password = trim($password);


//подключение бд
require("connect.php");
require("idFunction.php");
if ($conn === false) {
    die("Ошибка: " . mysqli_connect_error());
    }else{ 
    echo "Подключение успешно установлено";};
//проверим нет ли такого же пользователя

$test_data = mysqli_query($conn, "SELECT id FROM log_Account WHERE login='$login'");

$result = mysqli_fetch_array($test_data);
if(!empty($result['id'])){
    exit("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
};

//сохраняем новые данные
$sql = "INSERT INTO log_Account (login, pass) VALUES ('$login','$password')";
$sql1 = "INSERT INTO account (FirstName, SurName, type) VALUES ('$FirstName','$Surname', '$Radio')";

if((mysqli_query($conn, $sql1)) and (mysqli_query($conn, $sql))){
    echo "Данные успешно добавлены";
    mysqli_close($conn);
} else{
    echo "Ошибка: " . mysqli_error($conn);
    mysqli_close($conn);
}

?>