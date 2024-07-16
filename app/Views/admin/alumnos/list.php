 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Alumnos
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
                            <a href="<?php echo base_url();?>registrar/alumnos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Alumno</a>
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
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Acudiente</th>
                                    <th>Celular</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($alumnos)):?>
                                    <?php foreach($alumnos as $alumnos):?>
                                        <tr>
                                            <td><?php echo $alumnos->id;?></td>
                                            <td><?php echo $alumnos->nombres;?></td>
                                            <td><?php echo $alumnos->email;?></td>
                                            <td><?php echo $alumnos->celular;?></td>
                                            <td><?php echo $alumnos->usuario;?></td>
                                            <td></td>
                                            <td><?php echo $alumnos->nomAcudiente;?></td>
                                            <td><?php echo $alumnos->celAcudiente;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>registrar/alumnos/edit/<?php echo $alumnos->id;?>" title="Actualizar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>registrar/alumnos/disable/<?php echo $alumnos->usuario_id;?>" title="Desactivar Usuario" class="btn btn-info btn-disable"><span class="fa fa-user-times"></span></a>
                                                    <a href="<?php echo base_url();?>registrar/alumnos/delete/<?php echo $alumnos->id;?>" title="Eliminar" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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

<!-- /.inicio pantalla modal-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center">Información Personal de Planta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-rigt" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /. fin pantalla modal -->