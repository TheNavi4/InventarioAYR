<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ordenes de servicio</h1>
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
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Auto</th>
                                    <th>Modelo</th>
                                    <th>Placas</th>
                                    <th>Tipo de servicio</th>
                                    <th>Material ocupado</th>
                                    <th>Costo</th>
                                    <th>Acciones
                                        <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nueva Orden"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['fecha'] ?></td>
                                        <td><?php echo $row['cliente'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td><?php echo $row['marca_auto'] ?></td>
                                        <td><?php echo $row['modelo'] ?></td>
                                        <td><?php echo $row['placas'] ?></td>
                                        <td><?php echo $row['servicio_id'] ?></td>
                                        <td><?php echo $row['materia_id'] ?></td>
                                        <td><?php echo $row['total'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);
                                                    " onclick="document.getElementById('update_id').value = <?= $row['id'] ?>;
                                                    document.getElementById('update_fecha').value = '<?= $row['fecha'] ?>';
                                                    document.getElementById('update_cliente').value = '<?= $row['cliente'] ?>';
                                                    document.getElementById('update_direccion').value = '<?= $row['direccion'] ?>';
                                                    document.getElementById('update_telefono').value = '<?= $row['telefono'] ?>';
                                                    document.getElementById('update_marca_auto').value = '<?= $row['marca_auto'] ?>';
                                                    document.getElementById('update_modelo').value = '<?= $row['modelo'] ?>';
                                                    document.getElementById('update_placas').value = '<?= $row['placas'] ?>';
                                                    document.getElementById('update_servicio_id').value = '<?= $row['servicio_id'] ?>';
                                                    document.getElementById('update_materia_id').value = '<?= $row['materia_id'] ?>';
                                                    document.getElementById('update_total').value = '<?= $row['total'] ?>';" 
                                                    title="Editar Cliente" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value = <?= $row['id'] ?>;document.getElementById('delete_cliente').value = '<?= $row['cliente'] ?>';" title="Eliminar Cliente" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nueva Orden</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=ordenes" id="ingresar" method="POST">

                    <div>
                        <label for="add_fecha">Fecha</label>
                        <input type="date" name="add_fecha" id="add_fecha" placeholder="Fecha" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_nombre">Cliente</label>
                        <input type="text" name="add_cliente" id="add_cliente" placeholder="Nombre de Cliente" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="add_direccion">Dirección</label>
                        <input type="text" name="add_direccion" id="add_direccion" placeholder="Dirección" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="add_telefono">Teléfono</label>
                        <input type="text" name="add_telefono" id="add_telefono" placeholder="Teléfono" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="add_marca_auto">Marca de Auto</label>
                        <input type="text" name="add_marca_auto" id="add_marca_auto" placeholder="Marca de Auto" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="add_modelo">Modelo</label>
                        <input type="text" name="add_modelo" id="add_modelo" placeholder="Modelo" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="add_placas">Placas</label>
                        <input type="text" name="add_placas" id="add_placas" placeholder="Placas" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="add_materia_id">Material Ocupado</label>
                        <input type="text" name="add_materia_id" id="add_materia_id" placeholder="Material Ocupado" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="add_total">Costo</label>
                        <input type="number" name="add_total" id="add_total" placeholder="Costo" class="form-control" required="required">
                    </div>

                    <input type="submit" name="add_cliente" Value="Registrar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Editar Cliente</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=ordenes" method="POST">
                    <input type="hidden" name="update_id" id="update_id" value="">
                    <div>
                        <label for="update_fecha">Fecha</label>
                        <input type="date" name="update_fecha" id="update_fecha" placeholder="Fecha" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_cliente">Cliente</label>
                        <input type="text" name="update_cliente" id="update_cliente" placeholder="Nombre de Cliente" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_direccion">Dirección</label>
                        <input type="text" name="update_direccion" id="update_direccion" placeholder="Dirección" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_telefono">Teléfono</label>
                        <input type="text" name="update_telefono" id="update_telefono" placeholder="Teléfono" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_marca_auto">Marca de Auto</label>
                        <input type="text" name="update_marca_auto" id="update_marca_auto" placeholder="Marca de Auto" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_modelo">Modelo</label>
                        <input type="text" name="update_modelo" id="update_modelo" placeholder="Modelo" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_placas">Placas</label>
                        <input type="text" name="update_placas" id="update_placas" placeholder="Placas" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_servicio_id">Tipo de Servicio</label>
                        <input type="text" name="update_servicio_id" id="update_servicio_id" placeholder="Tipo de Servicio" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_materia_id">Material Ocupado</label>
                        <input type="text" name="update_materia_id" id="update_materia_id" placeholder="Material Ocupado" class="form-control" required="required">
                    </div>

                    <div>
                        <label for="update_total">Costo</label>
                        <input type="number" name="update_total" id="update_total" placeholder="Costo" class="form-control" required="required">
                    </div>

                    <input type="submit" name="update_orden" id="update_orden" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=ordenes" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar esta Orden? No se podra recuperar</label>
                        <input type="text" name="delete_cliente" id="delete_cliente" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_cliente" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>