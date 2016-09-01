<?php
    require 'database.php';
 
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {

        // keep track post values    
        $nombre = $_POST['nombreProd'];
        $descripcion = $_POST['descripcionProd'];
        $vrunidad = $_POST['vrUnidad'];
        $existencias = $_POST['existencias'];
                  
        $valid = true;
        if (empty($nombre)) {
        	$valid = false;
        }
        if (empty($descripcion)) {
        	$valid = false;
        }
        if (empty($vrunidad)) {
        	$valid = false;
        }
        if (empty($existencias)) {
        	$valid = false;
        }
        
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE productos  set nombre = ?, descripcion = ?, vr_unidad = ?, existencias = ? WHERE id_producto = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$descripcion,$vrunidad,$existencias,$id));
            Database::disconnect();
            //header("Location: Vendedores.php");
            
            header( "refresh:2;url=Productos.php" );
            echo 'Producto Actualizado Con exito, En 3 segundos sera redirigido al maestro de productos. Si no, click <a href="Productos.php">aqui</a>.';
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM productos where id_producto = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        
        $id_producto = $data['id_producto'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $vr_unidad = $data['vr_unidad'];
        $existencias = $data['existencias'];
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
    
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
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
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>

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
					<h1 class="page-header">Maestro Productos</h1>
				</div>
		</div>
		<div class="panel panel-default">
            <div class="panel-heading">Actualizar producto</div>
            <div class="panel-body">
            <form class="form-horizontal" action="ActualizarProducto.php?id=<?php echo $id?>" method="post">
			<div>
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<tr>
						<th>Id</th>
						<th><input type="text"  class="form-control  id="id" disabled name = "idProd" value="<?php echo !empty($id_producto)?$id_producto:'';?>" ></th>

					</tr>
					<tr>
						<th>Nombre</th>
						<th><input type="text"  class="form-control id="email" name = "nombreProd" value="<?php echo !empty($nombre)?$nombre:'';?>"></th>
						<th>Descripcion</th>
						<th><input type="text"  class="form-control id="pnombre" name ="descripcionProd" value="<?php echo !empty($descripcion)?$descripcion:'';?>" ></th>
					</tr>
					<tr>
						<th>Valor unidad</th>
						<th><input type="text"  class="form-control id="papellido" name ="vrUnidad" value="<?php echo !empty($vr_unidad)?$vr_unidad:'';?>"></th>
						<th>Existencias</th>
						<th><input type="text"  class="form-control id="sapellido" name ="existencias" value="<?php echo !empty($existencias)?$existencias:'';?>"></th>
					</tr>			
				</table>
			<br>
			<div class="form-actions">
			<button type="sumbit" class="btn btn-success">Guardar</button>
			<a class="btn btn-danger" href="Productos.php">Salir</a>
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
