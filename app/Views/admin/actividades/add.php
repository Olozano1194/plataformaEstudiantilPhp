<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Agregar
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
                        <form action="<?php echo base_url();?>Actividades/Actividades/store" method="POST" class="form-horizontal">

                            <div class="form-group">
                             <div class="col-md-6 <?php echo form_error("nombre") !=false ? 'has-error':'';?>">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value("nombre");?>">
                                    <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-6 <?php echo form_error("descripcion") !=false ? 'has-error':'';?>">
                                    <label for="descripcion">Descripción:</label>
                                    <input type="text" class="form-control" id="espacio_academico" name="descripcion" value="<?php echo set_value("descripcion");?>">
                                    <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                               
                                <div class="col-md-6 <?php echo form_error("archivo_adjunto") !=false ? 'has-error':'';?>">
                                    <label for="archivo_adjunto">Archivo Adjunto:</label>
                                    <input type="file" class="form-control" id="archivo_adjunto" name="archivo_adjunto" value="<?php echo set_value("archivo_adjunto");?>">
                                    <?php echo form_error("archivo_adjunto","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                              <div class="form-group">
                                
                                <div class="col-md-6 <?php echo form_error("fecha_inicio") !=false ? 'has-error':'';?>">
                                    <label for="fecha_inicio">Fecha de Inicio:</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo set_value("fecha_inicio");?>">
                                    <?php echo form_error("fecha_inicio","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                              <div class="form-group">
                                
                                <div class="col-md-6 <?php echo form_error("fecha_fin") !=false ? 'has-error':'';?>">fecha_fin
                                    <label for="fecha_fin">Fecha Final:</label>
                                    <input type="date" class="form-control" id="espacio_academico" name="fecha_fin" value="<?php echo set_value("fecha_fin");?>">
                                    <?php echo form_error("fecha_fin","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("material") !=false ? 'has-error':'';?>">
                                    <label for="material">Material de Apoyo:</label>
                                    <select name="material" id="material" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($material as $material):?>
                                            <option value="<?php echo $material->id?>"<?php echo set_select("material",$material->id)?>><?php echo $material->nombre;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("material","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("docente") !=false ? 'has-error':'';?>">
                                    <label for="docente">Docentes:</label>
                                    <select name="docente" id="docente" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($docente as $docente):?>
                                            <option value="<?php echo $docente->id?>"<?php echo set_select("docente",$docente->id)?>><?php echo $docente->nombres;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("docente","<span class='help-block'>","</span>");?>
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