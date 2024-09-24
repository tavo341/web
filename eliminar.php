<?php
// eliminar.php
$host = 'localhost';
$dbname = 'dbinventario';
$user = 'root'; 
$pass = ''; 

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conexion->prepare("DELETE FROM maquinarias_equipo_diversos WHERE id_Diversos = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    header("Location: Formato1.php"); // Redirigir a la página de lista
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
