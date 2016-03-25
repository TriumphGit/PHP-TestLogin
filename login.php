<?php

$login = $_GET['login'];
$pass = $_GET['pass'];

$link = mysqli_connect("localhost", "root", "", "testwork");

if ($mysqli->connect_errno) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 

$query = "SELECT * FROM login WHERE login = '".$login."' AND pass = '".$pass."'";
$result = mysqli_query($link, $query) or die("MySQL error: " . mysqli_error($link) . "<hr>\nQuery: $query");
$array = mysqli_num_rows($result);
$row = mysqli_fetch_row($result);

if ($result) {
    if($array > 0) {
        echo ("<p>Вход...</p>");
        die("<script>location.href = 'user.php?id=".$row[0]."'</script>");
    } 
    else {
        echo ("Неверный логин или пароль!");
    }
} 

mysqli_close($link);
?>