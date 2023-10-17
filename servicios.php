<?php
require_once 'clases/clsServicios.php';

if (isset($_POST['update_servicio'])) {
    $servcio = new Servicio($_POST['update_id'], $_POST['update_tipo'], $_POST['update_costo']);
    $servcio->Modificar($con);
} else if (isset($_POST['add_servicio'])) {
    $servcio = new Servicio(null, $_POST['add_tipo'], $_POST['add_costo']);
    $servcio->Agregar($con);

} else if(isset($_POST['delete_servicio'])){
    $servcio = new Servicio($_POST['delete_id'], '', '');
    $servcio->Eliminar($con);
}

$query = "SELECT id, tipo, costo from servicios
ORDER BY tipo asc;";
$res = mysqli_query($con, $query);

require('views/servicios.view.php');
