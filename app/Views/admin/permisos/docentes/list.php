 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Docentes
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
                        <a href="<?php echo base_url();?>registrar/docentes/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Docente</a>
                    </div>
                </div>
                <hr>
                <?php if($this->session->flashdata("Registrado")):?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check-circle"></i><?php echo $this->session->flashdata("Registrado"); ?></p>                                
                    </div>
                    <hr>
                <?php endif;?> 
                <?php if($this->session->flashdata("Actualizado")):?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-check-circle"></i><?php echo $this->session->flashdata("Actualizado"); ?></p>                                
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
                                <?php if(!empty($docentes)):?>
                                    <?php foreach($docentes as $docentes):?>
                                        <tr>
                                            <td><?php echo $docentes->id;?></td>
                                            <td><?php echo $docentes->nombres;?></td>
                                            <td><?php echo $docentes->email;?></td>
                                            <td><?php echo $docentes->celular;?></td>
                                            <td><?php echo $docentes->profesion;?></td>
                                            <td><?php echo $docentes->usuario;?></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>registrar/docentes/edit/<?php echo $docentes->id;?>" title="Actualizar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>registrar/docentes/disable/<?php echo $docentes->usuario_id;?>" title="Desactivar Usuario" class="btn btn-info btn-disable"><span class="fa fa-user-times"></span></a>
                                                    <a href="<?php echo base_url();?>registrar/docentes/delete/<?php echo $docentes->id;?>" title="Eliminar" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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

