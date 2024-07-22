<?php 
if (strlen(session_id())< 1)
session_start();
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";

Class modificacion_documento
{
	//Implementamos nuestro constructor
	public function _construct()
	{

	}

	



// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT numero_documento,fk_usuario_que_modifico_documento,fecha_modificacion from modificacion_documentos";
return ejecutarConsulta($sql);
}










}





 ?>