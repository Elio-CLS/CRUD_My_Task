<?php 
session_start();

$db_conexion = 'mysql:dbname=db_task;host=localhost';
$us ='root';
$ps = '';

try{
    $obj_conexion = new PDO($db_conexion, $us, $ps);
} catch(PDOException $err) {
    echo 'Server Off' . $err->getMessage();
}

?>