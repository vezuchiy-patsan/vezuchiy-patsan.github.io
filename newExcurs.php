<?php
header("Content-Type: text/html; charset=UTF-8");
print_r($_POST['submit']);
if (isset($_POST['submitExc'])) 
{ 

  echo $_POST['Name'];
  

}else{
    echo "asdfj";
}

?>