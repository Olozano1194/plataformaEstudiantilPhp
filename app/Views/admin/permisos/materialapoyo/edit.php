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
                        <form action="<?php echo base_url();?>MaterialApoyo/Material_Apoyo/update" method="POST" class="form-horizontal">
                             <input type="hidden" value="<?php echo $material->id;?>" name="idMaterial">

                            <div class="form-group">
                             <div class="col-md-6 <?php echo form_error("nombre") !=false ? 'has-error':'';?>">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo form_error("nombre") !=false ? set_value("nombre") : $material->nombre;?>">
                                    <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-6 <?php echo form_error("descripcion") !=false ? 'has-error':'';?>">
                                    <label for="descripcion">Descripción:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo form_error("descripcion") !=false ? set_value("descripcion") : $material->descripcion;?>">
                                    <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                                </div>   
                            </div>
                            <div class="form-group">
                               
                                <div class="col-md-6 <?php echo form_error("archivo_adjunto") !=false ? 'has-error':'';?>">
                                    <label for="archivo_adjunto">Archivo Adjunto:</label>
                                    <input type="file" class="form-control" id="archivo_adjunto" name="archivo_adjunto" value="<?php echo form_error("archivo_adjunto") !=false ? set_value("archivo_adjunto") : $material->archivo_adjunto;?>">
                                    <?php echo form_error("archivo_adjunto","<span class='help-block'>","</span>");?>
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