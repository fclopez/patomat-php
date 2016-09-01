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
					<h1 class="page-header">Maestro de productos</h1>
				</div>
		</div>
		<div class="panel panel-default">
            <div class="panel-heading">Agregar productos</div>
            <div class="panel-body">
            <form style="border-style:solid:border-color:black:border-width:0px" action ="GuardarProducto.php" method ="GET">
			<div>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<tr>
	<th>Id</th>
	<th><input type="text"  class="form-control id="codigoProducto" name="codigoProducto">  </th>
</tr>
<tr>
	<th>Nombre</th>
	<th><input type="text"  class="form-control id="nombreP" name="nombreProducto"></th>
</tr>
<tr>
	<th>Descripcion</th>
	<th><input type="text"  class="form-control id="descripcionProducto" name="descripcionProducto"></th>
</tr>
<tr>
	<th>Existencias</th>
	<th><input type="text"  class="form-control id="existencias" name="existenciasProducto"></th>
</tr>
<tr>
	<th>Valor Unitario</th>
	<th><input type="text"  class="form-control id="ValorU" name="valorUnitario"></th>
</tr>
</table >

			<br>
			<button type="sumbit" class="btn btn-success">Guardar</button>
			
			</div>
			</form>
            </div>
            </div>
            
            <div class="panel panel-default">
            <div class="panel-heading">Lista de productos</div>
            <div class="panel-body">
            <div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Valor Unidad</th>
                      <th>Existencias</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM productos order by id_producto asc';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id_producto'] . '</td>';
                            echo '<td>'. $row['nombre'] . '</td>';
                            echo '<td>'. $row['descripcion'] . '</td>';
                            echo '<td>'. $row['vr_unidad'] . '</td>';
                            echo '<td>'. $row['existencias'] . '</td>';
                            echo '<td width=200>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="ActualizarProducto.php?id='.$row['id_producto'].'">Actualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="BorrarProducto.php?id='.$row['id_producto'].'">Borrar</a>';
                            
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
