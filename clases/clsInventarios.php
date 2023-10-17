<?php
class Inventario
{
    public $id;
    public $nombre;
    public $proveedor;
    public $descripcion;
    public $precio;
    public $instalacion;
    public $venta;
    public $stock;

    function __construct($id, $nombre, $proveedor,$descripcion, $precio, $instalacion,$venta, $stock)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->proveedor = $proveedor;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->instalacion = $instalacion;
        $this->venta = $venta;
        $this->stock = $stock;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO inventario(id, nombre, proveedor, descripcion, precio, instalacion, venta, stock)
        VALUES('$this->id', '$this->nombre', '$this->proveedor', '$this->descripcion','$this->precio', '$this->instalacion', '$this->venta' ,'$this->stock')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Material Registrado al Sistema");
        } else {
            MensajeError("El Material No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE inventario SET
        nombre = '$this->nombre', 
        proveedor = '$this->proveedor',
        descripcion = '$this->descripcion',
        precio = '$this->precio', 
        instalacion = '$this->instalacion',
        venta = '$this->venta',
        stock = '$this->stock'
        WHERE id = '$this->id'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Material Modificado");
        } else {
            MensajeError("El Material No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM inventario WHERE id = '$this->id'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Material Fue Eliminado del Sistema");
        } else {
            MensajeError("El Material No Pudo Ser Eliminado");
        }
    }

    public function VerificarStockBajo()
    {
        if ($this->stock <= 5) {
            return '<span style="color: red; font-weight: bold;">¡Advertencia! El stock está muy bajo. Sugerimos añadir más stock.</span>';
        } else {
            return "";
        }
    }
}


