    <footer class="main-footer">
        <strong>Copyright &copy; 2021<a href="#"> Oscar Lozano</a>.</strong> All rights
        reserved.
    </footer>
</div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/export-data.js"></script>
<!-- jQuery print -->
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery-ui -->
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script>
//-----     Inicio Ajax     -----//
$(document).ready(function () {

    
    var base_url= "<?php echo base_url();?>";
    
        
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
             //   var confirmar = confirm("Realmente desea eliminar este regitro...?")
            //    if (confirmar == true) {
                    window.location.href = base_url + resp;
            //    } else {
                 //   alert("El registro no se elimino....")
             //   }   
            }
        });
    });

    $(".btn-disable").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                var confirmar = confirm("Realmente desea desactivar el usuario de este registro...?")
                if (confirmar == true) {
                    window.location.href = base_url + resp;
                } else {
                    alert("El usuario de este registro no se desactivo....")
                }   
            }
        });
    });
    /*------ Inicio view ------*/
    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "administrador/usuarios/view",
            type:"POST",
            data:{idusuario:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
            }
        });
    });

    $(".btn-view-productosCatalogo").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "reportes/productoscatalogo/view",
            type:"POST",
            data:{idProductoCatalogo:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
            }
        });
    });

    $(".btn-view-personalPlanta").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "reportes/personal_planta/view",
            type:"POST",
            data:{idPersonalPlanta:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
            }
        });
    });

    $(".btn-view-mpi").on("click", function(){
        $.ajax({
            url: base_url + "produccion/producciones/viewMpi",
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
            }
        });
    });
    
    $(document).on("click",".btn-view-produccion", function(){
        var idProduccion = $(this).val();
        $.ajax({
            url: base_url + "produccion/producciones/view",
            type:"POST",
            dataType:"html",
            data:{id:idProduccion},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });
    /*------ Fin view ------*/
    /*------ Inicio datatable ------*/
    $('#exampleProductoCatalogo').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Reporte de Productos Catalogo",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Reporte de Productos Catalogo",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    $('#examplePersonalPlanta').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Reporte de Personal de Planta",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Reporte de Productos Catalogo",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    $('#exampleReporteLiberacion').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Reporte Liberaciones PT",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
        ],
        "scrollX": true,
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    $('#exampleInformeProduccion').DataTable( {
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Informe General Producción",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
                }
            },
        ],
        "scrollX": true,
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }   
    });

    $('#exampleInventarioMpi').DataTable( {
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Reporte Materia Prima e Insumo Disponible",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5]
                }
            },
        ],
        
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }   
    });

    $('#exampleInformeSalidas').DataTable( {
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Reporte Materias Primas e Insumos Salidas",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5]
                }
            },
        ],
        
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }   
    });

    $('#exampleReporteAnalisisSensorial').DataTable( {
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Informe Analisis Sensorial",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
                }
            },
        ],
        "scrollX": true,
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }   
    });

	$('#example1').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

	$('.sidebar-menu').tree();
    /*------ Fin datatable ------*/
    /*------ Inicio operacion numerica modulo control materias primas insumos ------*/
    $(document).on("keyup","#add", function(){
        dividirAdd();
    });

    $(document).on("keyup","#addEnvio", function(){
        multiplicarAddEnvio();
    });
    /*------ Fin operacion numerica modulo control materias primas insumos ------*/
    /*------ Inicio ingreso materia prima e insumo formulario control materia prima e insumo entrada bodega principal ------*/
    $(document).on("click",".btn-check",function(){
        materiaPrimaInsumo = $(this).val();
        infoMateriaPrimaInsumo = materiaPrimaInsumo.split("*");
        
        $("#idMateriaPrimaInsumo").val(infoMateriaPrimaInsumo[0]); 
        $("#materiaPrimaInsumo").val(infoMateriaPrimaInsumo[1]);
        $("#modal-default").modal("hide");
    });
    /*------ Fin ingreso materia prima e insumo formulario control materia prima e insumo entrada bodega principal ------*/
    /*------ Inicio ingreso producto formulario producciones ------*/
    $(document).on("click",".btn-check",function(){
        productoCatalogo = $(this).val();
        infoProductocatalogo = productoCatalogo.split("*");
        
        $("#idProductocatalogo").val(infoProductocatalogo[0]); 
        $("#productoCatalogo").val(infoProductocatalogo[1]);
        $("#subcentro_id").val(infoProductocatalogo[5]);
        $("#subcentro_nombre").val(infoProductocatalogo[4]);
        $("#presentacion").val(infoProductocatalogo[2]);
        $("#precio_venta").val(infoProductocatalogo[3]);
        $("#modal-default").modal("hide");
        multiplicar();
    });
    /*------ Fin ingreso producto formulario producciones ------*/ 
    /*------ Inicio autocomplete personal encargado ------*/
    $("#instructorEncargado").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"produccion/producciones/getInstructorEncargado",
                type: "POST",
                dataType: "json",
                data:{ valorEncargado: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){
            data = ui.item.id;
            $("#idInstructorEncargado").val(data); 
        },
    });
    /*------ Fin autocomplete personal encargado ------*/
    /*------ Inicio autocomplete materia prima e insumos -----*/
    
    $("#pMateriaPrimaInsumo").autocomplete({
        source:function(request, response){
            var subBodega = $("#subcentro_id").val();
            $.ajax({
                url: base_url+"produccion/producciones/getSubBodegasAutocomplete",
                type: "POST",
                dataType: "json",
                data:{subBodega:subBodega, valor:request.term},
                success:function(data){
                    response(data);
                }
            });
        },  
        minLength:2,
        select:function(event, ui){
            data = ui.item.id +"*"+ ui.item.numeroLoteBp +"*"+ ui.item.nombreMpi +"*"+ ui.item.precio_unitario +"*"+ ui.item.stock_subBodega +"*"+ ui.item.unidadMedida;
            $("#btn-agregar-pMateriaPrimaInsumo").val(data); 
        },
    });
    
    $("#btn-agregar-pMateriaPrimaInsumo").on("click",function(){
        data = $(this).val();
        if (data !='') {
            infoMateriaPrimaInsumo = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idSubBodega[]' value='"+infoMateriaPrimaInsumo[0]+"'>"+infoMateriaPrimaInsumo[1]+"</td>";
            html += "<td>"+infoMateriaPrimaInsumo[2]+"</td>";
            html += "<td><select id='referencia' name='referencia[]'><option value=''>----- Seleccione -----</option><option value='Materia Prima'>Materia Prima</option><option value='Insumo'>Insumo</option><option value='Producto Terminado'>Producto Terminado</option><option value='Elementos Indirectos'>Elementos Indirectos</option></select></td>";            
            html += "<td><input type='hidden' name='precio_unitario[]' value='"+infoMateriaPrimaInsumo[3]+"'>"+infoMateriaPrimaInsumo[3]+"</td>";
            html += "<td>"+infoMateriaPrimaInsumo[4]+' '+infoMateriaPrimaInsumo[5]+"</td>";
            html += "<td><input type='text' name='cantidadUtilizar[]' value='1' class='cantidadUtilizar'>"+' '+infoMateriaPrimaInsumo[5]+"</td>";
            html += "<td><input type='hidden' name='percioTotal[]' value='"+infoMateriaPrimaInsumo[3]+"'><p>"+infoMateriaPrimaInsumo[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-pMateriaPrimaInsumo'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbMateriaPrimaInsumo tbody").append(html);
            sumarMateriaPrimaInsumo();
            dividir();
            $("#btn-agregar-pMateriaPrimaInsumo").val(null);
            $("#pMateriaPrimaInsumo").val(null);            
        }else{
            alert("Seleccione Materia Prima e Insumo para agregar a la Produccion...");
        }
    });

    $(document).on("click",".btn-remove-pMateriaPrimaInsumo", function(){
        alert("Realmente desea remover esta Materia Prima e Insumo...")
        $(this).closest("tr").remove();  
        sumarMateriaPrimaInsumo();
        dividir();  
    }); 

    $(document).on("keyup","#tbMateriaPrimaInsumo input.cantidadUtilizar", function(){
        cantidadUtilizar = $(this).val();
        precio_unitario = $(this).closest("tr").find("td:eq(3)").text();
        precioTotal = cantidadUtilizar * precio_unitario;
        $(this).closest("tr").find("td:eq(6)").children("p").text(precioTotal);
        $(this).closest("tr").find("td:eq(6)").children("input").val(precioTotal);
        sumarMateriaPrimaInsumo();
        dividir();
    });
    /*------ Fin autocomplete materia prima e insumos ------*/
    /*------ Inicio operaciones numericas formulario add produccion ------*/
    $(document).on("keyup","#addProduccion", function(){
        multiplicar();
        dividir();
    });
    /*------ Fin operaciones numericas formulario add produccion  ------*/
    /*------ Inicio select anidado add liberacion ------*/
    $("#destino").change(function(){
        var id = $("#destino").val();
        if (id != "") {
            $.ajax({
                url: base_url + "produccion/producciones/operacion",
                type:"POST",
                data:{idDestino:id},
                success:function(data){
                    $("#operacion").html(data);
                }
            })
        } else {
            $("#operacion").html( "<option value''>Seleccione...</option>");
        }
    });
    /*------ Fin select anidado add liberacion ------*/
    /*------ Inicio Impresión Producción  ------*/
    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
            title:"Formato Nota de Producción | GesproAgro"
        });
    });
    /*------ Fin Impresión Producción  ------*/ 
     /*------ Inicio operaciones numericas formulario addAnalisisSensorial ------*/
     $(document).on("keyup","#addAnalisisSensorial", function(){
        sumaAnalisisSensorial();
        aceptacionFinal();
       
    });
    /*------ Fin operaciones numericas formulario addAnalisisSensorial  ------*/
    
       
         
    
})
//-------     Fin Ajax     --------//
//-------     Inicio funciones     --------//
function dividirAdd(){
    precio_total = $("input[name=precio_total]").val();
    cantidad_entrante = $("input[name=cantidad_entrante]").val();
    precio_unitario = precio_total / cantidad_entrante;
    $("input[name=precio_unitario]").val(precio_unitario);
}

