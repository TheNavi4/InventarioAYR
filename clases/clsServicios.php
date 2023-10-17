<?php
class Servicio
{
    public $id;
    public $tipo;
    public $costo;

    function __construct($id, $tipo, $costo)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->costo = $costo;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO servicios(id, tipo, costo)
        VALUES('$this->id', '$this->tipo', '$this->costo')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("El Servicio Fue Registrado al Sistema");
        } else {
            MensajeError("El Servicio No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE servicios SET
        tipo = '$this->tipo', costo = '$this->costo'
        WHERE id = '$this->id'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Servicio Modificado");
        } else {
            MensajeError("El Servicio No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM servicios WHERE id = '$this->id'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("El Servicio Fue Eliminado del Sistema");
        } else {
            MensajeError("El Servicio No Pudo Ser Eliminado");
        }
    }
}
