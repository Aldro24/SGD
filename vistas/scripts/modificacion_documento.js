
var tabla;

//funcion que se ejecuta al inicio

function init(){


listar();


}

//Cargamos los items al select categoria

// funcion limpiar





//funcion cancelarform



//funcion listar
function listar(){
tabla=$('#tbllistado').dataTable(
    {
        "lengthMenu": [ 5, 10,15, 25, 75, 100],//mostramos el menú de registros a revisar
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerside":true,//Paginacion y filtrado realizados por el servidor
        dom: 'B<"top"f>rtl<"bottom"i ><"clear"p>',//Definimos los elementos del control de tabla
        "select":true,
        
                
         
        buttons: [
        "copy", "pdf",{
                    extend:"selectAll",
                    Text:' Seleccionar todos',
                },
                {
                    extend:"selectNone",
                    Text:" Quitar selección",
                },
                {
                    extend:"selectCells",
                    Text:" Quitar selección",
                },
                {
                    extend:"selectColumns",
                    Text:" Quitar selección",
                },
                
                {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'tabla' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
            
],

"ajax": 
        {
            url: '../ajax/modificacion_documento.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e.responseTxt);
            }

        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada',
             "select": {
                    "rows": {
                         _: "Seleccionó %d registros", //msj cuando todavia no seleccionó nada
                        0: "Haga clic en una fila para seleccionarla.", //aviso
                         1: "Solo 1 fila seleccionada" //aviso
                     }
                }

            },
                  }
                    
             },

        "bDestroy": true,
        "iDisplayLength": 10, //paginación
        "order":[[2,"desc"]] // ordenar (columna, orden)



    }).dataTable();

}
    








init();





