var tabla;

//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);  
    })

    $("#imagenmuestra").hide();
    //Mostramos los permisos
    $.post("../ajax/usuario.php?op=permisos&id=",function(r){
            $("#permisos").html(r);
    });
}

$.post("../ajax/usuario.php?op=selectBodega", function(r)
{
    $("#fk_bodega_usuario").html(r);
    $("#fk_bodega_usuario").selectpicker('refresh');
});
$("#usuario_que_creo_documento").hide();
$('#fecha_modificacion').hide();

//Función limpiar
function limpiar()
{
    $("#nombre").val("");
    $("#num_documento").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#email").val("");
    $("#cargo").val("");
    $("#login").val("");
    $("#clave").val("");
    $("#imagenmuestra").attr("src","");
    $("#imagenactual").val("");
    $("#imagen").val("");
    $("#fecha_creacion").val("");


    
    
    $("#fk_bodega_usuario").val("");
    
    $("#idusuario").val("");


    //Obtenemos la fecha actual
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $("#fecha_creacion").val(today);
    $('#fecha_modificacion').val(today);
    
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
        "lengthMenu": [ 5, 10,15, 25, 75, 100],//mostramos el menú de registros a revisar
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
         "fixedHeader": true,
        "select":true,
        
        dom: 'B<"top"f>rt<"bottom"i ><"clear"pl>',//Definimos los elementos del control de tabla
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
                    url: '../ajax/usuario.php?op=listar',
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
        url: "../ajax/usuario.php?op=guardaryeditar",
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

function mostrar(idusuario)
{
    $.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#tipo_documento").val(data.tipo_documento);
        $("#tipo_documento").selectpicker('refresh');
        $("#num_documento").val(data.num_documento);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#email").val(data.email);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
        $("#imagenactual").val(data.imagen);
         $("#fk_bodega_usuario").val(data.fk_bodega_usuario);
         $('#fk_bodega_usuario').selectpicker('refresh');
        $("#usuario_que_creo_documento").val(data.usuario_que_creo_documento);
        $("#fecha_creacion").val(data.fecha_creacion);
        $("#idusuario").val(data.idusuario);


    });
    $.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
            $("#permisos").html(r);
    });
}

//Función para desactivar registros
function desactivar(idusuario)
{
    bootbox.confirm("¿Está Seguro de desactivar el usuario?", function(result){
        if(result)
        {
            $.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            }); 
        }
    })
}

//Función para activar registros
function activar(idusuario)
{
    bootbox.confirm("¿Está Seguro de activar el Usuario?", function(result){
        if(result)
        {
            $.post("../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            }); 
        }
    })
}

init();