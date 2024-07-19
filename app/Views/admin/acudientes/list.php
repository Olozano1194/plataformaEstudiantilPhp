 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Acudientes
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
                        <a href="<?php echo base_url();?>registrar/acudientes/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Acudiente</a>
                    </div>
                </div>
                <hr>
                <?php if(session()->getFlashdata("Registrado")):?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check-circle"></i><?php session()->getFlashdata("Registrado"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?> 
                <?php if(session()->getFlashdata("Actualizado")):?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check-circle"></i><?php session()->getFlashdata("Actualizado"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Completo</th>
                                    <th>Email</th>
                                    <th>Celular</th>
                                    <th>Profesión</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($acudientes)):?>
                                    <?php foreach($acudientes as $acu):?>
                                        <tr>
                                            <td><?= $acu->id;?></td>
                                            <td><?= $acu->nombres;?></td>
                                            <td><?= $acu->email;?></td>
                                            <td><?= $acu->celular;?></td>
                                            <td><?= $acu->profesion;?></td>
                                            <td><?= $acu->usuario;?></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>registrar/acudientes/edit/<?php echo $acu->id;?>" title="Actualizar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>registrar/acudientes/disable/<?php echo $acu->usuario_id;?>" title="Desactivar Usuario" class="btn btn-info btn-disable"><span class="fa fa-user-times"></span></a>
                                                    <a href="<?php echo base_url();?>registrar/acudientes/delete/<?php echo $acu->id;?>" title="Eliminar" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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

