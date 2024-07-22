<?php 
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";

Class modificacion_usuario
{
	//Implementamos nuestro constructor
	public function _construct()
	{

	}

	



// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT nombre,usuario_que_modifico_documento,fecha_modificacion from modificacion_usuarios;";
return ejecutarConsulta($sql);
}










}





 ?>