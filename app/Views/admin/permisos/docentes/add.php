
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Docente
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
                        <form action="<?php echo base_url();?>registrar/docentes/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="fechaIngreso" name="fechaIngreso" value="<?php echo $fechaIngreso?>">
                                <div class="col-md-6 <?php echo form_error("nombres") !=false ? 'has-error':'';?>">
                                    <label for="nombres">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo set_value("nombres");?>">
                                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("tipoDocumento") !=false ? 'has-error':'';?>">
                                    <label for="tipoDocumento">Tipo de Documento:</label>
                                    <select name="tipoDocumento" id="tipoDocumento" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($tipoDocumento as $tipoDocumento):?>
                                            <option value="<?php echo $tipoDocumento->id?>"<?php echo set_select("tipoDocumento",$tipoDocumento->id)?>><?php echo $tipoDocumento->sigla ." - ". $tipoDocumento->nombre;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("tipoDocumento","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("num_documento") !=false ? 'has-error':'';?>">
                                    <label for="num_documento">Numero de Documento:</label>
                                    <input type="text" class="form-control" id="num_documento" name="num_documento" value="<?php echo set_value("num_documento");?>">
                                    <?php echo form_error("num_documento","<span class='help-block'>","</span>");?>
                                </div>    
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("genero") !=false ? 'has-error':'';?>">
                                    <label for="genero">Genero:</label>
                                    <select name="genero" id="genero" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($genero as $genero):?>
                                            <option value="<?php echo $genero->id?>"<?php echo set_select("genero",$genero->id)?>><?php echo $genero->nombre;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("genero","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("profesion") !=false ? 'has-error':'';?>">
                                    <label for="profesion">Profesión:</label>
                                    <input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo set_value("profesion");?>">
                                    <?php echo form_error("profesion","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("salario") !=false ? 'has-error':'';?>">
                                    <label for="salario">Salario:</label>
                                    <input type="text" class="form-control" id="salario" name="salario" value="<?php echo set_value("salario");?>">
                                    <?php echo form_error("salario","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("fecha_nacimiento") !=false ? 'has-error':'';?>">
                                    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo set_value("fecha_nacimiento");?>">
                                    <?php echo form_error("fecha_nacimiento","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("email") !=false ? 'has-error':'';?>">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value("email");?>">
                                    <?php echo form_error("email","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("celular") !=false ? 'has-error':'';?>">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo set_value("celular");?>">
                                    <?php echo form_error("celular","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("direccion") !=false ? 'has-error':'';?>">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value("direccion");?>">
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
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value("username");?>">
                                    <?php echo form_error("username","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("password") !=false ? 'has-error':'';?>">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value("password");?>">
                                    <?php echo form_error("password","<span class='help-block'>","</span>");?>
                                </div>
                            </div>                  
                            <div class="form-group">
                                <div class="col-md-12">
                                   <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Guardar</button>
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