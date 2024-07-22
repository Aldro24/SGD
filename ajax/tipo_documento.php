<?php 
require_once "../modelos/Tipo_documento.php";

$tipodocumento=new Tipo_documento();

$idtipodocumento=isset($_POST["idtipodocumento"])? limpiarCadena($_POST["idtipodocumento"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idtipodocumento)){
			$rspta=$tipodocumento->insertar($nombre,$descripcion);
			echo $rspta ? "Tipo de documento registrado" : " El Tipo de documento no se pudo registrar";
		}
		else {
			$rspta=$tipodocumento->editar($idtipodocumento,$nombre,$descripcion);
			echo $rspta ? "Tipo de documento actualizado" : "El tipo de documento no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$tipodocumento->desactivar($idtipodocumento);
 		echo $rspta ? "Tipo de documento desactivado" : "Tipo de documento no se puede desactivar";
 		
	break;

	case 'activar':
		$rspta=$tipodocumento->activar($idtipodocumento);
 		echo $rspta ? "Tipo de documento activado" : "Tipo de documento no se puede activar";
 		
	break;

	case 'mostrar':
		$rspta=$tipodocumento->mostrar($idtipodocumento);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		
	break;

	case 'listar':
		$rspta=$tipodocumento->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idtipodocumento.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idtipodocumento.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idtipodocumento.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idtipodocumento.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->descripcion,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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