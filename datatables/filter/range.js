/**
 * Filter a column on a specific date range. Note that you will likely need 
 * to change the id's on the inputs and the columns in which the start and 
 * end date exist.
 *
 *  @name Date range filter
 *  @summary Filter the table based on two dates in different columns
 *  @author _guillimon_
 *
 *  @example
 *    $(document).ready(function() {
 *        var table = $('#example').DataTable();
 *         
 *        // Add event listeners to the two range filtering inputs
 *        $('#min').keyup( function() { table.draw(); } );
 *        $('#max').keyup( function() { table.draw(); } );
 *    } );
 */
$.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {
        var iFini = document.getElementById('min').value;
        var iFfin = document.getElementById('max').value;
        var iStartDateCol = 1;
        var iEndDateCol = 1;
 
        iFini=iFini.substring(6,10) + iFini.substring(3,5)+ iFini.substring(0,2);
        iFfin=iFfin.substring(6,10) + iFfin.substring(3,5)+ iFfin.substring(0,2);
 
        var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
        var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);
 
        if ( iFini === "" && iFfin === "" )
        {
            return true;
        }
        else if ( iFini <= datofini && iFfin === "")
        {
            return true;
        }
        else if ( iFfin >= datoffin && iFini === "")
        {
            return true;
        }
        else if (iFini <= datofini && iFfin >= datoffin)
        {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
      var table_chofer = $('#table_chofer').DataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#min').keyup( function() { table_chofer.draw(); } );
      $('#max').keyup( function() { table_chofer.draw(); } );

      var table_stock = $('#table_stock').DataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#min').keyup( function() { table_stock.draw(); } );
      $('#max').keyup( function() { table_stock.draw(); } );

       var table_produccion = $('#table_produccion').DataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#min').keyup( function() { table_produccion.draw(); } );
      $('#max').keyup( function() { table_produccion.draw(); } );

      var table_clientes = $('#table_clientes').DataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#min').keyup( function() { table_clientes.draw(); } );
      $('#max').keyup( function() { table_clientes.draw(); } );

      var table_tienda = $('#table_tienda').DataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#min').keyup( function() { table_tienda.draw(); } );
      $('#max').keyup( function() { table_tienda.draw(); } );

      var table_producto = $('#table_producto').DataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#min').keyup( function() { table_producto.draw(); } );
      $('#max').keyup( function() { table_producto.draw(); } );
  } );