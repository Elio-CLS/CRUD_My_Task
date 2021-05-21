<?php
// INCLUIR ARCHIVOS
include('includes/errors.php');
/*
*
*
*/
// Header
include('includes/header.php');
// Nav
include('includes/nav.php');

error_log("index");
?>
<!-- Formularios -->
<div class="container p-4">
    <div class="row">
        <!-- Formulario registro-->
        <div class="col-md-4">
            <div class="card card-body">
                <form action="view/save_task.php" method="POST">
                    <!-- Titulo del task -->
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titulo del Task" autofocus>
                    </div>
                    <br>
                    <!-- Texto del task -->
                    <div class="form-group">
                        <textarea name="texto" rows="4" class="form-control" placeholder="Descripcion del Task"></textarea>
                    </div>
                    <br>
                    <!-- Boton Guardar Task -->
                    <input type="submit" class="btn btn-success btn-block" name="btn_save_task" value="Guardar Task">
                </form>
            </div>
            <br>
            <!-- SESSION MENSAJES -->
            <?php session_start(); ?>
            <?php if(isset($_SESSION['mensaje'])){ ?>
                <div class="alert <?php echo $_SESSION['msj_color'];?> alert-dismissible fade show" role="alert">

                    <?php echo $_SESSION['mensaje']; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                </div>
            <?php session_unset(); } ?>
        </div>

        <!-- Formulario muestra datos-->
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contenido de la tabla-->
                        <?php include('view/view_task.php'); ?>
                    </tbody>
                </table>
        </div> 
    </div>

</div>






<?php
//Footer
include('includes/footer.php');
?>


