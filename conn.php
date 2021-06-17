<?php 
$servername = "";
$username = "";
$password = "";
$dbname = "";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) { ;
  die("Ошибка подключения к MySQL: " . mysqli_connect_error()."  \n\n Обратитесь к администратору!" . $conn->connect_error);
}
