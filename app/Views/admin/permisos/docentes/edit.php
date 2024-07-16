
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Docente
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
                        <form action="<?php echo base_url();?>registrar/docentes/update" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $docente->id;?>" name="idDocente">
                            <input type="hidden" value="<?php echo $docente->usuario_id;?>" name="idUsuario">
                            <div class="form-group">
                                <div class="col-md-6 <?php echo form_error("nombres") !=false ? 'has-error':'';?>">
                                    <label for="nombres ">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo form_error("nombres") !=false ? set_value("nombres") : $docente->nombres;?>">
                                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("tipoDocumento") !=false ? 'has-error':'';?>">
                                    <label for="tipoDocumento">Tipo de Documento:</label>
                                    <select name="tipoDocumento" id="tipoDocumento" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("tipoDocumento") != false || set_value("tipoDocumento") != false): ?>
                                            <?php foreach($tipoDocumento as $tipoDocumento):?>
                                                <option value="<?php echo $tipoDocumento->id?>"<?php echo set_select("tipoDocumento",$tipoDocumento->id)?>><?php echo $tipoDocumento->sigla ." - ". $tipoDocumento->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <?php foreach($tipoDocumento as $tipoDocumento):?>
                                                <option value="<?php echo $tipoDocumento->id?>"<?php echo $tipoDocumento->id == $docente->tipodocumento_id ? 'selected':'';?>><?php echo $tipoDocumento->sigla ." - ". $tipoDocumento->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("tipoDocumento","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("num_documento") !=false ? 'has-error':'';?>">
                                    <label for="num_documento">Numero de Documento:</label>
                                    <input type="text" class="form-control" id="num_documento" name="num_documento" value="<?php echo form_error("num_documento") !=false ? set_value("num_documento") : $docente->num_documento;?>">
                                    <?php echo form_error("num_documento","<span class='help-block'>","</span>");?>
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
                                                <option value="<?php echo $genero->id?>"<?php echo $genero->id == $docente->genero_id ? 'selected':'';?>><?php echo $genero->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("genero","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("profesion") !=false ? 'has-error':'';?>">
                                    <label for="profesion">Profesión:</label>
                                    <input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo form_error("profesion") !=false ? set_value("profesion") : $docente->profesion;?>">
                                    <?php echo form_error("profesion","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("salario") !=false ? 'has-error':'';?>">
                                    <label for="salario">Salario:</label>
                                    <input type="text" class="form-control" id="salario" name="salario" value="<?php echo form_error("salario") !=false ? set_value("salario") : $docente->salario;?>">
                                    <?php echo form_error("salario","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("fecha_nacimiento") !=false ? 'has-error':'';?>">
                                    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo form_error("fecha_nacimiento") !=false ? set_value("fecha_nacimiento") : $docente->fecha_nacimiento;?>">
                                    <?php echo form_error("fecha_nacimiento","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("email") !=false ? 'has-error':'';?>">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo form_error("email") !=false ? set_value("email") : $docente->email;?>">
                                    <?php echo form_error("email","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("celular") !=false ? 'has-error':'';?>">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo form_error("celular") !=false ? set_value("celular") : $docente->celular;?>">
                                    <?php echo form_error("celular","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("direccion") !=false ? 'has-error':'';?>">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo form_error("direccion") !=false ? set_value("direccion") : $docente->direccion;?>">
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
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo form_error("username") !=false ? set_value("username") : $docente->usuario;?>">
                                    <?php echo form_error("username","<span class='help-block'>","</span>");?>
                                </div>
                                <div class="col-md-4 <?php echo form_error("password") !=false ? 'has-error':'';?>">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo form_error("password") !=false ? set_value("password") : $docente->contraseña;?>">
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