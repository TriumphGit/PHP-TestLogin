<?php

session_start();
$id = $_GET['id'];

$link = mysqli_connect("localhost", "root", "", "testwork");

if ($mysqli->connect_errno) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 

$query = "SELECT * FROM login WHERE id = '".$id."'";
$result = mysqli_query($link, $query) or die("MySQL error: " . mysqli_error($link) . "<hr>\nQuery: $query");
$array = mysqli_num_rows($result);
$row = mysqli_fetch_row($result);

$name = $row[1];
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div class = "login">
            Логин: <?php echo $name; ?>
        </div>
    </body>
</html>