<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Registrar</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                        <li><a href="<?php echo base_url()?>registrar/alumnos"><i class="fa fa-circle-o"></i> Alumnos</a></li>
                        <li><a href="<?php echo base_url()?>registrar/docentes"><i class="fa fa-circle-o"></i> Docentes</a></li>
                        <li><a href="<?php echo base_url()?>registrar/acudientes"><i class="fa fa-circle-o"></i> Acudientes</a></li>
                </ul>
            </li>    
            <li><a href="<?php echo base_url()?>Materias/Materias"><i class="fa fa-clone"></i> <span>Materias</span></a></li>
            <li><a href="<?php echo base_url()?>Actividades/Actividades"><i class="fa fa-question"></i> <span>Actividades</span></a></li>
            <li><a href="<?php echo base_url()?>MaterialApoyo/Material_Apoyo"><i class="fa fa-lightbulb-o"></i> <span>Material de Apoyo</span></a></li>
            <li><a href="#"><i class="fa fa-check-square-o"></i> <span>Evaluación</span></a></li>
            <li><a href="#"><i class="fa fa-eye"></i> <span>Calificaciones</span></a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> <span>Correo</span></a></li>
            <li><a href="#"><i class="fa fa-print"></i> <span>Informes</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i> <span>Configuración</span>
                    <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url()?>administrador/permisos"><i class="fa fa-circle-o"></i> permisos</a></li>
                    </ul>  
                </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->