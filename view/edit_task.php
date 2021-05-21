<?php 
// INCLUIR ARCHIVOS
include('../includes/errors.php');
include('../sql/conexion.php');
include('../sql/consulta.php');

// VERIFICAMOS ID
if(isset($_POST['btn_update_task'])){
    error_log('Se comenzara a editar');
    
    if(empty($_GET['id']) && empty($_POST['title_up']) && empty($_POST['texto_up'])){
        error_log('Titulo y Texto estaban vacios');
        $_SESSION['mensaje'] = 'Titulo y Texto vacios.';
        $_SESSION['msj_color'] = "alert-warning";
        header('location: ../view_edit.php');
    } else {
        // ID
        $id = $_GET['id'];
         // TITULO
         if(empty($_POST['title_up'])){
            error_log('Titulo no GUARDADO');
            header('location: ../view_edit.php');
        } else {
            $title = trim($_POST['title_up']);
            error_log('Titulo GUARDADO');
        }
        // TEXTO
        if(empty($_POST['texto_up'])){
            error_log('Texto no GUARDADO');
            header('location: ../view_edit.php');
        } else {
            $texto = trim($_POST['texto_up']);
            error_log('Texto GUARDADO');
        }
        // ACTUALIZANDO DB
        if(isset($title) && isset($texto)){

            // PREPARAR CONSULTA REGISTRAR
            if($stmt_update = $obj_conexion->prepare($sql_update)){
                $stmt_update->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt_update->bindParam(":title", $title, PDO::PARAM_STR);
                $stmt_update->bindParam(":texto", $texto, PDO::PARAM_STR);

                 // EJECUTAR CONSULTA
                 if($stmt_update->execute()){
                    error_log('SE GUARDO EN LA DB');
                    $_SESSION['mensaje'] = 'Task actualizada exitosamente.';
                    $_SESSION['msj_color'] = 'alert-success';
                    header('location: ../index.php');
                } else {
                    error_log('NO SE GUARDO EN LA DB');
                    $_SESSION['mensaje'] = 'Error, intentelo de nuevo.';
                    $_SESSION['msj_color'] = 'alert-warning';
                    header('location: ../view_edit.php');
                }
                unset($stmt_update);
            }
        } else {
            error_log('Uno de los campos estaba vacio');
            $_SESSION['mensaje'] = 'Completa ambos campos.';
            $_SESSION['msj_color'] = 'alert-warning';
            header('location: ../view_edit.php');
        }
    }
    unset($obj_conexion); 
}
?>