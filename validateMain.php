<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);
header("Content-Type: text/html; charset=UTF-8");
session_start();
require ("points.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if(isset($_POST['submitExc']) || isset($_POST['SubmitOrder'])){
      ?>
      <script type="text/javascript">
        location.replace("validateMain.php");
      </script>
      <noscript>
      <meta http-equiv="refresh" content="0; url=validateMain.php">
      </noscript>
    <?php
    }
    
    ?>
    <script type="text/javascript"> let coordsPHP = JSON.parse('<?php echo $json; ?>'); 
      let excursMass = JSON.parse('<?php echo $array ?>');
    </script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=9a3a56a6-f665-417b-87b2-b0df644b6e8c&lang=ru_RU&mode=debug" type="text/javascript">
    </script>
    <script type="text/javascript"> let coordsPHP = JSON.parse('<?php echo $json; ?>'); </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/media.css">
    <title>Клиент-зашёл</title>
</head>
<body>
    <div class="mainSide">
        <nav>
            <div class="head">
                <div class="nav_buttons invisible">
                    <div class="log_in">
                        <!-- <div class="border"></div> -->
                        <button  class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#log_inModal">Вход</button>
                        
                        <div class="modal fade" id="log_inModal" tabindex="-1" aria-labelledby="log_inModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header ">
                                  <h5 class="modal-title" id="titleModalLabel">Вход</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email</label>
                                      </div>
                                      <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Пароль</label>
                                      </div>
                                </div>
                                <div class="modal-footer" id="buttonIn">
                                    <form action="" target="">
                                        <button type="button" class="btn btn-primary butIn">Войти</button> 
                                    </form>                      
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="reg">
                      <a  class="btn btn-light btn-lg" href="#" role="button">Регистрация</a>
                    </div>         
                </div>
                <button type="button" class="btn btn-link" id="notificate" data-bs-toggle="modal" data-bs-target="#notificateModal"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>
                </button>
                <div class="account_side">
                  <div>
                    <button class="btn btn-light accountButton" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_accountSide" aria-expanded="false" aria-controls="collapse_accountSide">
                          <div class="d-flex justify-content-between">
                          <p class="me-3"></p>
                          <p class="m-0"><?php 
                          $name = $_SESSION['FirstName']." ".$_SESSION['Surname'];
                          echo $name ?></p>
                            <div class="arrow-8"></div>
                          </div>
                        </button>
                      </div>
                      <div class="collapse" id="collapse_accountSide">
                        <div class="card card-body mt-3" >
                            <div class="btn-group-vertical" id="buttonGroup" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#data_accModal">Редактировать данные</button>
                                <button type="button" class="btn btn-outline-dark mb-5" data-bs-toggle="modal" data-bs-target="#excursionModal">История покупок</button>
                                <a role="button" class="btn btn-outline-dark" href="close.php" name="exit">Выйти</a>
                              </div>
                        </div>
                      </div>
                </div>
                <div  class="excursion_text"><p class="heading">Экскурсии по крышам Санкт-Петербурга</p></div>
              </div>           
            <!-- Modal -->
            <div class="modal fade" id="notificateModal" tabindex="-1" aria-labelledby="notificateModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="notificateModalLabel">Уведомления</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                        <div class="col-10">
                          <p>Текст уведомления</p> 
                        </div>
                        <div class="col">
                          <p>Дата</p>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="row">
                        <div class="col-10">
                          <p>Текст уведомления</p> 
                        </div>
                        <div class="col">
                          <p>Дата</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </nav>
        <div class="modal fade" id="excursionModal" tabindex="-1" aria-labelledby="excursionModalLabel" aria-hidden="true">
            <div class="modal-dialog .modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="excursionModalLabel">История покупок</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Кол-во билетов</th>
                            <th scope="col">Цена (рублей)</th>
                            <th scope="col">Экскурсовод</th>
                            <th scope="col">Номер экскурсовода</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Статус</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Живописная</td>
                            <td>Бухаресткая 25</td>
                            <td>1</td>
                            <td>150</td>
                            <td>Михайлов</td>
                            <td>89523461702</td>
                            <td>22.10.2021</td>
                            <td>Бронирование</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Живописная</td>
                            <td>Бухаресткая 25</td>
                            <td>2</td>
                            <td>300</td>
                            <td>Михайлов</td>
                            <td>89523461702</td>
                            <td>22.10.2021</td>
                            <td>Онлайн</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
          </div>
          <div class="data_account">
            <div class="modal fade" id="data_accModal" tabindex="-1" aria-labelledby="data_accModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form action="edit.php" method="POST">
                    <div class="modal-header ">
                      <h5 class="modal-title" id="data_accModalLabel">Редактировать</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иван" value="<?php echo $_SESSION['FirstName'] ?>" name="NameEd">
                            <label for="floatingInput">Имя</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иванович" value="<?php echo $_SESSION['Surname'] ?>" name="SurnameEd">
                            <label for="floatingInput">Фамилия</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $_SESSION['login'] ?>" name="loginEd">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" value="<?php echo $_SESSION['password'] ?>" name="passEd">
                            <label for="floatingPassword">Пароль</label>
                        </div>
                    </div>
                    <div class="modal-footer" id="buttonReg">            
                      <button type="submit" class="btn btn-primary btn-block butReg" data-bs-dismiss="modal" aria-label="Close" name="SubmitEd">Сохранить</button>                                           
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
          <div class="map">
            <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                  <form action="validateMain.php" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="orderModalLabel">Заказ</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                          <input type="text" style="display:none;" id="idGeotag" name="idGeotag"/>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иван" name="NameOrder" />
                            <label for="floatingInput">Имя</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иванович" name="SurNameOrder" />
                            <label for="floatingInput">Фамилия</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иванович" name="TwoNameOrder" />
                            <label for="floatingInput">Отчество</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput"  name="CountOrder" placeholder="Количество" />
                            <label for="floatingInput">Количество</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput"  name="PhoneOrder" placeholder="Номер" />
                            <label for="floatingInput">Номер телефона</label>
                          </div>
                          <select class="form-select" aria-label="Default select example">
                            <option selected>Даты</option>
                            <option value="1">Дата 1</option>
                            <option value="2">Дата 2</option>
                            <option value="3">Дата 3</option>
                          </select>
                          <div class="mt-5 d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="flexRadioCashlessOrder" id="flexRadioCahsOrder1" checked  disabled >
                              <label class="form-check-label" for="flexRadioCahsOrder1">
                                Наличные
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="flexRadioCashlessOrder" id="flexRadioCashOrder2"  disabled >
                              <label class="form-check-label" for="flexRadioCashOrder2">
                                Безналичные
                              </label>
                            </div>
                          </div>
                         
                        </div>
                      </div>
                    <div class="modal-footer"  id="buttonOrder">
                      <button type="submit" class="btn btn-primary" name="SubmitOrder">Заказать</button>
                    </div>
                  </form>
                  </div>
                </div>
            </div>
            <div class="map_api" id="mapApi1" width="1384" height="836" alt="Map"></div>
          </div>
        <?php require('sidePanel.php')?>
        <div class="why_we">
            <div class="line"></div>
            <div class="container button_forOrder">
              
              <button class="btn btn-primary" style="display: none;" id="offcanvasSidep_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidepanel" aria-controls="offcanvasSidepanel">
              </button>
            </div>
        </div>
       
        <footer>
            <div class="footer">
                <div class="data_footer">
                    <div class="item"></div>
                    <div class="name_author item"><p>@Ахиян Д.Г.</p></div>
                    <div class="email item"><p>roofSPB@mail.ru</p></div>
                </div>
            </div>
        </footer>
      <script src="../index.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
  </body>
