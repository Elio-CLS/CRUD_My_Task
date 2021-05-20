<?php
// Error_log
include('includes/errors.php');
// Conexion db
include('sql/conexion.php');
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
        </div>

        <!-- Formulario muestra datos-->
        <div class="col-md-8">
        
        </div> 
    </div>

</div>






<?php
//Footer
include('includes/footer.php');
?>


