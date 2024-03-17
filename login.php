<?php
session_start();

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Incluir el archivo de configuración
    include 'config.php';

    // Conectar a la base de datos utilizando las variables definidas en config.php
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Escapar los valores de los campos de usuario y contraseña para evitar inyección SQL
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE nombre='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Las credenciales son correctas, iniciar sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: home.php"); // Redirigir al usuario a la página de inicio
    } else {
        // Las credenciales son incorrectas
        echo "Usuario o contraseña incorrectos.";
    }

    $conn->close(); // Cerrar la conexión a la base de datos
} else {
    // Si no se reciben datos del formulario, redirigir al usuario al formulario de inicio de sesión
    header("Location: login.html");
}
?>
