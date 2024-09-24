<?php
    // Iniciar sesión y verificar si hay un mensaje de error en la sesión
    session_start();
    $mensaje_error = isset($_SESSION['error']) ? $_SESSION['error'] : ''; // Obtener mensaje de error si existe
    if (isset($_SESSION['error'])) {
       unset($_SESSION['error']); // Limpiar el mensaje de error después de mostrarlo
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
    <div class="background">
        <img src="IMG/GastonVidal.jpg" alt="Imagen de Fondo">
    </div>
    <div class="login-container">
        <h1>INVENTARIO</h1>
        <form id="loginForm" method="post" action="login.php">
            <div class="form-group">
                <label for="username" >Correo:</label>
                <input type="email" id="username" name="username" placeholder="Ejemplo123@gaston.edu" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingresar contraseña" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="recuperar_contrasena.php">¿Olvidaste tu contraseña?</a>
        <div id="error-message"><?php echo $mensaje_error; ?></div> <!-- Aquí se mostrará el mensaje de error -->
    </div>
</body>
</html>
