var tabla;

//funcion que se ejecuta al inicio

function init(){

mostrarform(false);
listar();
$("#formulario").on("submit", function(e){
    guardaryeditar(e);
})

}

//Cargamos los items al select categoria

$.post("../ajax/documento_activo.php?op=selectBodega", function(r)
{
    $("#fk_bodega_archivo_documento").html(r);
    $("#fk_bodega_archivo_documento").selectpicker('refresh');
});

$("#usuario_que_creo_documento").hide();
$('#fecha_modificacion').hide();

// funcion limpiar

function limpiar(){

$("#id_documento").val("");
$("#numero_documento").val("");
$("#fecha_creacion").val("");
$("#asunto_documento").val("");
$("#cargo_remitente_documento").val("");
$("#empresa_documento").val("");
$("#anaquel_archivo_documento").val("");
$("#caja_anaquel_documento").val("");
$("#carpeta_documento").val("");
$("#lugar_dentro_de_la_carpeta").val("");
$("#direccion_electronica_documento").val("");
$("#remitente").val("");
$("#destinatario").val("");
$("#cargo_destinatario").val("");
$("#criterio1").val("");
$("#criterio2").val("");
$("#criterio3").val("");
$("#criterio4").val("");
$("#criterio5").val("");
$("#criterio6").val("");


    //Obtenemos la fecha actual
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_creacion').val(today);
    $('#fecha_modificacion').val(today);



}


//funcion mostrar formulario

function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);

        $("#btnagregar").hide();
        $("#btncriterios").show();


    }else
    {
            $("#listadoregistros").show();
            $("#formularioregistros").hide();
            $("#btnagregar").show();
            $("#btncriterios").hide();


    
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
        "lengthMenu": [ 5, 10,15, 25, 75, 100],//mostramos el menú de registros a revisar
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerside":true,//Paginacion y filtrado realizados por el servidor
        dom: 'B<"top"f>rtl<"bottom"i ><"clear"p>',//Definimos los elementos del control de tabla
        "responsive": false, "lengthChange": false, "autoWidth": true,"fixedHeader": true,
        "select":true,
        "scrollX":true,
                
         columnDefs: [
            {
                ordenable:false,
                ClassName:'select-checkbox',
                targets:0
            }

        ],
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
                
                
            
],

"ajax": 
        {
            url: '../ajax/bodega3.php?op=listar',
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
        "iDisplayLength": 5, //paginación
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
        url: "../ajax/documento_activo.php?op=guardaryeditar",
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

function mostrar(id_documento)
{
$.post("../ajax/documento_activo.php?op=mostrar",{ id_documento : id_documento}, function(data, status)


{
    data = JSON.parse(data);
    mostrarform(true);

  
$("#id_documento").val(data.id_documento);
$("#numero_documento").val(data.numero_documento);
$("#fecha_creacion").val(data.fecha_creacion);
$("#asunto_documento").val(data.asunto_documento);
$("#cargo_remitente_documento").val(data.cargo_remitente_documento);
$("#empresa_documento").val(data.empresa_documento);
$("#anaquel_archivo_documento").val(data.anaquel_archivo_documento);
$("#caja_anaquel_documento").val(data.caja_anaquel_documento);
$("#carpeta_documento").val(data.carpeta_documento);
$("#lugar_dentro_de_la_carpeta").val(data.lugar_dentro_de_la_carpeta);
$("#direccion_electronica_documento_actual").val(data.direccion_electronica_documento);
$("#remitente").val(data.remitente);
$("#destinatario").val(data.destinatario);
$("#cargo_destinatario").val(data.cargo_destinatario);
$("#criterio1").val(data.criterio1);
$("#criterio2").val(data.criterio2);
$("#criterio3").val(data.criterio3);
$("#criterio4").val(data.criterio4);
$("#criterio5").val(data.criterio5);
$("#criterio6").val(data.criterio6);
$("#fk_bodega_archivo_documento").val(data.fk_bodega_archivo_documento);
$('#fk_bodega_archivo_documento').selectpicker('refresh');
$("#usuario_que_creo_documento").val(data.usuario_que_creo_documento);




})
}


//funcion para desactivar registros

function desactivar(id_documento)
{
bootbox.confirm("¿Esta seguro que quiere desactivar el documento?",function(result){

    if(result)
    {
$.post("../ajax/documento_activo.php?op=desactivar",{id_documento : id_documento}, function(e)
    {
        bootbox.alert(e);
        tabla.api().ajax.reload();

    });
}
})
}

function activar(id_documento)
{
bootbox.confirm("¿Esta seguro que quiere activar el documento?",function(result){

    if(result)
    {
$.post("../ajax/documento_activo.php?op=activar",{id_documento : id_documento}, function(e)
    {
        bootbox.alert(e);
        tabla.api().ajax.reload();

    });
}
})
}


init();


