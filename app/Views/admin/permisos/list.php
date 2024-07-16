 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Permisos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                   
                            <a href="<?php echo base_url();?>administrador/permisos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Permiso</a>
                      
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                     <th>#</th>
                                    <th>Menu</th>
                                    <th>Rol</th>
                                    <th>Leer</th>
                                    <th>Insertar</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($getPermisos)):?>
                                    <?php foreach($getPermisos as $getPermiso):?>
                                        <tr>
                                            <td><?php echo $getPermiso->menu;?></td>
                                            <td><?php echo $getPermiso->rol;?></td>
                                            <td>
                                                <?php if($getPermiso->leer == 0):?>
                                                    <span class="fa fa-times"></span>
                                                <?php else:?>
                                                <span class="fa fa-check"></span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?php if($getPermiso->insertar == 0):?>
                                                    <span class="fa fa-times"></span>
                                                <?php else:?>
                                                <span class="fa fa-check"></span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?php if($getPermiso->actualizar == 0):?>
                                                    <span class="fa fa-times"></span>
                                                <?php else:?>
                                                <span class="fa fa-check"></span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?php if($getPermiso->eliminar == 0):?>
                                                    <span class="fa fa-times"></span>
                                                <?php else:?>
                                                <span class="fa fa-check"></span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                  
                                                        <a href="<?php echo base_url()?>administrador/permisos/edit/<?php echo $getPermiso->id;?>" title="Actualizar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                   
                                                   
                                                        <a href="<?php echo base_url();?>administrador/permisos/delete/<?php echo $getPermiso->id;?>" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                                    
                                                </div>
                                            </td>
                                        </tr> 
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>            
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
