var tabla;

//Función que se ejecuta al inicio
function init(){
   

	listar();
	$("#fecha_inicio").change(listar);
	$("#fecha_fin").change(listar);
	$('#mConsultaC').addClass("treeview active");
    $('#lConsulasC').addClass("active");
	
}
//Obtenemos la fecha actual
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_inicio').val(today);
   

//Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tbllistado tfoot tr').clone(true).appendTo( '#tbllistado tfoot' );

    $('#tbllistado tfoot tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" placeholder="Buscar '+ title+'" style="color:black"  />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( tabla.column(i).search() !== this.value ) {
                tabla
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } ); 
//Función Listar
function listar()

{
	var fecha_inicio = $("#fecha_inicio").val();
	var fecha_fin = $("#fecha_fin").val();
	


	

	tabla=$('#tbllistado').dataTable(


	{


		"lengthMenu": [ 5, 10,15, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    "fixedHeader": true,
	    "select":true,
	    "scrollX":true,
	    

	    dom: 'B<"top"f>rtl<"bottom"i ><"clear"p>',//Definimos los elementos del control de tabla

	    
		columnDefs: [
            {
                ordenable:false,
                ClassName:'select-checkbox',
                targets:0
            }

        ],
	
	    buttons: [		

		            'copyHtml5',
		            'pdf',
		           
		           
 					{
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
                extend: 'colvisGroup',
                text: 'Campos importantes',
                show: [ 0,1, 2,3,4 ],
                hide: [ 5,6,7,8,9,10,11,12,13,14 ]
            },
            {
                extend: 'colvisGroup',
                text: 'Mostrar todos',
                show: ':hidden'
            },

		        ],

	    fixedHeader: true,



		"ajax":
				{
					url: '../ajax/consultas.php?op=consultafecha',
					data:{fecha_inicio: fecha_inicio,fecha_fin: fecha_fin},
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
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
		"iDisplayLength": 15,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden),

	}
	).DataTable();


}
 
	


init();