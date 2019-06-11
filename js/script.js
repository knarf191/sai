
/**********************************************************************************
                            Data Table
**********************************************************************************/

$(document).ready(function() {
    $('#table_chofer').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            {
                extend:'print',
                footer: true,
                text: 'Imprimir',
                message: 'REPORTE DE CARGAS ABORDO',
                title: '',
                orientation: 'landscape',
                pageSize: 'LETTER'
            },
            {
                extend:'pdf',
                footer: true,
                message: 'REPORTE DE CARGAS ABORDO',
                orientation: 'landscape',
                pageSize: 'LETTER'
            },
            {
                extend:'excel',
                footer: true,
            }
        ],

        "scrollY":        "350px",
        "scrollCollapse": false,
        "paging":         false,



        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                'TOTAL: '+pageTotal
            );
        }    
    });


    $('#table_stock').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend:'print',
                footer: true,
                text: 'Imprimir',
                message: 'REPORTE DE PRODUCTOS EN STOCK',
                title: '',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'pdf',
                footer: true,
                message: 'REPORTE DE PRODUCTOS EN STOCK',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'excel',
                footer: true,
            }
        ],

        "scrollY":        "360px",
        "scrollCollapse": false,
        "paging":         false,

        /*"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                '$'+pageTotal
            );
        }*/
    });


    $('#table_produccion').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend:'print',
                footer: true,
                text: 'Imprimir',
                message: 'REPORTE DE PRUDCCIÓN',
                title: '',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'pdf',
                footer: true,
                message: 'REPORTE DE PRODUCCIÓN',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'excel',
                footer: true,
            }
        ],

        "scrollY":        "360px",
        "scrollCollapse": false,
        "paging":         false,
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                'TOTAL ' +pageTotal
            );
        }   
    });


    $('#table_clientes').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend:'print',
                footer: true,
                text: 'Imprimir',
                message: 'REPORTE DE CLIENTES REGISTRADOS',
                title: '',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'pdf',
                footer: true,
                message: 'REPORTE DE CLIENTES REGISTRADOS',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'excel',
                footer: true,
            }
        ],

        "scrollY":        "360px",
        "scrollCollapse": false,
        "paging":         false,
    });


    $('#table_tienda').DataTable({
        dom: 'Blfrtip',
        buttons: [
            {
                extend:'print',
                footer: true,
                text: 'Imprimir',
                message: 'REPORTE DE DOCUMENTOS DE VENTAS POR TIENDA',
                title: '',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'pdf',
                footer: true,
                message: 'REPORTE DE DOCUMENTOS DE VENTAS POR TIENDA',
                orientation: 'portrait',
                pageSize: 'LETTER'
            },
            {
                extend:'excel',
                footer: true,
            }
        ],

        "scrollY":        "300px",
        "scrollCollapse": false,
        "paging":         false,  
    });

    $('#table_producto').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            {
                extend:'print',
                footer: true,
                text: 'Imprimir',
                message: 'REPORTE DE VALES DE CARGAS ABORDO',
                title: '',
                orientation: 'landscape',
                pageSize: 'LETTER'
            },
            {
                extend:'pdf',
                footer: true,
                message: 'REPORTE DE VALES DE CARGAS ABORDO',
                orientation: 'landscape',
                pageSize: 'LETTER'
            },
            {
                extend:'excel',
                footer: true,
            }
        ],

        "scrollY":        "350px",
        "scrollCollapse": false,
        "paging":         false,



        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                ''+pageTotal
            );
        }    
    });

    $('#tUsuarios').DataTable({});
} );


/**********************************************************************************
                            Menu Responsivo
**********************************************************************************/
var contador = 1;
$(function(){
    $('body').on('click','.menu_bar', function(e){
        e.preventDefault();

        

        if (contador == 1)
        {
            $('.sidebar').animate({
                left: '0'
            });
            contador = 0;
        } 
        else
        {
            
            contador = 1;
            $('.sidebar').animate({
                left: '-100%'
            });
        }   
    });
});





