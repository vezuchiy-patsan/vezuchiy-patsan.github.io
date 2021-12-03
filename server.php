<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('error_reporting', E_ALL);

    if (isset($_POST['login'])) 
    { $login = $_POST['login']; 
     
        if ($login == '') { 
           
            unset($login);
        } else{
           
        }
    } 
    //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем 
    if (isset($_POST['password'])) { 
        $password=$_POST['password'];
        if ($password =='') { 
        
            unset($password);
        } 
    }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем 
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем
    {
        /* ob_start();
        $new_url = 'http://akhiyan.ml.ml/index.html';
        header('Location: '.$new_url);
        ob_end_flush(); */
        exit ('Лох');
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    print $login;
    print $password;
    //подключение бд
    
    require("connect.php");

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
    echo 'pidor';
    //сохраняем новые данные
    $sql = "INSERT INTO log_Account (id, login, pass, accountID) VALUES (1,'$login','$password', 1)";
    
    if(mysqli_query($conn, $sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }

?>