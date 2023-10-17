<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Historial de Movimientos</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Accion</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                    <th>Acciones 
                                        <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Movimiento"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['producto_nombre'] ?></td>
                                        <td><?php echo $row['accion'] ?></td>
                                        <td><?php echo $row['cantidad'] ?></td>
                                        <td><?php echo $row['fecha_movimiento'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value = <?= $row['id'] ?>;document.getElementById('delete_inventario_id').value = '<?= $row['inventario_id'] ?>';document.getElementById('delete_accion').value = '<?= $row['accion'] ?>';document.getElementById('delete_cantidad').value = '<?= $row['cantidad'] ?>';document.getElementById('delete_fecha_movimiento').value = '<?= $row['fecha_movimiento'] ?>';" title="Eliminar movimiento" class="text-danger"> <i class="fas fa-trash"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal para Ingresar -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Movimiento</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=movimientos" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_inventario_id">Id del prodcuto</label>
                        <input type="number" name="add_inventario_id" id="add_inventario_id" placeholder="Id del producto" class="form-control" required="required" min="1" max="999">
                    </div>

                    <div class="form-group">
                        <label for="add_accion">Acción</label>
                        <select name="add_accion" id="add_accion" class="form-control" required="required">
                            <option value="agregar">agregar</option>
                            <option value="quitar">quitar</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="add_cantidad">Cantidad</label>
                        <input type="number" name="add_cantidad" id="add_cantidad" placeholder="Cantidad" class="form-control" required="required" min="1" max="999">
                        <div id="cantidad-error" class="text-danger"></div>
                    </div>

                    <?php
                        // Obtener la fecha actual en formato yyyy-mm-dd
                        $fecha_actual = date("Y-m-d");
                    ?>
                    <div class="form-group">
                        <label for="add_instalacion">Fecha de Movimiento</label>
                        <input type="date" name="add_fecha_movimiento" id="add_fecha_movimiento" class="form-control" required="required" readonly value="<?php echo $fecha_actual; ?>">  
                    </div>
                    <input type="submit" name="add_movimiento" Value="Registrar" class="btn btn-primary" id="registrar-button">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Eliminar -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar material</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=movimientos" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar?</label>
                        
                    </div>
                    <input type="submit" name="delete_movimiento" Value="Eliminar" class="btn btn-danger">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('ingresar').addEventListener('submit', function (event) {
        var cantidad = document.getElementById('add_cantidad').value;

        // Validar si la cantidad es menor o igual a cero
        if (parseInt(cantidad) <= 0) {
            // Mostrar mensaje de error
            document.getElementById('cantidad-error').textContent = 'La cantidad debe ser mayor que cero.';
            // Prevenir el envío del formulario
            event.preventDefault();
        }
    });
</script>