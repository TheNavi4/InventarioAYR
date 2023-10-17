<?php
require_once 'clases/clsInventarios.php';

if (isset($_POST['update_inventario'])) {
    $inventario = new Inventario($_POST['update_id'], $_POST['update_nombre'], $_POST['update_proveedor'], $_POST['update_descripcion'], $_POST['update_precio'], $_POST['update_instalacion'], $_POST['update_venta'], $_POST['update_stock']);
    $inventario->Modificar($con);
} else if (isset($_POST['add_inventario'])) {
    $inventario = new Inventario(null, $_POST['add_nombre'], $_POST['add_proveedor'], $_POST['add_descripcion'], $_POST['add_precio'],  $_POST['add_instalacion'], $_POST['add_venta'], $_POST['add_stock']);
    $inventario->Agregar($con);

} else if(isset($_POST['delete_inventario'])){
    $inventario = new Inventario($_POST['delete_id'], '', '', '', '', '', '', '');
    $inventario->Eliminar($con);
}

$query = "SELECT id, nombre, proveedor, descripcion, precio, instalacion, venta, stock from inventario
ORDER BY nombre asc;";

$res = mysqli_query($con, $query);

require('views/inventarios.view.php');
