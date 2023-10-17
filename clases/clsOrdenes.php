<?php
class Orden
{
    public $id;
    public $fecha;
    public $cliente;
    public $direccion;
    public $telefono;   
    public $marca_auto;
    public $modelo;
    public $placas;
    public $servicio_id;
    public $materia_id;
    public $total;

    public function __construct($id, $fecha, $cliente, $direccion, $telefono, $marca_auto, $modelo, $placas, $servicio_id, $materia_id, $total)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->marca_auto = $marca_auto;
        $this->modelo = $modelo;
        $this->servicio_id = $servicio_id;
        $this->materia_id = $materia_id;
        $this->placas = $placas;
        $this->total = $total;
    }


    public function Agregar ($con)
    {
        $total = $this->servicio_id + $this->materia_id;
        $insertar = "INSERT INTO ordenes(id, fecha, cliente, direccion, telefono, marca_auto, modelo, placas, servicio_id, materia_id, total)
        VALUES('$this->id', '$this->fecha', '$this->cliente', '$this->direccion', '$this->telefono', '$this->marca_auto', '$this->modelo',
        '$this->placas', '$this->servicio_id', '$this->materia_id', '$total')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Orden de Servicio Ha Sido Registrado al Sistema");

        } else {
            MensajeError("La Orden de Servicio No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE ordenes SET
        fecha = '$this->fecha', cliente = '$this->cliente', direccion = '$this->direccion', telefono = '$this->telefono',
        marca_auto = '$this->marca_auto', modelo = '$this->modelo', placas = '$this->placas', servicio_id = '$this->servicio_id', 
        materia_id = '$this->materia_id', total = '$this->total
        WHERE id = '$this->id'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Orden Modificada");
        } else {
            MensajeError("la Orden No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM ordenes WHERE id = '$this->id'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Orden de Servicio Eliminada del Sistema");
        } else {
            MensajeError("La Orden de Servicio No Pudo Ser Eliminado");
        }
    }
}
