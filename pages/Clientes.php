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
            <div class="panel-heading">Agregar Clientes</div>
            <div class="panel-body">
            <form style="border-style:solid:border-color:black:border-width:0px" action ="GuardarCliente.php" method ="GET">
			<div>
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<tr>
						<th>Id</th>
						<th><input type="text"  class="form-control id="codigoCliente" name = "codigoCliente"></th>
						<th>Nombre</th>
						<th><input type="text"  class="form-control id="nombreCliente" name ="nombreCliente"></th>
					</tr>
					<tr>
						<th>Ciudad</th>
						<th><input type="text"  class="form-control id="ciudadCliente" name ="ciudadCliente"></th>
						<th>Direccion</th>
						<th><input type="text"  class="form-control id="direccionC" name ="direccionCliente"></th>
					</tr>
					<tr>
						<th>Pais</th>
						<th><input type="text" class="form-control id="Pais" name ="paisCliente"></th>
						<th>Contacto</th>
						<th><input type="text"  class="form-control id="contacto" name = "contactoCliente"></th>
					</tr>
					<tr>
						<th>Telefono</th>
						<th><input type="text"  class="form-control  id="telefonoC" name="telefonoCliente"></th>
						<th>Email</th>
						<th><input type="text"  class="form-control id="email" name = "correo" ></th>
					</tr>
					
				</table>
			<br>
			<button type="sumbit" class="btn btn-success">Guardar</button>			
			
			</div>
			</form>
            </div>
            </div>
            
            <div class="panel panel-default">
            <div class="panel-heading">Lista de Clientes</div>
            <div class="panel-body">
            <div>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Nombre</th>
                      <th>Direccion</th>
                      <th>Ciudad</th>
                      <th>Email</th>
                      <th>Numero Celular</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM clientes ORDER BY id_cliente asc';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['id_cliente'] . '</td>';
                            echo '<td>'. $row['nombre'] . '</td>';
                            echo '<td>'. $row['direccion'] . '</td>';
                            echo '<td>'. $row['ciudad'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['telefono'] . '</td>';
                            echo '<td width=200>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="ActualizarCliente.php?id='.$row['id_cliente'].'">Actualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="BorrarCliente.php?id='.$row['id_cliente'].'">Borrar</a>';
                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
            
            </div>   
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
