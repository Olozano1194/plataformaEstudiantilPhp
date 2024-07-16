
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Cambio Contraseña</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("Error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("Error"); ?></p>                                
                             </div>
                        <?php endif;?> 
                        <form action="<?php echo base_url();?>administrador/usuarios/updatePassword" method="POST" class="form-horizontal">
                            <input type="hidden" name="idusuario" value="<?php echo $usuario->id?>">  
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("passwordActual") !=false ? 'has-error':'';?>">
                                    <label for="passwordActual">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="passwordActual" name="passwordActual" value="<?php echo set_value("passwordActual");?>">
                                    <?php echo form_error("passwordActual","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("nuevoPassword") !=false ? 'has-error':'';?>">
                                    <label for="nuevoPassword">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="nuevoPassword" name="nuevoPassword" value="<?php echo set_value("nuevoPassword");?>">
                                    <?php echo form_error("nuevoPassword","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("repetirPassword") !=false ? 'has-error':'';?>">
                                    <label for="repetirPassword">Repetir Contraseña</label>
                                    <input type="password" class="form-control" id="repetirPassword" name="repetirPassword" value="<?php echo set_value("repetirPassword");?>">
                                    <?php echo form_error("repetirPassword","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-warning btn-flat">Actualizar</button>
                                </div>
                            </div>
                        </form>
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