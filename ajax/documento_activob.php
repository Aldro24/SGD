<?php 
error_reporting(E_ALL);
require_once "../modelos/Documento_activo.php";

$documento_activo= new documento_activo();
$id_documento=isset($_POST["id_documento"])? limpiarCadena($_POST["id_documento"]):"";
$numero_documento=isset($_POST["numero_documento"])? limpiarCadena($_POST["numero_documento"]):"";
$fecha_creacion=isset($_POST["fecha_creacion"])? limpiarCadena($_POST["fecha_creacion"]):"";
$asunto_documento=isset($_POST["asunto_documento"])? limpiarCadena($_POST["asunto_documento"]):"";
$cargo_remitente_documento=isset($_POST["cargo_remitente_documento"])? limpiarCadena($_POST["cargo_remitente_documento"]):"";
$empresa_documento=isset($_POST["empresa_documento"])? limpiarCadena($_POST["empresa_documento"]):"";
$anaquel_archivo_documento=isset($_POST["anaquel_archivo_documento"])? limpiarCadena($_POST["anaquel_archivo_documento"]):"";
$caja_anaquel_documento=isset($_POST["caja_anaquel_documento"])? limpiarCadena($_POST["caja_anaquel_documento"]):"";
$carpeta_documento=isset($_POST["carpeta_documento"])? limpiarCadena($_POST["carpeta_documento"]):"";
$lugar_dentro_de_la_carpeta=isset($_POST["lugar_dentro_de_la_carpeta"])? limpiarCadena($_POST["lugar_dentro_de_la_carpeta"]):"";
$direccion_electronica_documento=isset($_POST["direccion_electronica_documento"])? limpiarCadena($_POST["direccion_electronica_documento"]):"";
$remitente=isset($_POST["remitente"])? limpiarCadena($_POST["remitente"]):"";
$destinatario=isset($_POST["destinatario"])? limpiarCadena($_POST["destinatario"]):"";
$cargo_destinatario=isset($_POST["cargo_destinatario"])? limpiarCadena($_POST["cargo_destinatario"]):"";
$criterio1=isset($_POST["criterio1"])? limpiarCadena($_POST["criterio1"]):"";
$criterio2=isset($_POST["criterio2"])? limpiarCadena($_POST["criterio2"]):"";
$criterio3=isset($_POST["criterio3"])? limpiarCadena($_POST["criterio3"]):"";
$criterio4=isset($_POST["criterio4"])? limpiarCadena($_POST["criterio4"]):"";
$criterio5=isset($_POST["criterio5"])? limpiarCadena($_POST["criterio5"]):"";
$criterio6=isset($_POST["criterio6"])? limpiarCadena($_POST["criterio6"]):"";
$condicion=isset($_POST["condicion"])? limpiarCadena($_POST["condicion"]):"";
$fk_bodega_archivo_documento=isset($_POST["fk_bodega_archivo_documento"])? limpiarCadena($_POST["fk_bodega_archivo_documento"]):"";


switch ($_GET["op"]){
    case 'guardaryeditar':

        if (!file_exists($_FILES['direccion_electronica_documento']['tmp_name']) || !is_uploaded_file($_FILES['direccion_electronica_documento']['tmp_name']))
        {
            $direccion_electronica_documento=$_POST["direccion_electronica_documento_actual"]; 
        } 
        else
        {
            $ext = explode(".", $_FILES["direccion_electronica_documento"]["name"]);
            if ($_FILES['direccion_electronica_documento']['type']== "application/pdf"||$_FILES['direccion_electronica_documento']['type']== "image/jpg" ||$_FILES['direccion_electronica_documento']['type']== "image/jpeg" || $_FILES['direccion_electronica_documento']['type']== "image/png" )
            {
                $direccion_electronica_documento = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["direccion_electronica_documento"]["tmp_name"], "../files/archivos/".$direccion_electronica_documento);
            }
        } 

        if (empty($id_documento)){
            $rspta=$documento_activo->insertar($numero_documento,$fecha_creacion,$asunto_documento,$cargo_remitente_documento,$empresa_documento,$anaquel_archivo_documento,$caja_anaquel_documento,$carpeta_documento,$lugar_dentro_de_la_carpeta,$direccion_electronica_documento,$remitente,$destinatario,$cargo_destinatario,$criterio1,$criterio2,$criterio3,$criterio4,$criterio5,$criterio6,$condicion,$fk_bodega_archivo_documento);
            echo $rspta ? "Documento registrado" : "No se pudieron registrar todos los datos del documento ";
        }
        else {
            $rspta=$documento_activo->editar($id_documento,$numero_documento,$fecha_creacion,$asunto_documento,$cargo_remitente_documento,$empresa_documento,$anaquel_archivo_documento,$caja_anaquel_documento,$carpeta_documento,$lugar_dentro_de_la_carpeta,$direccion_electronica_documento,$remitente,$destinatario,$cargo_destinatario,$criterio1,$criterio2,$criterio3,$criterio4,$criterio5,$criterio6,$fk_bodega_archivo_documento);
            echo $rspta ? "Documento actualizado" : "Documento no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$documento_activo->desactivar($id_documento);
        echo $rspta ? "Documento Desactivado" : "Documento no se pudo desactivar";
        
    break;

    case 'activar':
        $rspta=$documento_activo->activar($id_documento);
        echo $rspta ? "Documento activado" : "Documento no se puede activar";
        
    break;

    case 'mostrar':
        $rspta=$documento_activo->mostrar($id_documento);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        
    break;

    case 'listar':
        $rspta=$documento_activo->listar();
        //Vamos a declarar un array
        $data= Array();

        $url="../files/archivos/";
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
           
                
                "0"=>$reg->numero_documento,
                "1"=>$reg->fecha_creacion,
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
                "15"=>$reg->usuario_que_creo_documento,
                "16"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

    case "selectBodega":

require_once "../modelos/Bodega.php";
$bodega = new Bodega();

$rspta = $bodega->select();

    while ($reg = $rspta->fetch_object())
    {
        echo '<option value=' . $reg->id_bodega . '>' . $reg->nombre.  '</option>';
        
    }
    break;

}

?>