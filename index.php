<?php
session_start();

$error = "";

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: modulos/estudiante/estudiantes.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('config/db.php');

    try {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $stm = $pdo->prepare("CALL ValidadorrCredenciales(?, ?)");
        $stm->bindParam(1, $usuario, PDO::PARAM_STR);
        $stm->bindParam(2, $contrasena, PDO::PARAM_STR);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['Mensaje'] === 'Credenciales válidas') {
            $_SESSION['logged_in'] = true;

            // Mostrar alerta cuando el acceso sea concedido
            echo '<script type="text/javascript">alert("Acceso concedido. ¡Bienvenido!"); window.location.href="modulos/estudiante/estudiantes.php";</script>';
            exit();
        } else {
            $error = "Credenciales inválidas";
        }
    } catch (PDOException $e) {
        $error = "Error al procesar las credenciales";
        // Puedes imprimir el mensaje de error detallado si es necesario: echo "ERROR: " . $e->getMessage();
    }
}
?>

<head>
    <link rel="stylesheet" href="css/index.css">
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <?php if (!empty($error)) { ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form id="login-form" method="post" action=""> 
            <input type="text" id="username" name="usuario" placeholder="Nombre de usuario" required>
            <input type="password" id="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
