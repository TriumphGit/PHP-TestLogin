<?php

$login = $_GET['login'];
$pass = $_GET['pass'];

$link = mysqli_connect("localhost", "root", "", "testwork");

if ($mysqli->connect_errno) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 
$check = "SELECT * FROM login WHERE login = '".$login."'";
$checkres = mysqli_query($link, $check) or die("MySQL error: " . mysqli_error($link) . "<hr>\nQuery: $query");
$row = mysqli_num_rows($checkres);
if ($row > 0) {
    echo "Юзернейм уже занят";
}
else {
    $query = "INSERT INTO login( Id, login, pass ) SELECT MAX( Id ) + 1, '".$login."', '".$pass."' FROM login";
    $result = mysqli_query($link, $query) or die("MySQL error: " . mysqli_error($link) . "<hr>\nQuery: $query");
    echo "Регистрация успешна!";
}

mysqli_close($link);
?>