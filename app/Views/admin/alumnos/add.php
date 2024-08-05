
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Alumno
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
                        <?php if(session()->getFlashdata("Error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php session()->getFlashdata("Error"); ?></p>                                
                             </div>
                        <?php endif;?> 
                        <form action="<?php echo base_url('registrar/alumnos/store'); ?>" method="POST" class="form-horizontal">
                            <!--Nombres completos  -->
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="fechaIngreso" name="fechaIngreso" value="<?php echo $fechaIngreso; ?>">
                                <div class="col-md-6 <?php echo (isset($validation) && $validation->hasError('nombres')) ? 'has-error' : ''; ?>">
                                    <label for="nombres">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php old('nombres'); ?>">
                                    <?php if (isset($validation)) { echo $validation->getError('nombres', '<span class="help-block">', '</span>'); } ?>
                                </div>
                            </div>
                            <!-- Tipo de documento  -->
                            <div class="form-group">
                                <div class="col-md-4 <?php echo (isset($validation) && $validation->hasError('tipoDocumento')) ? 'has-error' : ''; ?>">
                                    <label for="tipoDocumento">Tipo de Documento:</label>
                                    <select name="tipoDocumento" id="tipoDocumento" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($tipoDocumento as $tipoDoc) : ?>
                                            <option value="<?= $tipoDoc->id ?>" <?= old('tipodocumento_id') == $tipoDoc->id ? 'selected' : '' ?>>
                                            <?= $tipoDoc->sigla . " - " . $tipoDoc->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($validation)) { echo $validation->getError('tipoDocumento', '<span class="help-block">', '</span>'); } ?>
                                </div>
                                <!-- numero de documento -->
                                <div class="col-md-4 <?php echo (isset($validation) && $validation->hasError('num_documento')) ? 'has-error' : ''; ?>">
                                    <label for="num_documento">Numero de Documento:</label>
                                    <input type="text" class="form-control" id="num_documento" name="num_documento" value="<?= old('num_documento'); ?>">
                                    <?php if (isset($validation)) { echo $validation->getError('num_documento', '<span class="help-block">', '</span>'); } ?>
                                </div>
                            </div>
                            <!-- Genero -->
                            <div class="form-group">
                                <div class="col-md-4 <?php session("genero") ? 'has-error':'';?>">
                                    <label for="genero">Genero:</label>
                                    <select name="genero" id="genero" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($genero as $gen):?>
                                            <option value="<?= $gen->id ?>"<?= old("genero")== $gen->id ? 'selected' : '' ?>><?= $gen->nombre;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php session("genero","<span class='help-block'>","</span>");?>
                                </div>

                                <div class="col-md-4 <?php session("grupoSanguineo") ? 'has-error':'';?>">
                                    <label for="grupoSanguineo">Grupo Sanguineo:</label>
                                    <select name="grupoSanguineo" id="grupoSanguineo" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($grupoSanguineo as $gs):?>
                                            <option value="<?= $gs->id ?>"<?= old("grupoSanguineo") == $gs->id ? 'selected' : '' ?>><?= $gs->descripcion;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php session("grupoSanguineo","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Fecha de nacimiento -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("fecha_nacimiento") ? 'has-error':'';?>">
                                    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= old("fecha_nacimiento");?>">
                                    <?= session("fecha_nacimiento","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("email") ? 'has-error':'';?>">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= old("email");?>">
                                    <?= session("email","<span class='help-block'>","</span>");?>
                                </div>
                                <!-- Celular -->
                                <div class="col-md-4 <?= session("celular") ? 'has-error':'';?>">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?= old("celular");?>">
                                    <?= session("celular","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Dirección -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("direccion") ? 'has-error':'';?>">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= old("direccion");?>">
                                    <?= session("direccion","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Foto -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("foto") ? 'has-error':'';?>">
                                    <label for="foto">Foto:</label>
                                    <input type="file" id="foto" name="foto" value="<?= old("foto");?>">
                                    <?= session("foto","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Acudiente -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("acudiente") ? 'has-error':'';?>">
                                    <label for="acudiente">Acudiente:</label>
                                    <select name="acudiente" id="acudiente" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($acudiente as $acu):?>
                                            <option value="<?= $acu->id ?>" <?= old("acudiente") == $acu->id ? 'selected' : '' ?>> <?= $acu->nombres?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php if (session('acudiente')): ?>
                                        <span class="help-block"><?= session('acudiente') ?></span>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <!-- username -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session('username') ? 'has-error' : ''; ?>">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
                                    
                                </div>
                                <div class="col-md-4 <?= session('password') ? 'has-error' : ''; ?>">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>">
                                    <?php if (session('password')): ?>
                                        <span class="help-block"><?= session('password') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div> 
                            <!-- Confirmar Password -->
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