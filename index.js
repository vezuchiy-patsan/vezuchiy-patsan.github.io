"use strict"
// Функция ymaps.ready() будет вызвана, когда
// загрузятся все компоненты API, а также когда будет готово DOM-дерево.
ymaps.ready(init);



function init(){
    var coords = [[59.939098, 30.315868]];
    //занесём имя файла
    var fileName = document.documentURI;
    let massiveUrl = fileName.split('/');
    // Создание карты.

    
    
    if(massiveUrl[massiveUrl.length-1] == 'validateExcursion.php'){
        var myPlacemark2;
        var myMap2 = new ymaps.Map( "mapApi_order", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [59.939098, 30.315868],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 11,
            controls: ['zoomControl'] 
        },{
        // Зададим ограниченную область прямоугольником, 
        // примерно описывающим Санкт-Петербург.
        restrictMapArea: [
        [59.729409, 29.862390],
        [60.196089, 30.905570]
        ]});
        // Слушаем клик на карте.
       
        var myMap = new ymaps.Map( "mapApi", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [59.939098, 30.315868],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 11,
            controls: ['zoomControl'] 
        },{
        // Зададим ограниченную область прямоугольником, 
        // примерно описывающим Санкт-Петербург.
        restrictMapArea: [
        [59.729409, 29.862390],
        [60.196089, 30.905570]
        ]});
    }else{
        var myMap = new ymaps.Map("mapApi", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [59.939098, 30.315868],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 11,
            controls: ['zoomControl'] 
        },{
        // Зададим ограниченную область прямоугольником, 
        // примерно описывающим Санкт-Петербург.
        restrictMapArea: [
            [59.729409, 29.862390],
            [60.196089, 30.905570]
        ]});
        
        }
        
        // Создание геообъекта с типом точка (метка).
        var myGeoObject = new ymaps.GeoObject({
            geometry: {
                type: "Point", // тип геометрии - точка
                coordinates: coords[0] // координаты точки
            }
        });

        myMap2.events.add('click', function (e) {
            var coords2 = e.get('coords');

            // Если метка уже создана – просто передвигаем ее.
            if (myPlacemark2) {
                myPlacemark2.geometry.setCoordinates(coords2);
            }
            // Если нет – создаем.
            else {
                myPlacemark2 = createPlacemark(coords2);
                myMap2.geoObjects.add(myPlacemark2);
              
                // Слушаем событие окончания перетаскивания на метке.
                myPlacemark2.events.add('dragend', function () {
                    getAddress(myPlacemark2.geometry.getCoordinates());
                   
                });
            }
            getAddress(coords2);
            document.getElementById("validationAddressXY").value = coords2;
           /*  alert(coords2); */
        });

        // Создание метки.
        function createPlacemark(coords2) {
            return new ymaps.Placemark(coords2, {
                iconCaption: 'поиск...'
            }, {
                preset: 'islands#blueIcon',
                draggable: true
            });
        }
        // Определяем адрес по координатам (обратное геокодирование).
        function getAddress(coords2) {
            myPlacemark2.properties.set('iconCaption', 'поиск...');
            ymaps.geocode(coords2).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0);
                
                
                myPlacemark2.properties
                    .set({
                        // Формируем строку с данными об объекте.
                        iconCaption: [
                  
                        ],
                        // В качестве контента балуна задаем строку с адресом объекта.
                        balloonContent: firstGeoObject.getAddressLine()
                    });
                
                document.getElementById("validationAddress").value = firstGeoObject.getAddressLine().substring(8);
                    
            });
            
            
        }
        myGeoObject.events.add('click', function () {
                document.getElementById('offcanvasSidep_btn').click(); // вызвать клик на кнопку;
        });
        // Размещение геообъекта на карте.
        myMap.geoObjects.add(myGeoObject); 
        /* myMap2.geoObjects.add(myGeoObject1); */ 
        document.querySelector("#submit_newExc").onclick = function(){
            let adres = document.getElementById('validationAddress').value;
            var newGeocode = ymaps.geocode('Санкт-Петербург, улица Льва Толстого, 10'/* , {
                boundedBy: myMap.getBounds(),
                // Жесткое ограничение поиска указанной областью.
                strictBounds: true
            } */);
            newGeocode.then(function(res){
                myMap.geoObjects.add(res.geoObjects);
            });
        }
}
