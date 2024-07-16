
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Actualizar</small>
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
                        <form action="<?php echo base_url();?>administrador/usuarios/update" method="POST" class="form-horizontal">
                            <input type="hidden" name="idusuario" value="<?php echo $usuario->id?>">  
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("nombres") !=false ? 'has-error':'';?>">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo form_error("nombres") !=false ? set_value("nombres") : $usuario->nombres;?>">
                                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("apellidos") !=false ? 'has-error':'';?>">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo form_error("apellidos") !=false ? set_value("apellidos") : $usuario->apellidos;?>">
                                    <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("username") !=false ? 'has-error':'';?>">
                                    <label for="username">Usuario</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo form_error("username") !=false ? set_value("username") : $usuario->username;?>">
                                    <?php echo form_error("username","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group <?php echo form_error("rol") !=false ? 'has-error':'';?>">
                                <div class="col-md-4">
                                    <label for="rol">Rol</label>
                                    <select name="rol" id="rol" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php if(form_error("rol") != false || set_value("rol") != false): ?>
                                        <?php foreach($roles as $rol):?>
                                            <option value="<?php echo $rol->id?>"<?php echo set_select("rol",$rol->id)?>><?php echo $rol->nombre;?></option>
                                        <?php endforeach;?>
                                    <?php else:?>
                                    <?php foreach($roles as $rol):?>
                                        <option value="<?php echo $rol->id?>"<?php echo $rol->id == $usuario->rol_id?"selected":"";?>><?php echo $rol->nombre;?></option>
                                    <?php endforeach;?> 
                                    <?php endif;?>
                                    </select>
                                    <?php echo form_error("rol","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("telefono") !=false ? 'has-error':'';?>">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo form_error("telefono") !=false ? set_value("telefono") : $usuario->telefono;?>">
                                    <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("email") !=false ? 'has-error':'';?>">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo form_error("email") !=false ? set_value("email") : $usuario->email;?>">
                                    <?php echo form_error("email","<span class='help-block'>","</span>");?>
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