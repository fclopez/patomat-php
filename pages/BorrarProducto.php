<?php
    require 'database.php';
    
    // keep track post values
    $id = $_GET['id'];
    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM productos WHERE id_producto = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();    
        
    header( "refresh:3;url=Productos.php" );
    echo 'Producto eliminado con exito, En 3 segundos sera redirigido. Si no, click <a href="Productos.php">aqui</a>.';
?>