function multiplicarAddEnvio(){
    cantidad_enviar = $("input[name=cantidad_enviar]").val();
    precio_unitario = $("input[name=precio_unitario]").val();
    precio_total = cantidad_enviar * precio_unitario;
    $("input[name=precio_total]").val(precio_total);
}

function sumarMateriaPrimaInsumo(){
    costoProduccion = 0,
    $("#tbMateriaPrimaInsumo tbody tr").each(function(){
        costoProduccion = costoProduccion + Number($(this).find("td:eq(6)").text());
    });
    $("input[name=costoProduccion]").val(costoProduccion);

    $(document).ready(function(){   
        $( "input[name^='cantidadUtilizar']" ).on('mouseup, keyup',function(){
            var suma = 0;
                $("input[name^='cantidadUtilizar']").each(function(){ 
                suma += parseFloat($(this).val()); 
                }); 
            suma = suma;
            $("input[name=total_cantidad_peso_inicial]").val(suma);
        });
    });
}

function multiplicar(){
    presentacion = $("input[name=presentacion]").val();
    unidades_elaboradas_pt = $("input[name=unidades_elaboradas_pt]").val();
    total_cantidad_pt = presentacion * unidades_elaboradas_pt;
    $("input[name=total_cantidad_pt]").val(total_cantidad_pt);
}

