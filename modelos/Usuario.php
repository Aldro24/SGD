<?php 
if (strlen(session_id())< 1)
session_start();
error_reporting(E_ALL);
//Incluimos inicialmente la conexion a la base de datos
require"../config/Conexion.php";


Class Usuario 
{
    //Implementamos nuestro constructor
    public function _construct()
    {

    }

    //Implementamos un método para insertar registros 

    public function insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$fk_bodega_usuario,$usuario_que_creo_documento,$fecha_creacion,$usuario_que_modifico_documento,$fecha_modificacion,$permisos)
    {
        $sql="INSERT INTO usuario(nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,fk_bodega_usuario,condicion,usuario_que_creo_documento,fecha_creacion,usuario_que_modifico_documento,fecha_modificacion)
        VALUES ('$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','$fk_bodega_usuario','1','$usuario_que_creo_documento','$fecha_creacion','$usuario_que_modifico_documento','$fecha_modificacion')";

        //return ejecutarConsulta($sql);

        $idusuarionew=ejecutarConsulta_retornarID($sql);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($permisos))
        {
            $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos + 1;
        }

        return $sw;
    }



    public function editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$fk_bodega_usuario,$usuario_que_creo_documento,$fecha_creacion,$usuario_que_modifico_documento,$fecha_modificacion,$permisos)
    {
        $sql="UPDATE usuario SET nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen',fk_bodega_usuario='$fk_bodega_usuario',usuario_que_creo_documento='$usuario_que_creo_documento',fecha_creacion='$fecha_creacion',usuario_que_modifico_documento='$usuario_que_modifico_documento',fecha_modificacion='$fecha_modificacion' WHERE idusuario='$idusuario'";
          ejecutarConsulta($sql);

          $usuario_que_modifico_usuariou=$_SESSION['nombre'];
         $sql2="CALL registro_edicion_usuarios('$nombre','$usuario_que_modifico_usuariou');";
    
        ejecutarConsulta($sql2);

         //eliminamos los permisos asignados para volverlos a registrar

         $sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
         ejecutarConsulta($sqldel);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($permisos))
        {
            $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos + 1;
        }

        return $sw;


    }

//implementamos un metodo para desactivar usuarios


public function desactivar ($idusuario)
{
    $ideliminacion=$_SESSION['nombre'];
    $sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
    ejecutarConsulta($sql);
    $sql2="CALL botondesactivarusuario('$idusuario','$ideliminacion');";
    
    return ejecutarConsulta($sql2);
}

public function activar ($idusuario)
{
    $id_activacion=$_SESSION['nombre'];
    $sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
    ejecutarConsulta($sql);
    $sql2="CALL botonactivarusuario('$idusuario','$id_activacion');";
    return ejecutarConsulta($sql2);
}

//implementar un metodo para mostrar los datos de un registro a modificar

public function mostrar($idusuario)
{

    $sql= " SELECT * FROM usuario WHERE idusuario='$idusuario'";
    return ejecutarConsultaSimpleFila($sql);
}

// implementar un metodo para listar los registros

public function listar()
{
$sql="SELECT idusuario,nombre, tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,(SELECT nombre from bodega where fk_bodega_usuario=id_bodega) as bodega, condicion, usuario_que_creo_documento, fecha_creacion from usuario;";
return ejecutarConsulta($sql); 
}
public function listarb()
{
$sql="SELECT idusuario,nombre, tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,(SELECT nombre from bodega where fk_bodega_usuario=id_bodega) as bodega, condicion, usuario_que_creo_documento, fecha_creacion,usuario_que_modifico_documento,fecha_modificacion,usuario_que_activo,fecha_activacion,usuario_que_desactivo,fecha_desactivacion from usuario;";
return ejecutarConsulta($sql); 
}

//implementar un método para listar los permisos marcados

public function listarmarcados($idusuario)
{
$sql= "SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
return ejecutarConsulta($sql);
}


//funcion para verificar el acceso al sistema

public function verificar($login,$clave)
{
$sql="SELECT idusuario,nombre,tipo_documento,num_documento,telefono,email,cargo,imagen,fk_bodega_usuario,usuario_que_creo_documento,fecha_creacion,usuario_que_modifico_documento,fecha_modificacion,login FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'";
return ejecutarConsulta($sql);
}

}





 ?>