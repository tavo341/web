<?php
// editar.php
$host = 'localhost';
$dbname = 'dbinventario';
$user = 'root'; 
$pass = ''; 

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conexion->prepare("SELECT * FROM maquinarias_equipo_diversos WHERE id_Diversos = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<form action="actualizar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id_Diversos']; ?>">
    <!-- Añadir campos de entrada para los demás datos, por ejemplo: -->
    <input type="text" name="denominacion" value="<?php echo htmlspecialchars($row['DenominacionBien']); ?>">
    <!-- Más campos aquí -->
    <button type="submit">Actualizar</button>
</form>
