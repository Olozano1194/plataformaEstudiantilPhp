<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Editar
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
                        <form action="<?php echo base_url();?>Materias/materias/update" method="POST" class="form-horizontal">
                             <input type="hidden" value="<?php echo $materias->id;?>" name="idMateria">

                            <div class="form-group">
                             <div class="col-md-6 <?php echo form_error("Area") !=false ? 'has-error':'';?>">
                                    <label for="Area">Area:</label>
                                    <input type="text" class="form-control" id="Area" name="Area" value="<?php echo form_error("Area") !=false ? set_value("Area") : $materias->Area;?>">
                                    <?php echo form_error("Area","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-6 <?php echo form_error("espacio_academico") !=false ? 'has-error':'';?>">
                                    <label for="espacio_academico">Espacio Academico:</label>
                                    <input type="text" class="form-control" id="espacio_academico" name="espacio_academico" value="<?php echo form_error("espacio_academico") !=false ? set_value("espacio_academico") : $materias->espacio_academico;?>">
                                    <?php echo form_error("espacio_academico","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                               
                                <div class="col-md-6 <?php echo form_error("Inten_Hora_Sema") !=false ? 'has-error':'';?>">
                                    <label for="Inten_Hora_Sema">Intensidad Horaria Semanal:</label>
                                    <input type="text" class="form-control" id="Inten_Hora_Sema" name="Inten_Hora_Sema" value="<?php echo form_error("Inten_Hora_Sema") !=false ? set_value("Inten_Hora_Sema") : $materias->Inten_Hora_Sema;?>">
                                    <?php echo form_error("Inten_Hora_Sema","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 <?php echo form_error("grados") !=false ? 'has-error':'';?>">
                                    <label for="grados">Grados:</label>
                                    <select name="grados" id="grados" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php if(form_error("grados") != false || set_value("grados") != false): ?>
                                        <?php foreach($grados as $grados):?>
                                            <option value="<?php echo $grados->id?>"<?php echo set_select("grados",$grados->id)?>><?php echo $grados->nombre;?></option>
                                        <?php endforeach;?>
                                         <?php else:?>
                                            <?php foreach($grados as $grados):?>
                                                <option value="<?php echo $grados->id?>"<?php echo $grados->id == $materias->grado_id ? 'selected':'';?>><?php echo $grados->nombre;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                    <?php echo form_error("grados","<span class='help-block'>","</span>");?>
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