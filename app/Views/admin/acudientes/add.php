
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Acudiente
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
                                <p><i class="icon fa fa-ban"></i><?= session()->getFlashdata("Error"); ?></p>                                
                             </div>
                        <?php endif;?> 
                        <form action="<?php echo base_url();?>registrar/acudientes/store" method="POST" class="form-horizontal">
                            <!-- Nombre completo -->
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="fechaIngreso" name="fechaIngreso" value="<?php echo $fechaIngreso; ?>">
                                <div class="col-md-6 <?php echo (isset($validation) && $validation->hasError('nombres')) ? 'has-error' : ''; ?>">
                                    <label for="nombres">Nombre Completo:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php old('nombres'); ?>">
                                    <?php if (isset($validation)) { echo $validation->getError('nombres', '<span class="help-block">', '</span>'); } ?>
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
                            </div>
                            <!-- Profesion -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("profesion") ? 'has-error':'';?>">
                                    <label for="profesion">Profesion:</label>
                                    <input type="text" class="form-control" id="profesion" name="profesion" value="<?php old("profesion");?>">
                                    <?= session("profesion","<span class='help-block'>","</span>");?>
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
                            <!-- Direccion -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("direccion") ? 'has-error':'';?>">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php old("direccion");?>">
                                    <?= session("direccion","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Foto  -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("foto") ? 'has-error':'';?>">
                                    <label for="foto">Foto:</label>
                                    <input type="file" id="foto" name="foto" value="<?= old("foto");?>">
                                    <?= session("foto","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Username -->
                            <div class="form-group">
                                <div class="col-md-4 <?= session("username") ? 'has-error':'';?>">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php old("username");?>">
                                    <?= session("username","<span class='help-block'>","</span>");?>
                                </div>
                                <!-- Password -->
                                <div class="col-md-4 <?= session("password") ? 'has-error':'';?>">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php old("password");?>">
                                    <?= session("password","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                            <!-- Btn Add  -->
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