function dividir(){
    pesoFinal = $("input[name=total_cantidad_pt]").val();
    pesoInicial = $("input[name=total_cantidad_peso_inicial]").val();
    rendimiento = (pesoFinal / pesoInicial)*100;
    $("input[name=rendimiento]").val(rendimiento);
}

function sumaAnalisisSensorial(){
      
    puntuacion1 = $("input[id=puntuacion1]").val();
    puntuacion2 = $("input[id=puntuacion2]").val();
    puntuacion3 = $("input[id=puntuacion3]").val();
    puntuacion4 = $("input[id=puntuacion4]").val();
    puntuacionFinal = parseInt(puntuacion1)+ parseInt(puntuacion2)+ parseInt(puntuacion3)+ parseInt(puntuacion4);
    $("input[name=puntuacionFinal]").val(puntuacionFinal);
    
}

function aceptacionFinal(){
    puntuacionFinal = $("input[name=puntuacionFinal]").val();
    var analisisResultado_0 = "Desagadable";
    var analisisResultado_1 = "Agradable";
    var aceptacion_0 = "No Cumple";
    var aceptacion_1 = "Cumple";    
    if (puntuacionFinal >= 12) {
        $("input[name=analisis_resultados]").val(analisisResultado_1);
        $("input[name=aceptacion]").val(aceptacion_1);
    } else {
        $("input[name=analisis_resultados]").val(analisisResultado_0);
        $("input[name=aceptacion]").val(aceptacion_0);
    }
}


function grafica1(){    
    Highcharts.chart('grafico1', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Seguimiento de productos comercializados vs productos elaborados'
        },
        subtitle: {
            text: 'Año 2019'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Cantidad'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Productos Elaborados',
            marker: {
                symbol: 'square'
            },
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {
                y: 26.5,
                marker: {
                    symbol: 'url(https://www.highcharts.com/samples/graphics/sun.png)'
                }
            }, 23.3, 18.3, 13.9, 9.6]

        }, {
            name: 'Productos Comercializados',
            marker: {
                symbol: 'diamond'
            },
            data: [{
                y: 3.9,
                marker: {
                    symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
                }
            }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
}

function grafica2(){
    Highcharts.chart('grafico2', {

    title: {
        text: 'Seguimiento de unidades productivas: Productos comercializados vs productos elaborados'
    },

    subtitle: {
        text: 'Años 2010-2017'
    },

    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Lacteos',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
        name: 'Carnicos',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Panificación',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Fruhor',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Aguas',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }, {
        name: 'Poscosecha',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

    });
}
//-------     Fin funciones     --------//

</script>
</body>
</html>
