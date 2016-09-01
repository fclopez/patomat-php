<?php
include_once 'conexiondb.php';

       $codigo = $_GET['codigoCliente'];
       $nombre = $_GET['nombreCliente'];
       $direccion = $_GET['direccionCliente'];
       $ciudad = $_GET['ciudadCliente']; 
       $pais = $_GET['paisCliente'];
       $contacto = $_GET['contactoCliente']; 
       $telefono = $_GET['telefonoCliente']; 
       $correo =$_GET['correo']; 

  $query = "INSERT INTO public.clientes(
  id_cliente, nombre, direccion, ciudad, pais, contacto, telefono, email) VALUES ($codigo ,'$nombre','$direccion','$ciudad','$pais','$contacto',$telefono,'$correo');";
  $result = pg_query($cnx, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

pg_free_result($result);

pg_close($cnx); 

header( "refresh:3;url=Clientes.php" );
echo 'Cliente Guardado Con exito, En 3 segundos será redirigido. Si no, click <a href="Clientes.php">aqui</a>.';

?>