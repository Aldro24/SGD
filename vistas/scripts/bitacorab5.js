var tabla;

//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })
}
$("#usuario_que_creo_documento").hide();
$('#fecha_modificacion').hide();

//Función limpiar
function limpiar()
{
    $("#nombre").val("");
    $("#ci_ruc_pas").val("");
    $("#num_identificacion").val("");
    $("#telefono").val("");
    $("#fecha_prestamo").val("");
    $("#fecha_entrega").val("");
    $("#observaciones").val("");
    $("#id_documento").val("");

    //Obtenemos la fecha actual
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_prestamo').val(today);

    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_entrega').val(today);
    $('#fecha_modificacion').val(today);

  //Marcamos el primer tipo_documento
    $("#ci_ruc_pas").val("CÉDULA");
    $("#ci_ruc_pas").selectpicker('refresh');
}

//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar()
{
    tabla=$('#tbllistado').dataTable(
    {

        "lengthMenu": [ 5, 10,15, 25, 75, 100],
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
         "fixedHeader": true,
        "select":true,
        
        dom: 'B<"top"f>rtl<"bottom"i><"clear"p>',//Definimos los elementos del control de tabla
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
                ],
        fixedHeader: true,
        "ajax":
                {
                    url: '../ajax/bitacorab5.php?op=listarb',
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
        "iDisplayLength": 5,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/bitacorab5.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        {                    
              bootbox.alert(datos);           
              mostrarform(false);
              tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(id_documento)
{
    $.post("../ajax/bitacorab5.php?op=mostrar",{id_documento : id_documento}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);
        $("#id_documento").val(data.id_documento);
        $("#nombre").val(data.nombre);
        $("#ci_ruc_pas").val(data.ci_ruc_pas);
        $("#ci_ruc_pas").selectpicker('refresh');
        $("#num_identificacion").val(data.num_identificacion);
        $("#telefono").val(data.telefono);
        $("#fecha_prestamo").val(data.fecha_prestamo);
        $("#fecha_entrega").val(data.fecha_entrega);
        $("#observaciones").val(data.observaciones);
        $("#usuario_que_creo_documento").val(data.usuario_que_creo_documento);

    });
}

//Función para desactivar registros
function desactivar(id_documento)
{
    bootbox.confirm("¿Está Seguro de desactivar esta bitacora?", function(result){
        if(result)
        {
            $.post("../ajax/bitacorab5.php?op=desactivar", {id_documento : id_documento}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            }); 
        }
    })
}

//Función para activar registros
function activar(id_documento)
{
    bootbox.confirm("¿Está Seguro de activar la bitacora?", function(result){
        if(result)
        {
            $.post("../ajax/bitacorab5.php?op=activar", {id_documento : id_documento}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            }); 
        }
    })
}

init();