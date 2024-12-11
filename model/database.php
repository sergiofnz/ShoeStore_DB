<?php
    $dsn = 'mysql:host=localhost;dbname=shoe_store_db';
    $username = 'root';
    $password = 'Azul123**';

    try {
        $db = new PDO($dsn, $username, $password);
  
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "Error de conexión: " . $error_message;  // Agregado para mostrar el error de forma más detallada
        include('../errors/database_error.php');
        exit();
    }
?>