/**********************************************************************************
                            Botones
**********************************************************************************/
/********************************************
            Checkbox
*********************************************/

$(function(){
    $('body').on('change','#venta_tienda', function(e){
        e.preventDefault();
        
        if($('#venta_tienda').prop('checked')) 
        {
            document.getElementById("factura_venta").disabled = true;
            document.getElementById("recibo_venta").disabled = true;
            document.getElementById("estatus_venta").disabled = true;
            document.getElementById("metodo_pago").disabled = true;
            document.getElementById("forma_pago").disabled = true;
            document.getElementById("fecha_entrega").disabled = true;
            document.getElementById("fecha_pago").disabled = true;
        }
        else
        {
            document.getElementById("factura_venta").disabled = false;
            document.getElementById("recibo_venta").disabled = false;
            document.getElementById("estatus_venta").disabled = false;
            document.getElementById("metodo_pago").disabled = false;
            document.getElementById("forma_pago").disabled = false;
            document.getElementById("fecha_entrega").disabled = false;
            document.getElementById("fecha_pago").disabled = false;
        }     
    });
});



/********************************************
            Cancelar
*********************************************/

$(function(){
    $('body').on('click','#cancelar_registro', function(e){
        e.preventDefault();
        
        $(location).attr('href', 'produccion');         
    });
});

$(function(){
    $('body').on('click','#cancelar_registro_cliente', function(e){
        e.preventDefault();
        
        $(location).attr('href', 'clientes');         
    });
});

$(function(){
    $('body').on('click','#cancelar_venta_tienda', function(e){
        e.preventDefault();
        
        $(location).attr('href', 'ventas_tienda');         
    });
});

$(function(){
    $('body').on('click','#btnCancelUser', function(e){
        e.preventDefault();
        
        $(location).attr('href', 'usuarios');         
    });
});

/********************************************
            Regresar
*********************************************/
$(function(){
    $('body').on('click','#back_chofer', function(e){
        e.preventDefault();
        
        $(location).attr('href', 'inventario_chofer');         
    });
});

$(function(){
    $('body').on('click','#back_venta_tienda', function(e){
        e.preventDefault();
        
        $(location).attr('href', 'ventas_tienda');         
    });
});


/********************************************
            Detalles
*********************************************/

$(function(){
    $('#table_chofer').on('click','#detalles_carga_chofer', function(e){
        e.preventDefault();      

        folio = $(this).parents("tr").find("td").eq(0).html(); 
        $(location).attr('href', 'detalle_carga_chofer?folio='+folio);
    });
});

$(function(){
    $('#table_tienda').on('click','#detalle_venta', function(e){
        e.preventDefault();      

        folio = $(this).parents("tr").find("td").eq(0).html(); 
        $(location).attr('href', 'detalle_venta_tienda?folio='+folio);
    });
});
/********************************************
            Imprimir
*********************************************/

$(function(){
    $('#table_chofer').on('click','#imprimir_carga_chofer', function(e){
        e.preventDefault();      

        folio = $(this).parents("tr").find("td").eq(0).html(); 
        $(location).attr('href', 'imprimir_carga_chofer?folio='+folio);
    });
});

$(function(){
    $('#table_tienda').on('click','#imprimir_venta', function(e){
        e.preventDefault();      

        folio = $(this).parents("tr").find("td").eq(0).html(); 
        $(location).attr('href', 'imprimir_venta_tienda?folio='+folio);
    });
});
/**********************************************************************************
                            Editar Carga Chofer
**********************************************************************************/

$(function(){
    $('body').on('click','#editar_carga_chofer', function(e){
        e.preventDefault();

        folio = $(this).parents("tr").find("td").eq(0).html();      

        $(location).attr('href', 'editar_carga_chofer?folio='+folio);         
    });
});

/**********************************************************************************
                            Editar Cliente
**********************************************************************************/

