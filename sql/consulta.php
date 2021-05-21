<?php 
// CONSULTA REGISTRAR
$sql_reg = "INSERT INTO task (title, texto) VALUES (:title,:texto)";

// CONSULTA MOSTRAR
$sql_view = "SELECT * FROM task";

// CONSULTA EDITAR
$sql_edit = "SELECT * FROM task WHERE id = :id";
$sql_update = "UPDATE task SET title = :title, texto = :texto WHERE id = :id";

// CONSULTA BORRAR
$sql_delete = "DELETE FROM task WHERE id = :id";
?>