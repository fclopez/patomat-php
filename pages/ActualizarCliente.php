<?php
    require 'database.php';
 
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {

        // keep track post values      
        $nombre = $_POST['nombreCliente'];
        $direccion = $_POST['direccionCliente'];
        $ciudad = $_POST['ciudadCliente'];
        $pais = $_POST['paisCliente'];
        $contacto = $_POST['contactoCliente'];
        $telefono = $_POST['telefonoCliente'];
        $email = $_POST['correoCliente'];
                  
        $valid = true;
        if (empty($nombre)) {
        	$valid = false;
        }
        if (empty($direccion)) {
        	$valid = false;
        }
        if (empty($ciudad)) {
        	$valid = false;
        }
        if (empty($telefono)) {
        	$valid = false;
        }
        
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE clientes  set nombre = ?, direccion = ?, ciudad = ?, pais = ?, contacto = ?, telefono =?, email = ? WHERE id_cliente = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$direccion,$ciudad,$pais,$contacto,$telefono,$email,$id));
            Database::disconnect();
            header("Location: Clientes.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM clientes where id_cliente = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        
        $id_cliente = $data['id_cliente'];
        $nombre = $data['nombre'];
        $direccion = $data['direccion'];
        $ciudad = $data['ciudad'];
        $pais = $data['pais'];
        $contacto = $data['contacto'];
        $telefono = $data['telefono'];
        $email = $data['email'];
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Patomar S.A.</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Tienda Patomar</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i>Principal</a>
                        </li>
                        <li>
                            <a href="Clientes.php"><i class="fa fa-th-list fa-fw"></i>Clientes</a>
                        </li>
                        <li>
                            <a href="Vendedores.php"><i class="fa fa-table fa-fw"></i>Vendedores</a>
                        </li>
                        <li>
                            <a href="Productos.php"><i class="fa fa-edit fa-fw"></i>Productos</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Facturas</a>

                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		
		<div id="page-wrapper">
		<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Maestro de clientes</h1>
				</div>
		</div>
		<div class="panel panel-default">
            <div class="panel-heading">Actualizar Cliente</div>
            <div class="panel-body">
            <form class="form-horizontal" action="ActualizarCliente.php?id=<?php echo $id?>" method="post">
			<div>
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<tr>
						<th> Codigo</th>
						<th><input type="text"  class="form-control  id="codigoCliente" disabled name = "codigoCliente" value="<?php echo !empty($id_cliente)?$id_cliente:'';?>" ></th>
						<th> Nombre</th>
						<th><input type="text"  class="form-control id="nombreCliente" name ="nombreCliente" value="<?php echo !empty($nombre)?$nombre:'';?>" ></th>
					</tr>
					<tr>
						<th>Ciudad</th>
						<th><input type="text"  class="form-control id="ciudadCliente" name ="ciudadCliente" value="<?php echo !empty($ciudad)?$ciudad:'';?>"></th>
						<th>Direccion</th>
						<th><input type="text"  class="form-control id="direccionC" name ="direccionCliente" value="<?php echo !empty($direccion)?$direccion:'';?>"></th>
					</tr>
					<tr>
						<th> Pais </th>
						<th><input type="text" class="form-control id="Pais" name ="paisCliente" value="<?php echo !empty($pais)?$pais:'';?>"></th>
						<th> Contacto </th>
						<th><input type="text"  class="form-control id="contacto" name = "contactoCliente" value="<?php echo !empty($contacto)?$contacto:'';?>"></th>
					</tr>
					<tr>
						<th> Telefono </th>
						<th><input type="text"  class="form-control  id="telefonoC" name="telefonoCliente" value="<?php echo !empty($telefono)?$telefono:'';?>"></th>
						<th> Email </th>
						<th><input type="text"  class="form-control id="email" name = "correoCliente" value="<?php echo !empty($email)?$email:'';?>"></th>
					</tr>
					
				</table>
			<br>
			<div class="form-actions">
			<button type="sumbit" class="btn btn-success">Guardar</button>
			<a class="btn btn-danger" href="Clientes.php">Salir</a>
			</div>
			
			</div>
			</form>
            </div>
            </div>
            

            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