$(function(){
    $('body').on('click','#editar_cliente', function(e){
        e.preventDefault();

        folio = $(this).parents("tr").find("td").eq(0).html();      

        $(location).attr('href', 'editar_cliente?folio='+folio);         
    });
});

/**********************************************************************************
                            Editar Venta Tienda
**********************************************************************************/

$(function(){
    $('body').on('click','#editar_venta', function(e){
        e.preventDefault();

        folio = $(this).parents("tr").find("td").eq(0).html();      

        $(location).attr('href', 'editar_venta_tienda?folio='+folio);         
    });
});
/**********************************************************************************
                           Eliminar Usuarios
**********************************************************************************/

$(function(){
    $("body").on('click','#deleteCliente', function(e){
        e.preventDefault();

        id      = $(this).parents("tr").find("td").eq(0).html();
        cliente  = $(this).parents("tr").find("td").eq(1).html();

        respuesta = confirm("Desea eliminar al cliente: " + cliente);

        if (respuesta) {
            ur = $("#delete_Cliente").val();
             //$(location).attr('href', 'clientes/eliminar'); 
            $.ajax({
                url: ur,
                type: 'POST',
                data: {id:id,cliente:cliente},               
                success:function(eliminarCliente){
                    if(eliminarCliente == 'true')
                    {
                        alert("El cliente se ha borrado correctamente");

                        $(location).attr('href', 'clientes');
                    }
                    else
                    {
                        alert("Error al intentar borrar al cliente, intente de nuevo");
                        $(location).attr('href', 'clientes');
                    }
                }
            });
        }
        else
        {
            $(location).attr('href', 'clientes');
        }         
    });
});


/**********************************************************************************
                           Tabla Carga Productos Chofer
**********************************************************************************/

$(function(){
    $("body").on('click','#plusProducto', function(e){
        e.preventDefault();
        var product = $.ajax({
                url:'consulta_stock_productos',
               dataType: 'text',
                async: false 
            }).responseText;
       
        
        var fila_productos =
                         
            '<tr><td><input type="text" class="form-control" name="cantidad_producto[]" id="cantidad_producto" ></td>'+
            
            '<td><select class="form-control"  name="producto[]" id="producto" required><option value="" selected disabled>Producto</option>'+product+'</select></td>'+   
            '<td><i class="fa fa-plus-circle fa-lg" id="plusProducto"></i></td>'+'<td><i class="fa fa-minus-circle fa-lg" id="minus"></i></td></tr>';  

       // if (keyCode == 9)
        //{
           $('#table_prodcutos_abordo').append(fila_productos);
           //document.getElementById('cantidad_refacciones[]').focus();
        //}      
    });
});

$(function(){
    $("body").on('click','#minus', function(e){
        e.preventDefault();

       $(this).closest('tr').remove();
    });
});

$(function(){
    $("body").on('keyup','#merma', function(e){
        e.preventDefault();

        cantidad_producto =  $(this).parents('tr').find("#cantidad_producto").val();        
        cantidad_venta    = $(this).parents('tr').find("#cantidad_venta").val();
        cantidad_regreso   = $(this).parents('tr').find("#regreso").val();
        merma             = $(this).parents('tr').find("#merma").val();
        sin_comprobar     = cantidad_producto - cantidad_venta - cantidad_regreso - merma;

        $(this).parents('tr').find("#sin_comprobar").val(sin_comprobar); 
    });
});

$(function(){
    $("body").on('change','#cantidad_venta', function(e){
        e.preventDefault();

        cantidad_producto =  $(this).parents('tr').find("#cantidad_producto").val();        
        cantidad_venta    = $(this).parents('tr').find("#cantidad_venta").val();
        cantidad_regreso  = $(this).parents('tr').find("#regreso").val();
        merma             = $(this).parents('tr').find("#merma").val();
        sin_comprobar     = cantidad_producto - cantidad_venta - cantidad_regreso - merma;

        $(this).parents('tr').find("#sin_comprobar").val(sin_comprobar); 
        //document.getElementById('total_refacciones').value;
    });
});

