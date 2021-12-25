<?php 
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);   */
    require ("connect.php");
    $sqlCoord = "SELECT X, Y FROM Geotag";
    $coords = mysqli_query($conn, $sqlCoord);
    $coords = mysqli_fetch_all($coords);
    $json = json_encode($coords);


    $sqlCoord2 = "SELECT id FROM Geotag";
    $coords2 = mysqli_query($conn, $sqlCoord2);
    $coords2 = mysqli_fetch_all($coords2);

    $sqlExc = "SELECT * FROM Excursion";
    $coordsExc = mysqli_query($conn, $sqlExc);
    $coordsExc = mysqli_fetch_all($coordsExc);

    $sqlExcName = "SELECT Name, Surname FROM account";
    $coordsName = mysqli_query($conn, $sqlExcName);
    $coordsName = mysqli_fetch_all($coordsName);

    $array = array();
    for($i = 0; $i <= count($coords2); $i++){
    for($j = 0; $j < count($coordsExc); $j++){
            if($coords2[$i][0] == $coordsExc[$j][0]){
               for($k = 0; $k < 2; $k++){
                array_push($coordsExc[$j], $coords[$i][$k]);
               }
                array_push($array, $coordsExc[$j]);
            }
        }
    }
    $array = json_encode($array);
    mysqli_close($conn);
?>