<?php
$conn = mysqli_connect("sql109.byethost14.com", "b14_30463699", "danfom2000");
if ($conn === false) {
  die("Ошибка: " . mysqli_connect_error());
} 
mysqli_select_db($conn,"b14_30463699_sql1")

/* mysqli_close($conn); */
?>