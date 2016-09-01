<?php
    require 'database.php';
 
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {

        // keep track post values    
        $pnombre = $_POST['pNombreVendedor'];
        $snombre = $_POST['sNombreVendedor'];
        $papellido = $_POST['pApellidoVendedor'];
        $sapellido = $_POST['sApellidoVendedor'];
        $salario = $_POST['salarioVendedor'];
        $telefono = $_POST['telefonoVendedor'];
        $email = $_POST['emailVendedor'];
        $sexo = $_POST['sexoVendedor'];
                  
        $valid = true;
        if (empty($pnombre)) {
        	$valid = false;
        }
        if (empty($papellido)) {
        	$valid = false;
        }
        if (empty($telefono)) {
        	$valid = false;
        }
        if (empty($email)) {
        	$valid = false;
        }
        
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE vendedores  set p_nombre = ?, s_nombre = ?, p_apellido = ?, s_apellido = ?, salario = ?, email = ?, telefono =?, sexo = ? WHERE id_vendedor = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($pnombre,$snombre,$papellido,$sapellido,$salario,$email,$telefono,$sexo,$id));
            Database::disconnect();
            //header("Location: Vendedores.php");
            
            header( "refresh:2;url=Vendedores.php" );
            echo 'Cliente Guardado Con exito, En 3 segundos sera redirigido al maestro de clientes. Si no, click <a href="Vendedores.php">aqui</a>.';
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vendedores where id_vendedor = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        
        $id_vendedor = $data['id_vendedor'];
        $pnombre = $data['p_nombre'];
        $snombre = $data['s_nombre'];
        $papellido = $data['p_apellido'];
        $sapellido = $data['s_apellido'];
        $salario = $data['salario'];
        $telefono = $data['telefono'];
        $email = $data['email'];
        $sexo= $data['sexo'];
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
					<h1 class="page-header">Maestro de vendedores</h1>
				</div>
		</div>
		<div class="panel panel-default">
            <div class="panel-heading">Actualizar vendedor</div>
            <div class="panel-body">
            <form class="form-horizontal" action="ActualizarVendedor.php?id=<?php echo $id?>" method="post">
			<div>
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<tr>
						<th>Id</th>
						<th><input type="text"  class="form-control  id="id" disabled name = "idVendedor" value="<?php echo !empty($id_vendedor)?$id_vendedor:'';?>" ></th>
						<th> Email </th>
						<th><input type="text"  class="form-control id="email" name = "emailVendedor" value="<?php echo !empty($email)?$email:'';?>"></th>
					</tr>
					<tr>
						<th>Primer Nombre</th>
						<th><input type="text"  class="form-control id="pnombre" name ="pNombreVendedor" value="<?php echo !empty($pnombre)?$pnombre:'';?>" ></th>
						<th>Segundo Nombre</th>
						<th><input type="text"  class="form-control id="snombre" name ="sNombreVendedor" value="<?php echo !empty($snombre)?$snombre:'';?>" ></th>
					</tr>
					<tr>
						<th>Primer Apellido</th>
						<th><input type="text"  class="form-control id="papellido" name ="pApellidoVendedor" value="<?php echo !empty($papellido)?$papellido:'';?>"></th>
						<th>Segundo Apellido</th>
						<th><input type="text"  class="form-control id="sapellido" name ="sApellidoVendedor" value="<?php echo !empty($sapellido)?$sapellido:'';?>"></th>
					</tr>
					<tr>
						<th>Salario </th>
						<th><input type="text" class="form-control id="salario" name ="salarioVendedor" value="<?php echo !empty($salario)?$salario:'';?>"></th>
						<th>Telefono</th>
						<th><input type="text"  class="form-control  id="telefono" name="telefonoVendedor" value="<?php echo !empty($telefono)?$telefono:'';?>"></th>
					</tr>
					<tr>						
						<th>Sexo M=Masculino F=Femenino</th>
						<th><input type="text"  class="form-control id="sexo" name = "sexoVendedor" value="<?php echo !empty($sexo)?$sexo:'';?>"></th>
					</tr>
					
				</table>
			<br>
			<div class="form-actions">
			<button type="sumbit" class="btn btn-success">Guardar</button>
			<a class="btn btn-danger" href="Vendedores.php">Salir</a>
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
