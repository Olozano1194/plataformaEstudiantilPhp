
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
                        <?php if(session()->getFlashdata("Error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo session()->getFlashdata("Error"); ?></p>                                
                             </div>
                        <?php endif;?> 
                        <form action="<?php echo base_url();?>registrar/acudientes/update" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $acudiente->id;?>" name="idAcudiente">
                            <input type="hidden" value="<?php echo $acudiente->usuario_id;?>" name="idUsuario">
                            <!-- Nombre Completo -->
                            <div class="form-group">
                                <div class="col-md-6 <?php echo (isset($validation) && $validation->hasError('nombres')) ? 'has-error' : ''; ?>">
                                    <label for="nombres ">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo old("nombres"), isset($acudiente->nombres) ? $acudiente->nombres : '';?>">
                                    <?php if ($validation->getError('nombres')) : ?>
                                            <span class="help-block"><?php echo $validation->getError('nombres'); ?></span>
                                    <?php endif; ?>
                                  
                                </div>
                            </div> 
                              <!-- Genero  -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("genero") ? 'has-error' : '';?>">
                                    <label for="genero">Género:</label>
                                    <select name="genero" id="genero" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($genero as $gen):?>
                                            <option value="<?= $gen->id ?>"
                                                <?= old('genero') == $gen->id ? 'selected' : (isset($acudiente->genero_id) && $acudiente->genero_id == $gen->id ? 'selected' : '') ?>>
                                                <?= $gen->nombre ?>
                                            </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php if(session("genero")): ?>
                                        <span class="help-block"><?= session("genero"); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Profesion -->
                            <div class="form-group">
                                <div class="col-md-4 <?php session("profesion") ? 'has-error':'';?>">
                                    <label for="profesion">Profesión:</label>
                                    <input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo old("profesion"), isset($acudiente->profesion) ? $acudiente->profesion : '';?>">
                                    <?php if ($validation->getError('profesion')) : ?>
                                            <span class="help-block"><?php echo $validation->getError('profesion'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <div class="col-md-4 <?php session("email") ? 'has-error':'';?>">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo old("email"), isset($acudiente->email) ? $acudiente->email : '';?>">
                                    <?php if ($validation->getError('email')) : ?>
                                            <span class="help-block"><?php echo $validation->getError('email'); ?></span>
                                    <?php endif; ?>
                                </div>
                                <!-- Celular -->
                                <div class="col-md-4 <?php session("celular") ? 'has-error':'';?>">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo old("celular"), isset($acudiente->celular) ? $acudiente->celular : '';?>">
                                    <?php if ($validation->getError('celular')) : ?>
                                            <span class="help-block"><?php echo $validation->getError('celular'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Direccion -->
                            <div class="form-group">
                                <div class="col-md-4 <?php session("direccion") ? 'has-error':'';?>">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo old("direccion"), isset($acudiente->direccion) ?$acudiente->direccion : '';?>">
                                    <?php if ($validation->getError('direccion')) : ?>
                                            <span class="help-block"><?php echo $validation->getError('direccion'); ?></span>
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
                            <!-- Username -->
                            <div class="form-group">
                                <div class="col-md-4 <?= isset($validation) && $validation->hasError("username") ? 'has-error':'';?>">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= old("username", $acudiente->username); ?>">
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
                            <!-- btn update -->
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