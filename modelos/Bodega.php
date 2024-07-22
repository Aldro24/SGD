<?php 
if (strlen(session_id())< 1)
session_start();
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";

Class Bodega
{
	//Implementamos nuestro constructor
	public function _construct()
	{

	}

	//Implementamos un método para insertar registros 

	public function insertar($nombre,$direccion,$ciudad)
	{
		$sql="INSERT INTO bodega (nombre, direccion, ciudad, condicion)
		VALUES ('$nombre','$direccion','$ciudad','1')";

		return ejecutarConsulta($sql);
	}



	public function editar($id_bodega,$nombre,$direccion,$ciudad)
	{
		$sql="UPDATE bodega SET nombre='$nombre',direccion='$direccion', ciudad='$ciudad' WHERE id_bodega='$id_bodega'";
		ejecutarConsulta($sql);

		$fk_usuario_que_modifico_bodegau=$_SESSION['nombre'];
		
        $sql2="CALL registro_edicion_bodegas('$nombre','$fk_usuario_que_modifico_bodegau');";

        return ejecutarConsulta($sql2);
	}

//implementamos un metodo para desactivar tipos de documentos


public function desactivar ($id_bodega)
{
    $id_desactivacion=$_SESSION['nombre'];
	$sql="UPDATE bodega SET condicion='0' WHERE id_bodega='$id_bodega'";
	ejecutarConsulta($sql);
	$sql2="CALL botondesactivarbodega('$id_bodega','$id_desactivacion');";
	return ejecutarConsulta($sql2);

}

public function activar ($id_bodega)
{
    $id_activacion=$_SESSION['nombre'];
	$sql="UPDATE bodega SET condicion='1' WHERE id_bodega='$id_bodega'";
	ejecutarConsulta($sql);
	$sql2="CALL botonactivarbodega('$id_bodega','$id_activacion');";
	return ejecutarConsulta($sql2);
}

//implementar un metodo para mostrar los datos de un registro a modificar

public function mostrar($id_bodega){

	$sql= " SELECT * FROM bodega WHERE id_bodega='$id_bodega'";
	return ejecutarConsultaSimpleFila($sql);
}

// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT id_bodega,nombre,direccion,ciudad,condicion,usuario_que_activo,fecha_activacion,usuario_que_desactivo,fecha_desactivacion FROM bodega";
return ejecutarConsulta($sql); 
}

//implementar un método para listar los registros y mostrar en el select

public function select()
{
	$sql="SELECT * FROM bodega where condicion=1";
	return ejecutarConsulta($sql); 
}

}





 ?>