<?php 
error_reporting(E_ALL);
if (strlen(session_id())< 1)
session_start();
require_once "../modelos/Bodega.php";

$bodega=new Bodega();

$id_bodega=isset($_POST["id_bodega"])? limpiarCadena($_POST["id_bodega"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ciudad=isset($_POST["ciudad"])? limpiarCadena($_POST["ciudad"]):"";
$usuario_que_creo_documento=isset($_POST["usuario_que_creo_documento"])? limpiarCadena($_POST["usuario_que_creo_documento"]):"";
$fk_usuario_que_modifico_documento=$_SESSION['nombre'];
$fecha_modificacion=isset($_POST["fecha_modificacion"])? limpiarCadena($_POST["fecha_modificacion"]):"";
$usuario_que_activo=isset($_POST["usuario_que_activo"])? limpiarCadena($_POST["usuario_que_activo"]):"";
$fecha_activacion=isset($_POST["fecha_activacion"])? limpiarCadena($_POST["fecha_activacion"]):"";
$usuario_que_desactivo=isset($_POST["usuario_que_desactivo"])? limpiarCadena($_POST["usuario_que_desactivo"]):"";
$fecha_desactivacion=isset($_POST["fecha_desactivacion"])? limpiarCadena($_POST["fecha_desactivacion"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id_bodega)){
			$rspta=$bodega->insertar($nombre,$direccion,$ciudad);
			echo $rspta ? "Bodega registrada" : " La bodega no se pudo registrar";
		}
		else {
			$rspta=$bodega->editar($id_bodega,$nombre,$direccion,$ciudad);
			echo $rspta ? "Bodega actualizada" : "La bodega no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$bodega->desactivar($id_bodega);
 		echo $rspta ? "Bodega desactivada" : "La bodega no se puede desactivar";
 		
	break;

	case 'activar':
		$rspta=$bodega->activar($id_bodega);
 		echo $rspta ? "Bodega activada" : "La bodega no se puede activar";
 		
	break;

	case 'mostrar':
		$rspta=$bodega->mostrar($id_bodega);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		
	break;

	case 'listar':
		$rspta=$bodega->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_bodega.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->id_bodega.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->id_bodega.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->id_bodega.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->direccion,
 				"3"=>$reg->ciudad,
 				"4"=>$reg->usuario_que_activo,
                "5"=>$reg->fecha_activacion,
                "6"=>$reg->usuario_que_desactivo,
                "7"=>$reg->fecha_desactivacion,
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