<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inventario</h1>
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
                                    <th>ID</th>
                                    <th>Material</th>
                                    <th>Proveedor</th>
                                    <th>Descripcion</th>
                                    <th>Precio Adquisicion</th>
                                    <th>Precio Instalación</th>
                                    <th>Precio Venta en Mano</th>
                                    <th>Stock</th>

                                    <th>Acciones
                                        <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Material"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['nombre'] ?></td>    
                                        <td><?php echo $row['proveedor'] ?></td>
                                        <td><?php echo $row['descripcion'] ?></td>
                                        <td><?php echo $row['precio'] ?></td>
                                        <td><?php echo $row['instalacion'] ?>
                                        <td><?php echo $row['venta'] ?></td>
                                        <td>
                                            <?php
                                            // Mostrar el stock
                                            echo $row['stock'];
                                            
                                            // Verificar el stock y mostrar una advertencia si es bajo
                                            $inventario = new Inventario($row['id'], $row['nombre'], $row['proveedor'], $row['descripcion'], $row['precio'], $row['instalacion'], $row['venta'], $row['stock']);
                                            $advertencia = $inventario->VerificarStockBajo();
                                            if (!empty($advertencia)) {
                                                echo "<br><span style='color: red;'>$advertencia</span>";
                                            }
                                            ?>

                                        </td>
                                        
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id').value = <?= $row['id'] ?>;document.getElementById('update_nombre').value = '<?= $row['nombre'] ?>';document.getElementById('update_proveedor').value = '<?= $row['proveedor'] ?>';document.getElementById('update_descripcion').value = '<?= $row['descripcion'] ?>';document.getElementById('update_precio').value = '<?= $row['precio'] ?>';document.getElementById('update_instalacion').value = '<?= $row['instalacion'] ?>';document.getElementById('update_venta').value = '<?= $row['venta'] ?>';document.getElementById('update_stock').value = '<?= $row['stock'] ?>';" title="Editar inventario" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value = <?= $row['id'] ?>;document.getElementById('delete_nombre').value = '<?= $row['nombre'] ?>';" title="Eliminar Material" class="text-danger"> <i class="fas fa-trash"></i> </a>
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
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Material</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=inventarios" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_nombre">Nombre</label>
                        <input type="text" name="add_nombre" id="add_nombre" placeholder="Nombre del material" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_proveedor">Proveedor</label>
                        <input type="text" name="add_proveedor" id="add_proveedor" placeholder="Nombre del proveedor" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_descripcion">Descripcion</label>
                        <input type="text" name="add_descripcion" id="add_descripcion" placeholder="Descripcion o medidas" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_cantidad">Cantidad</label>
                        <input type="number" name="add_stock" id="add_stock" placeholder="Cantidad a agregar" class="form-control" required="required" min="1" max="999">
                    </div>

                    <div class="form-group">
                        <label for="add_precio">Precio</label>
                        <input type="number" name="add_precio" id="add_precio" placeholder="Precio del material" class="form-control" required="required" minlength="10" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="add_instalacion">Precio de Instalacion</label>
                        <input type="number" name="add_instalacion" id="add_instalacion" placeholder="Precio de la Instalacion" class="form-control" required="required" minlength="10" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="add_venta">Precio Venta en mano</label>
                        <input type="number" name="add_venta" id="add_venta" placeholder="Precio de venta en mano" class="form-control" required="required" minlength="10" maxlength="10">
                    </div>

                    <input type="submit" name="add_inventario" Value="Registrar" class="btn btn-primary">

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
                <h4 class="modal-title" id="defaultModalLabel">Editar Material</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=inventarios" method="POST">
                    <input type="hidden" name="update_id" id="update_id" value="">
                    <div class="form-group">
                        <label for="update_nombre">Nombre</label>
                        <input type="text" name="update_nombre" id="update_nombre" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_proveedor">Proveedor</label>
                        <input type="text" name="update_proveedor" id="update_proveedor" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_descripcion">Descripcion</label>
                        <input type="text" name="update_descripcion" id="update_descripcion" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_precio">Precio</label>
                        <input type="number" name="update_precio" id="update_precio" class="form-control" required="required" min="1" max="99999">
                    </div>

                    <div class="form-group">
                        <label for="update_instalacion">Precio de Instalacion </label>
                        <input type="number" name="update_instalacion" id="update_instalacion" class="form-control" required="required" min="1" max="99999">
                    </div>

                    <div class="form-group">
                        <label for="update_venta">Precio de venta en mano </label>
                        <input type="number" name="update_venta" id="update_venta" class="form-control" required="required" min="1" max="99999">
                    </div>

                    <div class="form-group">
                        <label for="update_stock">Cantidad Actual</label>
                        <input type="number" name="update_stock" id="update_stock" class="form-control" required="required" min="1" max="999" readonly>
                    </div>

                    <input type="submit" name="update_inventario" id="update_inventario" Value="Actualizar" class="btn btn-primary">

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
                <form action="panel.php?modulo=inventarios" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este material?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_inventario" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>