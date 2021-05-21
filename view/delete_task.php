<?php 
// INCLUIR ARCHIVOS
include('../includes/errors.php');
include('../sql/conexion.php');
include('../sql/consulta.php');

// VERIFICAMOS ID
if(isset($_GET['id'])){
    error_log('Se va a borrar un task '. $_GET['id']);

    // PREPARAR CONSULTA DELETE
    if($stmt_delete = $obj_conexion->prepare($sql_delete)){
        $stmt_delete->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        // EJECUTAR CONSULTA
        if($stmt_delete->execute()){
            error_log('Se BORRO un task '. $_GET['id']);
            $_SESSION['mensaje'] = 'Se borro la tarea';
            $_SESSION['msj_color'] = 'alert-danger';
            header('location: ../index.php');
        } else {
            error_log('No se puedo borrar el task');
            $_SESSION['mensaje'] = 'Error, intentelo de nuevo.';
            $_SESSION['msj_color'] = 'alert-warning';
            header('location: ../index.php');
        }
        unset($stmt_reg);
    }
    unset($obj_conexion);
}
?>