<?php 
if (strlen(session_id())< 1)
session_start();
error_reporting(E_ALL);
require_once "../modelos/Modificacion_bodegas.php";

$modificacion_bodega= new modificacion_bodegas();
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$fk_usuario_que_modifico_documento=isset($_POST["fk_usuario_que_modifico_documento"])? limpiarCadena($_POST["fk_usuario_que_modifico_documento"]):"";
$fecha_modificacion=isset($_POST["fecha_modificacion"])? limpiarCadena($_POST["fecha_modificacion"]):"";


switch ($_GET["op"]){

    case 'listar':
        $rspta=$modificacion_bodega->listar();
        //Vamos a declarar un array
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>$reg->nombre,
                "1"=>$reg->usuario,
                "2"=>$reg->fecha_modificacion
                
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