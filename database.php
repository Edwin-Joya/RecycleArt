<?php
$server ='localhost';
$user='root';
$password='';
$database='lg';
try {
    $conn=new PDO("mysql:host=$server;dbname=$database;",$user,$password);
} catch (PDOException $e) {
die('conecion fallida:'.$e->getMessage());
}
?>