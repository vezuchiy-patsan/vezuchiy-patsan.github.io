<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://api-maps.yandex.ru/2.1/?apikey=9a3a56a6-f665-417b-87b2-b0df644b6e8c&lang=ru_RU" type="text/javascript">
    </script>
    <link rel="stylesheet" href="daterangepicker/daterangepicker.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css/media.css">
    <title>Экскурсовод-зашёл</title>
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
                <div class="account_side">
                    <div>
                        <button class="btn btn-light accountButton " type="button" data-bs-toggle="collapse" data-bs-target="#collapse_accountSide" aria-expanded="false" aria-controls="collapse_accountSide">
                          <div class="d-flex">
                            <p class="">Фамилия Имя</p>
                            <div class="arrow-8"></div>
                          </div>
                        </button>
                        
                      </div>
                      <div class="collapse" id="collapse_accountSide">
                        <div class="card card-body mt-3" >
                            <div class="btn-group-vertical" id="buttonGroup" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#data_accModal">Редактировать данные</button>
                                <button type="button" class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#exc_newModal">Создать экскурсию</button>
                                <button type="button" class="btn btn-outline-dark mb-5" data-bs-toggle="modal" data-bs-target="#excursionModal">История заказов</button>
                                <a role="button" class="btn btn-outline-dark" href="./index.html">Выйти</a>
                              </div>
                        </div>
                      </div>
                </div>
                <div  class="excursion_text"><p class="heading">Экскурсии по крышам Санкт-Петербурга</p></div>
            </div>           
        </nav>
        <div class="modal fade" id="excursionModal" tabindex="-1" aria-labelledby="excursionModalLabel" aria-hidden="true">
            <div class="modal-dialog .modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="excursionModalLabel">История заказов</h5>
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
                            <th scope="col">Клиент</th>
                            <th scope="col">Номер клиента</th>
                            <th scope="col">Дата</th>
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
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exc_newModal" tabindex="-1" aria-labelledby="excursion_newModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title ms-auto" id="excursion_newModalLabel">Создать экскурсию</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex">
                  <div class="container ">
                    <div class="row form_forInput">
                      <div class="col">
                        <div class="map_api" id="mapApi_order" alt="Map"></div>
                      </div>
                      <div class="col">
                        <div class="mb-3">
                          <label class="form-label" id="basic-addon1">Название</label>
                          <input type="text" class="form-control" placeholder="" aria-label="Name" aria-describedby="basic-addon1">
                        </div>
                        <div class="mb-3">
                          <label  class="form-label" id="basic-addon2">Адрес</label>
                          <input type="text" class="form-control" id="validationAddress"  placeholder="" aria-label="Address" aria-describedby="basic-addon2" required>
                          <div class="invalid-feedback">
                           Укажите действующий город.
                         </div> 
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Описание</label>
                          <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Цена</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            <span class="input-group-text ">₽</span>
                          </div>
                        </div>
                          <div class='mb-5' id='datetimepicker1'>
                            <label class="form-label">Дата</label>
                            <input type="date" class="form-control" id="dating" name="date" placeholder="Дата" required>
                            </div>
                            <div class="input-group pt-5">
                              <input type="file" class="form-control " id="inputGroupFile02" multiple>
                              <label class="input-group-text " for="inputGroupFile02">Загрузить</label>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer d-block p-0 ">
                  <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg">Сохранить</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="data_account">
            <div class="modal fade" id="data_accModal" tabindex="-1" aria-labelledby="data_accModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header ">
                      <h5 class="modal-title" id="data_accModalLabel">Регистрация</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иван" value="Иван">
                            <label for="floatingInput">Имя</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иванович" value="Иванов">
                            <label for="floatingInput">Фамилия</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="ivan@mail.ru">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" value="superIvan1">
                            <label for="floatingPassword">Пароль</label>
                        </div>
                    </div>
                    <div class="modal-footer" id="buttonReg">            
                            <button type="button" class="btn btn-primary btn-block butReg" data-bs-dismiss="modal" aria-label="Close">Сохранить</button>                                           
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="map">
            <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="orderModalLabel">Заказ</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                          <!-- <div id="carouselPhotoControls" class="carousel slide mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="image\foto.jpg" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="image\foto.jpg" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="image\foto.jpg" class="d-block w-100" alt="...">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotoControls"  data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Предыдущий</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotoControls"  data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Следующий</span>
                            </button>
                          </div> -->
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иван">
                            <label for="floatingInput">Имя</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иванович">
                            <label for="floatingInput">Фамилия</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Иванович">
                            <label for="floatingInput">Отчество</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput"  name="date" placeholder="Дата" required>
                            <label for="floatingInput">Дата</label>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer"  id="buttonOrder">
                      <button type="button" class="btn btn-primary" onclick="alert('Агрегатор')">Заказать</button>
                    </div>
                  </div>
                </div>
            </div>
            <div class="map_api" id="mapApi" width="1384" height="836" alt="Map">

            </div>
        </div>
        <div class="why_we">
            
          <div class="line"></div>
          <div class="container button_forOrder">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#orderModal">Заказать</button>
          </div>
        </div>       
        <footer>
            <div class="footer">
                <div class="data_footer">
                    <div class="item"></div>
                    <div class="name_author item"><p>@Ахиян Д.Г.</p></div>
                    <div class="email item"><p  >roofSPB@mail.ru</p></div>
                </div>
            </div>
        </footer>
      
      <script src="../index.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      <script src="daterangepicker/moment.js"></script>
      <script src="daterangepicker/daterangepicker.js">
        $(function(){
          $('#dating').daterangepicker(
            {
              singleDatePicker: true,
              locale: {
              format: 'YYYY.DD.MM'
            }
            }
          );
        });
      </script>

    </body>
</html>