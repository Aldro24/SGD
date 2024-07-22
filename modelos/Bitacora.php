<?php 
if (strlen(session_id())< 1)
session_start();
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";

Class Bitacora 
{
    //Implementamos nuestro constructor
    public function _construct()
    {

    }

    //Implementamos un método para insertar registros 

    public function insertar($nombre,$ci_ruc_pas,$num_identificacion,$telefono,$fecha_prestamo,$fecha_entrega,$observaciones,$usuario_que_creo_documento,$fk_usuario_que_modifico_documento,$fecha_modificacion)
    {
        $sql="INSERT INTO bitacora (nombre,ci_ruc_pas,num_identificacion,telefono,fecha_prestamo,fecha_entrega,observaciones,condicion,usuario_que_creo_documento,fk_usuario_que_modifico_documento,fecha_modificacion)
        VALUES ('$nombre','$ci_ruc_pas','$num_identificacion','$telefono','$fecha_prestamo','$fecha_entrega','$observaciones','1','$usuario_que_creo_documento','$fk_usuario_que_modifico_documento','$fecha_modificacion')";

        return ejecutarConsulta($sql);
    }


    public function editar($id_documento,$nombre,$ci_ruc_pas,$num_identificacion,$telefono,$fecha_prestamo,$fecha_entrega,$observaciones,$usuario_que_creo_documento,$fk_usuario_que_modifico_documento,$fecha_modificacion)
    {
        $sql="UPDATE bitacora SET nombre='$nombre',ci_ruc_pas='$ci_ruc_pas',num_identificacion='$num_identificacion',telefono='$telefono',fecha_prestamo='$fecha_prestamo',fecha_entrega='$fecha_entrega',observaciones='$observaciones',usuario_que_creo_documento='$usuario_que_creo_documento',fk_usuario_que_modifico_documento='$fk_usuario_que_modifico_documento',fecha_modificacion='$fecha_modificacion' WHERE id_documento='$id_documento'";
          ejecutarConsulta($sql);
           $usuario_que_modifico_bitacorau=$_SESSION['nombre'];
         $sql2="CALL registro_edicion_bitacora('$nombre','$usuario_que_modifico_bitacorau');";
    
        return ejecutarConsulta($sql2);


    }

//implementamos un metodo para desactivar usuarios


public function desactivar ($id_documento)
{
    $ideliminacion=$_SESSION['nombre'];
    $sql="UPDATE bitacora SET condicion='0' WHERE id_documento='$id_documento'";
    ejecutarConsulta($sql);
    $sql2="CALL botondesactivarbitacora('$id_documento','$ideliminacion');";
    
    return ejecutarConsulta($sql2);
}

public function activar ($id_documento)
{
    $id_activacion=$_SESSION['nombre'];
    $sql="UPDATE bitacora SET condicion='1' WHERE id_documento='$id_documento'";
     ejecutarConsulta($sql);
    $sql2="CALL botonactivarbitacora('$id_documento','$id_activacion');";
    return ejecutarConsulta($sql2);
}

//implementar un metodo para mostrar los datos de un registro a modificar

public function mostrar($id_documento)
{

    $sql= " SELECT * FROM bitacora WHERE id_documento='$id_documento'";
    return ejecutarConsultaSimpleFila($sql);
}

// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT id_documento,nombre,ci_ruc_pas,num_identificacion,telefono,fecha_prestamo,fecha_entrega,observaciones,condicion, usuario_que_creo_documento,(select nombre from usuario where fk_usuario_que_modifico_documento=idusuario) as usuario, fecha_modificacion,usuario_que_activo,fecha_activacion,usuario_que_desactivo,fecha_desactivacion FROM bitacora";
return ejecutarConsulta($sql); 
}

public function listarb()
{
$sql="SELECT id_documento,nombre,ci_ruc_pas,num_identificacion,telefono,fecha_prestamo,fecha_entrega,observaciones,condicion FROM bitacora";
return ejecutarConsulta($sql); 
}

}



 ?>