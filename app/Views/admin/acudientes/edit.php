
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Acudiente
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
                        <form action="<?php echo base_url();?>registrar/acudientes/update" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $acudiente->id;?>" name="idAcudiente">
                            <input type="hidden" value="<?php echo $acudiente->usuario_id;?>" name="idUsuario">
                            <div class="form-group">
                                <div class="col-md-6 <?php echo form_error("nombres") !=false ? 'has-error':'';?>">
                                    <label for="nombres ">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo form_error("nombres") !=false ? set_value("nombres") : $acudiente->nombres;?>">
                                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("genero") !=false ? 'has-error':'';?>">
                                    <label for="genero">Genero:</label>
                                    <select name="genero" id="genero" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("genero") != false || set_value("genero") != false): ?>
                                            <?php foreach($genero as $genero):?>
                                                <option value="<?php echo $genero->id?>"<?php echo set_select("genero",$genero->id)?>><?php echo $genero->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <?php foreach($genero as $genero):?>
                                                <option value="<?php echo $genero->id?>"<?php echo $genero->id == $acudiente->genero_id ? 'selected':'';?>><?php echo $genero->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("genero","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("profesion") !=false ? 'has-error':'';?>">
                                    <label for="profesion">Profesión:</label>
                                    <input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo form_error("profesion") !=false ? set_value("profesion") : $acudiente->profesion;?>">
                                    <?php echo form_error("profesion","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("email") !=false ? 'has-error':'';?>">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo form_error("email") !=false ? set_value("email") : $acudiente->email;?>">
                                    <?php echo form_error("email","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("celular") !=false ? 'has-error':'';?>">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo form_error("celular") !=false ? set_value("celular") : $acudiente->celular;?>">
                                    <?php echo form_error("celular","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("direccion") !=false ? 'has-error':'';?>">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo form_error("direccion") !=false ? set_value("direccion") : $acudiente->direccion;?>">
                                    <?php echo form_error("direccion","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("foto") !=false ? 'has-error':'';?>">
                                    <label for="foto">Foto:</label>
                                    <input type="file" id="foto" name="foto" value="<?php echo set_value("foto");?>">
                                    <?php echo form_error("foto","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("username") !=false ? 'has-error':'';?>">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo form_error("username") !=false ? set_value("username") : $acudiente->usuario;?>">
                                    <?php echo form_error("username","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("password") !=false ? 'has-error':'';?>">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo form_error("password") !=false ? set_value("password") : $acudiente->contraseña;?>">
                                    <?php echo form_error("password","<span class='help-block'>","</span>");?>
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Actualizar</button>
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