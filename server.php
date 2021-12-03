<?php
    if (isset($_POST['login'])) 
    { $login = $_POST['login']; 
        if ($login == '') { unset($login);
        } 
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем 
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
        if ($password =='') { 
            unset($password);
        } 
    }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем 
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем
    {
        ob_start();
        $new_url = 'http://akhiyan.ml.ml/index.html';
        header('Location: '.$new_url);
        ob_end_flush();
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    //подключение бд
    require("connect.php");
    //проверим нет ли такого же пользователя
    $test_data = mysqli_query($conn, "SELECT id FROM log_Account WHERE login='$login'");
    $result = mysqli_fetch_array($test_data);
    if(!empty($result['id'])){
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    };
    //сохраняем новые данные
    $resultOk = mysqli_query($conn, "INSERT INTO log_Account (login,password) VALUES('$login','$password')");

    //проверим на ошибки
    if($resultOK == 'TRUE'){
        ob_start();
        $new_url = 'https://i.ytimg.com/vi/fGem9bbVFAM/maxresdefault.jpg';
        header('Location: '.$new_url);
        ob_end_flush();
    }else{
        echo "Бляяяяяяяяяяяяяяяяяяяяяяяя!!!";
    }

?>