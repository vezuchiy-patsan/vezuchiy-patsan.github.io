<?php
/* require ('server.php'); */
header("Content-Type: text/html; charset=UTF-8");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://api-maps.yandex.ru/2.1/?apikey=9a3a56a6-f665-417b-87b2-b0df644b6e8c&lang=ru_RU&mode=debug" type="text/javascript">
    </script>
    <link rel="icon" href="svg\a.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css/media.css">
    <title>Это дефф!!!</title>
</head>
<body>
    <div class="mainSide">
        <nav>
            <div class="head">
                <div class="log_in">
                    <button  class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#log_inModal">Вход</button>
                    
                    <div class="modal fade" id="log_inModal" tabindex="-1" aria-labelledby="log_inModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header ">
                              <h5 class="modal-title" id="titleModalLabel">Вход</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="auth.php" method="post">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='login'>
                                    <label for="floatingInput">Email</label>
                                  </div>
                                  <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='password'>
                                    <label for="floatingPassword">Пароль</label>
                                  </div>
                            </div>
                            <div class="modal-footer" id="buttonIn">            
                                <button type="submit"  class="btn btn-primary butIn" name="submit">Войти</button> 
                                <!-- <a  role="button" type="button" href="validateMain.html" class="btn btn-primary butIn">Войти</a>                                           
                                <a  role="button" type="button" href="validateExcursion.html" class="btn btn-primary butIn">Экскурсия</a>   -->                                         
                            </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="reg">
                        <button  class="btn btn-light btn-lg" role="button" data-bs-toggle="modal" data-bs-target="#regModal">Регистрация</и>
                </div>
                
                <div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header ">
                          <h5 class="modal-title" id="title_regModalLabel">Регистрация</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form id="reg_sub" method="post" action="" class="needs-validation form_reg" novalidate> 
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Иван" name="FirstName" required>
                                    <label for="floatingInput">Имя</label>
                                    <div class="invalid-feedback">Укажите имя</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Иванович" name="FirstName1" required>
                                    <label for="floatingInput">Фамилия</label>
                                    <div class="invalid-feedback">Укажите фамилию</div>
                                </div>
                                <div class="form-floating mb-3">
                                    
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="login" required>
                                    <label for="floatingInput">Email</label>
                                    <div class="invalid-feedback">Укажите email</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword password" placeholder="Password" name="password" required>
                                    <label for="floatingPassword">Пароль</label>
                                    <div class="invalid-feedback">Укажите пароль</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="name@example.com" id="r_password" required>
                                    <label for="floatingPassword">Повторите пароль</label>
                                    <div class="invalid-feedback">Повторите пароль</div>
                                </div>
                                <div class="mb-3 mt-3 d-flex justify-content-center">
                                    <div class="form-check form-check-inline radBut1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0" required>
                                        <label class="form-check-label" for="inlineRadio1">Покупатель</label>
                                    </div>
                                    <div class="form-check form-check-inline radBut2">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1" >
                                        <label class="form-check-label" for="inlineRadio2">Экскурсовод</label>
                                    </div>
                                    
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="politics" required>
                                    <label class="form-check-label" for="politics" >
                                    Нажимая кнопку "Регистрация", вы даёте <a href="/Privicy_policy.html">согласие на обработку персональных данных.</a>
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer" id="buttonReg"> 
                                    <button type="submit" class="btn btn-primary btn-block butReg liveToastBtn" name="submit" >Регистрация</button>   
                            </div>
                         </form> 
                      </div>
                    </div>
                </div>
           
                <div  class="excursion_text"><p class="heading">Экскурсии по крышам Санкт-Петербурга</p></div>
            </div>    
            
        </nav>
        <div class="map" >
            <div class="map_api" id="mapApi" width="1384" height="836" alt="Map">
            </div>
        </div>
        <div class="why_we">
            <div class="line"></div>
            
        </div>
        <footer>
            <div class="footer" >
                <div class="data_footer">
                    <div class="item"></div>
                    <div class="name_author item"><p>@Ахиян Д.Г.</p></div>
                    <div class="email item"><p>roofSPB@mail.ru</p></div>
                </div>
            </div>
        </footer>
      </div>
  
      <script src="../index.js"></script>
      <script src="../validate.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      
    </body>
</html>

<?php //заносим введенный пользователем имя в переменную $FirstName, если он пустой, то уничтожаем 
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
        echo "успешное подключение";
    }
    /* echo; */
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