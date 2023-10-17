<?php
class Movimiento
{
    public $id;
    public $inventario_id;
    public $accion;
    public $cantidad;
    public $fecha_movimiento;
    
    function __construct($id, $inventario_id, $accion, $cantidad, $fecha_movimiento)
    {
        $this->id = $id;
        $this->inventario_id = $inventario_id;
        $this->accion = $accion;
        $this->cantidad = $cantidad;
        $this->fecha_movimiento = $fecha_movimiento;
    }


    public function Agregar($con)
    {
        $insertar = "INSERT INTO historial_movimientos(id, inventario_id, accion, cantidad, fecha_movimiento)
        VALUES('$this->id', '$this->inventario_id', '$this->accion', '$this->cantidad' ,'$this->fecha_movimiento')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Movimiento Registrado al Sistema");
        } else {
            MensajeError("El Movimiento No Pudo Ser Registrado al Sistema");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM historial_movimientos WHERE id = '$this->id'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Movimiento Fue Eliminado del Sistema");
        } else {
            MensajeError("El Movimiento No Pudo Ser Eliminado");
        }
    }
}
