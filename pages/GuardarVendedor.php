<?php
include_once 'conexiondb.php';

       $codigo = $_GET['codigoVen'];
       $pnombre = $_GET['primernombreven'];
       $snombre = $_GET['segundonombreven'];
       $papellido = $_GET['primerapeven'];
       $sapellido = $_GET['segundapeven'];
       $salario = $_GET['salarioVen'];
       $telefono = $_GET['telefonoven']; 
       $correo =$_GET['correo'];
       $sexo  =$_GET['sexo'];

  $query = "INSERT INTO public.vendedores(id_vendedor, p_nombre, s_nombre, p_apellido, s_apellido, salario, email, telefono, sexo) VALUES ($codigo ,'$pnombre','$snombre','$papellido','$sapellido',$salario,'$correo',$telefono,'$sexo');";
  $result = pg_query($cnx, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
  pg_free_result($result);
  pg_close($cnx); 
  
  header( "refresh:3;url=Vendedores.php" );
  echo 'Vendedor Guardado Con exito, En 3 segundos será redirigido. Si no, click <a href="Vendedores.php">aqui</a>.';
?>