</html>

<?php 
  if(isset($_POST['SubmitOrder'])){
    if(isset($_POST['NameOrder'])){
      $NameOrder = $_POST['NameOrder'];
        
    }else{
      echo "Имя пусто";
    };
    if(isset($_POST['SurNameOrder'])){
      $SurNameOrder = $_POST['SurNameOrder'];
    }else{
      echo "SurNameOrder пусто";
    };
    
    if(isset($_POST['TwoNameOrder'])){
      $TwoNameOrder = $_POST['TwoNameOrder'];
    }else{
      echo "2NameOrder пусто";
    };
    
    if(isset($_POST['CountOrder'])){
      $CountOrder = $_POST['CountOrder'];
    }else{
      echo "CountOrder пусто";
    };
    
    if(isset($_POST['PhoneOrder'])){
      $PhoneOrder = $_POST['PhoneOrder'];
    }else{
      echo "PhoneOrder пусто";
    };
    
    if(isset($_POST['date'])){
      $date = $_POST['date'];
    }else{
      echo "date пусто";
    };
    if(isset($_POST['idGeotag'])){
      $idGeotag = $_POST['idGeotag'];
    }else{
      echo "idGeotag пусто";
    };

    
    $NameOrder = stripslashes($NameOrder);
    $NameOrder = htmlspecialchars($NameOrder);

    $SurNameOrder = stripslashes($SurNameOrder);
    $SurNameOrder =htmlspecialchars($SurNameOrder);

    $TwoNameOrder = stripslashes($TwoNameOrder);
    $TwoNameOrder = htmlspecialchars($TwoNameOrder);

    $CountOrder = stripslashes($CountOrder);
    $CountOrder = htmlspecialchars($CountOrder);

    $PhoneOrder = stripslashes($PhoneOrder);
    $PhoneOrder = htmlspecialchars($PhoneOrder);
    $status = 0;
    $dateOrder = date("Y-m-d H:i:s"); 

    require('connect.php');

    if ($conn === false) {
      $_SESSION['result_order'] = "<p>Ошибка: </p>" . mysqli_connect_error();
      die();
      }else{ 
      /* echo "<p>Подключение успешно установлено</p>"; */
    };
    $id_cl = $_SESSION['id'];
    
    
    $sqlOrder = "INSERT INTO History_buy (accountID, ExcursionID, count, status, phone, date) VALUES ('$id_cl','$idGeotag','$CountOrder','$status','$PhoneOrder','$dateOrder')";
    

    if(mysqli_query($conn, $sqlOrder)){
      $idORDER = "SELECT id FROM History_buy ORDER BY id DESC LIMIT 1";
      $id_newOrder = mysqli_query($conn, $idORDER);
      $id_newOrder = mysqli_fetch_all($id_newOrder);
      $id_newOrder = $id_newOrder[0][0];
      $NameExc = "SELECT Name FROM Excursion WHERE id='$idGeotag'";
      $Discription = mysqli_query($conn, $NameExc);
      $Discription = mysqli_fetch_all($Discription);
      $Discription = $Discription[0][0];
  
      $sqlNotificate = "INSERT INTO notifications (id, Discription, Time) VALUES ('$id_newOrder','$Discription','$dateOrder')";
      if(mysqli_query($conn, $sqlNotificate)){
        mysqli_close($conn);
        exit;
      }else{
        echo mysqli_error($conn);
        mysqli_close($conn);
        exit;
      }
    }else{
      echo mysqli_error($conn);
      mysqli_close($conn);
      exit;
    }
  }
?>