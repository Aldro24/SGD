var tabla;

//funcion que se ejecuta al inicio

function init(){

mostrarform(false);
listar();

$("#formulario").on("submit", function(e){
	guardaryeditar(e);
})
}

// funcion limpiar

function limpiar(){
$("#idtipodocumento").val("");
$("#nombre").val("");
$("#descripcion").val("");
}

//funcion mostrar formulario

function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		
		$("#btnagregar").hide();


	}else
	{
			$("#listadoregistros").show();
			$("#formularioregistros").hide();
			$("#btnagregar").show();

	
	}
}

//funcion cancelarform

function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){

	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
		"aServerside":true,//Paginacion y filtrado realizados por el servidor
		dom: 'lf<"top">t<"bottom"i><"clear">',//Definimos los elementos del control de tabla
        "fixedHeader": true,
        "select":true,
        
        
                
         columnDefs: [
            {
                ordenable:false,
                ClassName:'select-checkbox',
                targets:0
            }

        ],

		buttons: [

		'copyHtml5',
		'excelHtml5',
		'csvHtml5',
		'pdf'
],

"ajax": 
		{
			url: '../ajax/tipo_documento.php?op=listar',
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
		"order":[[0,"desc"]] // ordenar (columna, orden)



	}).dataTable();
}

//funcion para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault();//No se activara la accion predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/tipo_documento.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos)
		{
			bootbox.alert(datos);
			mostrarform(false);
			tabla.api().ajax.reload();
		}

	});
	limpiar();
}

function mostrar(idtipodocumento)
{
$.post("../ajax/tipo_documento.php?op=mostrar",{idtipodocumento : idtipodocumento}, function(data, status)
{
	data = JSON.parse(data);
	mostrarform(true);
	$("#nombre").val(data.nombre);
	$("#descripcion").val(data.descripcion);
	$("#idtipodocumento").val(data.idtipodocumento);
	
})
}

//funcion para desactivar registros

function desactivar(idtipodocumento)
{
bootbox.confirm("¿Esta seguro que quiere desactivar este tipo de documento?",function(result){

	if(result)
	{
$.post("../ajax/tipo_documento.php?op=desactivar",{idtipodocumento : idtipodocumento}, function(e)
	{
		bootbox.alert(e);
		tabla.api().ajax.reload();

	});
}
})
}

function activar(idtipodocumento)
{
bootbox.confirm("¿Esta seguro que quiere activar este tipo de documento?",function(result){

	if(result)
	{
$.post("../ajax/tipo_documento.php?op=activar",{idtipodocumento : idtipodocumento}, function(e)
	{
		bootbox.alert(e);
		tabla.api().ajax.reload();

	});
}
})
}


init();


