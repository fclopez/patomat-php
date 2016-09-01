<?php
include_once 'conexiondb.php';

       $codigo = $_GET['codigoProducto'];
       $nombre = $_GET['nombreProducto'];
       $decripcion = $_GET['descripcionProducto'];
       $existencias = $_GET['existenciasProducto'];
       $valorUnitario = $_GET['valorUnitario']; 

  $query = "INSERT INTO public.productos( id_producto, nombre, descripcion,vr_unidad, existencias) VALUES ($codigo ,'$nombre','$decripcion',$valorUnitario,$existencias);";
  $result = pg_query($cnx, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

	pg_free_result($result);
	pg_close($cnx); 
	
	header( "refresh:2;url=Productos.php" );
	echo 'Producto Guardado Con exito, En 3 segundos sera redirigido. Si no, click <a href="Productos.php">aqui</a>.';
	
?>