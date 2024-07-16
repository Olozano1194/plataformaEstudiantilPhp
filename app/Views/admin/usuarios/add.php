
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Nuevo</small>
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
                        <form action="<?php echo base_url();?>administrador/usuarios/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("nombres") !=false ? 'has-error':'';?>">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo set_value("nombres");?>">
                                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("apellidos") !=false ? 'has-error':'';?>">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo set_value("apellidos");?>">
                                    <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("username") !=false ? 'has-error':'';?>">
                                    <label for="username">Usuario</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value("username");?>">
                                    <?php echo form_error("username","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("password") !=false ? 'has-error':'';?>">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value("password");?>">
                                    <?php echo form_error("password","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("rol") !=false ? 'has-error':'';?>">
                                    <label for="rol">Rol</label>
                                    <select name="rol" id="rol" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach($roles as $rol):?>
                                        <option value="<?php echo $rol->id?>"<?php echo set_select("rol",$rol->id)?>><?php echo $rol->nombre;?></option>
                                    <?php endforeach;?> 
                                    </select>
                                    <?php echo form_error("rol","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("telefono") !=false ? 'has-error':'';?>">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value("telefono");?>">
                                    <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("email") !=false ? 'has-error':'';?>">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value("email");?>">
                                    <?php echo form_error("email","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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