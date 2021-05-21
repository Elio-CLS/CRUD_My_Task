<?php 
// INCLUIR ARCHIVOS
include('includes/errors.php');
include('sql/conexion.php');
include('sql/consulta.php');

// VERIFICAMOS ID
if(isset($_GET['id'])){
    error_log('Se comenzara a editar');
    $id = $_GET['id'];

    // PREPARAR CONSULTA EDITAR VIEW
    $edit_view = $obj_conexion->prepare($sql_edit);
    $edit_view->bindParam(':id', $id, PDO::PARAM_INT);

    // EJECUTO LA CONSULTA
    if($edit_view->execute()){
        if($edit_view->rowCount() == 1){
            $row = $edit_view->fetch();

            $title_db = trim($row['title']);
            $texto_db = trim($row['texto']);
            error_log('Se accedio a los datos guardados en la db'. $title_db .' '. $texto_db );
            //header('location: ../view_edit.php');
        }
        unset($edit_view);
    }
    unset($obj_conexion);
}


/*
*
*
*/
// Header
include('includes/header.php');
// Nav
include('includes/nav.php');

error_log('EDIT VIEW');
?>

<!-- TABLA DE LA TAREA A EDITAR -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="view/edit_task.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <!-- TITULO -->
                    <div class="form-group">
                        <input type="text" name="title_up" value="<?php echo $title_db; ?>" class="form-control" placeholder="Editar Titulo">
                    </div>
                    <br>
                    <!-- TEXTO -->
                    <div class="form-group">
                        <textarea name="texto_up" rows="4" class="form-control" placeholder="Edita el Texto" placeholder="Editar Texto"><?php echo $texto_db; ?></textarea>
                    </div>
                    <br>
                    <!-- BOTON -->
                    <input type="submit" class="btn btn-success btn-block" name="btn_update_task" value="Actualizar Task">
                </form>
            </div>
            <!-- SESSION MENSAJES -->
            <?php session_start(); ?>
            <?php if(isset($_SESSION['mensaje'])){ ?>
                <div class="alert <?php echo $_SESSION['msj_color'];?> alert-dismissible fade show" role="alert">

                    <?php echo $_SESSION['mensaje']; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                </div>
            <?php session_unset(); } ?>
        </div>
    </div>
</div>

<?php
//Footer
include('includes/footer.php');
?>