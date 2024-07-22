<?php 
if (strlen(session_id())< 1)
session_start();
require_once "../modelos/Bitacorab5.php";

$bitacora=new Bitacorab5();
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$id_documento=isset($_POST["id_documento"])? limpiarCadena($_POST["id_documento"]):"";
$ci_ruc_pas=isset($_POST["ci_ruc_pas"])? limpiarCadena($_POST["ci_ruc_pas"]):"";
$num_identificacion=isset($_POST["num_identificacion"])? limpiarCadena($_POST["num_identificacion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$fecha_prestamo=isset($_POST["fecha_prestamo"])? limpiarCadena($_POST["fecha_prestamo"]):"";
$fecha_entrega=isset($_POST["fecha_entrega"])? limpiarCadena($_POST["fecha_entrega"]):"";
$observaciones=isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
$usuario_que_creo_documento=isset($_POST["usuario_que_creo_documento"])? limpiarCadena($_POST["usuario_que_creo_documento"]):"";
$fk_usuario_que_modifico_documento= $_SESSION['idusuario'];
$fecha_modificacion=isset($_POST["fecha_modificacion"])? limpiarCadena($_POST["fecha_modificacion"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':

        if (empty($id_documento)){
            $rspta=$bitacora->insertar($nombre,$ci_ruc_pas,$num_identificacion,$telefono,$fecha_prestamo,$fecha_entrega,$observaciones,$usuario_que_creo_documento,$fk_usuario_que_modifico_documento,$fecha_modificacion);
            echo $rspta ? "Bitacora registrada" : "No se pudo registrar la bitacora";
        }
        else {
            $rspta=$bitacora->editar($id_documento,$nombre,$ci_ruc_pas,$num_identificacion,$telefono,$fecha_prestamo,$fecha_entrega,$observaciones,$usuario_que_creo_documento,$fk_usuario_que_modifico_documento,$fecha_modificacion);
            echo $rspta ? "Bitacora actualizada" : "Bitacora no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$bitacora->desactivar($id_documento);
        echo $rspta ? "Bitacora desactivada" : "Bitacora no se pudo desactivar";
        
    break;

    case 'activar':
        $rspta=$bitacora->activar($id_documento);
        echo $rspta ? "Bitacora activada" : "Bitacora no se puede activar";
        
    break;

    case 'mostrar':
        $rspta=$bitacora->mostrar($id_documento);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        
    break;

    case 'listar':
        $rspta=$bitacora->listar();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_documento.')"><i class="fa fa-pencil"></i></button></abbr>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_documento.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->id_documento.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id_documento.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->ci_ruc_pas,
                "3"=>$reg->num_identificacion,
                "4"=>$reg->telefono,
                "5"=>$reg->fecha_prestamo,
                "6"=>$reg->fecha_entrega,
                "7"=>$reg->observaciones,
                "8"=>$reg->usuario_que_creo_documento,
                "9"=>$reg->usuario,
                "10"=>$reg->fecha_modificacion,
                "11"=>$reg->usuario_que_activo,
                "12"=>$reg->fecha_activacion,
                "13"=>$reg->usuario_que_desactivo,
                "14"=>$reg->fecha_desactivacion,
                "11"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                '<span class="label bg-red">Desactivado</span>'
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

    break;
    
    case 'listarb':
        $rspta=$bitacora->listarb();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_documento.')"><i class="fa fa-pencil"></i></button></abbr>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_documento.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->id_documento.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id_documento.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->ci_ruc_pas,
                "3"=>$reg->num_identificacion,
                "4"=>$reg->telefono,
                "5"=>$reg->fecha_prestamo,
                "6"=>$reg->fecha_entrega,
                "7"=>$reg->observaciones,
                "8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                '<span class="label bg-red">Desactivado</span>'
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

    break;
}
?>