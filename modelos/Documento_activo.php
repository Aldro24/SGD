<?php 
if (strlen(session_id())< 1)
session_start();
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";

Class documento_activo
{
	//Implementamos nuestro constructor
	public function _construct()
	{

	}

	//Implementamos un método para insertar registros 

	public function insertar($numero_documento,$fecha_creacion,$asunto_documento,$cargo_remitente_documento,$empresa_documento,$anaquel_archivo_documento,$caja_anaquel_documento,$carpeta_documento,$lugar_dentro_de_la_carpeta,$direccion_electronica_documento,$remitente,$destinatario,$cargo_destinatario,$criterio1,$criterio2,$criterio3,$criterio4,$criterio5,$criterio6,$condicion,$fk_bodega_archivo_documento,$usuario_que_creo_documento,$fk_usuario_que_modifico_documento,$fecha_modificacion)
	{
		$sql="INSERT INTO documento_activo(numero_documento,fecha_creacion,asunto_documento,cargo_remitente_documento,empresa_documento,anaquel_archivo_documento,caja_anaquel_documento,carpeta_documento,lugar_dentro_de_la_carpeta,direccion_electronica_documento,remitente,destinatario,cargo_destinatario,criterio1,criterio2,criterio3,criterio4,criterio5,criterio6,condicion,fk_bodega_archivo_documento,usuario_que_creo_documento,fk_usuario_que_modifico_documento,fecha_modificacion) VALUES ('$numero_documento','$fecha_creacion','$asunto_documento','$cargo_remitente_documento','$empresa_documento','$anaquel_archivo_documento','$caja_anaquel_documento','$carpeta_documento','$lugar_dentro_de_la_carpeta','$direccion_electronica_documento','$remitente','$destinatario','$cargo_destinatario','$criterio1','$criterio2','$criterio3','$criterio4','$criterio5','$criterio6','1','$fk_bodega_archivo_documento','$usuario_que_creo_documento','$fk_usuario_que_modifico_documento','$fecha_modificacion')";

		return ejecutarConsulta($sql);
	}



	public function editar($id_documento,$numero_documento,$fecha_creacion,$asunto_documento,$cargo_remitente_documento,$empresa_documento,$anaquel_archivo_documento,$caja_anaquel_documento,$carpeta_documento,$lugar_dentro_de_la_carpeta,$direccion_electronica_documento,$remitente,$destinatario,$cargo_destinatario,$criterio1,$criterio2,$criterio3,$criterio4,$criterio5,$criterio6,$fk_bodega_archivo_documento,$usuario_que_creo_documento,$fk_usuario_que_modifico_documento,$fecha_modificacion)
	{
		

		$sql="UPDATE documento_activo SET numero_documento='$numero_documento',fecha_creacion='$fecha_creacion',asunto_documento='$asunto_documento',cargo_remitente_documento='$cargo_remitente_documento', empresa_documento='$empresa_documento',anaquel_archivo_documento='$anaquel_archivo_documento',caja_anaquel_documento='$caja_anaquel_documento',carpeta_documento='$carpeta_documento',lugar_dentro_de_la_carpeta='$lugar_dentro_de_la_carpeta', direccion_electronica_documento='$direccion_electronica_documento',remitente='$remitente',destinatario='$destinatario',cargo_destinatario='$cargo_destinatario',criterio1='$criterio1',criterio2='$criterio2',criterio3='$criterio3',criterio4='$criterio4',criterio5='$criterio5',criterio6='$criterio6',fk_bodega_archivo_documento='$fk_bodega_archivo_documento',usuario_que_creo_documento='$usuario_que_creo_documento',fk_usuario_que_modifico_documento='$fk_usuario_que_modifico_documento',fecha_modificacion='$fecha_modificacion' WHERE id_documento='$id_documento'";
		 ejecutarConsulta($sql);

		$fk_usuario_que_modifico_documentou=$_SESSION['nombre'];
		
         $sql2="CALL registro_edicion_documentos('$numero_documento','$fk_usuario_que_modifico_documentou');";
         return ejecutarConsulta($sql2);
	}

//implementamos un metodo para desactivar articulos


public function desactivar ($id_documento)
{
	$id_desactivacion=$_SESSION['nombre'];
	$sql="UPDATE documento_activo SET condicion='0' WHERE id_documento='$id_documento'";
	ejecutarConsulta($sql);
	$sql2="CALL botondesactivardocumentos('$id_documento','$id_desactivacion');";
	return ejecutarConsulta($sql2);

}

public function activar ($id_documento)
{
	$id_activacion=$_SESSION['nombre'];
	$sql="UPDATE documento_activo SET condicion='1' WHERE id_documento='$id_documento'";
	ejecutarConsulta($sql);
	$sql2="CALL botonactivardocumentos('$id_documento','$id_activacion');";
	return ejecutarConsulta($sql2);
}

//implementar un metodo para mostrar los datos de un registro a modificar

public function mostrar($id_documento){

	$sql= " SELECT * FROM documento_activo WHERE id_documento='$id_documento'";
	return ejecutarConsultaSimpleFila($sql);
}

// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT id_documento, numero_documento, fecha_creacion, asunto_documento,cargo_remitente_documento,empresa_documento,anaquel_archivo_documento,caja_anaquel_documento,carpeta_documento,lugar_dentro_de_la_carpeta,direccion_electronica_documento,remitente,destinatario,cargo_destinatario,CONCAT_WS('-',criterio1,criterio2,criterio3,criterio4,criterio5,criterio6 )AS criterios, condicion,(select nombre from bodega where fk_bodega_archivo_documento=id_bodega) AS bodega,usuario_que_creo_documento from documento_activo;";
return ejecutarConsulta($sql);
}

public function listarb()
{
$sql="SELECT id_documento, numero_documento, fecha_creacion, asunto_documento,cargo_remitente_documento,empresa_documento,anaquel_archivo_documento,caja_anaquel_documento,carpeta_documento,lugar_dentro_de_la_carpeta,direccion_electronica_documento,remitente,destinatario,cargo_destinatario,CONCAT_WS('-',criterio1,criterio2,criterio3,criterio4,criterio5,criterio6 )AS criterios, condicion,(select nombre from bodega where fk_bodega_archivo_documento=id_bodega) AS bodega,usuario_que_creo_documento, (SELECT nombre from usuario where fk_usuario_que_modifico_documento=idusuario ) AS fk_usuario_que_modifico_documento, fecha_modificacion, usuario_que_activo,fecha_activacion,usuario_que_desactivo,fecha_desactivacion from documento_activo;";
return ejecutarConsulta($sql);
}








}





 ?>