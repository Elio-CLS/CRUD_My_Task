<?php 
// INCLUIR ARCHIVOS
include('includes/errors.php');
include('sql/conexion.php');
include('sql/consulta.php');

// PREPARAR CONSULTA VIEW
$stmt_view = $obj_conexion->prepare($sql_view);

// EJECUTAMOS CONSULTA
if($stmt_view->execute()){
    $stmt_view->rowCount();
    while($row = $stmt_view->fetch()){ ?>
        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['texto'] ?></td>
            <td><?php echo $row['date_created'] ?></td>
            <td><center>
                <a href="view_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">Editar
                </a>
                <a href="view/delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Borrar</a>
            </td></center>
        </tr>


    <?php }
    unset($stmt_view);
}
unset($obj_conexion);
?>