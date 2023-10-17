<?php
require_once 'clases/clsMovimientos.php';

if(isset($_POST['add_movimiento'])){
    $movimiento = new Movimiento(null, $_POST['add_inventario_id'], $_POST['add_accion'], $_POST['add_cantidad'], $_POST['add_fecha_movimiento']);
    $movimiento->Agregar($con);

}
else if (isset($_POST['update_movimiento'])) {
    $movimiento = new Movimiento($_POST['update_id'], $_POST['update_inventario_id'], $_POST['update_accion'], $_POST['update_cantidad'], $_POST['update_fecha_movimiento']);
    $movimiento->Modificar($con);
}

else if(isset($_POST['delete_movimiento'])){
    $movimiento = new Movimiento($_POST['delete_id'], '', '', '', '');
    $movimiento->Eliminar($con);
}

$query = "SELECT id, inventario_id, accion, cantidad, fecha_movimiento from historial_movimientos
ORDER BY fecha_movimiento desc;";

$query = "SELECT h.id, h.inventario_id, i.nombre as producto_nombre, h.accion, h.cantidad, h.fecha_movimiento 
        FROM historial_movimientos h
        JOIN inventario i ON h.inventario_id = i.id
        ORDER BY h.fecha_movimiento DESC";

$res = mysqli_query($con, $query);

require('views/Movimientos.view.php');