/**********************************************************************************
                           Tabla Carga Productos Venta Tienda
**********************************************************************************/

$(function(){
    $("body").on('click','#plusProductoVenta', function(e){
        e.preventDefault();
        var product = $.ajax({
                url:'consulta_stock_productos',
               dataType: 'text',
                async: false 
            }).responseText;

       
        
        var fila_productos =
                         
            '<tr><td><input type="text" class="form-control" name="cantidad[]" id="cantidad_producto" ></td>'+
            '<td><select class="form-control"  name="producto[]" id="producto" required><option value="" selected disabled>Producto</option>'+product+'</select></td>'+   
            '<td><input type="text" class="form-control"  name="precio[]" id="precio_unitario"></td>'+  
            '<td><input type="text" class="form-control"  name="impuesto[]" id="impuesto"></td>'+    
            '<td><i class="fa fa-plus-circle fa-lg" id="plusProductoVenta"></i></td>'+'<td><i class="fa fa-minus-circle fa-lg" id="minus"></i></td></tr>';  

       // if (keyCode == 9)
        //{
           $('#table_prodcutos_venta').append(fila_productos);
           //document.getElementById('cantidad_refacciones[]').focus();
        //}      
    });
});

/**********************************************************************************
                         Agregar Usuarios
**********************************************************************************/
$(function(){
    $('body').on('click','#btnSetUser', function(e){
        e.preventDefault();

        id       = $('#idUser').val();
        nombre   = $('#nombreUser').val();
        user     = $('#user').val();
        password = $('#passUser').val();

        chofer     = document.getElementById("chofer_").checked;
        produccion = document.getElementById("produccion").checked;
        clientes   = document.getElementById("clientes").checked;
        ventas     = document.getElementById("ventas").checked;
        usuarios   = document.getElementById("usuarios").checked;

        if(id!="" && nombre!="" && user!="" && password!="")
        {
            $.ajax({
                url:  $('#setUser').attr('action'),
                type: $('#setUser').attr('method'),
                data: {id:id, nombre:nombre, user:user, password:password, chofer:chofer, produccion:produccion, clientes:clientes, ventas:ventas, usuarios:usuarios},
                success: function(setUsuario)
                {
                    if(setUsuario =='true')
                    {
                        alert("Los datos han cargado correctamente");
                        $(location).attr('href','usuarios');
                    }
                    else
                    {
                        alert("Algo ha salido mal, por favor intente de nuevo.");
                        $(location).attr('href','usuarios');
                    }
                }
            });
        }
        else
        {
            alert("Por favor llene todos los campos")
        }           
    });
});

/**********************************************************************************
                            Editar Usuarios
**********************************************************************************/

$(function(){
    $('body').on('click','#editarUser', function(e){
        e.preventDefault();

        id = $(this).parents("tr").find("td").eq(0).html();      

        $(location).attr('href', 'editar_usuario?id='+id);         
    });
});

$(function(){
    $('body').on('click','#btnUpdateUser', function(e){
        e.preventDefault();

        id       = $('#idUser').val();
        nombre   = $('#nombreUser').val();
        user     = $('#user').val();
        password = $('#passUser').val();

        chofer     = document.getElementById("chofer_").checked;
        produccion = document.getElementById("produccion").checked;
        clientes   = document.getElementById("clientes").checked;
        ventas     = document.getElementById("ventas").checked;
        usuarios   = document.getElementById("usuarios").checked;


        if(id!="" && nombre!="" && user!="" && password!="")
        {
            $.ajax({
                url:  $('#updateUsuario').attr('action'),
                type: $('#updateUsuario').attr('method'),
                data: {id:id, nombre:nombre, user:user, password:password, chofer:chofer, produccion:produccion, clientes:clientes, ventas:ventas, usuarios:usuarios},
                success: function(updateUser)
                {
                    if(updateUser =='true')
                    {
                        alert("Los datos han modificado correctamente");
                        $(location).attr('href','usuarios');
                    }
                    else
                    {
                        alert("Algo ha salido mal, por favor intente de nuevo.");
                        $(location).attr('href','usuarios');
                    }
                }
            });
        }
        else
        {
            alert("Por favor llene todos los campos")
        }   
    });
});


