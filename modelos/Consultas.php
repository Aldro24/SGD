<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function consultafecha($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT DATE(a.fecha_creacion) as fecha, a.id_documento,a.numero_documento,a.fecha_creacion,a.asunto_documento,a.cargo_remitente_documento,a.empresa_documento,b.nombre as bodega,a.anaquel_archivo_documento,a.caja_anaquel_documento,a.carpeta_documento,a.lugar_dentro_de_la_carpeta,a.direccion_electronica_documento,a.remitente,a.destinatario,a.cargo_destinatario,CONCAT_WS('-',a.criterio1,a.criterio2,a.criterio3,a.criterio4,a.criterio5,a.criterio6 )AS criterios,a.condicion,a.fk_bodega_archivo_documento FROM documento_activo a INNER JOIN bodega b ON a.fk_bodega_archivo_documento= b.id_bodega  WHERE DATE(a.fecha_creacion)>='$fecha_inicio' AND DATE(a.fecha_creacion)<='$fecha_fin'";
		return ejecutarConsulta($sql);		
	}

	public function ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente)
	{
		$sql="SELECT DATE(v.fecha_hora) as fecha,u.nombre as usuario, p.nombre as cliente,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.idcliente='$idcliente'";

		return ejecutarConsulta($sql);		
	}

	public function totalcomprahoy()
	{
		$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM ingreso WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function totalventahoy()
	{
		$sql="SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function comprasultimos_10dias()
	{
		$sql="SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) as fecha,SUM(total_compra) as total FROM ingreso GROUP by fecha_hora ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}

	public function ventasultimos_12meses()
	{
		$sql="SELECT DATE_FORMAT(fecha_hora,'%M') as fecha,SUM(total_venta) as total FROM venta GROUP by MONTH(fecha_hora) ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}

	public function kardex($idarticulo)

	{
		$c="compra";
		$v="venta";
		$sql="SELECT kardex.idproducto, kardex.fecha,IF(kardex.cantidad>0,'$c','$v') AS tipo, kardex.precio, kardex.cantidad, SUM(kardex.cantidad) OVER (ORDER BY kardex.fecha, kardex.cantidad) as stock FROM `kardex` WHERE kardex.idproducto='$idarticulo' ORDER BY kardex.fecha";


		return ejecutarConsultaKardex($sql,$idarticulo);
	}

	
}

?>