<?php 
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";

Class modificacion_bodegas
{
	//Implementamos nuestro constructor
	public function _construct()
	{

	}

	



// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT nombre, fk_usuario_que_modifico_documento as usuario,fecha_modificacion from modificacion_bodegas;";
return ejecutarConsulta($sql);
}










}





 ?>