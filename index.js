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
