<?php 
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";

Class Tipo_documento
{
	//Implementamos nuestro constructor
	public function _construct()
	{

	}

	//Implementamos un método para insertar registros 

	public function insertar($nombre, $descripcion)
	{
		$sql="INSERT INTO tipo_documento(nombre, descripcion, condicion)
		VALUES ('$nombre','$descripcion','1')";

		return ejecutarConsulta($sql);
	}



	public function editar($idtipodocumento,$nombre,$descripcion)
	{
		$sql="UPDATE tipo_documento SET nombre='$nombre',descripcion='$descripcion'WHERE idtipodocumento='$idtipodocumento'";
		return ejecutarConsulta($sql);
	}

//implementamos un metodo para desactivar tipos de documentos


public function desactivar ($idtipodocumento)
{
	$sql="UPDATE tipo_documento SET condicion='0' WHERE idtipodocumento='$idtipodocumento'";
	return ejecutarConsulta($sql);
}

public function activar ($idtipodocumento)
{
	$sql="UPDATE tipo_documento SET condicion='1' WHERE idtipodocumento='$idtipodocumento'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para mostrar los datos de un registro a modificar

public function mostrar($idtipodocumento){

	$sql= " SELECT * FROM tipo_documento WHERE idtipodocumento='$idtipodocumento'";
	return ejecutarConsultaSimpleFila($sql);
}

// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT * FROM tipo_documento";
return ejecutarConsulta($sql); 
}

//implementar un método para listar los registros y mostrar en el select

public function select()
{
	$sql="SELECT * FROM tipo_documento where condición=1";
	return ejecutarConsulta($sql); 
}

}





 ?>