/**********************************************************************************
                           Eliminar Usuarios
**********************************************************************************/

$(function(){
    $("body").on('click','#deleteUser', function(e){
        e.preventDefault();

        nombre = $(this).parents("tr").find("td").eq(1).html();
        usuario = $(this).parents("tr").find("td").eq(2).html();

        respuesta = confirm("Desea eliminar al usuario: " + nombre);

        if (respuesta) {
            ur = $("#deleteUsuario").val();
            $.ajax({
                url: ur,
                type: 'POST',
                data: {usuario:usuario},               
                success:function(eliminarUsuario){
                    if(eliminarUsuario == 'true')
                    {
                        alert("El usuario se ha borrado correctamente");

                        $(location).attr('href', 'usuarios');
                    }
                    else
                    {
                        alert("Error al intentar borrar el archivo, intente de nuevo");
                        $(location).attr('href', 'usuarios');
                    }
                }
            });
        }
        else
        {
            $(location).attr('href', 'usuarios');
        }         
    });
});


/**********************************************************************************
                        Efectos Botones Sidebar
**********************************************************************************/

$(function(){
    var cambio = false;
    $('.nav li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            cambio = true;
        }
    });
    
});  


$(function(){
    $('.submenu').click(function(e){
        e.preventDefault();

        if ($(this).hasClass('active')) 
        {
            $(this).removeClass('active');
            $(this).children('ul').slideUp();
        }
        else
        {
            $('.sidebar li ul').slideUp();
            $('.sidebar li').removeClass('active');
            $(this).addClass('active');
            $(this).children('ul').slideDown ();
        }
    });
});



$(function(){
    $('.sidebar').on('click','#btn_inventario_chofer', function(e){
        e.preventDefault();
        
       $(location).attr('href', 'inventario_chofer'); 
       $('.dir_refacciones').addClass('active');
    });
});

$(function(){
    $('.sidebar').on('click','#btn_stock', function(e){
        e.preventDefault();
        
       $(location).attr('href', 'stock');         
    });
});

$(function(){
    $('.sidebar').on('click','#btn_produccion', function(e){
        e.preventDefault();
        
       $(location).attr('href', 'produccion'); 
    });
});

$(function(){
    $('.sidebar').on('click','#btn_clientes', function(e){
        e.preventDefault();
        
       $(location).attr('href', 'clientes');         
    });
});


$(function(){
    $('.sidebar').on('click','#btn_tienda', function(e){
        e.preventDefault();
        
       $(location).attr('href', 'ventas_tienda'); 
    });
});

$(function(){
    $('.sidebar').on('click','#btn_producto', function(e){
        e.preventDefault();
        
       $(location).attr('href', 'venta_producto');         
    });
});


$(function(){
    $('.sidebar').on('click','#btn_usuarios', function(e){
        e.preventDefault();
        
       $(location).attr('href', 'usuarios');         
    });
});

/*$( document ).ready(function() {
    var total = 0;
    $("#tVales tr").find('td:eq(7)').each(function () {

          codigo = $(this).html();

          valor = parseFloat(codigo);
             total += valor;
    })
     $('#total').val(total);
});*/


/*function SumarColumna() {
 
    // asumiendo que tabla es la referencia de la tabla que contiene las descripciones;
    // y la cuarta celda de cada fila es el sutbotal;
    var total = 0;
    for(var i = 0; tVales.rows[i]; i++)
    total += Number(tVales.rows[i].cells[7].innerHTML);
    alert(total);
}   */