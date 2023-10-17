<?php
require_once 'clases/clsOrdenes.php';

if (isset($_POST['update_orden'])) {
    $orden = new Orden($_POST['update_id'], $_POST['update_fecha'], $_POST['update_cliente'], $_POST['update_direccion'], $_POST['update_telefono'], $_POST['update_marca_auto'], $_POST['update_modelo'], $_POST['update_placas'], $_POST['update_servicio_id'], $_POST['update_materia_id'], $_POST['update_total']);
    $orden->Modificar($con);
} else if (isset($_POST['add_orden'])) {
    $orden = new Orden(null, $_POST['add_fecha'], $_POST['add_cliente'], $_POST['add_direccion'], $_POST['add_telefono'], $_POST['add_marca_auto'], $_POST['add_modelo'], $_POST['add_placas'], $_POST['add_servicio_id'], $_POST['add_materia_id'], $_POST['add_total']);
    $orden->Agregar($con);
} else if(isset($_POST['delete_orden'])){
    $orden = new Orden($_POST['delete_id'], '', '', '', '', '', '', '', '', '', '');
    $orden->Eliminar($con);

}

$query = "SELECT id, fecha, cliente, direccion, telefono, marca_auto, modelo, placas, servicio_id, materia_id, total from ordenes
ORDER BY fecha asc;";
$res = mysqli_query($con, $query);

require('views/ordenes.view.php');
