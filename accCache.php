<?php
header("Content-Type: text/html; charset=UTF-8");

$accountData = "SELECT * FROM account WHERE login='$id'";
$dataResult = mysqli_query($conn, $sqlLogin);
$dataResult = mysqli_fetch_array($dataResult);

if (empty($dataResult['id']))
{
    
//если пользователя с введенным логином не существует
exit ("<p>Извините, введённый вами login или пароль неверный.</p>");
}else{
    $accountFirstName = $dataResult['FirstName'];
    $accountSurname = $dataResult['Surname'];
};
