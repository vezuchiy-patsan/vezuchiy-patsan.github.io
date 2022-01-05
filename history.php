<?php 
if($_SESSION['type'] == 0){
    $user_id = $_SESSION['id'];
    require('connect.php');
    $history_sql = "SELECT ExcursionID, count, status, date FROM History_buy WHERE accountID='$user_id'";
    $history_buy = mysqli_query($conn, $history_sql);
    $history_buy = mysqli_fetch_all($history_buy);

    $history_excursion_arr = array();
    $array_for_history = array();
    $array_with_coordiantes = array();
    for($i = 0; $i < count($history_buy); $i++){
        $excursion_id = $history_buy[$i][0];
        $history_excursion_sql = "SELECT id, accountID, Name, Price, Phone FROM Excursion WHERE id='$excursion_id'";
        $history_excursion_query = mysqli_query($conn, $history_excursion_sql);
        $history_excursion_query = mysqli_fetch_all($history_excursion_query);
        for($j = 0; $j < count($history_excursion_query); $j++){
            array_push($history_excursion_arr, $history_excursion_query[$j]);
        }
        for($q = 0; $q < count($array); $q++){
            
            if($array[$q][0] == $history_excursion_query[0][0]){
              array_push($array_for_history, [$array[$q][0], $array[$q][2],$array[$q][4], $array[$q][6], $array[$q][10], $array[$q][11]]);
              array_push($array_with_coordiantes, [$array[$q][8], $array[$q][9]]);
            }else{
                /* print_r($array);
                break; */
            }
        }
    }
    $array_with_coordiantes = json_encode($array_with_coordiantes);
    mysqli_close($conn);
}else if($_SESSION['type'] == 1){
    $user_id = $_SESSION['id'];
    require('connect.php');

    $excursion_history = array();
    
}
?>