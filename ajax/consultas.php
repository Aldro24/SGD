<?php 
require_once "../modelos/Consultas.php";
error_reporting(E_ALL);

$consulta=new Consultas();



switch ($_GET["op"]){
	
	case 'consultafecha':

	$fecha_inicio=$_REQUEST["fecha_inicio"];
	$fecha_fin=$_REQUEST["fecha_fin"];

		$rspta=$consulta->consultafecha($fecha_inicio,$fecha_fin);
 		//Vamos a declarar un array
 		$data= Array();
 		 $url="../files/archivos/";
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->fecha,
                "1"=>$reg->numero_documento,
                "2"=>$reg->asunto_documento,
                "3"=>$reg->cargo_remitente_documento,
                "4"=>$reg->empresa_documento,
                "5"=>$reg->bodega,
                "6"=>$reg->anaquel_archivo_documento,
                "7"=>$reg->caja_anaquel_documento,
                "8"=>$reg->carpeta_documento,
                "9"=>$reg->lugar_dentro_de_la_carpeta,
                "10"=>'<abbr title= "Presione para abrir el archivo"><a target="_blank" href="'.$url.$reg->direccion_electronica_documento.'"> <center><button class="btn btn-file"><i class="fa fa-folder" style="font-size:20px ;color:#E3A219"></i></button></center></a> </abbr>',
                "11"=>$reg->remitente,
                "12"=>$reg->destinatario,
                "13"=>$reg->cargo_destinatario,
                "14"=>$reg->criterios,
                "15"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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
	case 'ventasfechacliente':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"];
		$idcliente=$_REQUEST["idcliente"];

		$rspta=$consulta->ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->fecha,
 				"1"=>$reg->usuario,
 				"2"=>$reg->cliente,
 				"3"=>$reg->tipo_comprobante,
 				"4"=>$reg->serie_comprobante.' '.$reg->num_comprobante,
 				"5"=>$reg->total_venta,
 				"6"=>$reg->impuesto,
 				"7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 				'<span class="label bg-red">Anulado</span>'
 				);

 			break;



 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;


	case 'kardex':
		
		$idarticulo=$_REQUEST["idarticulo"];

		$rspta=$consulta->kardex($idarticulo);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->idproducto,
 				"1"=>$reg->fecha,
 				"2"=>$reg->tipo,
 				"3"=>$reg->precio,
 				"4"=>$reg->cantidad,
 				"5"=>$reg->stock
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