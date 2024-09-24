<?php
// Inicio de sesión
session_start();

// Datos de conexión a la base de datos
$servidor = "localhost";
$bd = "dbinventario";
$user = "root";
$pass = "";

try {
    $conexion = new PDO('mysql:host='.$servidor.';dbname='.$bd, $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mensaje_conexion = "Conexión exitosa con la base de datos."; // Mensaje de conexión exitosa
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

// Verificar si el formulario ha sido enviado y los campos están presentes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Obtener datos del formulario
        $usuario = $_POST["username"];
        $contraseña = $_POST["password"];

        // Consulta SQL para verificar el usuario y la contraseña
        $sql = "SELECT * FROM usuarios WHERE NombreUsuario=:usuario AND ContrasenaHash=:contrasena";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':contrasena', $contraseña);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se encontró un resultado
        if (count($result) == 1) {
            // Inicio de sesión exitoso
            $_SESSION["usuario"] = $usuario; // Guardar el nombre de usuario en la sesión
            header("Location: home.html"); // Redirigir a home.html
            exit;
        } else {
            // Inicio de sesión fallido
            $mensaje = "Usuario o contraseña incorrectos";
        }
    } else {
        // Campos del formulario no encontrados
        $mensaje = "Por favor, complete todos los campos";
    }
} else {
    // Si no es una solicitud POST, no mostrar mensaje
    $mensaje = "";
}
?>
