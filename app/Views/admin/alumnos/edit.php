
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Alumno
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
                        <?php if(session()->getFlashdata("Error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo session()->getFlashdata("Error"); ?></p>                                
                             </div>
                        <?php endif;?> 

                        <form action="<?php echo base_url();?>registrar/alumnos/update" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $alumno->id;?>" name="idAlumno">
                            <input type="hidden" value="<?php echo $alumno->usuario_id;?>" name="idUsuario">
                            <!-- Nombre completo -->
                            <div class="form-group">
                                <div class="col-md-6 <?= isset($validation) && $validation->hasError("nombres") ? 'has-error':'';?>">
                                    <label for="nombres ">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?= old("nombres", $alumno->nombres); ?>">
                                    <?php if (isset($validation) && $validation->hasError('nombres')) : ?>
                                        <span class="help-block"><?= $validation->getError('nombres'); ?></span>
                                    <?php endif; ?>
                                </div>   
                            </div>
                            <!-- Tipo de documento -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError('tipoDocumento') ? 'has-error' : ''; ?>">
                                    <label for="tipoDocumento">Tipo de Documento:</label>
                                    <select name="tipoDocumento" id="tipoDocumento" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($tipoDocumento as $doc) : ?>
                                            <option value="<?= $doc->id ?>" <?= old('tipoDocumento', $alumno->tipodocumento_id) == $doc->id ? 'selected' : ''; ?>>
                                                <?= $doc->sigla . " - " . $doc->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($validation) && $validation->hasError('tipoDocumento')) : ?>
                                        <span class="help-block"><?= $validation->getError('tipoDocumento'); ?></span>
                                    <?php endif; ?>
                                </div>
                                <!-- Numero de documento -->
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("num_documento") ? 'has-error':'';?>">
                                    <label for="num_documento">Numero de Documento:</label>
                                    <input type="text" class="form-control" id="num_documento" name="num_documento" value="<?= old("num_documento", $alumno->num_documento); ?>">
                                    <?php if (isset($validation) && $validation->hasError('num_documento')) : ?>
                                        <span class="help-block"><?= $validation->getError('num_documento'); ?></span>
                                    <?php endif; ?>
                                </div>  
                            </div>
                            <!-- Genero -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError('genero') ? 'has-error' : ''; ?>">
                                    <label for="genero">Genero:</label>
                                    <select name="genero" id="genero" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($genero as $gen) : ?>
                                            <option value="<?= $gen->id ?>" <?= old('genero', $alumno->genero_id) == $gen->id ? 'selected' : ''; ?>>
                                                <?= $gen->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($validation) && $validation->hasError('genero')) : ?>
                                        <span class="help-block"><?= $validation->getError('genero'); ?></span>
                                    <?php endif; ?>
                                </div>
                                 <!-- Grupo Sanguineo -->
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("grupoSanguineo") ? 'has-error':'';?>">
                                    <label for="grupoSanguineo">Grupo Sanguineo:</label>
                                    <select name="grupoSanguineo" id="grupoSanguineo" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($grupoSanguineo as $grupo): ?>
                                            <option value="<?= $grupo->id ?>" <?= old('grupoSanguineo', $alumno->gruposanguineo_id) == $grupo->id ? 'selected' : ''; ?>>
                                                <?= $grupo->descripcion; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($validation) && $validation->hasError('grupoSanguineo')) : ?>
                                        <span class="help-block"><?= $validation->getError('grupoSanguineo'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Fecha de Nacimiento -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("fecha_nacimiento") ? 'has-error':'';?>">
                                    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= old("fecha_nacimiento", $alumno->fecha_nacimiento); ?>">
                                    <?php if(isset($validation) && $validation->hasError("fecha_nacimiento")) : ?>
                                        <span class='help-block'><?= $validation->getError('fecha_nacimiento'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("email") ? 'has-error':'';?>">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= old("email", $alumno->email); ?>">
                                    <?php if (isset($validation) && $validation->hasError('email')) : ?>
                                        <span class="help-block"><?= $validation->getError('email'); ?></span>
                                    <?php endif; ?>
                                </div>
                                <!-- Celular -->
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("celular") ? 'has-error':'';?>">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?= old("celular", $alumno->celular); ?>">
                                    <?php if (isset($validation) && $validation->hasError('celular')) : ?>
                                        <span class="help-block"><?= $validation->getError('celular'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Direccion -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("direccion") ? 'has-error':'';?>">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= old("direccion", $alumno->direccion); ?>">
                                    <?php if (isset($validation) && $validation->hasError('direccion')) : ?>
                                        <span class="help-block"><?= $validation->getError('direccion'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Foto -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("foto") ? 'has-error':'';?>">
                                    <label for="foto">Foto:</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                    <?php if (isset($validation) && $validation->hasError('foto')) : ?>
                                        <span class="help-block"><?= $validation->getError('foto'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Acudiente -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError('acudiente') ? 'has-error' : ''; ?>">
                                    <label for="acudiente">Acudiente:</label>
                                    <select name="acudiente" id="acudiente" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($acudiente as $acud) : ?>
                                            <option value="<?= $acud->id ?>" <?= old('acudiente', $alumno->acudiente_id) == $acud->id ? 'selected' : ''; ?>>
                                                <?= $acud->nombres; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($validation) && $validation->hasError('acudiente')) : ?>
                                        <span class="help-block"><?= $validation->getError('acudiente'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("username") ? 'has-error':'';?>">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= old("username", $alumno->usuario); ?>">
                                    <?php if (isset($validation) && $validation->hasError('username')) : ?>
                                        <span class="help-block"><?= $validation->getError('username'); ?></span>
                                    <?php endif; ?>
                                </div>

                                <!-- Password -->
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("password") ? 'has-error':'';?>">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <?php if (isset($validation) && $validation->hasError('password')) : ?>
                                        <span class="help-block"><?= $validation->getError('password'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Btn Update -->
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