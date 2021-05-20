<?php 
include('../includes/errors.php');
    if(isset($_POST['btn_save_task'])){
        if(empty($_POST['title']) && empty($_POST['texto'])){
            error_log('Titulo y Texto estaban vacios');
            header('location: ../index.php');
        } else {
            // TITULO
            if(empty($_POST['title'])){
                error_log('Titulo no GUARDADO');
                header('location: ../index.php');
            } else {
                $title = trim($_POST['title']);
                error_log('Titulo GUARDADO');
            }
            // TEXTO
            if(empty($_POST['texto'])){
                error_log('Text no GUARDADO');
                header('location: ../index.php');
            } else {
                $texto = trim($_POST['texto']);
                error_log('Texto GUARDADO');
            }
            // GUARDADO
            if(isset($title) && isset($texto)){
                error_log('Guardado exitoso '. $title .' '. $texto);
                header('location: ../index.php');
            } else {
                error_log('Uno de los campos estaba vacio');
                header('location: ../index.php');
            }
        } 
    } 
?>