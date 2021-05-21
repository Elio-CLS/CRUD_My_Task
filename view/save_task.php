<?php 
// INCLUIR ARCHIVOS
include('../includes/errors.php');
include('../sql/conexion.php');
include('../sql/consulta.php');

    if(isset($_POST['btn_save_task'])){
        if(empty($_POST['title']) && empty($_POST['texto'])){
            error_log('Titulo y Texto estaban vacios');
            $_SESSION['mensaje'] = 'Titulo y Texto vacios.';
            $_SESSION['msj_color'] = "alert-warning";
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
            // GUARDADO DB
            if(isset($title) && isset($texto)){
                error_log('Guardado exitoso '. $title .' '. $texto);

                // PREPARAR CONSULTA REGISTRAR
                if($stmt_reg = $obj_conexion->prepare($sql_reg)){
                    $stmt_reg->bindParam(":title", $title, PDO::PARAM_STR);
                    $stmt_reg->bindParam(":texto", $texto, PDO::PARAM_STR);

                    // EJECUTAR CONSULTA
                    if($stmt_reg->execute()){
                        error_log('SE GUARDO EN LA DB');
                        $_SESSION['mensaje'] = 'Tarea guardada exitosamente.';
                        $_SESSION['msj_color'] = 'alert-success';
                        header('location: ../index.php');
                    } else {
                        error_log('NO SE GUARDO EN LA DB');
                        $_SESSION['mensaje'] = 'Error, intentelo de nuevo.';
                        $_SESSION['msj_color'] = 'alert-warning';
                        header('location: ../index.php');
                    }
                    unset($stmt_reg);
                }
    
            } else {
                error_log('Uno de los campos estaba vacio');
                $_SESSION['mensaje'] = 'Completa ambos campos.';
                $_SESSION['msj_color'] = 'alert-warning';
                header('location: ../index.php');
            }
        }
        unset($obj_conexion); 
    } 
?>