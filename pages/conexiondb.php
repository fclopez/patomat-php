<?php
$user = 'fcosobnapryfwe';
$passwd = '_ujPp-lKeXkSwomOmdmuZZn8Qi';
$db = 'dfoq3nqmfc90f7';
$port = 5432;
$host = "ec2-184-73-196-82.compute-1.amazonaws.com";
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
echo "Conexion exitosa";
?>