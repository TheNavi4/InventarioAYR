<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Servicios</h1>
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
                                    <th>Tipo de Servicio</th>
                                    <th>Costo</th>
                                    <th>Acciones
                                        <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Servicio"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['tipo'] ?></td>
                                        <td><?php echo $row['costo'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id').value = <?= $row['id'] ?>;document.getElementById('update_tipo').value = '<?= $row['tipo'] ?>';document.getElementById('update_costo').value = '<?= $row['costo'] ?>';" title="Editar Servicio" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value = <?= $row['id'] ?>;document.getElementById('delete_tipo').value = '<?= $row['tipo'] ?>';" title="Eliminar Servicio" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Servicio</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=servicios" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_tipo">Servicio</label>
                        <input type="text" name="add_tipo" id="add_tipo" placeholder="Tipo de Servicio" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_costo">Costo</label>
                        <input type="number" name="add_costo" id="add_costo" placeholder="Precio del material" class="form-control" required="required" minlength="10" maxlength="10">
                    </div>

                    <input type="submit" name="add_servicio" Value="Registrar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Editar Servicio</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=servicios" method="POST">
                    <input type="hidden" name="update_id" id="update_id" value="">
                    <div class="form-group">
                        <label for="update_tipo">Servicio</label>
                        <input type="text" name="update_tipo" id="update_tipo" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_costo">Costo</label>
                        <input type="number" name="update_costo" id="update_costo" class="form-control" required="required" min="1" max="99999">
                    </div>

                    <input type="submit" name="update_servicio" id="update_servicio" Value="Actualizar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Servicio</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=servicios" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este Servicio?</label>
                        <input type="text" name="delete_tipo" id="delete_tipo" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_servicio" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>